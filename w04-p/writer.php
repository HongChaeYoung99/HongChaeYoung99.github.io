<?php
    $link = mysqli_connect('localhost', 'root', 'rootroot', 'dbp');
    $query = "SELECT * FROM writer";
    $result = mysqli_query($link, $query);
    $writer_info = '';
    while ($row=mysqli_fetch_array($result)) {
        $filtered= array(
        'id'=>htmlspecialchars($row['id']),
        'name'=>htmlspecialchars($row['name']),
        'profile'=>htmlspecialchars($row['profile'])
      );
        $writer_info .='<tr>';
        $writer_info .='<td>'.$filtered['id'].'</td>';
        $writer_info .='<td>'.$filtered['name'].'</td>';
        $writer_info .='<td>'.$filtered['profile'].'</td>';
        $writer_info .='<td><a href ="writer.php?id='.$filtered['id'].'">update</a></td>';
        $writer_info .= '
        <td>
           <form action="process_delete_writer.php" method="post">
               <input type="hidden" name="id" value="'.$filtered['id'].'">
               <input type="submit" value="delete">
           </form>
        </td>
       ';
        $writer_info .='</tr>';
    }
    $escaped = array(
          'name' => '',
          'profile' => ''
      );
      $label_submit = 'Create writer';
      $form_action = 'process_create_writer.php';
      $form_id = '';
      if (isset($_GET['id'])) {
          $filtered_id = mysqli_real_escape_string($link, $_GET['id']);
          settype($filtered_id, 'integer');
          $query = "SELECT * FROM writer WHERE id = {$filtered_id}";
          $result = mysqli_query($link, $query);
          $row = mysqli_fetch_array($result);
          $escaped['name'] = htmlspecialchars($row['name']);
          $escaped['profile'] = htmlspecialchars($row['profile']);
          $label_submit = 'Update writer';
          $form_action = 'process_update_writer.php';
          $form_id = '<input type="hidden" name="id" value="'.$_GET['id'].'">';
      };

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ANIMATION</title>
    </head>
    <body>
        <h1><a href="index.php">ANIMATION</a></h1>
        <p><a href="index.php">ani</a></p>
        <table border="1">
          <tr>
            <th>id</th>
            <th>name</th>
            <th>profile</th>
          </tr>
          <?=$writer_info?>
        </table>
        <br>
        <form action="<?=$form_action?>" method="post">
            <?=$form_id?>
            <label for="fname">name:</label><br>
            <input type="text" id="name" name="name" placeholder="name" value="<?=$escaped['name']?>"><br>
            <label for="lname">profile:</label><br>
            <input type="text" id="profile" name="profile" placeholder="profile" value="<?=$escaped['profile']?>"><br><br>
            <input type="submit" value="<?=$label_submit?>">
        </form>


        <br>

    </body>
</html>
