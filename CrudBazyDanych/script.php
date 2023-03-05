<?php
 
 $pdo = new PDO("mysql:host=localhost;dbname=testowa;charset=utf8", 'root', '');


if (isset($_GET['empAdd']) == TRUE) {
    $f_name = $_GET['first_name'];
    $l_name = $_GET['last_name'];
    $userId = $_GET['userId'];
    $s_date = $_GET['start_date'];
    $comments = $_GET['comments'];
    $title = $_GET['title'];
    $manager_id = $_GET['managerId'];
    $dept = $_GET['deptId'];
    $salary = $_GET['salary'];


    $stmt = $pdo->prepare("INSERT INTO emp VALUES (NULL, '$l_name', '$f_name', '$userId', '$s_date', '$comments', '$manager_id', '$title', '$dept', '$salary', NULL)");

    $stmt->execute();

    header("Location: index.php");
    
}else if(isset($_GET['empUpdate']) == TRUE){
    $id = $_GET['emp_id'] ?? null;
    $f_name = $_GET['first_name'] ?? null;
    $l_name = $_GET['last_name'] ?? null;
    $userId = $_GET['userId'] ?? null;
    $s_date = $_GET['start_date'] ?? null;
    $comments = $_GET['comments'] ?? null;
    $title = $_GET['title'] ?? null;
    $manager_id = $_GET['managerId'] ?? null;
    $dept = $_GET['deptId'] ?? null;
    $salary = $_GET['salary'] ?? null;

   

    $update = $pdo->query("UPDATE emp SET last_name='$l_name', first_name='$f_name', userid = '$userId', start_datee ='$s_date', comments = '$comments', manager_id = '$manager_id', title =  '$title', dept_id = '$dept', salary = '$salary' WHERE id='$id'");

    header("Location: index.php");
}else {
    echo "Nie powiodlo sie ";
}






?>