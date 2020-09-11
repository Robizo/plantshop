<?php
    include_once 'dbh_plantshop.php';
    ?>


<!DOCTYPE html>
<html>
<head>
    <title> webshop </title>
    <style type="text/css">
    *{
        box-sizing: border-box;
    }
    html, body{
        margin: 0;
        padding: 0;
    }
    header{
        background-color: rgba(0, 110, 6, 0.7);
        width: 100%;
        height: 150px;
        margin: 0;
        padding: 0;
        border-bottom: 2px solid rgba(64, 163, 122, 0.753);
    }
    main::after{
        content: "";
        clear: both;
        display: block;
    }
    main>div{
        float: left;
        color: white;
        height: 750px;
        padding: 10px;
    }
    footer{
        text-align: center;
  padding: 3px;
  background-color: DarkSalmon;
  color: white;
    }
    header > img{
        top: 0;
        height: 148px;
        width: auto;
        float: right;
        margin-right: 10px;
    }
    header > h1{
        color:  white;
        font-size: 90px;
        margin: 0;
        padding: 20px 50px;
    }

    .menu{
        top: 150px;
        
        width: 10%;
        margin: 0;
        padding: 0;
        background:  rgba(1, 150, 8, 0.7) ;
        text-align: center;
        overflow: hidden;

    }
    
    .menu > ul{
        list-style-type: none;
        padding: 5px;
        line-height: 175%;
    }
    .menu > ul >li{
        padding: 3 auto;
         
    }
    .menu> ul> li> a{
        text-decoration: none;
        color: white;
        font-size: 20px;
        
        
    }
    .menu> ul> li:hover{
        
        background-color: yellowgreen;
    }
    .menu> ul> li>a:hover{
        
        font-size: 25px;
    }

    .content{
        top: 150px;
        width: 80%;
        margin: 0;
        padding: 0;
        color: black;
        text-align: center;
        overflow: hidden;
    }

    .ad{
        top: 150px;
        width: 10%;
        margin: 0;
        padding: 0;
        background:  rgba(1, 150, 8, 0.274) ;
        text-align: center;
    }

    .check{
        float: left;
        font-size:40px;
        margin-left: 30px;
    }
 .plant{
     width: 90%;
     height: auto;
     margin: 20px 30px;
     box-shadow: 0 0px 0 rgba(0,0,0,0.3), 0 7px 21px rgba(0,0,0,0.2);
     display: inline-block;
     position: relative;
 }
 .plantimg{
     width: 160px;
     height: 160px;
     float: left;
 }
 .plantimg:hover{
     width: 300px;
     height: 300px;
 }
 .plantname{
     font-size: 40px;
     float: left;
     margin: 10px 10px;
 }
 .price{
    float: left;
    margin: 5px 20px;
    font-size: 20px;
 }
 .originalprice{
     text-decoration: line-through;
 }
 .tag{
     float:left;
 }
 .desc{
     margin: 25px;
 }
 .cart{
    position: absolute;
     right:    0;
     bottom:   0;

     text-decoration: none;
     color: white;
     background-color: green;
     border: 5px solid green;
     border-radius: 10px;
     font-size: 25px;
     float: right;
     margin-right: 20px;
     margin-bottom: 20px;
 }
 .cart:hover{
     background-color: darkgreen;
     border-color: darkgreen;
 }

    

    
    </style>

</head>
<body>
    <header>
        </div>  
        <img src="logo.jpg" alt="Logo" >
        <h1> PLANTHOUSE </h1> 
    </header>
    <main>
        
          
        <div class="menu" >
                <h2>MENU</h2>
                <ul>
                    <li> <a href="#"> HOME </a></li>
                    <li> <a href="#"> ABOUT </a></li>
                    <li> <a href="#"> CONTACT </a></li>
                    <li> <a href="#"> PRODUCTS </a></li>
                    
                    
                </ul>
                
        </div>
        <div class="content">
            <h1>Wellcome to planthouse.com</h1>
            <p class='check'> Check out today's sales</p>
            <?php
                $sql = "SELECT * FROM plants where sale > 0;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                { 
                    $newprice= $row['price']-($row['price']*($row['sale']/100));
                    echo "<div class='plant'>
                            <img src='".$row['image']."' class='plantimg'> 
                            <div class='tag'>
                            <p class='plantname'>".$row['name']." </p> </br> </br> </br> </br>
                            <p class='price'> <span class='originalprice'>".$row['price']."$</span> <span class='newprice'>".round($newprice)."$</span></p>
                            </div>
                            <p class='desc'>".$row['description']."</p>
                            <a href='#' class='cart'> Add to cart </a>
                            </div>";

                    
                }
            }


             ?>

        </div>
        <div class="ad">
            Ad comes here
        </div>

    </main>
    <footer>
    <p>Szucs Robert<br>
  <a href="mailto:szucsrobertasd@gmail.com">Send me a mail</a></br>
    <span style=" opacity: 0.7; float: left;"> Copyright © 2020 </span></p>

    </footer>

</body>
</html>