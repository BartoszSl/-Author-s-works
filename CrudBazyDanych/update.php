<?php
 
 $pdo = new PDO("mysql:host=localhost;dbname=testowa;charset=utf8", 'root', '');

if(isset($_POST['aktualizuj'] == TRUE)){
    $id = $_POST['id'];
    if (isset($_POST['empUpdate']) == TRUE) {
        $f_name = $_POST['first_name'];
        $l_name = $_POST['last_name'];
        $userId = $_POST['userId'];
        $s_date = $_POST['start_date'];
        $comments = $_POST['comments'];
        $title_name = $_POST['title'];
        $manager_id = $_POST['managerId'];
        $dept = $_POST['deptId'];
        $salary = $_POST['salary'];
    
        $stmt = $pdo->prepare("UPDATE emp SET first_name=$f_name, last_name=$l_name,  userid = $userId, start_date = $s_date, comments = $comments, manager_id = $manager_id, title =  $title_name, dept_id = $dept, salary = $salary WHERE id=$id");
    
        $stmt->execute();
    
        header("index.php");
    }else {
        echo "Nie powiodlo sie ";
    }

}





header("Location: index.php");

?>