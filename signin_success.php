<?php
    require("../database.php");
    $username = base64_decode($_POST["username"]);
    $email  = base64_decode($_POST["email"]);
    //$contactno	 = base64_decode($_POST["contactno"]);
   // $address = base64_decode($_POST["address"]);
   // $group = base64_decode($_POST["group"]);  //contactno,address,group,'$contactno','$address','$group',
    $password = md5(base64_decode($_POST["password"]));

    $insert_data = "INSERT INTO users(username,email,password)
    VALUES('$username','$email','$password')";

    if($db->query($insert_data)){
        echo "sign in Success :)";
    }
    else{
        echo "Sign in failed !";
    }
?>