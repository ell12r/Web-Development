<?php

require_once("config.php");

$sql = "SELECT * FROM blog_posts ORDER BY date_created DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>" . $row["title"] . "</h2>";
    echo "<p>" . $row["content"] . "</p>";
    echo "<p>By " . $row["author"] . " on " . $row["date_created"] . "</p>";
    echo "<hr>";
  }
} else {
  echo "No blog posts found.";
}

mysqli_close($conn);

?>
