<?php
require 'model.php';
$action = null;
$example = null;


if(isset($_POST['action'])){
    $action = $_POST['action'];
}else if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if ($action === 'example5'){
    $example = insertAdmin();   
}else if($action === 'example6'){
    $example = deleteAdmin();
}

if (isset($action)){
    $example = example($action);
}


include 'view.php';
