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
  
  <tr align="center" valign="top">
    <th width="600" align="center">
      <div align="center">
        <table width="100%" height="100%" cellpadding="10">
          <tr>
            <td align="left" valign="top">
              <div align="left">
                <p>Strip Archive:</p>
                <p>
                  <?php
  $FileName = "Strip_List.txt";
  $file = fopen($FileName, 'r');
  while (!feof($file))
  {
    $comic = fgets($file);
    $number = explode(" ",$comic);
    echo "<a href=\"strips/?number=".$number[0]."\">".$comic."</a><br>";
  }
  fclose($fh);
?>
                </p>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </th>
    <td width="160" align="left">
      <p>
        <img src="images/banners/gagstrips2.png" width="160" height="600">
      </p>
    </td>
  </tr>
  <?php readfile("footer.html"); ?>
</table>

</body>
<!-- InstanceEnd -->
</html>
