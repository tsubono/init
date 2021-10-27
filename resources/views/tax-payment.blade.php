@extends('layouts.app')

@section('title', '講師フィーの納税について')

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <p>
                •INITは、当社から送付したレッスンフィーなどについて、 <a href="{{ route('adviser-terms') }}#terms14" target="_blank" class="primary-link">講師規約14条④</a> に記載したとおり、税金や税金支払の手続きの全てを講師自身で対応していただくこととしております。<br>
                納税の義務やその体系は、日本をはじめ各国によって様々で、かつ複雑です。 ご不明な点は必ず各機関のホームページで調べるか、最寄りの税務署や各地方税理士会の相談窓口などでご相談ください。
            </p>
            <br>
            <p>
                •東京には「財団法人　日本税務研究センター」に納税者支援センターがあり、「無料相談」という窓口を設けています。<br>
                ➔  <a class="primary-link" href="http://www.jtri.or.jp/counsel/index.php" target="_blank">http://www.jtri.or.jp/counsel/index.php</a><br>
                <br>
                国税局タックスアンサーでは、税の種別毎に「よくある税の質問」として案内されています。<br>
                ➔  <a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/index2.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/index2.htm</a> <br>
                <br>
                Internal Revenue Service（米国内国歳入庁 英文）<br>
                ➔  <a class="primary-link" href="//www.irs.gov/" target="_blank">www.irs.gov/</a> <br>
            </p>
            <br>
            <p>
                <b>税務申告を行うための証書の取得方法</b><br>
                講師ログイン後、<a class="primary-link" href="http://init-online.com/adviser/sales" target="_blank">フィーの支払請求ページ</a>より、「電子明細書作成」をご選択下さい。<br>
                以下に日本の税金に伴うよくある情報を記載させていただきます。各国の税務については、お近くの機関などにお問い合わせください。
            </p>
            <br>
            <p>
                <b>•副業で講師活動をする場合の確定申告について</b><br>
                一般的に、給与所得以外の所得（収入ー必要経費）が年間20万円未満の場合には、確定申告は不要です。ただし、INIT以外でも副業収入がある場合には、それらもまとめて20万円を超えるかどうか判定する必要があります。
                ➔  国税庁／タックスアンサー／所得の区分のあらまし  (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm</a> )
            </p>
            <br>
            <p>
                <b>•講師活動で得た収入の消費税の申告について</b><br>
                講師活動をして2年未満の方や、2年前の事業での収入が1,000万円未満の方は、消費税の申告の必要はないと考えられますが、事業の内容等についてはご確認下さい。
                ➔  国税庁／タックスアンサー／消費税  (<a class="primary-link" href="https://www.nta.go.jp/taxes/shiraberu/taxanswer/shohi/shouhi.htm" target="_blank">https://www.nta.go.jp/taxes/shiraberu/taxanswer/shohi/shouhi.htm</a> )
            </p>
            <br>
            <p>
                <b>•講師フィーの所得種類と所得申告</b><br>
                あなたの所得状況、就業状況等によって、申告する所得種類が異なります。<br>
                ➔  国税庁／タックスアンサー／所得の区分のあらまし  (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1300.htm</a> )
            </p>
            <br>
            <p>
                <b>•配偶者控除</b><br>
                たとえば主婦業のかたわらに講師をしている場合、年間の合計所得金額が38万円以下であれば控除対象配偶者とされます。 合計所得額の算出方法（必要経費の計算等）は、所得の種類によっても異なります。<br>
                ➔  国税庁／タックスアンサー／配偶者控除  (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1191.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1191.htm</a> )
            </p>
            <br>
            <p>
                <b>•給与所得者の確定申告</b><br>
                たとえばサラリーマンで副業として講師をし収入を得た場合、給与以外（雑所得・事業所得）の年間所得金額によっては申告が必要となり、給与年収額によってその上限が異なります。 合計所得額の算出方法（必要経費の計算等）は、所得の種類によっても異なります。<br>
                ➔  国税庁／タックスアンサー／サラリーマンで確定申告が必要な人  (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1900.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/shotoku/1900.htm</a> )
            </p>
            <br>
            <p>
                <b>•海外在住の場合の申告</b><br>
                納税義務は、居住地での滞在日数や生活の本拠などから「居住者」「非居住者」のどちらに判断されるかで異なります。<br>
                非居住者の方がINITで収益を上げた場合には、基本的には日本での納税義務は生じず現地国の税法に準じることとなります。<br>
                たとえば、海外旅行や短期の留学などで海外に住んでいる方は、非居住者には該当しないと考えられますので、日本にて課税される可能性があります。<br>
                ➔  国税庁／タックスアンサー／居住者と非居住者の区分  (<a class="primary-link" href="//www.nta.go.jp/taxes/shiraberu/taxanswer/gensen/2875.htm" target="_blank">www.nta.go.jp/taxes/shiraberu/taxanswer/gensen/2875.htm</a> )
            </p>
        </div>
    </section>
@endsection
