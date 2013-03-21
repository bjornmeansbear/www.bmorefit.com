<?php
/* ----------------------------------------------------------------------------------------
Graceful E-Mail Obfuscation - Prepend this file using Apache's auto_prepend_file directive
Last updated: July 31th, 2007 by Roel Van Gils
---------------------------------------------------------------------------------------- */
$test = "blah";

require_once("geo.phpclass.php");
$geo = new geo;
$geo->root = "http://www.feelleangroovy.com/email/"; // Full server path (include trailing slash)
$geo->setTooltipNoJS("To reveal this e-mail address, you\'ll need to answer a simple question"); // When JavaScript is unavailable, this title is added to e-mail links
$geo->setTooltipJS("Send e-mail"); // When JavaScript is available, tooltip will be replaced by this one
$geo->setFolder("mail"); // Choose a faux folder name (update .htaccess as well if you choose something else than 'contact')
$geo->go(); // Encode e-mail links
?>

<?php
  // find out the domain:
  $domain = $_SERVER['HTTP_HOST'];
  // find out the path to the current file:
  $path = $_SERVER['SCRIPT_NAME'];
  // find out the QueryString:
  $queryString = $_SERVER['QUERY_STRING'];
  // put it all together:
  $url = "http://" . $domain . $path . "?" . $queryString;
  echo "The current URL is: " . $url . "<br />";
  
  // An alternative way is to use REQUEST_URI instead of both
  // SCRIPT_NAME and QUERY_STRING, if you don't need them seperate:
  $url2 = "http://" . $domain . $_SERVER['REQUEST_URI'];
  echo "The alternative way: " . $url2;
?>