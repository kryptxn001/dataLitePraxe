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
          <input type="text" name="jmeno" placeholder="Jméno" autocomplete="off"><br>
          <input type="text" name="prijmeni" placeholder="Příjmení" autocomplete="off"><br>
          <input type="submit" name="submit" value="Vyhledat">
        </form>
        <?php 
          if(isset($_POST["jmeno"])) {
            $findjmeno = $_POST["jmeno"];
          } else {
            $findjmeno = "";
          }

          if(isset($_POST["prijmeni"])) {
            $findprijmeni = $_POST["prijmeni"];
          } else {
            $findprijmeni = "";
          }

          $conn = mysqli_connect("localhost","root","","datalitepraxe") or die("Connection Failed: " .mysqli_connect_error());
          if($findjmeno=="" and $findprijmeni=="") {
            $sql = "SELECT * FROM uzivatel;";
          } elseif($findjmeno=="" and $findprijmeni !="") {
            $sql = "SELECT * FROM uzivatel WHERE prijmeni='$findprijmeni';";
          } elseif($findjmeno!="" and $findprijmeni =="") {
            $sql = "SELECT * FROM uzivatel WHERE jmeno='$findjmeno';";
          } else {
            $sql = "SELECT * FROM uzivatel WHERE jmeno='$findjmeno' AND prijmeni='$findprijmeni';";
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
