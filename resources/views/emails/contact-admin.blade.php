<br>
@if ($isAdmin)
    お問い合わせフォームからお問い合わせが届きました。<br>
    以下の内容をご確認ください。<br>
@else
    {{ $contact->name }} 様 <br>
    <br>
    この度は、INITへお問い合わせいただき誠にありがとうございます。<br>
    以下の内容でお問い合わせを受け付けいたしました。<br>
    数日経過しましても返信がない場合は、お手数ですが再度お問い合わせくださいますようお願いいたします。<br>
@endif
<br>
================================ <br>
▼お問い合わせ内容 <br>
-------------------------------- <br>
【お名前】{{ $contact->name }} 様 <br>
【メールアドレス】{{ $contact->email }} <br>
【カテゴリ】{{ $contact->category }} <br>
【件名】{{ $contact->title }} <br>
【内容】<br>
{!! nl2br(e($contact->content)) !!}<br>
<br>
<br>
<p>※こちらのメールは送信専用のメールアドレスより送信しています。恐れ入りますが、直接返信しないようお願いします。</p>

@include('emails._footer')
