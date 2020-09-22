<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
  $query = "SELECT * FROM animation;";
  $result = mysqli_query($link, $query);
  $list = '';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list. "<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => 'Welcome',
    'description' => 'ANIMATION is ...'
  );
  $update_link ='';
  $delete_link ='';
  $author = '';
  if (isset($_GET['id'])) {
      $query = "SELECT * FROM animation LEFT JOIN writer ON
      animation.writer_id = writer.id WHERE animation.id ={$_GET['id']}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article['title']= htmlspecialchars($row['title']);
      $article['description']=htmlspecialchars($row['description']);
      $article['name'] = htmlspecialchars($row['name']);

      $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
      $author = "<p>by {$article['name']}</p>";

      $delete_link = '
  <form action="process_delete.php" method="POST">
    <input type="hidden" name="id" value="'.$_GET['id'].'">
    <input type="submit" value="delete">
  </form>
  ';
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>ANIMATION</title>
</head>
<body>
  <h1><a href="index.php"> ANIMATION </a></h1>
  <a href="writer.php">writer</a>
  <ol> <?=$list ?> </ol>
  <a href="create.php">create</a>
  <?= $update_link ?>
  <?= $delete_link ?>
  <h2> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?>
  <?= $author ?>
</body>
</html>
