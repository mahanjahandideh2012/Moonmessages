<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['password'] === '112233' && !empty($_POST['username'])) {
        $_SESSION['username'] = $_POST['username'];
    }
}

if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Messenger - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazir', Tahoma, sans-serif;
        }
        body {
            direction: rtl;
            min-height: 100vh;
            background: radial-gradient(ellipse at bottom, #1B2735 0%, #090A0F 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
        }
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite ease-in-out;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }
        .login-box {
            background: rgba(255,255,255,0.06);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 60px 50px;
            width: 90%;
            max-width: 480px;
            border: 1px solid rgba(255,255,255,0.1);
            box-shadow: 0 30px 70px rgba(0,0,0,0.6);
            text-align: center;
        }
        .logo h1 {
            color: white;
            font-size: 2.8rem;
            text-shadow: 0 0 40px rgba(102, 126, 234, 1);
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
        }
        .input-group {
            margin: 20px 0;
        }
        .input-group label {
            display: block;
            color: rgba(255,255,255,0.8);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        input {
            width: 100%;
            padding: 18px 25px;
            border-radius: 35px;
            border: 2px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.1);
            color: white;
            font-size: 1.2rem;
        }
        input:focus {
            outline: none;
            border-color: #667eea;
            background: rgba(102, 126, 234, 0.15);
        }
        button {
            width: 100%;
            padding: 18px;
            border: none;
            border-radius: 35px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            font-size: 1.3rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 25px;
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.5);
        }
        .password-info {
            margin-top: 20px;
            color: rgba(255,255,255,0.7);
            font-size: 1.1rem;
        }
        .password-info strong {
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="stars">
        <?php for($i = 0; $i < 80; $i++): ?>
            <div class="star" style="left: <?=rand(0,100)?>%; top: <?=rand(0,100)?>%; animation-delay: <?=rand(0,5)?>s;"></div>
        <?php endfor; ?>
    </div>

    <div class="login-box">
        <div class="logo">
            <h1>Moon Messenger</h1>
        </div>
        <form method="POST">
            <div class="input-group">
                <label>نام و نام خانوادگی</label>
                <input type="text" name="username" placeholder="نام و نام خانوادگی خود را وارد کنید" required>
            </div>
            <div class="input-group">
                <label>رمز ورود</label>
                <input type="password" name="password" placeholder="رمز ورود: 112233" required>
            </div>
            <button type="submit">ورود به چت</button>
            <div class="password-info">
                رمز ورود: <strong>112233</strong>
            </div>
        </form>
    </div>
</body>
</html>
<?php
} else {
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moon Messenger - Chat</title>
    <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Vazir', Tahoma, sans-serif;
        }
        body {
            direction: rtl;
            min-height: 100vh;
            background: radial-gradient(ellipse at bottom, #1B2735 0%, #090A0F 100%);
            overflow: hidden;
            position: relative;
        }
        .stars {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }
        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite ease-in-out;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }
        .chat-container {
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .header {
            padding: 15px 20px;
            background: rgba(255,255,255,0.08);
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .app-title {
            color: white;
            font-size: 1.4rem;
            font-weight: bold;
        }
        .status {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: #FF0000;
            box-shadow: 0 0 10px #FF0000;
        }
        .dot.online {
            background: #4CAF50;
            box-shadow: 0 0 10px #4CAF50;
        }
        .msgs {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 85px;
        }
        .msg {
            max-width: 80%;
            padding: 12px 16px;
            border-radius: 20px;
            margin: 8px 0;
            animation: slideIn 0.3s ease;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .my {
            background: linear-gradient(135deg, #4CAF50, #8BC34A);
            margin-left: auto;
            color: white;
        }
        .other {
            background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
            margin-right: auto;
            color: white;
        }
        .msg-header {
            font-size: 0.8rem;
            opacity: 0.8;
            margin-bottom: 5px;
        }
        .input-area {
            padding: 15px;
            background: rgba(255,255,255,0.08);
            display: flex;
            gap: 10px;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }
        .upload-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
        }
        input[type="file"] { display: none; }
        input[type="text"] {
            flex: 1;
            padding: 12px 16px;
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.2);
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .send-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            border: none;
            cursor: pointer;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="stars">
        <?php for($i = 0; $i < 80; $i++): ?>
            <div class="star" style="left: <?=rand(0,100)?>%; top: <?=rand(0,100)?>%; animation-delay: <?=rand(0,5)?>s;"></div>
        <?php endfor; ?>
    </div>

    <div class="chat-container">
        <div class="header">
            <div class="app-title">Moon Messenger</div>
            <div class="status">
                <div class="dot" id="statusDot"></div>
                <span id="statusText" style="color: #FF0000;">آفلاین</span>
            </div>
        </div>

        <div class="msgs" id="msgs"></div>

        <div class="input-area">
            <label class="upload-btn" for="imageUpload">📷</label>
            <input type="file" id="imageUpload" accept="image/*">
            <input type="text" id="inp" placeholder="پیام خود را بنویسید...">
            <button class="send-btn" onclick="send()">📤</button>
        </div>
    </div>

    <script>
        const u = "<?= $username ?>";
        let allLoaded = false;

        function send() {
            const t = document.getElementById("inp").value.trim();
            if(t) {
                const time = new Date().toLocaleTimeString('fa-IR');
                fetch("fetch.php", {
                    method: "POST",
                    headers: {"Content-Type": "application/json"},
                    body: JSON.stringify({t, u, type: 'text', time})
                });
                document.getElementById("inp").value = "";
            }
        }

        function uploadImage() {
            const input = document.getElementById("imageUpload");
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const time = new Date().toLocaleTimeString('fa-IR');
                    fetch("fetch.php", {
                        method: "POST",
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({t: e.target.result, u, type: 'image', time})
                    });
                };
                reader.readAsDataURL(file);
            }
        }

        document.getElementById("imageUpload").addEventListener("change", uploadImage);

        function load() {
            fetch("fetch.php").then(r => r.json()).then(d => {
                if (!allLoaded) {
                    document.getElementById("msgs").innerHTML = ""; // فقط یک بار پاک کن
                    allLoaded = true;
                }
                
                d.forEach(m => {
                    const existing = document.querySelector(`[data-id="${m.t}${m.u}${m.time}"]`);
                    if (existing) return; // اگر پیام وجود داشته باشه، نمایش نده

                    const div = document.createElement("div");
                    div.className = `msg ${m.u === u ? 'my' : 'other'}`;
                    div.setAttribute("data-id", m.t + m.u + m.time);
                    if (m.type === 'image') {
                        div.innerHTML = `<div class="msg-header">${m.u} - ${m.time}</div><img src="${m.t}" style="max-width:150px;border-radius:10px;">`;
                    } else {
                        div.innerHTML = `<div class="msg-header">${m.u} - ${m.time}</div>${m.t}`;
                    }
                    document.getElementById("msgs").appendChild(div);
                });
                document.getElementById("msgs").scrollTop = 999999;

                // Status
                const users = [...new Set(d.map(m => m.u))];
                if(users.length > 1) {
                    document.getElementById("statusDot").className = "dot online";
                    document.getElementById("statusText").textContent = "آنلاین";
                    document.getElementById("statusText").style.color = "#4CAF50";
                } else {
                    document.getElementById("statusDot").className = "dot";
                    document.getElementById("statusText").textContent = "آفلاین";
                    document.getElementById("statusText").style.color = "#FF0000";
                }
            });
        }

        document.getElementById("inp").addEventListener("keypress", e => e.key==="Enter" && send());
        setInterval(load, 1500);
        load();
    </script>
</body>
</html>
<?php } ?>