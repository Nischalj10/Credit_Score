<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "Nischal";
 $dbpass = "@Ushayashwant10";
 $db = "testnj";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>