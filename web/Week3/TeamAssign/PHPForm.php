<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["firstname"];
    $email = $_POST["email"];
    $major = $_POST["major"];
    $comments = $_POST["comments"];

    $continents = $_POST["continentsVisated"];


    echo "User Name: $name <br> User Email Address: <a href='mailto:$email'>$email</a> 
    <br> User Major: $major <br> User Comments: $comments";

var_dump($continents);

   

}


