<?php
// الاتصال بقاعدة البيانات
$con = mysqli_connect("localhost", "root", "", "chat");
if (!$con) {
    die("فشل الاتصال: " . mysqli_connect_error());
}

// إنشاء الجدول إذا لم يكن موجود
$createTable = "CREATE TABLE IF NOT EXISTS chat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    msg TEXT NOT NULL,
    data DATETIME NOT NULL
)";
mysqli_query($con, $createTable);
?>