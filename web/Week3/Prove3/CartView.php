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
        <h1>Your Cart</h1>
    </header>

    <?php
    echo "<h2> Your carts items:<br><br> </h2>";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $order = $_POST["item"];
        $_SESSION['order']=$order;
        $total = $_POST["total"];
        $_SESSION['total'] = $total;
    }
    if(!empty($_SESSION['order'])){
        $orderArray = array("80" => "HeadPhones", "25" => "Mouse" , "30" => "Keyboard" , "99" => "Monitor" );

        for($i=0; $i < count($_SESSION['order']); $i++)
        {
            if($i > 0){
            echo "<br> ";
            }
            echo ($orderArray[$_SESSION['order'][$i]]);
            echo " ... <input type='submit' value='Remove'> </h3><br>";
            //echo " <button type='button' onclick='unset($orderArray['80'])'>Remove(1)</button>";
        }
        echo "<br><br> <h2> That is a total of $";
        echo $_SESSION['total'];;
        echo " dollars. </h2>"; 
    }
    else {
                echo "You have no items in your cart!";
            }


        //make a button to remove the item from the cart
       //unset($orderArray['80']);
       //print_r($orderArray);
//unset($orderArray[$_SESSION['order']['80']]);
?>

</form>

        
<br> <br>    

<button onclick="window.location.href = 'ShoppingCart.php';">Click to return to the store</button>
<br><br>
<button onclick="window.location.href = 'Checkout.php';">Click to Checkout</button>


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
