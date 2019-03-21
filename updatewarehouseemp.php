<?php
include "database.php";

// UPDATE ATTRIBUTES IN OPERATIONS FOR ORDER COMMITED
// THEN ADD TO CUSTOMER SHIPPING


$sql = "SELECT * FROM RETURNS WHERE ReturnStatus='0'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $order1ID = array();
    $order1ID = $stmt->fetchAll();


for($i = 0; $i<count($order1ID); $i++){
    if (isset($_POST['order'][$i])) {
        $sql = "UPDATE RETURNS SET ReturnStatus='1' WHERE OrderID=:ooID AND CustomerID=:cID AND ProductID=:pID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["ooID" => $order1ID[$i][2],"cID" => $order1ID[$i][0],"pID" => $order1ID[$i][1]]);
        //$ord = $order1ID[0][$i];
        //$sql = "INSERT INTO customershipping (`WarehouseID`, `OrderID`, `Shipper_ID`) VALUES (1,$ord,1)";
            //$stmt = $pdo->prepare($sql);
          //  $stmt->execute();
    }
}


header("Location: warehouseEmp.php");
?>
