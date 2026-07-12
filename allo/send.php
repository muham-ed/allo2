<?php
include("db.php");

if(isset($_POST['name']) && isset($_POST['msg'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $msg = mysqli_real_escape_string($con, $_POST['msg']);

    $insert = "INSERT INTO chat (name, msg, data) VALUES ('$name', '$msg', NOW())";
    mysqli_query($con, $insert);
}
?>