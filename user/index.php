<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(!isset($_SESSION['loggedIn'])){
    $_SESSION['loggedIn'] = false;
}
$message = null;
$users = null;
$userData = null;
require 'model.php';

if (isset($_POST['action'])) {
 $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
 $action = $_GET['action'];
}

if ($action == 'login'){
    
    $emailAddress = validateEmail($_POST['emailAddress']);
    $password = filterString($_POST['password']);
      /*/ Check the data
    if(empty($emailAddress) || empty($password)){
     $message = 'You must supply an email address and password.';
     $action = 'gotoLogin';
    }*/

    // Proceed with login attempt, if no errors
    // Get the data from the database based on the email address
    if(!isset($message)){
        $loginData = loginCustomer($emailAddress, $password);
        $hashedPassword = $loginData['password'];
        
        // Compare the passwords for a match
        $passwordMatch = comparePassword($password, $hashedPassword);
                
        // If there is a match, do the login
        if($passwordMatch){
         // Use the session for login data
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['firstName'] = $loginData['firstName'];
        $_SESSION['customerID'] = $loginData['userID'];
        
        
            if ($loginData['admin'] == 1){
                $_SESSION['admin'] = 1;
            }  else {
                $_SESSION['admin'] = 0;
            }
        
        
         // Indicate that the login was a success
        $message = $loginData['firstName'].', you have logged in.';
        $action = 'contentHome';
        } else {
        // There was not a match, tell the user
        $message = 'I\'m sorry, but you could not be logged in.';
        $action = 'gotoLogin';
        }
    }
    
}else if($action == 'register'){
    //Get data
    $firstName = filterString($_POST['firstName']);
    $lastName  = filterString($_POST['lastName']);
    $email     = filterString($_POST['email']);
    $password  = filterString($_POST['password']);
    /*
    //Validate Data (Missing data) FOR SAFARI!!!
    if(empty($firstname) || empty($lastname) || empty($email) || empty($password)){
        // message to tell the registrant something is wrong
        $message = 'All fields are required. Please enter missing values.';
        $action = 'gotoRegister';
    }
    */
    //Verify that email is not in database. If it is take user to login.
    $exsistingEmail = getEmail($email);
    if($exsistingEmail){
        $message = 'Your email address is already registered. Enter your password to login.';
        $action = 'gotoLogin';
    }
    
    //User registration verifies, register user
    if(!isset($message)){
        $password = hashPassword($password);
        $insertResult = addCustomer($firstName, $lastName, $email, $password);
        
        //If registered successfully take user to content
        if ($insertResult){
            $message = 'You succesfully registered. Welcome!';
            $action = 'contentHome';
        }else{
            $message = 'You were unable to register.';
            $action = 'gotoRegister';
        }   
    }
// Request for users list
}elseif($action == 'users'){
    // Request for the existing customers
    $users = getUsers();
    if(!$users){
        $message = 'Unable to access Data';
    }
}elseif(substr($action, 0, 12) == 'gotoEditUser'){
    $userID = substr($action,12);
    $userData = getUser($userID);
    $action = 'gotoEditUser';
    if(!isset($userData)){
        $message = 'Error in collecting data.';
    }
}elseif($action == 'updateUser'){

    // Process the update
    $firstName = filterString($_POST['firstName']);
    $lastName = filterString($_POST['lastName']);
    $email = filterString($_POST['email']);
    $password = filterString($_POST['password']);
    $userID = filterNumber($_POST['userID']);
    // validate the data
      if(empty($firstname) || empty($lastname) || empty($email)){
     // message to tell the registrant something is wrong
     //$message = 'Firstname, Lastname and Email fields are required. Please make sure that all fields have valid entries.';
     $action = 'gotoEditUser';
    }
    // No errors, process it
    // hash the new password, only if a new password has been submitted
    if($password == '**************'){
        $password = null;
    }
    if(!empty($password)){
     $password = hashPassword($password);
    }
    $updateResult = updateUser($userID, $firstName, $lastName, $email, $password);
    // Find out the result, notify client
    if ($updateResult && empty($message)) {
     $message = '<p class="notice">The update for ' . $firstName . ' was successful.</p>';
    } else {
     $message = '<p class="notice">Sorry, the update for ' . $firstName . ' failed.</p>';
    }
    $action = 'users';
    $users = getUsers();
}elseif($action == 'deleteUser'){
    // Process the delete
    $firstName = filterString($_POST['firstName']);
    $userID = filterNumber($_POST['userID']);
    // process it
    $deleteResult = deleteCustomer($userID);
    // Find out the result, notify client
    if ($deleteResult) {
     $message = '<p class="notice">The delete for ' . $firstName . ' was successful.</p>';
    } else {
     $message = '<p class="notice">Sorry, the delete for ' . $firstName . ' failed.</p>';
    }
    $customers = getUsers();
    $action = 'users';
}elseif($action == 'cancelUserUpdate'){
    $action = 'gotoEditUser';
}

include $_SERVER['DOCUMENT_ROOT'] . '/user/view.php';
