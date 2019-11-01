<!DOCTYPE html>
<html>
    <head>
        <title>Basketball Sneakers Shop</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style1.css">
        <meta charset="UTF-8">

    </head>
    <body>
        <div class="container">
                <img id="logo" src="images/logo.png"/>
                <div class="nav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#adidas">Adidas</a></li>
                        <li><a href="#nike">Nike</a></li>
                        <li style="float: right"><a href="index2.php">Login</a></li>
                    </ul>
                </div>
            <div class="main">
                <div class="hot">
                    <div class="image">
                        <img src="images/main.jpeg">
                    </div>
                    <div class="detail">
                        <div class="title">
                            Basketball Sneakers Shop
                        </div>
                    </div>
                </div>
                <div class="seperator">
                </div>
                <div class="item"></div>
            </div>
        </div>
<?php
                require_once './functions.php';
                //load items
                $query = "SELECT iId, iName, iDescription, iPrice, iStatus, iSize, iImage FROM Item ";
                $result = queryMysql($query);
                $error = $msg = "";
                if (!$result){
                    $error = "Couldn't load data, please try again.";
                }
                //load catalogue
                $query1 = "SELECT cId, cName, cDescription from Catalogue";
                $result1 = queryMysql($query1);
                $error1 = $msg1 = "";
                if (!$result1){
                    $error1 = "Couldn't load data, please try again.";
                }
?>
    <div class="list w3-row">
                    <div class="" id="adidas"><h2>Adidas</h2>    
<?php
     require_once './functions.php';
     $query = "SELECT iId, iName, iDescription, iPrice, iStatus, iSize, iImage,cName FROM Item,Catalogue WHERE Item.catalogueId=Catalogue.cId AND cName LIKE '%Adidas%' ORDER BY cName";
     $result = queryMysql($query);
     $error = $msg = "";
     if (!$result){
      $error = "Couldn't load data, please try again.";
     }
     while ($row = mysqli_fetch_array($result)) {
        $iId = $row[0];
        $iName = $row[1];
        $iDescription = $row[2];
        $iPrice = $row[3];
        $iStatus = $row[4];
        $iSize = $row[5];
        $iImage = $row[6];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-white w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/item/". $iImage . "' width='200px' heigth='200px'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-black w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-red w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/item/". $iImage . "' width='50%''>
          </div>
          <div class='w3-half w3-left'>
              <h3>Price: $iPrice$</h3>
              <p>$iDescription</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
      </div>
    </div>";                                                                                       
    }
?>
                    </div>
    </div>
        
    <div class="list w3-row">
                    <div class="" id="nike"><h2>Nike</h2> 
        <?php
     require_once './functions.php';
     $query = "SELECT iId, iName, iDescription, iPrice, iStatus, iSize, iImage,cName FROM Item,Catalogue WHERE Item.catalogueId=Catalogue.cId AND cName LIKE '%Nike%' ORDER BY cName";
     $result = queryMysql($query);
     $error = $msg = "";
     if (!$result){
      $error = "Couldn't load data, please try again.";
     }
     while ($row = mysqli_fetch_array($result)) {
        $iId = $row[0];
        $iName = $row[1];
        $iDescription = $row[2];
        $iPrice = $row[3];
        $iStatus = $row[4];
        $iSize = $row[5];
        $iImage = $row[6];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-white w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/item/". $iImage . "' width='200px' heigth='200px'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-orange w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-red w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/item/". $iImage . "' width='60%''>
          </div>
          <div class='w3-half w3-left'>
              <h3>Price: $iPrice$</h3>
              <p>Description: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
      </div>
    </div>";                                                                                       
    }
?>
                    </div>
    </div>

        <div class="footer">
            
        </div>

    </body>
</html>