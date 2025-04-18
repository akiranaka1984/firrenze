@component('mail::message')
# 予約がありました

以下の内容で予約がありました。

**お名前:** {{ $reservation->name }}  
**メール:** {{ $reservation->mail }}  
**電話番号:** {{ $reservation->tel }}

<!-- 必要に応じて予約日時や希望内容などを追加してください -->

@component('mail::button', ['url' => route('admin.reception.list')])
予約管理画面を見る
@endcomponent

ありがとうございます。  
@endcomponent