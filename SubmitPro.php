<?php
    require_once('./dbconnector.php');

    if (isset($_POST['Submit'])) {

    $productID = $_GET['productID'];
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $image = $_POST['image'];
    $des = $_POST['des'];
    $cateID = $_POST['cateID'];
    $genderID = $_POST['genderID'];

    $sql = "UPDATE product SET productName = '".$productName."',image = 'image/".$image."', productPrice ='".$productPrice."',des = '".$des."',cateID = '".$cateID."',genderID = '".$genderID."' WHERE productID =  $productID";
    $cn = new DBConnector();
    $return = $cn->execStatement($sql);
    header('location:viewPro.php');   
    }
?>
