<?php

/* 
 * My PHP functions library
 */
//Connect to Guitar1 Database using the user proxy
function connFulfillmentUser(){
    $server = 'localhost';
    $username = 'ammondbs_prxUser';
    $password = '982601Nw';
    $database = 'ammondbs_fulfillment';
    $dsn = "mysql:host=$server; dbname=$database";
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $congtr1 = new PDO($dsn, $username, $password);
        //echo 'It worked';
        }catch (PDOException $exc){
            //echo $exc->getTraceAsString();
            $message = '<p>Sorry bad things happened</p>';
            $_SESSION['message'] = $message;
            header('location: /errorDocs/500.php');
    }
    
    if(is_object($congtr1)){
        return $congtr1;
    }
    return false;
}

//Connect to Guitar1 Database using the admin proxy
function connFulfillmentAdmin(){
    $server = 'localhost';
    $username = 'ammondbs_prxAdmn';
    $password = '982601Nw';
    $database = 'ammondbs_fulfillment';
    $dsn = "mysql:host=$server; dbname=$database";
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $congtr1 = new PDO($dsn, $username, $password);
        //echo 'It worked';
        }catch (PDOException $exc){
            //echo $exc->getTraceAsString();
            $message = '<p>Sorry bad things happened</p>';
            $_SESSION['message'] = $message;
            header('location: /errorDocs/500.php');
    }
    
    if(is_object($congtr1)){
        return $congtr1;
    }
    return false;
    
    
}

function connGuitar2User(){
    $server = 'localhost';
    $username = 'ammondbs_prxUser';
    $password = '982601Nw';
    $database = 'ammondbs_guitar2';
    $dsn = "mysql:host=$server; dbname=$database";
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $congtr1 = new PDO($dsn, $username, $password);
        //echo 'It worked';
        }catch (PDOException $exc){
            //echo $exc->getTraceAsString();
            $message = '<p>Sorry bad things happened</p>';
            $_SESSION['message'] = $message;
            header('location: /errorDocs/500.php');
    }
    
    if(is_object($congtr1)){
        return $congtr1;
    }
    return false;
}

//Connect to Guitar1 Database using the admin proxy
function connGuitar2Admin(){
    $server = 'localhost';
    $username = 'ammondbs_prxAdmn';
    $password = '982601Nw';
    $database = 'ammondbs_guitar2';
    $dsn = "mysql:host=$server; dbname=$database";
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $congtr1 = new PDO($dsn, $username, $password);
        //echo 'It worked';
        }catch (PDOException $exc){
            //echo $exc->getTraceAsString();
            $message = '<p>Sorry bad things happened</p>';
            $_SESSION['message'] = $message;
            header('location: /errorDocs/500.php');
    }
    
    if(is_object($congtr1)){
        return $congtr1;
    }
    return false;
}

/* ------------ Password Functions --------------- */
// Consult php.net for operations of any PHP function you don't understand
// Use with registration and update (if password is being updated)
function hashPassword($password) {
    $salt = '$6$rounds=9000$' . substr(md5(uniqid(rand(), true)), 0, 16); // SHA-512   
    return crypt($password, $salt); // Result is ~120 character password including salt
}

// Use with login, remember that the password must be queried out of the database first
function comparePassword($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

/* ------------ Data Input Cleanup Functions --------------- */
// Three versions, use the one appropriate for what you want to do
function filterString($string){
    $string = filter_var(trim($string), FILTER_SANITIZE_STRING); // Encodes special chars
    return $string;
}

// Always sanitize first (remove potentially bad things), then validate remains for acceptability
function filterNumber($number){
 $number = filter_var(trim($number), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 $number = filter_var($number, FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_THOUSAND);
 return $number;
}

function validateEmail($email){
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $email = filter_var(trim($email), FILTER_VALIDATE_EMAIL);
    return $email;
}