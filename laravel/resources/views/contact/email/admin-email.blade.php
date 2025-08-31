<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Contact Message</title>
</head>
<body>
    <h2>ข้อความติดต่อใหม่</h2>

    <p><strong>ชื่อ:</strong> {{ $first_name }} {{ $last_name }}</p>
    <p><strong>อีเมล:</strong> {{ $email }}</p>

    <p><strong>ข้อความ:</strong></p>
    <p style="white-space: pre-wrap;">{{ $body }}</p>

    <hr>
    <p style="color:#666;font-size:12px;">
        IP: {{ $ip_address }} | UA: {{ $user_agent }}
    </p>
</body>
</html>
