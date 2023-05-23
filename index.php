<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <link rel="icon" type="image/x-icon" href="/assets/icon.png">
  <title>DataLite project</title>
  </head>
  
  <style>
    body {
        margin:0;
        background-color: rgb(209, 255, 240);
    }
    
    #menu {
        background-color: #66ffcc;
        position:fixed;
        width:100%;
        top:0;
        left:0
        z-index: 999;
        overflow: hidden;
    }
    
    
    ul {
        margin:0;
        padding: 10px;
        left:-10px;
        transform: translate(-10px,0px);
    }
    
    li {
        display: inline;
        padding: 11px;
        background-color: #66ffcc;
    }
    
    li:hover {
        background-color: #b3ffe6;
    }
    
    li a {
        text-decoration: none;
        color: black;
    }
  </style>
  
  <body style="font-family: Arial, Helvetica, sans-serif;">
    <div id="menu">
        <ul>
        <?php
            $section = [
                "Hlavní strana" => "domov",
                "Galerie" => "galerie",
                "Ostatní" => "ostatni",
                "Formulář" => "editor",
		"Databáze" => "database"
            ];
                
            $index = 0;
            foreach ($section as $key => $value) {
                
                //$index = array_search($key,array_keys($section));
                
                echo "<li>
                    <a href=\"?strana=$index\">$key</a>
                </li>";
                    
                $index++;
            }
                
        ?>
        </ul> 
     </div>
     
     <br> <br> 
    
    <!-- STRANA -->
    
    <?php
        if(!(isset($_GET["strana"]))) {
            $strana = 0; 
        } else {
            $strana = $_GET["strana"];
        
            if($strana > sizeof($section) or $strana < 0) {
                $strana = 0; 
            }
             
        }
        
        $allkeys = array_keys($section);
        include("./assets/" . $section[$allkeys[$strana]] . ".php");

        
        
        
        // array, for, ul, li, isset: je nastaven? 
        
    ?>
  </body>
</html>

