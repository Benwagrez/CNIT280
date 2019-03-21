<?php
include "database.php";

// UPDATE ATTRIBUTES IN OPERATIONS FOR ORDER COMMITED
// THEN ADD TO CUSTOMER SHIPPING

$sql = "SELECT * FROM CUSTOMER";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$CustID = array();
array_push($CustID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));

for($i = 0; $i<count($CustID[0]); $i++){
    if (isset($_POST['order'][$i])) {
        $sql = "UPDATE OPERATIONS SET Com=true WHERE Customer_ID=:STID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["STID" => $CustID[0][$i],"NN" => $_POST["client"][$i]]);
    }
}

header("Location: sales.php");
?>