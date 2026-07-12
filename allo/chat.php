<?php
include("db.php");

$query = "SELECT * FROM chat ORDER BY id ASC";
$run = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($run)) {
    $name = htmlspecialchars($row['name']);
    $msg = htmlspecialchars($row['msg']);
    $date = date("H:i", strtotime($row['data']));
    
    // تحديد نوع الرسالة (مرسلة أو مستلمة)
    $class = ($name == 'Your_Name') ? 'sent' : 'received'; // يمكنك تغيير "Your_Name" لاسم المستخدم الحالي

    echo "<div class='message $class'>";
    echo "<span class='avatar'>" . strtoupper(substr($name, 0, 1)) . "</span>";
    echo "<span class='name'>$name</span>";
    echo "<div class='text'>$msg</div>";
    echo "<div class='time'>$date</div>";
    echo "</div>";
}
?>