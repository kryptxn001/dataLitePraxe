<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <style>
    #textbox1 {
        margin: 5px;
      padding: 5px;
      font-size: 20px;
      border-radius: 5px;
      border: solid 1px black;
    }
    
    #saveBtn {
        margin: 5px;
      padding: 10px 15px;
      font-size: 20px;
      border-radius: 10px;
      border: none;
      background-color: aquamarine;
    }
  
    #idjmeno {
        margin: 5px;
      padding: 5px;
      font-size: 20px;
      border-radius: 5px;
      border: solid 1px black;
    }
  </style>
  
  <body>
        <form action="index.php?strana=3" method="post">
        
                <input type="text" id="idjmeno" name="jmeno" placeholder="Tvoje jméno / přezdívka"> <br>
                <textarea id="textbox1" name="textbox1" rows="20" cols="100" placeholder="Zde napiš zprávu."></textarea>
            <br>
            <input id="saveBtn" type="submit" value="Save to File">
            
            <br>
            <?php 
                function save() {
                    $fileName= $_POST["jmeno"];
                    if($fileName == "") {
                        $fileName="ostatni";
                    }
                    $txtfile = fopen("./assets/texts/$fileName.txt", "a");
                    fwrite($txtfile,date("h:i:sa") . " - " . $_POST["textbox1"] . "\n");
                    fclose($txtfile);
                }
                if(isset($_POST["submit"])) {
                    @save();
                }
                
            ?>
        </form>
        
  </body>
</html>
