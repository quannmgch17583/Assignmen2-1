<!DOCTYPE html>
<html>
    <head>
        <title>ATN Store</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
            .container{
                width: 80%;
                margin: 0 auto;
            }
            .container img{
                width: 100%;

            }
            .footer{
                width: 100%;
                height: 100px;
                background-color: white;
            }
            .main{
                width: 100%;
                overflow: hidden;
                background-color: white;
            }

            .image img{
                width: 100%;
            }
            .detail{
                width: 100%;
                float: right;
                text-align: center;
            }
            .title{
                background-color: white;
                font-size: 25px;
                line-height: 30px;
                padding-left: 5px;
                font-weight: bold;
                color: purple;
            }
            .detail{
                padding-left: 15px;
                box-sizing: border-box;
            }
            .des{
                color: red;
                font-size: 18px;
                padding-left: 10px;
                padding-top: 10px;
                font-weight: normal;
            }

            .list{
                width: 100%;
                padding-top: 10px;
            }
            .item{
                width: 25%;
                float: left;
                padding: 5px;
                box-sizing: border-box;
            }
            .iimage img{
                width: 100%;
                height : 50%;
            }
           

            .nav{
                width: 100%;
                height: 50px;
                background-color: black;
            }
            .nav ul{
                margin: 0;
                padding: 0;
                list-style: none;
            }
            .nav a{
                color:whitesmoke;
                font-size: 30px;
                text-decoration: none;
                line-height: 50px;
                padding: 0 15px;
                display: block;
            }
            .nav li{
                float: left;
            }
            .nav a:hover{
                color: #792323;
            }
            .nav li:hover{
                background-color:#DCF4F6;
            }
        </style>
    </head>
    <body>
        <?php
require_once './functions.php';
//load items
$query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage FROM Item ";
$result = queryMysql($query);

?>

            <div class="container">
            <center><img src="toy.png"></center>
            <div class="header">
                
                <div class="nav">
                    <ul>
                        <center><li><a href="./index.php">Home</a></li></center>
                        <center><li><a href="./header.php">Admin</a></li></center>
                        <li><a href="#Lego">Lego</a></li>
                        <li><a href="#Doll">Doll</a></li>
                        

                    </ul>


                
                </div>
            </div>
            <div class="main">
                <div class="hot">

                    <div class="detail">
                        <div class="title">
                            <i>Welcome to ATN Store</i>
                        </div>
                        <div class="des">
                             Baby's paradise!!!
                        </div>
                    </div>
                </div>
                <div class="seperator">

                </div>
                <div class="list w3-row">
                    <div class="" id="Lego"><h2>Lego</h2>
             <?php
     require_once './functions.php';
     $query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage,cname FROM Item,Catalogue WHERE Item.cid=Catalogue.cid AND cName LIKE '%Lego%'  ORDER BY cname";
     $result = queryMysql($query);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $resultSet = $result->fetchAll();
     
     foreach ($resultSet as $row) {
        $iId = $row['iid'];
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
        $iImage = $row['iimage'];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-orange w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/". $iImage . "'  width: '500px', height: '500px'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-orange w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-oranges w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <h3>Price: $iPrice$</h3>
              <p>Description: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-orange w3-section' onclick=\"document.getElementById('$iName').style.display='none';\">Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>
     
                </div>        
                    <div class="list w3-row">
                    <div class=""id="Doll"><h2>Doll</h2>
                    <?php
     require_once './functions.php';
    $query = "SELECT iid, iname, idescription, iprice, istatus, isize, iimage,cname FROM Item,Catalogue WHERE Item.cid=Catalogue.cid AND cName LIKE '%Doll%'  ORDER BY cname";
     $result = queryMysql($query);
     $result->setFetchMode(PDO::FETCH_ASSOC);
     $result->execute();
     $resultSet = $result->fetchAll();
     
     foreach ($resultSet as $row) {
        $iId = $row['iid'];
        $iName = $row['iname'];
        $iDescription = $row['idescription'];
        $iPrice = $row['iprice'];
        $iStatus = $row['istatus'];
        $iSize = $row['isize'];
        $iImage = $row['iimage'];
        
        echo "<div class='sp w3-quarter w3-card w3-center ' ><div class='w3-pink w3-padding-large'>$iStatus</div><div ><img onclick=\"document.getElementById('$iName').style.display='block'\" id='testimg' src='./images/". $iImage . "' width='100%'></div><div class='name'><h3>$iName</h3></div><h3>$iPrice$</h3></div>"
                . "<!--SHOW MORE INFORMATION-->
  <div id='$iName' class='w3-modal'>
      <div class='w3-modal-content w3-animate-top w3-card-4'>
        <div class='w3-container w3-pink w3-center w3-padding-20'> 
          <span onclick=\"document.getElementById('$iName').style.display='none';\"
         class='w3-button w3-pink w3-xlarge w3-display-topright'>×</span>
          <h2>$iName</h2>
        </div>
        <div class='w3-container w3-row'>
          <div class='w3-half'>
              <img src='./images/". $iImage . "' width='100%'>
          </div>
          <div class='w3-half w3-left'>
              <h3>Price: $iPrice$</h3>
              <p>Description: $iDescription.</p>
              <h4>Size: $iSize</h4>                           
          </div>                                                    
        </div>
        <button class='w3-button w3-pink w3-section' onclick=\"document.getElementById('$iName').style.display='none';\">Close <i class='fa fa-remove'></i></button>
      </div>
    </div>";                                                                                       
    }
?>
     
                </div>  
                </div>    

                    
            <div class="footer">
              <div class="container-fluid" style="margin-left: 150px;">
  <div class="childfooter" id="leftfooter">
    <form action="#">
      <input type="text" placeholder="Enter your Email" style="border: 1px solid #484747; padding: 8px;">
      <input type="submit" value="Subcrible" style=" padding: 7px;
      padding-left: 20px;
      text-align: center;
      padding-right: 20px;
      background-color: white;
      background: gray;
      border: 1px solid #484747;">
    </form>
  </div>
  <div class="childfooter" id="rightfooter" style="padding: 20px; padding-left: 40px">© 2019 ATN Store. All Rights Reserved | Design by Hoang GCH16435</div>
              
            </div>
        </div>
    </body>
</html>

