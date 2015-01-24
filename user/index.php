<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$message = null;
$users = null;
$userData = null;
$email = null;
$items = null;
$itemData = null;
$firstName = null;
$lastName = null;
$password = null;

$skuNumber = null;
$partNumber = null;
$DESC1 = null;
$DESC2 = null;
$DESC3 = null;
$DESC4 = null;
$QOH2 = null;
$PUT = null;
$SCOST = null;
$CAT = null;
$QPK = null;
$UNIT = null;




require 'model.php';

if (isset($_POST['action'])) {
 $action = $_POST['action'];
} elseif (isset($_GET['action'])) {
 $action = $_GET['action'];
}

if ($action == 'login'){
    $emailAddress = validateEmail($_POST['emailAddress']);
    $password = filterString($_POST['password']);
    
    // Check the data
    if(empty($emailAddress) || empty($password)){
     $message = 'You must supply an email address and password.';
     $action = 'gotoLogin';
    }

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
        $_SESSION['userID'] = $loginData['userID'];
        $_SESSION['EXPIRES'] = time() + 600;
        
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
    //Validate Data (Missing data) FOR SAFARI!!!
    if(empty($firstName) || empty($lastName) || empty($email) || empty($password)){
        // message to tell the registrant something is wrong
        $message = 'All fields are required. Please enter missing values.';
        $action = 'gotoRegister';
    }
    
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
            $message = 'You succesfully registered. Please Login!';
            $action = 'gotoLogin';
        }else{
            $message = 'You were unable to register.';
            $action = 'gotoRegister';
        }   
    }
}elseif($action == 'gotoRegister' || $action == 'gotoLogin'){
    // allow requests to fall through if they are for login or register
}elseif (!isset($_SESSION['EXPIRES']) || $_SESSION['EXPIRES'] < time()) {
    $action = 'gotoLogin';
    $message = 'Your session has timed out';
}elseif($_SESSION['loggedin'] != true){
    //will not allow people to continue if not logged in
    $action = 'gotoLogin';
}elseif($action == 'searchResults'){
    $searchTerm = filterString($_POST['search']);
    $items = itemSearch($searchTerm);
    if(!$items){
        $message = 'No search results found';
    }
}elseif($action == 'search'){
    $searchTerm = null;
    $items = itemSearch($searchTerm);
    if(!$items){
        $message = 'No search results found';
    }
    $action = 'searchResults';
}elseif(substr($action, 0, 8) == 'gotoItem'){
    $skuNumber = substr($action,8);
    $itemData = getItem($skuNumber);
    $_SESSION['itemData'] = $itemData;
    $action = 'gotoItem';
    if(!isset($itemData)){
        $message = 'Error in collecting data.';
    }
}elseif($action == 'logOut'){
    $_SESSION['loggedin'] = false;
    $_SESSION['firstName'] = null;
    $_SESSION['customerID'] = null;
    $_SESSION['admin'] = false;
    $action = 'gotoLogin';
}elseif($_SESSION['admin'] != true){
    //will not allow people to continue if not admin in
    $action = 'contentHome';
    $message = 'You do not have permission to access this page';
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
     $message = 'The update for ' . $firstName . ' was successful.';
    } else {
     $message = 'Sorry, the update for ' . $firstName . ' failed.';
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
     $message = 'The delete for ' . $firstName . ' was successful.';
    } else {
     $message = 'Sorry, the delete for ' . $firstName . ' failed.';
    }
    $customers = getUsers();
    $action = 'users';
}elseif($action == 'cancelUserUpdate'){
    $action = 'gotoEditUser';
}elseif($action == 'editItem'){
    $itemData = $_SESSION['itemData'];
    if(!isset($itemData)){
        $message = 'Error in collecting data.';
    }
}elseif($action == 'updateItem'){
    // Process the update
    $itemData = $_SESSION['itemData'];
    $skuNumber = $itemData['skuNumber'];
    $partNumber = $_POST['partNumber'];
    $DESC1 = $_POST['description1'];
    $DESC2 = $_POST['description2'];
    $DESC3 = $_POST['description3'];
    $DESC4 = $_POST['description4'];
    $QOH2 = $_POST['quantityOnHand'];
    $PUT = $_POST['pricingUnit'];
    $SCOST = $_POST['standardCost'];
    $CAT = $_POST['category'];
    $QPK = $_POST['quantityPicked'];
    $UNIT = $_POST['inventoryUnit'];
    echo $skuNumber;
    echo $partNumber;
    $updateItem = updateItem(
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
                            , $UNIT);
    // Find out the result, notify client
    if ($updateItem) {
     $message = 'The update was successful.';
    } else {
     $message = 'Sorry, the update failed.';
    }
    $itemData = getItem($skuNumber);
    $_SESSION['itemData'] = $itemData;
    $action = 'gotoItem';
    $users = getUsers();
}elseif($action == 'deleteItem'){
    // Process the delete
    $itemData = $_SESSION['itemData'];
    $skuNumber = $itemData['skuNumber'];
    // process it
    $deleteResult = deleteItem($skuNumber);
    // Find out the result, notify client
    $searchTerm = null;
    $items = itemSearch($searchTerm);
    $action = 'searchResults';
}elseif($action == 'cancelEdit'){
    $itemData = getItem($skuNumber);
    $_SESSION['itemData'] = $itemData;
    $action = 'gotoItem';
}elseif($action == 'addItemView'){
    if($_SESSION['admin'] != 1){
        $message == 'You do not have the proper permissions';
        $action == 'contentHome';
    }
}elseif($action == 'addItem'){
    $action = 'addItemView';
    //Get data
    $skuNumber = filterString($_POST['skuNumber']);
    $partNumber = filterString($_POST['partNumber']);
    $DESC1 = filterString($_POST['description1']);
    $DESC2 = filterString($_POST['description2']);
    $DESC3 = filterString($_POST['description3']);
    $DESC4 = filterString($_POST['description4']);
    $QOH2 = filterString($_POST['quantityOnHand']);
    $PUT = filterString($_POST['pricingUnit']);
    $SCOST = filterString($_POST['standardCost']);
    $CAT = filterString($_POST['category']);
    $QPK = filterString($_POST['quantityPicked']);
    $UNIT = filterString($_POST['inventoryUnit']);
    
//Validate Data (Missing data) FOR SAFARI!!!
    if(empty($skuNumber)){
        // message to tell the registrant something is wrong
        $message = 'SkuNumber is Required';
        $action = 'addItemView';
    }
    
    $itemData = getItem($skuNumber);
    
    if($itemData){
        $message = 'SkuNumber already exsits. You can edit this SKU.';
        $_SESSION['itemData'] = $itemData;
        $action = 'gotoItem';
    }
    
    if( !is_numeric($skuNumber) && !isset($skuNumber) ||
        !is_numeric($QOH2) && !isset($QOH2) ||
        !is_numeric($SCOST) && !isset($SCOST) ||
        !is_numeric($QPK) && !isset($QPK)){
        $message = 'skuNumber, Quantity Picked, Quantity on Hand, and Standard Cost must be a numeric';
    }
    
    //User registration verifies, register user
    if(!isset($message)){
        $addItem = addItem(
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
                            , $UNIT);
        
        //If registered successfully take user to content
        if ($addItem){
            $message = 'You succesfully added item!';
            $itemData = getItem($skuNumber);
            $_SESSION['itemData'] = $itemData;
            $action = 'gotoItem';
        }else{
            $message = 'You were unable to add item.';
            $action = 'addItemView';
        }   
    }
    
}
include $_SERVER['DOCUMENT_ROOT'] . '/user/view.php';
