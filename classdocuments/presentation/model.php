<?php
require $_SERVER['DOCUMENT_ROOT'] . '/library/library.php';

function example($action){
    $conn = connGuitar2User();
    
    if($action === 'example1'){
        
        $sql = "SELECT productName
                     , productCode
                     , listPrice
                FROM products";
    } elseif ($action === 'example2') {
        
        $sql = "SELECT productName
                     , productCode
                     , listPrice
                FROM products
                LIMIT 2, 3";
    } elseif ($action === 'example3') {
        $sql = "SELECT productName
                     , productCode
                     , listPrice
                FROM products
                WHERE productCode = 'hofner'";
    } elseif ($action === 'example4') {
        $sql = "SELECT productName
                     , productCode
                     , listPrice
                FROM products
                WHERE listPrice > 500";
    }elseif ($action === 'example5' || $action === 'example6') {
        $sql = "SELECT firstName
                     , lastName
                     , emailAddress
                FROM administrators";
    }
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $customers = $stmt->fetchAll();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }
    return $customers;
}

function insertAdmin(){
    $conn = connGuitar2User();
    
     try {
         $sql = "INSERT INTO administrators
                ( firstName
                , lastName
                , emailAddress)
                SELECT firstName
                     , lastName
                     , emailAddress
                FROM customers
                WHERE firstName = 'Barry'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }
    return TRUE;
}

function deleteAdmin(){
    $conn = connGuitar2Admin();
    
     try {
         $sql = "DELETE FROM administrators
                 WHERE firstName = 'Barry'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->closeCursor();
    } catch (PDOException $exc) {
        return FALSE;
    }
    return TRUE;
}