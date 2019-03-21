<?php
    include "database.php";

	// Pulling data from database



        // Returns List

        $sql = "SELECT * FROM RETURNS";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $ReturnIDs = array();
        $ReturnIDs = $stmt->fetchAll();

	// Initializing data into HTML elements
        echo '<tr><td colspan=4>RETURNS</td></tr>
        <tr> <td> Customer ID </td> <td> Order ID </td> <td> Product ID </td></tr>';
        for($i = 0; $i<count($ReturnIDs); $i++){
            $sql = "SELECT * FROM RETURNS WHERE CustomerID=:WID, ProductID=:PID, OrderID=:OOID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["WID" => $ReturnIDs[$i][0], "PID" => $ReturnIDs[$i][1], "OOID" => $ReturnIDs[$i][2]]);  //Queries each row

            /*
            $data = array();
            $data = $stmt->fetchAll();
            $sql = "SELECT * FROM RETURNS WHERE Customer_ID=:WID, ProductID=:PID, OrderID=:OOID"; //added PID and OOID
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["WID" => $ReturnIDs[$i][0], "PID" => $ReturnIDs[$i][1], "OOID" => $ReturnIDs[$i][2]]);  //Added PID and OOID.  Changed
                                                                                                                    //$ReturnIDs[$i][0] TO $ReturnIDs[$i][1] and incremented
            $cusInfo = array();
            $cusInfo = $stmt->fetchAll();

            for($o = 0; $o<count($data); $o++){
                $sql = "SELECT * FROM RETURNS WHERE CustomerID=:WID";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["WID" => $data[$o][1]]);
                $ItemInfo = array();
                $ItemInfo = $stmt->fetchAll();
            */
                if(count($ReturnIDs)>0){
                    echo '<tr>';
                    echo '<td>', $ReturnIDs[$i][0], '</td>';
                    echo '<td>', $ReturnIDs[$i][1], '</td>';
                    echo '<td>', $ReturnIDs[$i][2], '</td>';
                    //echo '<td>', $ItemInfo[0][4],'   $', $ItemInfo[0][3],'<br>',$ItemInfo[0][2],'</td>';
                    echo '</tr>';

                }
            }
        //}
        /*
        echo '<tr><td colspan="4">=========================SUPPLIERS/CLIENTS============================';
        echo '</td></tr><tr> <td> Name </td> <td> Address </td> <td> Email and Phone </td> <td>Notes</td></tr>';
        for($i = 0; $i<count($ReturnIDs[0]); $i++){
            $sql = "SELECT * FROM CUSTOMER WHERE Customer_ID=:STID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["STID" => $ReturnIDs[0][$i]]);
            $data = array();
            $data = $stmt->fetchAll();

            echo '<tr>';
            echo '<td>', $data[0][2],', ',$data[0][1], '</td>';
            echo '<td>', $data[0][3],', ',$data[0][4],', ', $data[0][6],' ', $data[0][5], '</td>';
            echo '<td>', $data[0][9],'<br>',$data[0][10],'</td>';
            echo '<td> <input name = "client[',$i,']" value="', $data[0][11],'"></td>';
            echo '</tr>';

        }
        */
?>
