<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT category.name name_1, film_category.category_id, language.name, language.language_id, count(film.film_id)
  FROM film_category
  inner join category
  on film_category.category_id = category.category_id
  inner join film
  on film_category.film_id = film.film_id 
  inner join language
  on film.language_id = language.language_id
  group by category.category_id,language.language_id
  order by category.category_id,count(language.language_id) desc;";
  $result = mysqli_query($link, $query);  
  $emp_info = '';

  
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['name_1'].'</td>';
    $emp_info .= '<td>'.$row['category_id'].'</td>';
    $emp_info .= '<td>'.$row['name'].'</td>';
    $emp_info .= '<td>'.$row['language_id'].'</td>';
    $emp_info .= '<td>'.$row['count(film.film_id)'].'</td>';
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
    <h2><a href="index.php">영화 관리 시스템</a> | 언어</h2>
    <p>영화의 카테고리별로 가장 많이 사용된 언어와 그 언어로 만들어진 영화의 개수입니다.</p>
    <table border="1">
        <tr>
            <th>카테고리 이름</th>
            <th>카테고리 id</th>
            <th>사용 언어</th>
            <th>언어 id</th>
            <th>영화의 개수</th>
        </tr>
        <?= $emp_info ?>

    </table>
</body>

</html>