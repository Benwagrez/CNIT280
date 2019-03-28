<?php
    include "database.php";

	// Pulling data from database

        // Warehouse inventories

        $sql = "SELECT * FROM WAREHOUSEINVENTORY";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $warehouseID = array();
        array_push($warehouseID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));


        // Store inventories
        
        $sql = "SELECT * FROM STOREINVENTORY";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $storeID = array();
        array_push($storeID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));

	// Initializing data into HTML elements
        echo '<tr> <td> Warehouse ID </td> <td> Product ID </td> <td> QUANTITY </td> <td> Reorder limit </td></tr>';
        for($i = 0; $i<count($warehouseID[0]); $i++){
            $sql = "SELECT * FROM warehouseinventory WHERE warehouseID=:WID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["WID" => $warehouseID[0][$i]]);
            $data = array();
            $data = $stmt->fetchAll();
            for($o = 0; $o<count($data); $o++){
                if(count($data)>0){
                    if($data[$o][2]<$data[$o][3]){
                        echo '<tr>';
                        echo '<td>', $data[$o][0], '</td>';
                        echo '<td>', $data[$o][1], '</td>';
                        echo '<td  style="color: red;">', $data[$o][2], '</td>';
                        echo '<td> <input name = "warehouselim[',$i,'][', $o,']" value="', $data[$o][3],'">';
                        echo '<td> <input type="hidden" name = "WproductID[',$i,'][', $o,']" value="', $data[$o][1],'">';
                        echo '<td> <input type="hidden" name = "warehouseID[',$i,'][', $o,']" value="', $data[$o][0],'">';
                        echo '</tr>';
                    }
                    else{
                        echo '<tr>';
                        echo '<td>', $data[$o][0], '</td>';
                        echo '<td>', $data[$o][1], '</td>';
                        echo '<td>', $data[$o][2], '</td>';
                        echo '<td> <input name = "warehouselim[',$i,'][', $o,']" value="', $data[$o][3],'">';
                        echo '<td> <input type="hidden" name = "WproductID[',$i,'][', $o,']" value="', $data[$o][1],'">';
                        echo '<td> <input type="hidden" name = "warehouseID[',$i,'][', $o,']" value="', $data[$o][0],'">';
                        echo '</tr>';
                    }
                }
            }
        } 

        echo '<tr><td colspan="3">==================================================================';
        echo '</td></tr><tr> <td> Store ID </td> <td> Product ID </td> <td> Reorder limit </td></tr>';
        for($i = 0; $i<count($storeID[0]); $i++){
            $sql = "SELECT * FROM storeinventory WHERE storeID=:STID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["STID" => $storeID[0][$i]]);
            $data = array();
            $data = $stmt->fetchAll();
            for($o = 0; $o<count($data); $o++){
                if(count($data)>0){
                    if($data[$o][2]<$data[$o][3]){
                        echo '<tr>';
                        echo '<td>', $data[$o][0], '</td>';
                        echo '<td>', $data[$o][1], '</td>';
                        echo '<td  style="color: red;">', $data[$o][2], '</td>';
                        echo '<td> <input name = "storelim[',$i,'][', $o,']" value="', $data[$o][3],'">';
                        echo '<td> <input type="hidden" name = "SproductID[',$i,'][', $o,']" value="', $data[$o][1],'">';
                        echo '<td> <input type="hidden" name = "storeID[',$i,'][', $o,']" value="', $data[$o][0],'">';
                        echo '</tr>';
                    }
                    else{
                        echo '<tr>';
                        echo '<td>', $data[$o][0], '</td>';
                        echo '<td>', $data[$o][1], '</td>';
                        echo '<td>', $data[$o][2], '</td>';
                        echo '<td> <input name = "storelim[',$i,'][', $o,']" value="', $data[$o][3],'">';
                        echo '<td> <input type="hidden" name = "SproductID[',$i,'][', $o,']" value="', $data[$o][1],'">';
                        echo '<td> <input type="hidden" name = "storeID[',$i,'][', $o,']" value="', $data[$o][0],'">';
                        echo '</tr>';
                    }
                }
            }
        } 
?>