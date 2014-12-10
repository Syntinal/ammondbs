<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT'] . '/library/library.php';


// check for existing email as part of registration process
function getEmail($emailAddress){
 $connection = connFulfillmentUser();
 try {
  $sql = "SELECT emailAddress FROM customers WHERE emailAddress = :emailAddress";
  $stmt = $connection->prepare($sql);
  $stmt->bindValue(':emailAddress', $emailAddress);
  $stmt->execute();
  $existingemail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
} catch (PDOException $exc){
    // Send to error page with message
    $message = 'Sorry, there was an internal error with the server.';
    $_SESSION['message'] = $message;
    header('location: /errordocs/500.php');
    exit;
}
// Note, we are not interested in the email, only if it exists
if(!empty($existingemail)){
   return TRUE;
  } else {
   return FALSE;
  }
}

// Register a new individual
function addCustomer($firstName, $lastName, $email, $password) {
    $connection = connFulfillmentUser();
    $admin = 0;
    try {
        $sql = 'INSERT INTO users (firstName, lastName, email, password, admin)
                VALUES (:firstName, :lastName, :email, :password, :admin)';
        $stmt = $connection->prepare($sql);

        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':admin', $admin, PDO::PARAM_INT);
        $stmt->execute();
        $insertRow = $stmt->rowCount();
        $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $insertRow;
}

// Login client
function loginCustomer($emailAddress, $password){
    $connection = connFulfillmentUser();
 
    try{
     $sql = "SELECT userID, firstName, lastName, email, password, admin
            FROM users WHERE email = :emailAddress";

     $stmt = $connection->prepare($sql);
     $stmt->bindValue(':emailAddress', $emailAddress,PDO::PARAM_STR);
     $stmt->execute();
     $custInfo = $stmt->fetch(PDO::FETCH_ASSOC);
     $stmt->closeCursor();
   } catch (PDOException $exc){
       return FALSE;
   }
   // Returns the hashed password
   return $custInfo;
}

// Get Users
// Get a list of the currently registered individuals
function getUsers() {
    $connection = connFulfillmentUser();
    try {
     $sql = 'SELECT userID, firstName, lastName, email FROM users';
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $users;
}

// Get data for a single individual
function getUser($userID) {
    $connection = connFulfillmentUser();
    try {
     $sql = 'SELECT userID, firstName, lastName, email FROM users WHERE userID = :userID';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $user;
}

// Update data for an individual
function updateUser($userID, $firstName, $lastName, $email, $password){
 $connection = connFulfillmentUser();
 try {
  // Test if there is a value for a password (it is being reset)
  if(empty($password)){
        $sql = 'UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email WHERE userID = :userID';
  } else {
   $sql = 'UPDATE users SET firstName = :firstName, lastName = :lastName, email = :email, password = :password WHERE userID = :userID';
  }
 $stmt = $connection->prepare($sql);
 $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
 $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
 $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
 $stmt->bindParam(':email', $email, PDO::PARAM_STR);
 if(!empty($password)){
 $stmt->bindParam(':password', $password, PDO::PARAM_STR);
 }
 $stmt->execute();
 $updateRow = $stmt->rowCount();
 $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $updateRow;
}

// Delete data for an individual
function deleteCustomer($userID){
    if($_SESSION['admin'] != 1){
        return ($deleteRow = false);
    }
 $connection = connFulfillmentAdmin(); // Notice the new proxy (with delete privleges)
 try {
   $sql = 'DELETE FROM users WHERE userID = :userID';
 $stmt = $connection->prepare($sql);
 $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
 $stmt->execute();
 $deleteRow = $stmt->rowCount();
 $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $deleteRow;
}