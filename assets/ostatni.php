<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  </head>
  <style>
    .friendurl {
        color: black;
        font-size: 20px;
    }
  
    .rndimg {
        border-radius: 15px;
        width: 600px;
    }
    
    .nadpis {
        font-size=30px;
    }
  </style>
  
  <body>
    <h1 class="nadpis">Kamarádské stránky:</h1> <br>
    <a class="friendurl" href="https://www.w3schools.com/php/default.asp" target="_blank">W3S - PHP</a> <br>
    <a class="friendurl" href="https://www.youtube.com/watch?v=zZ6vybT1HQs" target="_blank">YouTube Tutorial</a> <br>
	
    <br>
    <?php 

	
    
    $file = "ran" . rand(0,2) . ".jfif";
	echo "<img class=\"rndimg\" src=\"assets/obrazky/$file\">"
	
    ?>
  </body>
</html>
