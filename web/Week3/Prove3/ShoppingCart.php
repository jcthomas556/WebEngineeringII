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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="StoreFrontStyle.css" />
</head>

<body>
<script src="ShoppingCartScript.js"></script>

<div class = "right">
    <header>
        <h1>Jacob's Store</h1>
    </header>

    <h2 id="subheader">Welcome to the store! Check the box of any desired item.</h2>
</div>

<form class="table" method="POST" action="CartView.php">
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
            <td><img src="https://tpucdn.com/review/onikuma-k5/images/small-v1558119494.png" alt="Headphones"></td>

        </tr>
        <tr>
            <td>Mouse</td>
            <td>$25.00</td>
            <td><input type="checkbox" name="item[]" value="25" onclick="calculateTotal(this)"></td>
            <td><img src="https://tpucdn.com/review/glorious-pc-gaming-race-model-o/images/small-v1558195325.png" alt="Mouse"></td>
            
        </tr>
        <tr>
            <td>Keyboard</td>
            <td>$30.00</td>
            <td><input type="checkbox" name="item[]" value="30" onclick="calculateTotal(this)"></td>
            <td><img src="https://tpucdn.com/reviews/Bloody/B945/images/small-v1558119423.png" alt="Headphones"></td>

        </tr>
        <tr>
            <td>Monitor</td>
            <td>$99</td>
            <td><input type="checkbox" name="item[]" value="99" onclick="calculateTotal(this)"></td>
            <td><img src="https://tpucdn.com/review/msi-oculux-nxg251r/images/small-v1555089120.png" alt="Headphones"></td>
            

        </tr>
         <tr>
            <td>Current Total</td>
            <td>   </td>
            <td><input id = "total" type="text" name="total" value="0" readonly></td>
            

        </tr>
    </table>  
</div>


<br>

<button  type="submit" value="Submit">Place Order</button>

</form>
    <br><br><br>
    <hr>
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
