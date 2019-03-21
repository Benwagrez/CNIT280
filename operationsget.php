<?php
    include "database.php";

	// Pulling data from database

        // Warehouse inventories

        $sql = "SELECT * FROM order1 WHERE orderdate>DATE_SUB(curdate(), INTERVAL 7 DAY) AND Com=false";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $order1ID = array();
        $order1ID = $stmt->fetchAll();

        // Store inventories
        
        $sql = "SELECT * FROM CUSTOMER";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $CustID = array();
        array_push($CustID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));

	// Initializing data into HTML elements
        echo '<tr><td colspan=5>ORDERS</td></tr>
        <tr> <td> Order ID </td> <td> Customer Name </td> <td> Item ID </td> <td> Details </td><td>Commit</td></tr>';
        for($i = 0; $i<count($order1ID); $i++){
            $sql = "SELECT * FROM ITEMORDERED WHERE OrderID=:WID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["WID" => $order1ID[$i][0]]);
            $data = array();
            $data = $stmt->fetchAll();
            $sql = "SELECT * FROM CUSTOMER WHERE Customer_ID=:WID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["WID" => $order1ID[$i][1]]);
            $cusInfo = array();
            $cusInfo = $stmt->fetchAll();

            for($o = 0; $o<count($data); $o++){
                $sql = "SELECT * FROM ITEM WHERE ItemID=:WID";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["WID" => $data[$o][1]]);
                $ItemInfo = array();
                $ItemInfo = $stmt->fetchAll();

                if($o==0){
                    echo '<tr>';
                    echo '<td>', $data[$o][0], '</td>';
                    echo '<td>', $cusInfo[0][2],', ',$cusInfo[0][1], '</td>';
                    echo '<td>', $data[$o][1],'</td>';
                    echo '<td>$', $ItemInfo[0][3],'<br>',$ItemInfo[0][2],'</td>';
                    echo '<td> <input name = "order[',$i,']" type="submit" value="<>"> </td>';
                    echo '</tr>';
               }
               else{
                    echo '<tr>';
                    echo '<td>', $data[$o][0], '</td>';
                    echo '<td>', $cusInfo[0][2],', ',$cusInfo[0][1], '</td>';
                    echo '<td>', $data[$o][1],'</td>';
                    echo '<td>$', $ItemInfo[0][3],'<br>',$ItemInfo[0][2],'</td>';
                    echo '<td> </td>';
                    echo '</tr>';
               }
            }
        } 

        
?>