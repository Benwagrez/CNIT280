<?php
    //include "database.php";

    $barcode1 = "00001";
    $barcode2 = "52003";
    $barcode3 = "89622";
    $barcode4 = "05227";
    $barcode5 = "99999";

    if($_POST["barcodeInput"] == $barcode1)
    {
        echo '<script type="text/javascript">',
        'alert("Item successfully returned!");',
        '</script>';
        echo "<script>window.location = 'http://localhost/CNIT280/customerreturnbarcode.php'</script>";  //Will need to be changed for online implementation
    }

    else if($_POST["barcodeInput"] == $barcode2)
    {
        echo '<script type="text/javascript">',
        'alert("Item successfully returned!");',
        '</script>';
        echo "<script>window.location = 'http://localhost/CNIT280/customerreturnbarcode.php'</script>";  //Will need to be changed for online implementation
    }

    else if($_POST["barcodeInput"] == $barcode3)
    {
        echo '<script type="text/javascript">',
        'alert("Item successfully returned!");',
        '</script>';
        echo "<script>window.location = 'http://localhost/CNIT280/customerreturnbarcode.php'</script>";  //Will need to be changed for online implementation
    }

    else if($_POST["barcodeInput"] == $barcode4)
    {
        echo '<script type="text/javascript">',
        'alert("Item successfully returned!");',
        '</script>';
        echo "<script>window.location = 'http://localhost/CNIT280/customerreturnbarcode.php'</script>";  //Will need to be changed for online implementation
    }

    else if($_POST["barcodeInput"] == $barcode5)
    {
        echo '<script type="text/javascript">',
        'alert("Item successfully returned!");',
        '</script>';
        echo "<script>window.location = 'http://localhost/CNIT280/customerreturnbarcode.php'</script>";  //Will need to be changed for online implementation
    }

    else
    {
        echo '<script type="text/javascript">',
        'alert("Barcode not recgonized, please try again.");',
        '</script>';
        echo "<script>window.location = 'http://localhost/CNIT280/customerreturnbarcode.php'</script>";  //Will need to be changed for online implementation
    }

?>