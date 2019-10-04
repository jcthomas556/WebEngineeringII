<?php
    session_start();
    $total = $_POST["total"];
        
    var_dump($total);
        
    //     }
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" >
    <title>Your Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>




<body>
<script src="ShoppingCartScript.js"></script>
    <header>
        <h1>Your Cart</h1>
    </header>

    <?php
    echo "Your carts items: ";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $order = $_POST["item"];

        if(!empty($order)){
            $_SESSION["orderArray"] = array("80" => "HeadPhones", "25" => "Mouse" , "30" => "Keyboard" , "99" => "Monitor" );

            for($i=0; $i < count($order); $i++)
            {
                if($i > 0){
                  echo ", ";
            }
             echo($_SESSION[$orderArray[$order[$i]]]);
             
            }
            echo ". <br> That is a total of $";
            echo $total;
            echo " dollars. "; 
            //this is a mess but I couldn't figure out why it wouldn't print in one line
        }

       
    } else {
        echo "You have no items in your cart!";
    }

    //maybe just put total here in HTML instead?

    //get what is in the checkbox values and fill variables. echo those variables here
        //make a button to remove the item from the cart


?>



        
<br> <br>    

<button onclick="window.location.href = 'ShoppingCart.php';">Click to return to the store</button>
<br><br>
<button onclick="window.location.href = 'Checkout.php';">Click to Checkout</button>


    <footer id="footer">
        <p>created by: Jacob Thomas</p>
        <a class="footerLinks" href="https://www.linkedin.com/in/jacob-thomas-b529bb64/"> Check out my LinkedIn</a>
        <br />
        <a class="footerLinks" href="github/jcthomas556"> Check out my Github!</a>
        <br />
        <a class="footerLinks" href="#top">Back to the top!</a>

    </footer>
</body>

</html>
