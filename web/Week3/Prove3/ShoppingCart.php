<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" >
    <title>Jacob's Assignments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
<script src="ShoppingCartScript.js"></script>

    <header>
        <h1>Jacob's Store</h1>
    </header>

    <h2 id="subheader">Welcome to the store! Check the box of any desired item.</h2>

<form method="POST" action="CartView.php">
    <table >
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Check to buy</th>

        </tr>
        <tr>
            <td>Headphones</td>
            <td>$80.00</td>
            <td><input type="checkbox" name="item[]" value="80" onclick="calculateTotal(this)"></td>

        </tr>
        <tr>
            <td>Mouse</td>
            <td>$25.00</td>
            <td><input type="checkbox" name="item[]" value="25" onclick="calculateTotal(this)"></td>

        </tr>
        <tr>
            <td>Keyboard</td>
            <td>$30.00</td>
            <td><input type="checkbox" name="item[]" value="30" onclick="calculateTotal(this)"></td>

        </tr>
        <tr>
            <td>Monitor</td>
            <td>$99</td>
            <td><input type="checkbox" name="item[]" value="99" onclick="calculateTotal(this)"></td>
            

        </tr>
         <tr>
            <td>Current Total</td>
            <td>   </td>
            <td><input disabled = "disabled" id = "total" type="text" name="total" value="0" ></td>
            

        </tr>
    </table>  
</div>


<br>

<button class = "address" type="submit" value="Submit">Place Order</button>

</form>
    <br><br><br>
    <hr>
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
