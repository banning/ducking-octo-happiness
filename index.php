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
  <!-- Main Page -->
<body><div align="center">
  
<table width="650" border="0">

  <?php readfile("header.html"); ?>

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
$FileName = "episodes/Episode_List.txt";
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

  $episode = $Count - 1;
  $part = $numParts[$episode];
  $bepisode = "true";

?>

<tr align="center" valign="top">
  <th height="20" width="600" align="center">

    <div align="center">
<?php
  //Go to first episode
  echo "<a href = \"episodes/?epsiode=1&part=1\">Episode 1: Part 1</a>";
 	echo " &#135 ";
  
  //Go to first part of episode
  echo "<a href = \"episodes/?epsiode=".$episode."&part=1\">Episode ".$folder[$episode].": Part 1</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"episodes/?epsiode=".$episode."&part=".$previous."\">Previous Part</a>";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"episodes/?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous Part</a>";
  }
  echo "</div></th>";
?>
    <td height="20" width="160" align="left">&nbsp;</td>
  </tr>
<tr align="left" valign="top">
<td width="600" align="left">
  <?php
  //Display comic
	echo "<img src=\"images/episodes/".$folder[$episode]."/".$episode.".".$part.".png\" alt=\"episode ".$folder[$episode].", part ".$part."\" width=\"600\"></td>";
	
  //Title of episode
  echo "<td width=\"160\"> <p>Episode ".$folder[$episode].": <br>".$title[$episode]."</p>";
?>

  <p>
    <font color="#999999" size="2" face="Verdana, Arial, Helvetica, sans-serif">

    </font>
  </p>
  <?php
$FileName = "posts/ep".$episode.".".$part."post.txt";
$file = fopen($FileName, 'r');
$rant = fread($file, filesize($FileName));
echo "<p>".$rant."</p>";
fclose($fh);

?>
  <table align='center'>
    <tr>
      <td align="center">
        <a href="home_rant.html">
          <img src="images/rant_tag.png" alt="link to associated rant" width="100" height="120" border="0">
          </a>
      </td>
    </tr>
    <tr>
      <td align='center'>
        <a href='http://www.buzzcomix.net/in.php?id=rbrstudios'>
          <img src='http://www.buzzcomix.net/vote/vote-small.gif' border='0'>
          </a>
      </td>
    </tr>
  </table>
</td>
</tr>
<tr align="left" valign="top">
<th width="600" height="9" align="left" td="">
  <div align="left">
    <p align="center">
      <div align="center">
        <?php
      
  //Go to first episode
  echo "<a href = \"episodes/?epsiode=1&part=1\">Episode 1: Part 1</a>";
 	echo " &#135 ";
  
  //Go to first part of episode
  echo "<a href = \"episodes/?epsiode=".$episode."&part=1\">Episode ".$folder[$episode].": Part 1</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"episodes/?epsiode=".$episode."&part=".$previous."\">Previous Part</a>";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"episodes/?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous Part</a>";
  }
  echo "</div></th>";
?>
</p>
</div>
</th>
</tr>
</br>
  <?php readfile("footer.html"); ?>

</table>

</body>
</html>