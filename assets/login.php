<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <style>
    #loginform {
      text-align: center;
      position: relative;
      top: 100px;
    }

    #loginform input {
      margin: 5px;
    }

    .success {
      color: green;
    }

    .wrong {
      color: red;

    }
  </style>
  
  <body>
        <form id="loginform" method="post">
          <h1>PŘIHLÁŠENÍ</h1>
          <input type="text" name="username" placeholder="Uživatelské jméno"> <br>
          <input type="password" name="password" placeholder="Heslo"> <br>
          <input type="submit" name="submit" value="Přihlásit se"> <br>
          <?php 
            if(isset($_POST["username"])) {
              $username = $_POST["username"];
            } else {
              $username = "";
            }
  
            if(isset($_POST["password"])) {
              $password = $_POST["password"];
            } else {
              $password = "";
            }

            if($password!="" and $username!="") {
              $conn = mysqli_connect("localhost","root","","datalitepraxe") or die("Connection Failed: " .mysqli_connect_error());
              $sql = "SELECT * FROM login WHERE username='$username' AND password='$password';";

              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);



              if($resultCheck == 0) {
                echo "<p class='wrong'>Wrong username or password!</p>";
              } else {
                $row = mysqli_fetch_assoc($result);

                echo "<p class='success'>Sucessfully logged into: " . $row['email'] . "</p>";
              }
            } else {
              if(isset($_POST["submit"])) {
                echo "<p class='wrong'>Something is missing!</p>";
              }
            }
            
          ?>
          
        </form>
        
  </body>
</html>
