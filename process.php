<?php
session_start();

$mysql = new mysqli('localhost', 'root', '', 'loty') or die(mysqli_error($mysql));

$id = 0;
$update = FALSE;
$name = '';
$surname = '';
$sex = '';
$country = '';
$notes = '';
$birth = '';
$flylist = '';
//when button save is click and there is something in both inputs do a query
if (isset($_POST['save'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];    
    $sex = $_POST['sex'];    
    $country = $_POST['country'];    
    $notes = $_POST['notes'];    
    $birth = $_POST['birth'];    
    $flylist = $_POST['flylist'];    
    
    $mysql->query("INSERT INTO turist (name, surname, sex, country, notes, birth, flylist ) VALUES('$name', '$surname', '$sex', '$country', '$notes', '$birth', '$flylist' )") or 
            die($mysql->error());
    //session only when insert     
    $_SESSION['message'] = "Record have been saved";
    $_SESSION['msg_type'] = "success";

    header('location:index.php');

}
//when there is variable in link, when click the button edit
if (isset($_GET['delete'])){
    $id = $_GET['delete'];   

    $mysql->query("DELETE FROM turist WHERE id = $id") or 
            die($mysql->error());
    //session only when delete
    $_SESSION['message'] = "Record have been deleted";
    $_SESSION['msg_type'] = "danger";
    
    //when there is a $_GET we do not use header because the message in session is not displayed
    // header('location:index.php');

}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = TRUE;

    $result = $mysql->query("SELECT * FROM turist WHERE id = $id") or die($mysql->error());

        //code below works only if there is a 1 record in the base, otherwise if there is't a record it wont work 
    if ($result->num_rows==1){
        //fetch_array() returns one array with both numeric keys, and associative strings
        $row = $result->fetch_array();
        $name = $row['name'];
        $surname = $row['surname'];    
        $sex = $row['sex'];    
        $country = $row['country'];    
        $notes = $row['notes'];    
        $birth = $row['birth'];    
        $flylist = $row['flylist'];
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];    
    $sex = $_POST['sex'];    
    $country = $_POST['country'];    
    $notes = $_POST['notes'];    
    $birth = $_POST['birth'];    
    $flylist = $_POST['flylist'];

    $result = $mysql->query("UPDATE turist SET name='$name', surname='$surname', sex='$sex' country='$country', notes='$notes', birth='$birth', flylist='$flylist' WHERE id='$id'") or die($mysql->error());

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";

    header('location:index.php');
}

?>



