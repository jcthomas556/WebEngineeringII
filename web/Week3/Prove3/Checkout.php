<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" >
    <title>Your Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="StoreFrontStyle.css" />
</head>

<body>
<script src="ShoppingCartScript.js"></script>
    <header>
        <h1>Checkout</h1>
    </header>

    <form id="clearNum" method="POST" action="ReceiptPage.php">

<h3> Please fill out your Contact Info for shipping.</h3>
    <p>First Name</p>
    <input id="first_name" type="text" name="first_name" onchange="validateFirstName()">

    <p>Last Name</p>
    <input id="last_name" type="text" name="last_name" onchange="validateLastName()">

    <h3>Address</h3>

    <p id="alertMsg" style="color:red">

    </p>

    <p>Street</p>
    <input id="street" type="text" name="street" onchange="validateField()">

    <p>City</p>
    <input id="city" type="text" name="city" onchange="validateField()">

    <p>State</p>
    <input id="state" type="text" name="state" onchange="validateField()">

    <p>Zip</p>
    <input id="zip" type="text" name="zip" onchange="validateField()">
    
    <br><br>
    <button id="clearNum" type = "reset" value = "reset" >Clear Form</button>



    <button id="clearNum" type="submit"  value="Submit">Complete Purchase</button>

    

</form>

    <?php
        echo "<hr> <br><br>Your items: <br><br> ";

        
        if(!empty($_SESSION['order'])){
            $orderArray = array("80" => "HeadPhones", "25" => "Mouse" , "30" => "Keyboard" , "99" => "Monitor" );

            for($i=0; $i < count($_SESSION['order']); $i++)
            {
                if($i > 0){
                echo "<br> ";
                }
                echo ($orderArray[$_SESSION['order'][$i]]);
                echo " ... <input type='submit' value='Remove'> <br>";
                //echo " <button type='button' onclick='unset($orderArray['80'])'>Remove(1)</button>";
            }
            echo "<br><br> That is a total of $";
            echo $_SESSION['total'];;
            echo " dollars. "; 
        }
        else {
                 echo "You have no items in your cart!";
             }
    

    ?>
<br><br>
<button onclick="window.location.href = 'CartView.php';">Click to return to the cart</button>
<br><br>



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
