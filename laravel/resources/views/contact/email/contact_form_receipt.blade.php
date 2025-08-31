@php
    $brand    = $settings['COMPANY_NAME'] ?? config('app.name');
    $address  = $settings['COMPANY_ADDRESS']  ?? null;
    $email    = $settings['COMPANY_EMAIL']    ?? null;
    $phone    = $settings['COMPANY_PHONE']    ?? null;
    $logo     = $settings['WEBSITE_LOGO']     ?? null;
@endphp

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>{{ $brand }} — Receipt</title>
</head>
<body style="font-family:Arial,Helvetica,sans-serif;line-height:1.6">
  @if($logo)
    <p><img src="{{ $logo }}" alt="{{ $brand }}" style="max-height:40px;"></p>
  @endif

  <p>สวัสดีคุณ {{ $contact->fname }},</p>
  <p>เราได้รับข้อความของคุณเรียบร้อยแล้ว ขอบคุณที่ติดต่อ {{ $brand }} ทีมงานจะติดต่อกลับโดยเร็วที่สุด</p>

  <p><strong>ข้อความของคุณ</strong><br>{!! nl2br(e($contact->message)) !!}</p>

  <p>
    หากมีข้อมูลเพิ่มเติม สามารถตอบกลับอีเมลฉบับนี้ได้เลยครับ/ค่ะ
  </p>

  <hr>
  <p style="color:#666;font-size:12px;">
    {{ $brand }}<br>
    @if($address) {!! $address !!}<br>@endif
    @if($phone) โทร: {{ $phone }}<br>@endif
    @if($email) อีเมล: <a href="mailto:{{ $email }}">{{ $email }}</a>@endif
  </p>
</body>
</html>
