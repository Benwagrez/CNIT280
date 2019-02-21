<?php
    include "database.php";

	// Pulling data from database

        // Warehouse inventories

        $sql = "SELECT * FROM WAREHOUSEINVENTORY";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $warehouseInventCount = $stmt->rowCount();
        $warehouseID = array();
        array_push($warehouseID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));


        // Store inventories
        
        $sql = "SELECT * FROM STOREINVENTORY";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $storeInventCount = $stmt->rowCount();
        $storeID = array();
        array_push($storeID, $stmt->fetchAll(PDO::FETCH_COLUMN, 0));

	// Initializing data into HTML elements

        for($i = 0; $i<$warehouseInventCount; $i++){
            for($o = 0; $o<$warehouseID.size(); $o++){
                $sql = "SELECT * FROM events WHERE EventID=:eventID AND EndDate >= CURDATE() AND ReleaseDate <= CURDATE() ORDER BY StartDate";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(["eventID" => $eventIDs[0][$i]]);
                $data = array();
                $data = $stmt->fetchAll();
                if(count($data)>0){
                    echo '<tr>';
                    echo '<td>', $data[0][1], '</td>';
                    echo '<td>', $data[0][2], '</td>';
                    echo '</tr>';
                }
            }
        } 

        for($i = 0; $i<$storeInventCount; $i++){
            $sql = "SELECT * FROM events WHERE EventID=:eventID AND EndDate >= CURDATE() AND ReleaseDate <= CURDATE() ORDER BY StartDate";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["eventID" => $eventIDs[0][$i]]);
            $data = array();
            $data = $stmt->fetchAll();
            if(count($data)>0){
                echo '<tr>';
                echo '<td>', $data[0][1], '</td>';
                echo '<td>', $data[0][2], '</td>';
                echo '</tr>';
            }
        } 
?>