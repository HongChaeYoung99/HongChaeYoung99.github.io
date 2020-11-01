<?php
  $link = mysqli_connect('localhost', 'admin', 'admin', 'sakila');
  $query = "SELECT category.name, film_category.category_id, city.city_id, city.city,count(store.store_id)
  from film_category
  inner join category
  on film_category.category_id = category.category_id
  inner join film
  on film_category.film_id = film.film_id 
  inner join inventory
  on film.film_id = inventory.film_id
  inner join store
  on inventory.store_id = store.store_id
  inner join address
  on store.address_id = address.address_id
  inner join city
  on address.city_id = city.city_id
  group by category.category_id,city.city_id
  order by category.category_id, count(store.store_id) desc;";
  $result = mysqli_query($link, $query);  
  $emp_info = '';

  
  while($row = mysqli_fetch_array($result)) {
    $emp_info .= '<tr>';
    $emp_info .= '<td>'.$row['name'].'</td>';
    $emp_info .= '<td>'.$row['category_id'].'</td>';
    $emp_info .= '<td>'.$row['city_id'].'</td>';
    $emp_info .= '<td>'.$row['city'].'</td>';
    $emp_info .= '<td>'.$row['count(store.store_id)'].'</td>';
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
    <h2><a href="index.php">영화 관리 시스템</a> | STORE</h2>
    <p>영화카테고리별로 물품을 구매한 store가 많이 위치한 도시를 출력했습니다.</p>
    <table border="1">
        <tr>
            <th>카테고리 이름</th>
            <th>카테고리 id</th>
            <th>도시 id</th>
            <th>도시</th>
            <th>store 개수</th>
        </tr>
        <?= $emp_info ?>

    </table>
</body>

</html>