<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles/index.css">
     <title>Wkawalko | Strona Główna</title>
</head>
<body>
     <?php
          include 'connection.php';

          if (isSet($_SESSION['loggedIn'])) {
               $conn->close();
               include 'home.php';
          } else {
               echo ' 
                    <div class="hero-error-container">
                         <p class="hero-error-text">
                              Ups!
                         </p>
                         <p class="hero-error-desc">
                              Aby zobaczyć treść strony musisz się <a href="login/">zalogować</a>. <br> Jeżeli jeszcze nie masz konta założysz je <a href="register/">tutaj</a>.
                         </p>
                    </div>
               ';
          }
          
     ?>
     
</body>
</html>