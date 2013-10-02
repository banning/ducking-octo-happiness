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
  <!-- RANTS -->
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
$FileName = "../episodes/Episode_List.txt";
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


if ($handle = opendir("")) 
{
    $rCount = 0;
    while (false !== ($file = readdir($handle))) 
    {
            $rants[$rCount] = $file;
            if($file == "ep".$episode.".".$part."rant.txt")
            {
              $current = $rCount;
            }
            $rCount = $rCount + 1;
    }
    closedir($handle);
}
?>

<tr align="center" valign="top">
  <th height="20" width="600" align="center">
<?php
if( !$bepisode)
{
  //Go to first part of episode
  echo "<a href = \"?epsiode=2&part=6\">First</a>";
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
<?php 
} 

else
{ 
?>
    <div align="center"><a href="episodes/I/ep1.1.html">Episode 
        I: Part 1</a> &#135;
<?php
  //Go to first part of episode
  echo "<a href = \"?epsiode=".$episode."&part=1\">Episode ".$folder[$episode].": Part 1</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"?epsiode=".$episode."&part=".$previous."\">Previous Part</a>";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous Part</a>";
  }
  echo "</div></th>";
}
?>
  <td height="20" width="160" align="left">&nbsp;</td>
</tr>
  <tr align="left" valign="top">
    <td height="1344" td="" width="600" align="left">
      <table width="100%" border="0" cellpadding="10">
        <tr>
          <td>
            <p>&nbsp;</p>
            <p>
              <font color="#000000">____</font>
<?php
$FileName = "ep".$episode.".".$part."rant.txt";
$file = fopen($FileName, 'r');
$rant = fread($file, filesize($FileName));
echo "<p>".$rant."</p>";
fclose($fh);
?>

<p>
  <font color="#999999" size="2" face="Verdana, Arial, Helvetica, sans-serif">

</font></p>
      <?php

if( $bepisode )
{
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
<?php 
}
else
{
$FileName = "rants/ep".$episode.".".$part."rant.html";
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
}
?>

    </td>
  </tr>
  <tr align="left" valign="top"> 
    <th width="600" height="9" align="left" td> <div align="left"> 
        <p align="center">
<?php
if( !$bepisode)
{
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
    <?php 
} 

else
{ 
?>
    <div align="center">
      <a href="episodes/I/ep1.1.html">
        Episode
        I: Part 1
      </a> &#135;
      <?php
  //Go to first part of episode
  echo "<a href = \"?epsiode=".$episode."&part=1\">Episode ".$folder[$episode].": Part 1</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"?epsiode=".$episode."&part=".$previous."\">Previous Part</a>";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous Part</a>";
  }
  echo "</div></th>";
}
?>
</p>
</div>
</th>
</tr>
</br>
  <?php readfile("../footer.html"); ?>

</table>

</body>
</html>