<?php
session_start();

$mysql = new mysqli('localhost', 'root', '', 'loty') or die(mysqli_error($mysql));

$id = 0;
$update = FALSE;
$departure = '';
$arrival = '';
$seats = '';
$tourist = '';
$price = '';

//when button save is click and there is something in both inputs do a query
if (isset($_POST['save'])){
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];    
    $seats = $_POST['seats'];    
    $tourist = $_POST['tourist'];    
    $price = $_POST['price'];    
   
    $mysql->query("INSERT INTO flights (departure, arrival, seats, tourist, price) VALUES('$departure', '$arrival', '$seats', '$tourist', '$price')") or 
            die($mysql->error());
    //session only when insert     
    $_SESSION['message'] = "Record have been saved";
    $_SESSION['msg_type'] = "success";

    header('location:flights.php');

}
//when there is variable in link, when click the button edit
if (isset($_GET['delete'])){
    $id = $_GET['delete'];   

    $mysql->query("DELETE FROM flights WHERE id = $id") or 
            die($mysql->error());
    //session only when delete
    $_SESSION['message'] = "Record have been deleted";
    $_SESSION['msg_type'] = "danger";
    
    //when there is a $_GET we do not use header because the message in session is not displayed
    header('location:flights.php');

}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = TRUE;

    $result = $mysql->query("SELECT * FROM flights WHERE id = $id") or die($mysql->error());

        //code below works only if there is a 1 record in the base, otherwise if there is't a record it wont work 
    if ($result->num_rows==1){
        //fetch_array() returns one array with both numeric keys, and associative strings
        $row = $result->fetch_array();
        $departure = $row['departure'];
        $arrival = $row['arrival'];    
        $seats = $row['seats'];    
        $tourist = $row['tourist'];    
        $price = $row['price']; 
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $departure = $_POST['departure'];
    $arrival = $_POST['arrival'];    
    $seats = $_POST['seats'];    
    $tourist = $_POST['tourist'];    
    $price = $_POST['price']; 

    $result = $mysql->query("UPDATE flights SET departure='$departure', arrival='$arrival', seats='$seats' tourist='$tourist', price='$price' WHERE id='$id'") or die($mysql->error());

    $_SESSION['message'] = "Record has been updated";
    $_SESSION['msg_type'] = "warning";

    header('location:flights.php');
}

?>



