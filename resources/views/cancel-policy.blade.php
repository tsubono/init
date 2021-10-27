@extends('layouts.app')

@section('title', 'キャンセルポリシー')

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <!-- タブ部分 -->
            <ul class="nav nav-pills p-setting__tab nav-fill" role="tablist">
                <li class="nav-item" role="presentation">
                    <button id="basic-tab" class="nav-link active" data-bs-toggle="tab" data-bs-target="#mate" type="button" role="tab" aria-controls="mate" aria-selected="true">
                        受講者
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="learn-tab" class="nav-link" data-bs-toggle="tab" data-bs-target="#adviser" type="button" role="tab" aria-controls="adviser" aria-selected="false">
                        講師
                    </button>
                </li>
            </ul>

            <!-- パネル部分 -->
            <div class="tab-content p-setting__content">
                <div id="mate" class="tab-pane active" role="tabpanel" aria-labelledby="mate-tab">
                    受講者は、レッスン契約の申込を行った後、講師が本サービス上のシステムを利用して当該申込を承諾する旨の電子メールを送信するまでの間においては、ペナルティーを負うことなく、レッスン契約の申込のキャンセルを行うことができるものとし、受講者がレッスン契約の申込のキャンセルを行った場合には、当社はレッスン契約の申込時に受講者が使用した使用ポイントの返還を行うものとします。<br>
                    <br>
                    受講者は、講師が本サービス上のシステムを利用して受講者によるレッスン契約の申込を承諾する旨の電子メールを送信してレッスン契約が成立した後、以下のキャンセルポリシーが適用され、日にちに関わらず講師に50%、当事務局に50%の割合でキャンセル料の支払いが科せられるものとします。<br>
                    <br>
                    　　・7日以上前 受講料の0%<br>
                    　　・7日前　受講料の{{ config('const.cancel_rate.to_mate')[7] * 100 }}%<br>
                    　　・6日前　受講料の{{ config('const.cancel_rate.to_mate')[6] * 100 }}%<br>
                    　　・5日前　受講料の{{ config('const.cancel_rate.to_mate')[5] * 100 }}%<br>
                    　　・4日前　受講料の{{ config('const.cancel_rate.to_mate')[4] * 100 }}%<br>
                    　　・3日前　受講料の{{ config('const.cancel_rate.to_mate')[3] * 100 }}%<br>
                    　　・2日前　受講料の{{ config('const.cancel_rate.to_mate')[2] * 100 }}%<br>
                    　　・1日前　受講料の{{ config('const.cancel_rate.to_mate')[1] * 100 }}%<br>
                    　　・当日　 受講料の{{ config('const.cancel_rate.to_mate')[0] * 100 }}%<br>
                    <br>
                    本ポリシーに定めのない事項については、当社が別途定める最新の「<a href="{{ route('mate-terms') }}" target="_blank" class="primary-link">受講者規約</a>」が適用されるものとします。<br>
                    <br>
                    【通報措置について】<br>
                    ・講師への通報<br>
                    当日レッスンの開始時刻を一定の時間経過しても講師が現れない場合は、受講者に「通報ボタン」の使用権利が与えられます。講師への通報があった場合は、講師から受講料全額を受講者に返金され、受講者からのレビューにて評価が下がる可能性があるものとします。<br>
                    <br>
                    ・受講者への通報<br>
                    当日レッスンの開始時刻を一定の時間経過しても受講者が現れない場合は、講師に「通報ボタン」の使用権利が与えられます。受講者への通報があった場合は、受講者から受講料50％を講師に、残り50％を運営維持費として当事務局が徴収されるものとする。
                </div>
                <div id="adviser" class="tab-pane" role="tabpanel" aria-labelledby="adviser-tab">
                    講師が受講者から受けたレッスン契約の申込の拒否の可否、成立後のレッスン契約のキャンセル又は時間変更の可否、成立後のレッスン契約をキャンセルした場合の取扱等については、この「キャンセルポリシー（講師向け）」（以下、「本ポリシー」といいます。）に定めるとおりとします。 なお、本ポリシーにおける用語の定義は、本ポリシーに特に定めのない限り、当社が別途定める 「講師規約」（URLお願いいたします）の定義によるものとします。<br>
                    <br>
                    1. 講師は、受講者から受けたレッスン契約の申込については、拒否するか否かを自由に判断することができるものとします。<br>
                    <br>
                    2. 講師は、本サービス上のシステムを利用して受講者によるレッスン契約の申込を承諾する旨の電子メールを送信してレッスン契約が成立した後、以下のキャンセルポリシーが適用され、日にちに関わらず当事務局にキャンセル料の支払いが科せられるものとします。<br>
                    <br>
                    　　・7日以上前 受講料の0%<br>
                    　　・7日前　受講料の{{ config('const.cancel_rate.to_adviser')[7] * 100 }}%<br>
                    　　・6日前　受講料の{{ config('const.cancel_rate.to_adviser')[6] * 100 }}%<br>
                    　　・5日前　受講料の{{ config('const.cancel_rate.to_adviser')[5] * 100 }}%<br>
                    　　・4日前　受講料の{{ config('const.cancel_rate.to_adviser')[4] * 100 }}%<br>
                    　　・3日前　受講料の{{ config('const.cancel_rate.to_adviser')[3] * 100 }}%<br>
                    　　・2日前　受講料の{{ config('const.cancel_rate.to_adviser')[2] * 100 }}%<br>
                    　　・1日前　受講料の{{ config('const.cancel_rate.to_adviser')[1] * 100 }}%<br>
                    　　・当日　 受講料の{{ config('const.cancel_rate.to_adviser')[0] * 100 }}%<br>
                    <br>
                    また、当日レッスンの開始時刻を一定の時間経過しても講師が現れない場合は、受講者に「通報ボタン」の使用権利が与えられます。講師への通報があった場合は、講師から受講料全額を運営手数料として徴収し、受講者からのレビューにて、評価が下がる可能性があるものとします。<br>
                    <br>
                    3. 本ポリシーに定めのない事項については、当社が別途定める最新の「<a href="{{ route('adviser-terms') }}" target="_blank" class="primary-link">講師規約</a>」が適用されるものとします。<br>
                    <br>
                    【通報措置について】<br>
                    ・講師への通報<br>
                    当日レッスンの開始時刻を一定の時間経過しても講師が現れない場合は、受講者に「通報ボタン」の使用権利が与えられます。講師への通報があった場合は、講師から受講料全額を受講者に返金され、受講者からのレビューにて評価が下がる可能性があるものとします。<br>
                    <br>
                    ・受講者への通報<br>
                    当日レッスンの開始時刻を一定の時間経過しても受講者が現れない場合は、講師に「通報ボタン」の使用権利が与えられます。受講者への通報があった場合は、受講者から受講料50％を講師に、残り50％を運営維持費として当事務局が徴収されるものとする。
                </div>
            </div>
@endsection
