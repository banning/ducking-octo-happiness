<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><!-- InstanceBegin template="/Templates/master.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<link rel="stylesheet" href="../../rbr.css" type="text/css">
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
  <!-- InstanceBeginRepeat name="site banner" --><!-- InstanceBeginRepeatEntry --> 
  <tr align="left" valign="top"> 
    <td height="60" colspan="2"><script type="text/javascript"><!--
google_ad_client = "pub-9293394532851035";
/* first top banner */
google_ad_slot = "3273254139";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></td>
  </tr>
  <tr align="center" valign="top">
    <td colspan="2" height="64"><img src="../../images/simple_banner3.png" alt="red brick road studios: run into the fog knowing only the key direction" width="760" height="64"></td>
  </tr>
  <!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --> <!-- InstanceBeginRepeat name="site links" --><!-- InstanceBeginRepeatEntry -->

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

?>

<tr align="center" valign="top">
  <td colspan="2" height="20">
    <img src="../../images/links.png" alt="home about strips episodes walden pond grimoire links contact" width="760" height="20" border="0" usemap="#Map">
      <map name="Map">
        <area shape="rect" coords="66,1,116,18" href="../../home.html" alt="home">
        <area shape="rect" coords="134,1,183,18" href="../../about.html" alt="about">
        <area shape="rect" coords="199,1,250,19" href="../../strips/strip_archive.php" alt="strips">
        <area shape="rect" coords="266,1,333,20" href="../episodes/ep_archive.html" alt="episodes">
        <area shape="rect" coords="353,0,451,20" href="../../pond.html" alt="walden pond">
        <area shape="rect" coords="465,2,537,18" href="../../grimoire.html" alt="grimoire">
        <area shape="rect" coords="550,3,598,19" href="../../links.html" alt="links">
        <area shape="rect" coords="611,1,676,20" href="mailto:contact@redbrickroadstudios.com" alt="contact">
      </map>
  </td>
</tr>
<!-- InstanceEndRepeatEntry -->
<!-- InstanceEndRepeat -->
<tr align="center" valign="top">
  <td colspan="2" height="5">
    <!-- InstanceBeginRepeat name="hor bar" -->
    <!-- InstanceBeginRepeatEntry -->
    <img src="../../images/hor_line.png" alt="horizontal red line" width="760" height="5">
      <!-- InstanceEndRepeatEntry -->
      <!-- InstanceEndRepeat -->
  </td>
</tr>
<!-- InstanceBeginEditable name="body" -->
<tr align="center" valign="top">
  <th height="20" width="600" align="center">
<?php
  //Go to first part of episode
  echo "<a href = \"episode.php?epsiode=".$episode."&part=1\">First</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"episode.php?epsiode=".$episode."&part=".$previous."\">Previous</a>";
    echo " &#135 ";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"episode.php?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous</a>";
    echo " &#135 ";
  }
  
  //Create link for next part, but don't let us go into the future
  $next = $part + 1;
  if(!($next > $numParts[$episode]))
  {
	  echo "<a href = \"episode.php?epsiode=".$episode."&part=".$next."\">Next</a>";
    echo " &#135 ";
  }
  else if(!($episode >= sizeof($folder)-1))
  {
    $nextEpisode = $episode + 1;
    echo "<a href = \"episode.php?epsiode=".$nextEpisode."&part=0\">Next</a>";
    echo " &#135 ";
  }
?>
    <a href="../../home.html">Latest</a></th>
    <td height="20" width="160" align="left">&nbsp;</td>
  </tr>
  <tr align="left" valign="top"> 
    <td width="600" align="left">
<?php
//Display comic
	echo "<img src=\"../../images/episodes/".$folder[$episode]."/".$episode.".".$part.".png\" alt=\"episode ".$folder[$episode].", part ".$part."\" width=\"600\"></td>";
	echo "<td width=\"160\"> <p>Episode ".$folder[$episode].": <br>".$title[$episode]."</p>";
?>

      <p><font color="#999999" size="2" face="Verdana, Arial, Helvetica, sans-serif">

<?php
//Create links for other parts of episode
for($i = 1; $i <= $numParts[$episode]; $i++)
{
	echo "<a href = \"episode.php?epsiode=".$episode."&part=".$i."\">Part ".$i."</a><br>";
}
?>

</font></p>
      <?php
$FileName = "../posts/ep".$episode.".".$part."post.txt";
$file = fopen($FileName, 'r');
$rant = fread($file, filesize($FileName));
echo "<p>".$rant."</p>";
fclose($fh);
?>
    </td>
  </tr>
  <tr align="left" valign="top"> 
    <th width="600" height="9" align="left" td> <div align="left"> 
        <p align="center">
<?php
  //Go to first part of episode
  echo "<a href = \"episode.php?epsiode=".$episode."&part=1\">First</a>";
 	echo " &#135 ";
  
  //Create link for previous part, but don't let things go negative
  $previous = $part - 1;
  if(!($previous < 0))
  {
	  echo "<a href = \"episode.php?epsiode=".$episode."&part=".$previous."\">Previous</a>";
    echo " &#135 ";
  }
  else if ($episode > 1)
  {
    $previousEpisode = $episode - 1;
    $previousPart = $numParts[$previousEpisode];
    echo "<a href = \"episode.php?epsiode=".$previousEpisode."&part=".$previousPart."\">Previous</a>";
    echo " &#135 ";
  }
  
  //Create link for next part, but don't let us go into the future
  $next = $part + 1;
  if(!($next > $numParts[$episode]))
  {
	  echo "<a href = \"episode.php?epsiode=".$episode."&part=".$next."\">Next</a>";
    echo " &#135 ";
  }
  else if(!($episode >= sizeof($folder)-1))
  {
    $nextEpisode = $episode + 1;
    echo "<a href = \"episode.php?epsiode=".$nextEpisode."&part=0\">Next</a>";
    echo " &#135 ";
  }
?>
<a href="../../home.html">Latest</a>
</p>
</div>
</th>
<td width="160" height="9">&nbsp;</td>
</tr>
<!-- InstanceEndEditable --> <!-- InstanceBeginRepeat name="bottom ad space" --><!-- InstanceBeginRepeatEntry --> 
  <tr align="left" valign="top"> 
    <th height="10" colspan="2" td>&nbsp;</th>
  </tr>
  <tr align="left" valign="top">
    <th height="29" colspan="2" td><a href="http://www.1and1.com/?k_id=11139974"target="_blank"><img src="../../images/ad1.png" width="600" height="60" border="0"></a></th>
  </tr>
  <!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat --> 
</table>

</body>
<!-- InstanceEnd --></html>