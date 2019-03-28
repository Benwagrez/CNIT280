<?php
    include "database.php";

	// Pulling data from database

        // Warehouse inventories

        $sql = "SELECT DISTINCT POSID FROM POS";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $POSID = array();
        array_push($POSID, $stmt->fetchAll());


	// Initializing data into HTML elements
        echo '<tr> <td> POS ID </td> <td> Store Address </td> <td> Sales </td></tr>';
        for($i = 0; $i<count($POSID[0][0])/2; $i++){
            $sql = "SELECT * FROM order1 WHERE orderid IN (SELECT orderid FROM POS WHERE POSID=:POSID)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['POSID' => $POSID[0][0][$i]]);
            $order1ID = array();
            $order1ID = $stmt->fetchAll();

            $sql = "SELECT * FROM store WHERE storeid IN (SELECT storeid FROM POS WHERE POSID=:POSID)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['POSID' => $POSID[0][0][$i]]);
            $storeID = array();
            $storeID = $stmt->fetchAll();

            $tS = 0;

            for($o = 0; $o<count($order1ID); $o++){
                $sql = "SELECT * FROM ITEMORDERED WHERE OrderID=:WID";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["WID" => $order1ID[$o][0]]);
                $data = array();
                $data = $stmt->fetchAll();

                $sql = "SELECT * FROM ITEM WHERE ItemID=:IID";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["IID" => $data[0][1]]);
                $data2 = array();
                $data2 = $stmt->fetchAll();

                $tS+=($data2[0][3] * $data[0][2]);                
            }
            echo '<tr>';
            echo '<td>', $POSID[0][0][$i], '</td>';
            echo '<td>', $storeID[0][1],', ',$storeID[0][2],' ',$storeID[0][3], ' ',$storeID[0][4],'</td>';
            echo '<td>$', $tS, '</td>';
            echo '</tr>';
        } 

?>