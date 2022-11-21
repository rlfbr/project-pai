<?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "wkproj";

     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
          die("Nie połączono: " . $conn->connect_error);
     }

     echo "<script>console.log('Db connected successfully.')</script>";
?>