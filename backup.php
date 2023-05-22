<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>DataLite project</title>
  <link rel="stylesheet" href="style.css">
  </head>
  <body style="font-family: Arial, Helvetica, sans-serif;">
    
    <!-- MENU -->
  
    <div id="menu" style="text-align: center">
    
            <ul style="list-style-type: none;">
            <?php
                $section = [
                    "Domov" => "domov",
                    "Galerie" => "galerie",
                    "Ostatní" => "ostatni"
                ];
                foreach ($section as $key => $value) {
                    echo "<li>
                        <a href=\"?strana=$value\">$key</a> 
                    </li>";
                }
                
            ?>
            </ul>
     </div>
    
    <!-- STRANA -->
    
    <?php
        if(!(isset($_GET["strana"]))) {
            $strana = "domov"; 
        } else {
            $strana = $_GET["strana"]; 
        }
        
        echo  . "<br>" 
        
        include($strana . ".php")
        
        
        // array, for, ul, li, isset: je nastaven? 
        
    ?>
  </body>
</html>
