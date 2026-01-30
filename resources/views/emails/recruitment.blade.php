<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h2>新規応募がありました</h2>
    
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>項目</th>
            <th>内容</th>
        </tr>
        <tr>
            <td>お名前</td>
            <td>{{ $interview->name }}</td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td>{{ $interview->mail }}</td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td>{{ $interview->tel }}</td>
        </tr>
        <tr>
            <td>LINE ID</td>
            <td>{{ $interview->line_id ?? '未入力' }}</td>
        </tr>
        <tr>
            <td>年齢</td>
            <td>{{ $interview->age ? $interview->age . '歳' : '未入力' }}</td>
        </tr>
        <tr>
            <td>身長</td>
            <td>{{ $interview->height ? $interview->height . 'cm' : '未入力' }}</td>
        </tr>
        <tr>
            <td>体重</td>
            <td>{{ $interview->weight ? $interview->weight . 'kg' : '未入力' }}</td>
        </tr>
        <tr>
            <td>バストサイズ</td>
            <td>{{ $interview->bust ? $interview->bust . 'カップ' : '未入力' }}</td>
        </tr>
        <tr>
            <td>タトゥー</td>
            <td>{{ $interview->tattoo == 1 ? '有り' : ($interview->tattoo == 0 ? '無し' : '未入力') }}</td>
        </tr>
        <tr>
            <td>面接希望日</td>
            <td>{{ $interview->interview_date ? \Carbon\Carbon::parse($interview->interview_date)->format('Y年m月d日 H時') : '未設定' }}</td>
        </tr>
        <tr>
            <td>お問い合わせ内容</td>
            <td>{{ $interview->inquiry ?? '求人応募' }}</td>
        </tr>
        <tr>
            <td>その他メッセージ</td>
            <td>{{ $interview->other_message ?? 'なし' }}</td>
        </tr>
        <tr>
            <td>写真</td>
            <td>{{ $interview->photo ? '添付あり' : 'なし' }}</td>
        </tr>
        <tr>
            <td>応募日時</td>
            <td>{{ $interview->created_at->format('Y年m月d日 H:i') }}</td>
        </tr>
    </table>
    
    <p>管理画面から詳細をご確認ください。</p>
    <p><a href="{{ url('/admin/interview/list') }}">管理画面はこちら</a></p>
</body>
</html>