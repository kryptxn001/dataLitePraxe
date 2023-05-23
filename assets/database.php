<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  
  <style>
    table, tr, td, th {
      border:1px solid black;
    }

    #dataTable {
      margin: 20px;
      text-align: center;
    }

    #vyhledavac {
      margin: 20px;
    }

  </style>

  <body>
        <form method="post" id="vyhledavac">
          <input type="text" name="user" placeholder="userid" autocomplete="off"><br>
        </form>
        <?php 
          if(isset($_POST["user"])) {
            $findid = $_POST["user"];
          } else {
            $findid = "*";
          }
          $conn = mysqli_connect("localhost","root","","datalitepraxe") or die("Connection Failed: " .mysqli_connect_error());
          if(!(isset($findid)) or $findid=="*" or $findid=="") {
            $sql = "SELECT * FROM uzivatel;";
          } else {
            $sql = "SELECT * FROM uzivatel WHERE id='$findid';";
          }
          
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);

          if($resultCheck > 0) {
            echo "<table id=\"dataTable\">";
            echo "<tr>
                    <th>ID</th>
                    <th>Jméno</th>
                    <th>Příjmení</th>
                    <th>Město</th>
                  </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              foreach ($row as $column) {
                echo "<td>" . $column . "</td>";
              }
              echo "</tr>";
            };

            echo "</table>";
          } else {
            echo "<b style=\"margin-left: 20px;\">Nebylo nic nalezeno!</b> <br>";
          }
        
        ?>
  </body>
</html>
