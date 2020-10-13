<?php
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    

    if(mysqli_connect_errno()){
        echo "Failed to connect to MariaDB: " . mysqli_connect_error();
        exit();
    }

    
    $query = "
        SELECT first_name, last_name, salary ,dept_name, dept_manager.emp_no
        FROM salaries 
        inner JOIN employees
        ON salaries.emp_no = employees.emp_no
        inner join dept_emp 
        on salaries.emp_no=dept_emp.emp_no 
        inner join departments
        on dept_emp.dept_no=departments.dept_no    
        inner join dept_manager
        on dept_emp.dept_no=dept_manager.dept_no  
        ORDER BY salary DESC
        LIMIT 10;
    ";


    $result = mysqli_query($link, $query);  
    $article = '';    
    while($row = mysqli_fetch_array($result)){
        $article .= '<tr><td>';
        $article .= $row["first_name"];
        $article .= '</td><td>';
        $article .= $row["last_name"];
        $article .= '</td><td>';
        $article .= $row["salary"];
        $article .= '</td><td>';
        $article .= $row["dept_name"];
        $article .= '</td><td>';
        $article .= $row["emp_no"];
        $article .= '</td></tr>';
    }
    
    mysqli_free_result($result);
    mysqli_close($link);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>연봉 정보</title>
    <style>
        body {
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>salary</th>
            <th>dept_name</th>
            <th>dept_manager.emp_no</th>
        </tr>        
        <?= $article ?>
    </table>
</body>

</html>