<?php
require_once 'header.php';
require_once 'restrictedsession.php';
//getting the data
$error = $msg = "";
if (isset($_POST['add'])) { //adding
    $iId = sanitizeString($_POST['iId']);
    $iName = sanitizeString($_POST['iName']);
    $iDescription = sanitizeString($_POST['iDescription']);
    $iPrice = sanitizeString($_POST['iPrice']);
    $iStatus = sanitizeString($_POST['iStatus']);
    $iSize = sanitizeString($_POST['iSize']);    
    $sImage = "";
    $extension = "";
    //Process the uploaded image
    if (isset($_FILES['iImage']) && $_FILES['iImage']['size'] != 0) {
        $temp_name = $_FILES['iImage']['tmp_name'];
        $name = $_FILES['iImage']['name'];
        $parts = explode(".", $name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $iImage = "$iId.$extension";
        $destination = "./images/item/$iImage";
        //Move the file from temp loc => to our image folder
        move_uploaded_file($temp_name, $destination);
    }
    $catalogueId = sanitizeString($_POST['catalogueId']);
    //TODO: Do the PHP validation here to protect your server
    //Add the student
    $query = "INSERT INTO Item values ('$iId','$iName','$iDescription','$iPrice','$iStatus','$iSize','$iImage','$catalogueId')";
    $result = queryMySql($query);
    if (!$result) {
        $error = $error . "<br>Can't add Item, please try again";
    } else {
        $msg = "Added $iName successfully!";
    }
}
?>
<br><br>
<form action="additem.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <div class="error"><?php echo $error; ?></div>
        <div class="msg"><?php echo $msg; ?></div>
        <legend>Add Item</legend>
        
        ID: <br>
        <input type="number" name="iId" maxlength="15" placeholder="(number)"
               required /><br>
        Name: <br>
        <input type="text" name="iName" maxlength="100" required/><br>
        Desciption:<br>
        <textarea maxlength="200" name="iDescription"></textarea><br>
        Price:<br>
        <input type="number" name="iPrice" maxlength="20"/><br>
        Status:<br><select name="iStatus">
            <option value="Out of orders">Out of orders</option>
            <option value="Available">Available</option>
        </select>
        <br>
        Size:<br>
        <input type="text" name="iSize" maxlength="15"/><br>     
        Image:<br>
        <input type="file" name="iImage"/><br>
        Catalogue:<br>
        <select name="catalogueId">
            <?php
            $query = "SELECT cId, cName FROM catalogue";
            $batches = queryMysql($query);
            while ($batch = mysqli_fetch_array($batches)) {
                $cId = $batch[0];
                $cName = $batch[1];
                echo "<option value='$cId'>$cName</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Add" name="add"/>
    </fieldset>
</form>
</body>
</html>

