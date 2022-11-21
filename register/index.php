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
     <form id="register-form" action="" method="post">
          <input class="input" placeholder="login" type="text" name="login" id="login-input">
          <input class="input" style="margin-top: 5px;" placeholder="hasło" type="password" name="password" id="password-input">
          <input class="input" style="margin-top: 5px;" placeholder="nickname" type="text" name="nick">
          <div class="show-option">
               <input type="checkbox" name="" id="show-password" onchange="showPass()"> POKAŻ HASŁO
          </div>
          <input type="submit" name="form-submit" value="ZAREJESTRUJ">
     </form>

     <?php
          if (isSet($_SESSION['loggedIn'])) {
               echo "<div class='info-popout'>";
               echo "<p>Jesteś już zalogowany jako " . $_SESSION['nick'] . ". Zarejestrowanie kolejnego użytkownika nie wyloguje Cię.</a><p>";
               echo "</div>";
          }
     ?>

     <?php
          if(isSet($_POST['form-submit'])) {
               $login = $_POST['login'];
               $password = $_POST['password'];
               $nick = $_POST['nick'];
               $currentDate = date("d.m.Y H:i:s");

               $sql = "INSERT INTO users (`id`, `login`, `password`, `nick`, `admin`, `data_utworzenia`) VALUES (NULL, '$login', '$password', '$nick', 0, '$currentDate')";
               
               $sqlCheck = "SELECT login, nick FROM users";
               $resultCheck = $conn->query($sqlCheck);

               $znaleziono = 0;
               if ($resultCheck->num_rows > 0) {
                    while($row = $resultCheck->fetch_assoc()) {
                         if($row['login'] == $login || $row['nick'] == $nick) {
                              $znaleziono = 1;
                              break;
                         } else if ($row['login'] == $login) {
                              $znaleziono = 2;
                              break;  
                         } else if ($row['nick'] == $nick) {
                              $znaleziono = 3;
                              break;
                         }
                    }
               }

               if($znaleziono == 1) {
                    echo "<div class='error-popout'>";
                    echo "<p>Niestety użytkownik o loginie $login oraz nicku $nick już istnieje. (To ty? - <a href='../login/'>zaloguj się.</a>) Wprowadź inny login oraz nick i spróbuj ponownie.<p>";
                    echo "</div>";
               } else if ($znaleziono == 2) {
                    echo "<div class='error-popout'>";
                    echo "<p>Niestety użytkownik o loginie $login już istnieje. Wprowadź inny login i spróbuj ponownie.<p>";
                    echo "</div>";
               } else if ($znaleziono == 3) {
                    echo "<div class='error-popout'>";
                    echo "<p>Niestety użytkownik o nicku $nick już istnieje. Wprowadź inny nick i spróbuj ponownie.<p>";
                    echo "</div>";
               } else {
                    if ($conn->query($sql) === TRUE) {
                         echo "<div class='success-popout'>";
                         echo "<p>Pomyślnie zarejestrowano, teraz możesz się <a href='../login'>zalogować</a>.<p>";
                         echo "</div>";
                    } else {
                         echo "<div class='error-popout'>";
                         echo "<p>Nie dodano, error: " . $sql . "<br>" . $conn->error . "</p>";
                         echo "</div>";
                    }
               }

               $conn->close();
          }
     ?>
</body>
</html>