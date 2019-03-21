<?php

    // Code to be implemented into pages that require a login

        if(!(isset($_SESSION["EmployeeID"]))){
            header("Location: index.php");
        }

?>