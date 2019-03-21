<?php
include "database.php";

// UPDATE ATTRIBUTES IN OPERATIONS FOR ORDER COMMITED
// THEN ADD TO CUSTOMER SHIPPING


$sql = "SELECT * FROM order1 WHERE orderdate>DATE_SUB(curdate(), INTERVAL 7 DAY) AND Com=false";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $order1ID = array();
    $order1ID = $stmt->fetchAll();

for($i = 0; $i<count($order1ID[0]); $i++){
    if (isset($_POST['order'][$i])) {
        $sql = "UPDATE order1 SET Com=true WHERE order1id=:ooID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["ooID" => $order1ID[0][$i]]);
    }
}


header("Location: sales.php");
?>