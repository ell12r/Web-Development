<?php

$db_host = "sql112.epizy.com"; // or your database host
$db_user = "epiz_33720922"; // or your database username
$db_pass = "@el2Rans"; // or your database password
$db_name = "epiz_33720922_blog_site_db";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>
