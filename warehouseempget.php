<?php
    include "database.php";

	// Pulling data from database

        // Warehouse inventories

        $sql = "SELECT * FROM RETURNS";
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
        <tr> <td> Order ID </td> <td> Customer ID </td> <td> Item ID </td> <td> Details </td> <td> Return Status </td></tr>';
        for($i = 0; $i<count($order1ID); $i++){
            $sql = "SELECT * FROM ITEMORDERED WHERE OrderID=:WID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["WID" => $order1ID[$i][0]]);
            $data = array();
            $data = $stmt->fetchAll();
            //$sql = "SELECT * FROM CUSTOMER WHERE Customer_ID=:WID";
            //$stmt = $pdo->prepare($sql);
            //$stmt->execute(["WID" => $order1ID[$i][1]]);
            //$cusInfo = array();
            //$cusInfo = $stmt->fetchAll();

            for($o = 0; $o<count($data); $o++){
                $sql = "SELECT * FROM ITEM WHERE ItemID=:WID";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["WID" => $data[$o][1]]);
                $ItemInfo = array();
                $ItemInfo = $stmt->fetchAll();

                if(count($data)>0){
                    echo '<tr>';
                    echo '<td>', $data[$o][0], '</td>';
                    echo '<td>', $order1ID[$i][1], '</td>';
                    echo '<td>', $data[$o][1],'</td>';
                    echo '<td>$', $ItemInfo[0][3],'<br>',$ItemInfo[0][2],'</td>';
                    echo '<td>', $order1ID[$i][3],'</td>';
                    echo '</tr>';

                }
            }
        }
/*
        echo '<tr><td colspan="4">=========================SUPPLIERS/CLIENTS============================';
        echo '</td></tr><tr> <td> Name </td> <td> Address </td> <td> Email and Phone </td> <td>Notes</td></tr>';
        for($i = 0; $i<count($CustID[0]); $i++){
            $sql = "SELECT * FROM CUSTOMER WHERE Customer_ID=:STID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["STID" => $CustID[0][$i]]);
            $data = array();
            $data = $stmt->fetchAll();

            echo '<tr>';
            echo '<td>', $data[0][2],', ',$data[0][1], '</td>';
            echo '<td>', $data[0][3],', ',$data[0][4],', ', $data[0][6],' ', $data[0][5], '</td>';
            echo '<td>', $data[0][9],'<br>',$data[0][10],'</td>';
            echo '<td> <input name = "client[',$i,']" value="', $data[0][11],'"></td>';
            echo '</tr>';
*/
      //  }
?>
