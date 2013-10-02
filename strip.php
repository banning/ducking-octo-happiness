<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/master.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<link rel="stylesheet" href="rbr.css" type="text/css">
 <link rel="shortcut icon" href="favicon.ico">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Red Brick Road Studios - New comics Monday, Wednesday, and Freija Day</title>
<!-- InstanceEndEditable --> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="comic, humor, webcomic, redbrickroadstudios, red brick road studios, red brick road, walden">
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>

<body><div align="center">
<table width="642" border="0">
  <?php readfile("header.html"); ?>
<?php
  //Get the url and parse it
  $url = explode("?", $_SERVER['REQUEST_URI']);
  $parsed = explode("&", $url[1]);

  //Seperate out which comic this is
  $number = explode("=", $parsed[0]);
  $number = $number[1];
  $title =  "";
  
  $FileName = "Strip_List.txt";
  $Length = "0";
  $file = fopen($FileName, 'r');
  while (!feof($file))
  {
    $comic = fgets($file);
    $numberCheck = explode(" ",$comic);
    $Length = $Length + 1;
    if($numberCheck[0] == $number)
    {
      $title = $comic;
    }
  }
  fclose($fh);  
?>  

  <tr align="center" valign="top"> 
    <td height="20" colspan="2" align="center"> <div align="left"><?php echo $title?></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td height="316" width="160" colspan="2" align="center" td> <p>
      <?php echo "<img src=\"images/comics/".$number.".png\">"?>
      </p>
      </td>
  </tr>
  <tr align="left" valign="top"> 
    <th colspan="2" align="left" td>
      <div align="center">
        <?php $Previous = $number - 1; 
              if($Previous > 0)
              {
                echo "<a href=\"strip.php?number=".$Previous."\">";
              }
              ?>Previous</a> &#135 
        <?php $Next = $number + 1;
              if($Next <= $Length)
              {
                echo "<a href=\"strip.php?number=".$Next."\">";
              }
              ?>Next</a>
      </div>
    </th>
  </tr>
  <?php readfile("footer.html"); ?>
</table>

</body>
</html>