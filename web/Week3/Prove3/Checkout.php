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
        <h1>Checkout</h1>
    </header>

    <form class="address">

<h3> Contact Info </h3>
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


    

</form>

    <?php
        //get what is in the checkbox values and fill variables. echo those variables here
        //make a button to remove the item from the cart

    ?>
<br><br>
<button onclick="window.location.href = 'CartView.php';">Click to return to the cart</button>
<br><br>
<button onclick="window.location.href = 'ReceiptPage.php';">Complete Purchase</button>


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
