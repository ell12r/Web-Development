<?php

require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $content = $_POST["content"];
  $author = $_POST["author"];
  
  $sql = "INSERT INTO blog_posts (title, content, author, date_created) VALUES ('$title', '$content', '$author', NOW())";
  
  if (mysqli_query($conn, $sql)) {
    echo "Blog post added successfully.";
  } else {
    echo "Error adding blog post: " . mysqli_error($conn);
  }
  
  mysqli_close($conn);
}

?>

<form method="post">
  <label>Title:</label><br>
  <input type="text" name="title"><br>
  <label>Content:</label><br>
  <textarea name="content"></textarea><br>
  <label>Author:</label><br>
  <input type="text" name="author"><br>
  <input type="submit" value="Add Post">
</form>
