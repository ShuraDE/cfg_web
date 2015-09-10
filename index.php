<html><head></head><body><a name="top"></a>
<?php if (($_SERVER['HTTP_REFERER']=="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) &&(!empty($_POST))){ extract($_POST);}
if ($Submit){
  $db = mysql_connect("localhost","usr","pw");
  mysql_select_db ("db") or die ("Sorry, database Problems.");
  $result = mysql_query ("SELECT * FROM AOBJ_ITEM WHERE classname LIKE '%$classname%'") or die ("Sorry no results. <a href=\"javascript:history.go(-1);\">Please try again</a>.");
  $numrs = mysql_num_rows($result);
  if ($numrs ==0){
  print ("<font face=\"Arial\">Your search yielded 0 results. <a href=\"javascript:history.go(-1);\">Try again</a>.</font>");}
  if ($numrs !=0){
  print ("<p><font face=\"Arial\"><b>results: $numrs records.</b><hr width=\"400\" align=\"left\">");
  print "<table></font>";
  while ($line = mysql_fetch_assoc($result)) {
  $TableLine = $line["classname"];
  $TableLine1 = $line["parent"];
  print "<tr><td><p>$TableLine</td><td><p>$TableLine1</td></tr><tr><td><hr width=\"80%\" align=\"left\"></td></tr>";}
  print "<tr><td align=center><p><b><a href=\"#top\"><font face=Arial size=2><b>Back To Top</a> | <font face=Arial size=2><b><a href=\"javascript:history.go(-1);\">Search Again</a></td></tr>";
  print "</table>";}
  mysql_close($db);
}
if (!$Submit){
  print ("<form method \"POST\" action=\"<? echo $_SERVER['PHP_SELF']; ?>\">Search classname: <input name=\"classname\" size=\"40\" maxlength=\"255\"><br>");
  print ("<input type=\"Submit\" name=\"Submit\" value=\"Go\"></form>");
}
?>
</body></html>
