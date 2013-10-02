<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<link rel="stylesheet" href="../../rbr.css" type="text/css">
 <link rel="shortcut icon" href="favicon.ico">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Red Brick Road Studios - New comics Monday, Wednesday, and Freija Day</title>
<!-- InstanceEndEditable --> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="comic, humor, webcomic, redbrickroadstudios, red brick road studios, red brick road, walden">
</head>
  <!-- Episodes -->
<body><div align="center">
  
<table width="650" border="0">

  <?php readfile("../header.html"); ?>

  <?php
//Get the url and parse it
$url = explode("?", $_SERVER['REQUEST_URI']);
$parsed = explode("&", $url[1]);

//Seperate out which episode and part is wanted
$episode = explode("=", $parsed[0]);
$part = explode("=", $parsed[1]);
$episode = $episode[1];
$part = $part[1];

//Get Episode information
$FileName = "Episode_List.txt";
$file = fopen($FileName, 'r');
$Count = "0";
while (!feof($file))
{
    $Line = fgets($file);
    $Temp = explode(";", $Line);
    $folder[$Count] = $Temp[0];
    $numParts[$Count] = $Temp[1];
    $title[$Count] = $Temp[2];
    $Count = $Count + 1;
}
fclose($fh);

//check if we're the main page
if ( $episode == "latest" || $episode == "")
{
  $episode = $Count - 1;
  $part = $numParts[$episode];
  $bepisode = "true";
}

//check if the part is missing
if ( $part == "latest" || $episode == "")
{
  $part = $numParts[$episode];
}

?>

<tr align="center" valign="top">
  <th height="20" width="600" align="center">
<?php
  //Go to first part of episode
  echo "<a href = \"?epsiode=".$episode."&part=1\">First</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"?epsiode=".$episode."&part=".$previous."\">Previous</a>";
    echo " &#135 ";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous</a>";
    echo " &#135 ";
  }
  
  //Create link for next part, but don't let us go into the future
  $next = $part + 1;
  if(!($next > $numParts[$episode]))
  {
	  echo "<a href = \"?epsiode=".$episode."&part=".$next."\">Next</a>";
    echo " &#135 ";
  }
  else if(!($episode >= sizeof($folder)-1))
  {
    $nextEpisode = $episode + 1;
    echo "<a href = \"?epsiode=".$nextEpisode."&part=0\">Next</a>";
    echo " &#135 ";
  }
?>
    <a href="http://www.redbrickroadstudios.com/">Latest</a></th>
  <td height="20" width="160" align="left">&nbsp;</td>
</tr>
<tr align="left" valign="top"> 
    <td width="600" align="left">
<?php
if($episode == 1 && $part > 0 && $part < 25)
{
  //Display comic
	echo "<img src=\"../images/episodes/".$folder[$episode]."/".$episode.".".$part.".jpg\" alt=\"episode ".$folder[$episode].", part ".$part."\" width=\"600\"></td>";
}
else
{
  //Display comic
	echo "<img src=\"../images/episodes/".$folder[$episode]."/".$episode.".".$part.".png\" alt=\"episode ".$folder[$episode].", part ".$part."\" width=\"600\"></td>";
}		
  //Title of episode
  echo "<td width=\"160\"> <p>Episode ".$folder[$episode].": <br>".$title[$episode]."</p>";
?>

      <p><font color="#999999" size="2" face="Verdana, Arial, Helvetica, sans-serif">

<?php

//Create links for other parts of episode
for($i = 1; $i <= $numParts[$episode]; $i++)
{
	echo "<a href = \"?epsiode=".$episode."&part=".$i."\">Part ".$i."</a><br>";
}

?>

</font></p>
      <?php
$FileName = "../posts/ep".$episode.".".$part."post.txt";
$file = fopen($FileName, 'r');
$rant = fread($file, filesize($FileName));
echo "<p>".$rant."</p>";
fclose($fh);


$FileName = "../rants/ep".$episode.".".$part."rant.html";
$file = fopen($FileName, 'r');
if( $file )
{
?>
<table align='center'>
  <tr>
    <td align="center">
      <?php echo "<a href=\"".$FileName."\">"?>
      <img src="images/rant_tag.png" alt="link to associated rant" width="100" height="120" border="0">
        </a>
      </td>
  </tr>
</table>
<?php
}
?>

    </td>
  </tr>
  <tr align="left" valign="top"> 
    <th width="600" height="9" align="left" td> <div align="left"> 
        <p align="center">
<?php
  //Go to first part of episode
  echo "<a href = \"?epsiode=".$episode."&part=1\">First</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"?epsiode=".$episode."&part=".$previous."\">Previous</a>";
    echo " &#135 ";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous</a>";
    echo " &#135 ";
  }
  
  //Create link for next part, but don't let us go into the future
  $next = $part + 1;
  if(!($next > $numParts[$episode]))
  {
	  echo "<a href = \"?epsiode=".$episode."&part=".$next."\">Next</a>";
    echo " &#135 ";
  }
  else if(!($episode >= sizeof($folder)-1))
  {
    $nextEpisode = $episode + 1;
    echo "<a href = \"?epsiode=".$nextEpisode."&part=0\">Next</a>";
    echo " &#135 ";
  }
?>
          <a href="http://www.redbrickroadstudios.com/">Latest</a>
    </th>

</p>
</div>
</th>
</tr>
</br>
  <?php readfile("../footer.html"); ?>

</table>

</body>
</html>