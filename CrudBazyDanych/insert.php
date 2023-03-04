<?php
 
 $pdo = new PDO("mysql:host=localhost;dbname=testowa;charset=utf8", 'root', '');


if (isset($_POST['empAdd']) == TRUE) {
    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $userId = $_POST['userId'];
    $s_date = $_POST['start_date'];
    $comments = $_POST['comments'];
    $title_name = $_POST['title'];
    $manager_id = $_POST['managerId'];
    $dept = $_POST['deptId'];
    $salary = $_POST['salary'];


    $stmt = $pdo->prepare("INSERT INTO emp VALUES (NULL, '$l_name', '$f_name', '$userId', '$s_date', '$comments', '$manager_id', '$title_name', '$dept', '$salary', NULL)");

    $stmt->execute();

    header("index.php");
}else {
    echo "Nie powiodlo sie ";
}



header("Location: index.php");

?>