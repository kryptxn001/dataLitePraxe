<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <style>
    
    .fgal {
        margin: 10px;
        width: 892.5px;
        height: 575px;
        border-radius: 20px;
        z-index: -1;
    }
    
    .fgal {
        box-shadow: 0px 0px 15px 0px black;
    }
    
    .fview {
        margin: 10px;
        height: 80%;
        
    }
    
    #container {
        margin: 20px 10px;
    }
    
    .tlacitko {
        padding: 20px 60px;
        border-radius: 10px;
        background-color: aquamarine;
        text-decoration: none;
        color: black;
        margin-left: 20px;
        box-shadow: 0px 0px 15px 0px black;
    }

    .tlacitko-disabled {
        padding: 20px 60px;
        border-radius: 10px;
        background-color: red;
        text-decoration: none;
        color: black;
        margin-left: 20px;
    }
  </style>

    

  <body>

  <script type="text/javascript">
        var fotonum = <?php 
            if(!(isset($_GET["foto"]))) {
                Print(-1);
            } else {
                Print($_GET["foto"]); 
            }
        ?>;
        var fotomax = <?php Print(5); ?>;
        
        document.onkeydown = checkKey;

        function checkKey(e) {
            if(fotonum < 0) {
                return;
            }

            e = e || window.event;
            if (e.keyCode == '37' && fotonum > 0) {
                // left arrow
                window.location.href = "?strana=1&foto=" + (fotonum-1);
            }
            else if (e.keyCode == '39' && fotonum < fotomax-1) {
                // right arrow
                window.location.href = "?strana=1&foto=" + (fotonum+1);
            }
            alert(e.key);
        }

    </script>

    <div id="container">
        <?php 
            $fotky = array();
            
            if ($handle = opendir('./galerie')) {

        		while (false !== ($entry = readdir($handle))) {

            		if ($entry != "." && $entry != "..") {
                        
                        array_push($fotky,$entry);
            		}
        		}

        	closedir($handle);
    	   }

           $fotomax = sizeof($fotky);
                      
            function drawGalery($fotky) {
                $index = 0;
            
                foreach ($fotky as $foto) {
                    echo "<a href=\"?strana=1&foto=$index\"><img class=\"fgal\" src=\"./galerie/$foto\"></a>";
                    $index++;
                }
            }
        
        
            if(!(isset($_GET["foto"]))) {
                drawGalery($fotky);
                   
            } elseif($_GET["foto"]>=0 and $_GET["foto"] < sizeof($fotky)) {
                
            
                $foto = $fotky[$_GET["foto"]];
                $fotoNum = $_GET["foto"];

                

                
            
                echo "<img class=\"fview\" src=\"./galerie/$foto\"> <br> <br>";

                if($fotoNum-1>=0) {
                    $dalsi = $fotoNum-1;
                    echo "<a class=\"tlacitko\" href=\"?strana=1&foto=$dalsi\">-1</a>";
                    //tlacitko <
                } else {
                    echo "<a class=\"tlacitko-disabled\">-1</a>";
                }

                echo "<a class=\"tlacitko\" href=\"?strana=1\">Zpet</a>";
                
                if($fotoNum+1<=sizeof($fotky)-1) {
                    //tlacitko >
                    $dalsi = $fotoNum+1;
                    echo "<a class=\"tlacitko\" href=\"?strana=1&foto=$dalsi\">+1</a>";
                    
                } else {
                    echo "<a class=\"tlacitko-disabled\">+1</a>";
                }


            } else {
                drawGalery($fotky);
            }
        ?>
    </div>
  </body>
</html>
