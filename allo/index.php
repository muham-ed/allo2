<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تطبيق Allo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>تطبيق Allo</h1>
        <p>ابدأ المحادثة الآن!</p>
    </div>

    <div class="chat-container">
        <div class="chatbox" id="chat">
            </div>
    </div>

    <div class="form-container">
        <form id="chatForm">
            <div class="form-group">
                <input type="text" name="name" placeholder="اسمك" required>
                <input type="text" name="msg" placeholder="اكتب رسالتك..." required>
            </div>
            <button type="submit">إرسال</button>
        </form>
    </div>
</div>

<script>
// جلب الرسائل كل ثانية
function loadChat() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "chat.php", true);
    xhr.onload = function() {
        document.getElementById("chat").innerHTML = this.responseText;
        const chatbox = document.getElementById("chat");
        chatbox.scrollTop = chatbox.scrollHeight; // التمرير للأسفل تلقائيًا
    }
    xhr.send();
}
setInterval(loadChat, 1000);
loadChat();

// إرسال الرسائل بدون إعادة تحميل
document.getElementById("chatForm").onsubmit = function(e) {
    e.preventDefault();
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "send.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    const name = this.name.value;
    const msg = this.msg.value;
    xhr.onload = function() {
        document.getElementById("chatForm").reset();
        loadChat();
    }
    xhr.send("name=" + encodeURIComponent(name) + "&msg=" + encodeURIComponent(msg));
};
</script>

</body>
</html>