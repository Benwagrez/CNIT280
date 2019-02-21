<?php
include "database.php";

$sql = "SELECT * FROM WAREHOUSEINVENTORY";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$Wtotalinvent = $stmt->rowcount();

$sql = "SELECT * FROM STOREINVENTORY";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$Stotalinvent = $stmt->rowcount();

$sql = "SELECT DISTINCT WarehouseID FROM WAREHOUSEINVENTORY";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$warehouseID = array();
array_push($warehouseID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));


// Store inventories

$sql = "SELECT DISTINCT StoreID FROM STOREINVENTORY";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$storeID = array();
array_push($storeID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));

for($i = 0; $i<count($warehouseID[0]); $i++){
    $sql = "SELECT * FROM warehouseinventory WHERE warehouseID=:WID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["WID" => $warehouseID[0][$i]]);
    $data = array();
    $data = $stmt->fetchAll();
    for($o = 0; $o<count($data); $o++){
        echo "out",$i,$o;
        //if(isset($_POST["warehouselim"][$i][$o])){
            echo 'trigger';
            echo 'stuff: ',$_POST["warehouselim"][$i][$o],' ',$_POST["warehouseID"][$i][$o],' ',$_POST["WproductID"][$i][$o], "   ";
            $sql = "UPDATE warehouseinventory SET Reorder_Limit=:RL WHERE ProductID=:pID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["RL" => $_POST["warehouselim"][$i][$o], "pID" => $_POST["WproductID"][$i][$o]]);
        //}
    }
}

for($i = 0; $i<count($storeID[0]); $i++){
    $sql = "SELECT * FROM storeinventory WHERE storeID=:STID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["STID" => $storeID[0][$i]]);
    $data = array();
    $data = $stmt->fetchAll();
    for($o = 0; $o<count($data); $o++){
        echo "in",$i,$o;
        //if(isset($_POST["storelim"][$i][$o])){
            echo 'trigger\n';
            echo 'stuff: ',$_POST["storelim"][$i][$o],' ',$_POST["storeID"][$i][$o],' ',$_POST["SproductID"][$i][$o]," ";
            $sql = "UPDATE storeinventory SET Reorder_Limit=:RL WHERE StoreID=:stID AND ProductID=:pID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["RL" => $_POST["storelim"][$i][$o],"stID" => $_POST["storeID"][$i][$o],"pID" => $_POST["SproductID"][$i][$o]]); 
        //}
    }
}

header("Location: manage.php");
?>