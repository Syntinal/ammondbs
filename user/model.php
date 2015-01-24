<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require $_SERVER['DOCUMENT_ROOT'] . '/library/library.php';


// check for existing email as part of registration process
function getEmail($email){
 $connection = connFulfillmentUser();
 try {
  $sql = "SELECT email FROM users WHERE email = :email";
  $stmt = $connection->prepare($sql);
  $stmt->bindValue(':email', $email);
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

function itemSearch($searchTerm) {
    $connection = connFulfillmentUser();
    try {
     $sql = 'SELECT skuNumber, DESC1, DESC2, DESC3, partNumber, QOH2 FROM itemsf WHERE '
             . 'skuNumber LIKE \'%' . $searchTerm . '%\' OR '
             . 'DESC1 LIKE \'%' . $searchTerm . '%\' OR '
             . 'DESC2 LIKE \'%' . $searchTerm . '%\' OR '
             . 'DESC3 LIKE \'%' . $searchTerm . '%\' OR '
             . 'partNumber LIKE \'%' . $searchTerm . '%\'';
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $items;
}

// Get data for a single individual
function getItem($skuNumber) {
    $connection = connFulfillmentUser();
    try {
     $sql = 'SELECT 
               skuNumber
             , partNumber
             , DESC1
             , DESC2
             , DESC3
             , DESC4
             , QOH2
             , PUT
             , SCOST
             , CAT
             , QPK
             , UNIT
          FROM itemsf
          WHERE skuNumber = :skuNumber';
        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':skuNumber', $skuNumber, PDO::PARAM_INT);
        $stmt->execute();
        $item = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $item;
}

function updateItem( 
                    $skuNumber
                  , $partNumber
                  , $DESC1
                  , $DESC2
                  , $DESC3
                  , $DESC4
                  , $QOH2
                  , $PUT
                  , $SCOST
                  , $CAT
                  , $QPK
                  , $UNIT){
    $connection = connFulfillmentUser();
    try {
     $sql = 'UPDATE itemsf SET
               skuNumber = :skuNumber
             , partNumber = :partNumber
             , DESC1 = :DESC1
             , DESC2 = :DESC2
             , DESC3 = :DESC3
             , DESC4 = :DESC4
             , QOH2 = :QOH2
             , PUT = :PUT
             , SCOST = :SCOST
             , CAT = :CAT
             , QPK = :QPK
             , UNIT = :UNIT
          WHERE skuNumber = :skuNumber';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':skuNumber', $skuNumber, PDO::PARAM_INT);
        $stmt->bindParam(':partNumber', $partNumber, PDO::PARAM_STR);
        $stmt->bindParam(':DESC1', $DESC1, PDO::PARAM_STR);
        $stmt->bindParam(':DESC2', $DESC2, PDO::PARAM_STR);
        $stmt->bindParam(':DESC3', $DESC3, PDO::PARAM_STR);
        $stmt->bindParam(':DESC4', $DESC4, PDO::PARAM_STR);
        $stmt->bindParam(':QOH2', $QOH2, PDO::PARAM_STR);
        $stmt->bindParam(':PUT', $PUT, PDO::PARAM_STR);
        $stmt->bindParam(':SCOST', $SCOST, PDO::PARAM_STR);
        $stmt->bindParam(':CAT', $CAT, PDO::PARAM_STR);
        $stmt->bindParam(':QPK', $QPK, PDO::PARAM_STR);
        $stmt->bindParam(':UNIT', $UNIT, PDO::PARAM_STR);
        $stmt->execute();
        $updateRow = $stmt->rowCount();
        $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $updateRow;
}

// Delete data for an individual
function deleteItem($skuNumber){
    if($_SESSION['admin'] != 1){
        return ($deleteRow = false);
    }
 $connection = connFulfillmentAdmin(); // Notice the new proxy (with delete privleges)
 try {
   $sql = 'DELETE FROM itemsf WHERE skuNumber = :skuNumber';
 $stmt = $connection->prepare($sql);
 $stmt->bindParam(':skuNumber', $skuNumber, PDO::PARAM_INT);
 $stmt->execute();
 $deleteRow = $stmt->rowCount();
 $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
}

function uploadImage($skuNumber){
    $target_dir = "image/";
    $target_file = $target_dir . $skuNumber;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

function addItem( 
                    $skuNumber
                  , $partNumber
                  , $DESC1
                  , $DESC2
                  , $DESC3
                  , $DESC4
                  , $QOH2
                  , $PUT
                  , $SCOST
                  , $CAT
                  , $QPK
                  , $UNIT){
    $connection = connFulfillmentUser();
    try {
        $sql = 'INSERT INTO itemsf (skuNumber, partNumber, DESC1, DESC2, DESC3, DESC4, QOH2, PUT, SCOST, CAT, QPK, UNIT)
                VALUES (:skuNumber, :partNumber, :DESC1, :DESC2, :DESC3, :DESC4, :QOH2, :PUT, :SCOST, :CAT, :QPK, :UNIT)';
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':skuNumber', $skuNumber, PDO::PARAM_INT);
        $stmt->bindParam(':partNumber', $partNumber, PDO::PARAM_STR);
        $stmt->bindParam(':DESC1', $DESC1, PDO::PARAM_STR);
        $stmt->bindParam(':DESC2', $DESC2, PDO::PARAM_STR);
        $stmt->bindParam(':DESC3', $DESC3, PDO::PARAM_STR);
        $stmt->bindParam(':DESC4', $DESC4, PDO::PARAM_STR);
        $stmt->bindParam(':QOH2', $QOH2, PDO::PARAM_INT);
        $stmt->bindParam(':PUT', $PUT, PDO::PARAM_STR);
        $stmt->bindParam(':SCOST', $SCOST, PDO::PARAM_INT);
        $stmt->bindParam(':CAT', $CAT, PDO::PARAM_STR);
        $stmt->bindParam(':QPK', $QPK, PDO::PARAM_INT);
        $stmt->bindParam(':UNIT', $UNIT, PDO::PARAM_STR);
        $stmt->execute();
        $insertRow = $stmt->rowCount();
        $stmt->closeCursor();
    } catch (PDOException $ex) {
        return FALSE;
    }
    return $insertRow;
}
