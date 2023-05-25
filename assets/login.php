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

    .txtinput {
      margin: 5px;
      padding: 5px;
      font-size: 20px;
      border-radius: 5px;
      border: solid 1px black;
    }

    .txtinput:focus {
      background-color: #b3ffe6;
    }

    .success {
      color: green;
      font-style: italic;
      font-size: 20px;
      margin: 5px;
      padding: 0px;
    }

    .wrong {
      color: red;
      font-style: italic;
      font-size: 20px;
      margin: 5px;
      padding: 0px;

    }

    .btn {
      margin: 5px;
      padding: 10px 15px;
      font-size: 20px;
      border-radius: 10px;
      border: none;
      background-color: aquamarine;
    }

    .btn:hover {
      background-color: #b3ffe6;
    }

    h1 {
      color: aquamarine;
      text-shadow: 0px 0px 5px black;
      margin-bottom: 5px;
    }

    .loginhref {
      color: aquamarine;
      font-weight: bold;
    }
  </style>
  
  <body>
        <form id="loginform" method="post">
          <h1>PŘIHLÁŠENÍ</h1>
          <input class="txtinput" type="text" name="username" placeholder="Uživatelské jméno"> <br>
          <input class="txtinput" type="password" name="password" placeholder="Heslo"> <br>
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
                echo "<p class='wrong'>Špatné uživatelské jméno nebo heslo!</p>";
              } else {
                $row = mysqli_fetch_assoc($result);

                echo "<p class='success'>Uspěšně přihlášeno do: " . $row['email'] . "</p>";
              }
            } else {
              if(isset($_POST["submit"])) {
                echo "<p class='wrong'>Doplň jméno nebo heslo!</p>";
              }
            }
            
          ?>
          <input class="btn" type="submit" name="submit" value="Přihlásit se"> <br>
          <p>Nemáš učet? <a class="loginhref" href="?strana=6">Založ si ho</a></p> <br>
          
          
        </form>
        
  </body>
</html>
