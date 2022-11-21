<?php include '../connection.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../styles/register.css">
     <script src="../js/register.js"></script>
     <title>Document</title>
</head>
<body>
     <form id="login-form" method="post">
          <input class="input" placeholder="login" type="text" name="login" id="login-input">
          <input class="input" style="margin-top: 5px;" placeholder="hasło" type="password" name="password" id="password-input">
          <input type="submit" value="ZALOGUJ" name="form-submit">
          <div class="show-option">
               <input type="checkbox" id="show-password" onchange="showPass()"> POKAŻ HASŁO
          </div>
     </form>

     <?php
          if (isSet($_SESSION['loggedIn'])) {
               echo "<div class='info-popout'>";
               echo "<p>Jesteś już zalogowany jako " . $_SESSION['nick'] . ". Po ponownym zalogowaniu zmienisz konto.</a><p>";
               echo "</div>";
          }
     ?>

     <?php
          if(isSet($_POST['form-submit'])) {
               $login = $_POST['login'];
               $password = $_POST['password'];
     
               $sql = "SELECT login, password, nick, admin FROM users";
               $result = $conn->query($sql);
     
               if ($result->num_rows > 0) {
                    $znaleziono = false;
                    $nick = "";
                    $isAdmin = 0;
                    while($row = $result->fetch_assoc()) {
                         if($row['login'] == $login && $row['password'] == $password) {
                              if($row['admin'] == 1) {
                                   $isAdmin = 1;
                              }
                              $znaleziono = true;
                              $nick = $row['nick'];
                              break;
                         }
                    }
                    if($znaleziono == true) {
                         $_SESSION['loggedIn'] = true;
                         $_SESSION['login'] = $login;
                         $_SESSION['nick'] = $nick;
                         $_SESSION['isAdmin'] = $isAdmin;


                         header('Location: ../');
                         exit;
                    } else {
                         echo "<div class='error-popout'>";
                         echo "<p>Niestety taki użytkownik nie istnieje. Możesz go zarejestrować <a href='../register'>tutaj</a><p>";
                         echo "</div>";
                    }
               }
               $conn->close();
          }
     ?>
</body>
</html>