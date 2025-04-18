<!DOCTYPE html>
<html>
<head>
    <title>お問い合わせ通知</title>
</head>
<body>
    <h2>新しいお問い合わせがありました</h2>
    <p><strong>メールアドレス:</strong> {{ $data['email'] }}</p>
    <p><strong>件名:</strong> {{ $data['subject'] }}</p>
    <p><strong>メッセージ:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>