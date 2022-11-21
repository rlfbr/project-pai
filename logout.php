<?php include 'connection.php'; ?>

<?php
     session_start();

     unset($_SESSION['loggedIn']);
     unset($_SESSION['login']);
     unset($_SESSION['nick']);
     unset($_SESSION['isAdmin']);

     session_destroy();
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles/register.css">
     <script src="js/register.js"></script>
     <title>Wkawalko | Logout</title>
</head>
<body>
     <div style="width: 700px !important; margin-top: 10%;" class="success-popout">
          <p>Zostałes wylogowany, możesz teraz zamknąć okno.<br><a href="./login/">zaloguj się</a><br><a href="./register/">zarejestruj się</a></p>
     </div>
</body>
</html>