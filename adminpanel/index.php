<?php
     include '../connection.php'; 
     session_start();
?>

<!DOCTYPE html>
<html lang="pl-PL">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../styles/home.css">
     <link rel="stylesheet" href="../styles/adminpanel.css">
</head>
<body>
     <nav>
          <div class="nav-item greeting">
               <?php echo "Cześć <span class='nick-display'>" . $_SESSION['nick'] . "</span>!"; ?>
          </div>
          <a href="../" class="nav-item nav-option">strona główna</a>
          <a href="../f1" class="nav-item nav-option">zainteresowania - f1</a>
          <a href="../contact" class="nav-item nav-option">kontakt</a>
          <?php
               if($_SESSION['isAdmin'] == 1) {
                    echo "<a href='' class='active-panel-button logout-button'>admin panel</a>";
               }
          ?>
          <a href="../logout.php" class="logout-button">wyloguj</a>
     </nav>

     <div class="section-container admins">
          <p class="section-title">Administratorzy</p>
          <?php
               $sql = "SELECT login, nick, data_utworzenia FROM users WHERE admin = 1";
               $result = $conn->query($sql);
               
               echo "<table>";

               echo "<tr>
                         <th>Login</th>
                         <th>Nick</th>
                         <th>Ostatnie logowanie</th>
                         <th>Data utworzenia</th>
                    </tr>";

               if ($result->num_rows > 0) {
                    echo "<tr>";
                    while($row = $result->fetch_assoc()) {
                         echo "<td>" . $row['login'] . "</td>" . "<td>" . $row['nick'] . "</td>" . "<td class='date'>" . "tu bedzie data logowania" . "</td>" . "<td class='date'>" . $row['data_utworzenia'] . "</td>";
                    }
                    echo "</tr>";
               }

               echo "</table>";
          ?>
     </div>

     <div class="section-container">
          <p class="section-title">Użytkownicy</p>
          <?php
               $sql = "SELECT login, nick, data_utworzenia FROM users WHERE admin = 0";
               $result = $conn->query($sql);
               
               echo "<table>";

               echo "<tr>
                         <th>Login</th>
                         <th>Nick</th>
                         <th>Ostatnie logowanie</th>
                         <th>Data utworzenia</th>
                    </tr>";

               if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                         echo "<tr>";
                         echo "<td>" . $row['login'] . "</td>" . "<td>" . $row['nick'] . "</td>" . "<td class='date'>" . "tu bedzie data logowania" . "</td>" . "<td class='date'>" . $row['data_utworzenia'] . "</td>";
                         echo "</tr>";
                    }
               }

               echo "</table>";
          ?>
     </div>

     <div class="section-container">
          <p class="section-title">Nadaj uprawnienia administratora</p>
          <table>
               <tr>
                    <th>Nick</th>
               </tr>
               <tr>
                    <td>
                         <form action="" method="post">
                              <input type="text" name="" placeholder="nick" id="">
                              <input type="submit" name="grant-submit" value="Nadaj">
                         </form>
                    </td>
               </tr>
          </table>
          
     </div>
</body>
</html>

<?php 
     $conn->close();
?>