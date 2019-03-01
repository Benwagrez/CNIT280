<?php
    include "database.php";

	// Pulling data from database

        // Warehouse inventories

        $sql = "SELECT * FROM order1";
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
        echo '<tr><td colspan=4>ORDERS</td></tr>
        <tr> <td> Order ID </td> <td> Customer Name </td> <td> Item ID </td> <td> Details </td></tr>';
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

                if(count($data)>0){
                    echo '<tr>';
                    echo '<td>', $data[$o][0], '</td>';
                    echo '<td>', $cusInfo[0][2],', ',$cusInfo[0][3], '</td>';
                    echo '<td>', $data[$o][1],'</td>';
                    echo '<td>', $ItemInfo[0][4],'   $', $ItemInfo[0][3],'<br>',$ItemInfo[0][2],'</td>';
                    echo '<td> <input type="hidden" name = "WproductID[',$i,'][', $o,']" value="', $data[$o][1],'">';
                    echo '<td> <input type="hidden" name = "order1ID[',$i,'][', $o,']" value="', $data[$o][0],'">';
                    echo '</tr>';
                    
                }
            }
        } 

        echo '<tr><td colspan="4">=========================SUPPLIERS/CLIENTS============================';
        echo '</td></tr><tr> <td> Name </td> <td> Address </td> <td> Email and Phone </td> <td>Notes</td></tr>';
        for($i = 0; $i<count($CustID[0]); $i++){
            $sql = "SELECT * FROM CUSTOMER WHERE Customer_ID=:STID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["STID" => $CustID[0][$i]]);
            $data = array();
            $data = $stmt->fetchAll();

            for($o = 0; $o<count($data); $o++){
                if(count($data)>0){
                    echo '<tr>';
                    echo '<td>', $data[$o][2],', ',$data[$o][1], '</td>';
                    echo '<td>', $data[$o][3],', ',$data[$o][4],', ', $data[$o][6],' ', $data[$o][5], '</td>';
                    echo '<td>', $data[$o][8],'<br>',$data[$o][9],'">';
                    echo '<td>',$data[$o][10],'</td>';
                    echo '<td> <input type="hidden" name = "SproductID[',$i,'][', $o,']" value="', $data[$o][1],'">';
                    echo '<td> <input type="hidden" name = "CustID[',$i,'][', $o,']" value="', $data[$o][0],'">';
                    echo '</tr>';

                }
            }
        } 
?>