<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT actor.actor_id, actor.first_name, actor.last_name, count(*)
  from actor
  inner join film_actor
  on actor.actor_id = film_actor.actor_id
  group by actor.actor_id
  order by count(*) desc;";
  $result = mysqli_query($link, $query);  
  $emp_info = '';

  
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['actor_id'].'</td>';
    $emp_info .= '<td>'.$row['first_name'].'</td>';
    $emp_info .= '<td>'.$row['last_name'].'</td>';
    $emp_info .= '<td>'.$row['count(*)'].'</td>';
    $emp_info .= '</tr>';
  }  
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> 영화 관리 시스템 </title>
</head>

<body>
    <h2><a href="index.php">영화 관리 시스템</a> | ACTOR</h2>
    <p>영화에 가장 많이 출연한 배우 순위</p>
    <table border="1">
        <tr>
            <th>배우id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>출연작 개수</th>
        </tr>
        <?= $emp_info ?>

    </table>
</body>

</html>