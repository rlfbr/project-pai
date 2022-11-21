<?php
     include 'connection.php';
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="styles/home.css">
</head>
<body>
     <nav>
          <div class="nav-item greeting">
               <?php echo "Cześć <span class='nick-display'>" . $_SESSION['nick'] . "</span>!"; ?>
          </div>
          <a href="" class="nav-item nav-active nav-option">strona główna</a>
          <a href="f1/" class="nav-item nav-option">zainteresowania - f1</a>
          <a href="contact/" class="nav-item nav-option">kontakt</a>
          <?php
               if($_SESSION['isAdmin'] == 1) {
                    echo "<a href='adminpanel/' class='logout-button'>admin panel</a>";
               }
          ?>
          <a href="logout.php" class="logout-button">wyloguj</a>
     </nav>
</body>
</html>

<?php 
     $conn->close();
?>