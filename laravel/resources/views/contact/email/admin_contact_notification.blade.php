@php
    // $settings comes as an array keyed by 'COMPANY_*'
    $brand  = $settings['COMPANY_NAME'] ?? config('app.name');
    $logo   = $settings['WEBSITE_LOGO'] ?? null;
@endphp

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>New contact for {{ $brand }}</title>
</head>
<body style="font-family:Arial,Helvetica,sans-serif;line-height:1.6">
  @if($logo)
    <p><img src="{{ $logo }}" alt="{{ $brand }}" style="max-height:40px;"></p>
  @endif

  <h2>ข้อมูลการติดต่อ</h2>

  <p><strong>From:</strong> {{ $contact->fname }} {{ $contact->lname }}</p>
  <p><strong>Email:</strong> {{ $contact->email }}</p>

  <p><strong>Subject</strong><br>{{ $contact->subject }}</p>

  <p><strong>Message</strong><br>{!! nl2br(e($contact->message)) !!}</p>

  <p>
    <a href="{{ $novaUrl }}" style="display:inline-block;padding:10px 14px;text-decoration:none;border:1px solid #222;">
      Open in Nova
    </a>
  </p>

  <hr>
  <p style="color:#666;font-size:12px;">
    IP: {{ $contact->ip_address }}<br>
    User Agent: {{ $contact->user_agent }}
  </p>

  <p style="color:#666">{{ $brand }}</p>
</body>
</html>
