<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" >
    <title>Receipt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="StoreFrontStyle.css" />

</head>

<body>
<script src="ShoppingCartScript.js"></script>

    <header>
        <h1>Thank you for your order!</h1>
    </header>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
            $firstName = $_POST["first_name"];
            $lastName = $_POST["last_name"];
            $street = $_POST["street"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zip"];

     
        }

        echo "<h2 id='clearNum'> Your order will be shipped to $lastName, $firstName on $street, in $city, $state, $zip </h2> <br>";
        if(!empty($_SESSION['order'])){
            $orderArray = array("80" => "HeadPhones", "25" => "Mouse" , "30" => "Keyboard" , "99" => "Monitor" );
    
            for($i=0; $i < count($_SESSION['order']); $i++)
            {
                if($i > 0){
                echo "<br> ";
                }
                echo ($orderArray[$_SESSION['order'][$i]]);
               
                //echo " <button type='button' onclick='unset($orderArray['80'])'>Remove(1)</button>";
            }
            echo "<br><br> That is a total of $";
            echo $_SESSION['total'];;
            echo " dollars. "; 
        }
        else {
                    echo "You have no items in your cart!";
                }
        //make a view of the address the user put in

    ?>
<br>
<button onclick="window.location.href = 'ShoppingCart.php';">Click to return to the store</button>



<footer id="footer">
        <p>created by: Jacob Thomas</p>
        <a  href="https://www.linkedin.com/in/jacob-thomas-b529bb64/"> Check out my LinkedIn</a>
        <br />
        <a  href="github/jcthomas556"> Check out my Github!</a>
        <br />
        <a  href="#top">Back to the top!</a>

    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
