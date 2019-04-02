<?php
    session_start();
    session_destroy();
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    include "database.php";


    // Checking previous input fields and assigning to variables

        if(isset($_POST["email"])) {
            $useremail = $_POST["email"];
        } 
        if(isset($_POST['password'])) {

            $userpassword = $_POST['password'];
        }
   
    // Pulling data from "employee" and "customer" where "Email" is the user inputed email

        $sql = "SELECT * FROM employee WHERE Employee_EmailAddress=:myEmail";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["myEmail" => $useremail]); 
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $rowCount = $stmt->rowCount();

        $sql = "SELECT * FROM customer WHERE Customer_Email=:myEmail";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["myEmail" => $useremail]); 
        $userC = $stmt->fetch(PDO::FETCH_OBJ);
        $rowCountC = $stmt->rowCount();

    // Checking if there is a user with same email, if not, invalid

        if ($rowCount != 1 && $rowCountC!=1) { 

            header("location: login.php?login=invalid");

        } else if($rowCount == 1){
            // If the user asswordHash;
            $EmployeeID = $user->EmployeeID;        

            $dbEmail = $user->Employee_EmailAddress;
            $dbpassHash =$user->Employee_Password;

            // Check if the password matches, if not, invalid

                if($useremail === $dbEmail && $userpassword === $dbpassHash) { 

                    // If successfull, start SESSION with "StudentID"

                        $_SESSION["EmployeeID"] = $EmployeeID;
                        header('Location: index.php'); 
                } else{
                    header("location: login.php?login=invalid");
                }
        } else{
            // If the user asswordHash;
            $CustomerID = $userC->CustomerID;        

            $dbEmail = $userC->Customer_Email;
            $dbpassHash =$userC->Password;

            // Check if the password matches, if not, invalid

                if($useremail === $dbEmail && $userpassword === $dbpassHash) { 

                    // If successfull, start SESSION with "StudentID"

                        $_SESSION["customerID"] = $CustomerID;
                        header('Location: index.php'); 
                } else{
                    header("location: login.php?login=invalid");
                }
        }
?>