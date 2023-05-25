<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <style>
    #textbox1 {
        border-radius: 25px;
        margin: 10px;
        padding: 10px;
        font-size: 20px;
    }
    
    #saveBtn {
        background-color: aquamarine;
        border: 0;
        padding: 25px;
        margin: 10px;
        border-radius: 10px;
    }
  
    #idjmeno {
        border-radius: 25px;
        margin: 10px;
        padding: 10px;
        font-size: 20px;
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
