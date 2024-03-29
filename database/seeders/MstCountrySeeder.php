<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$country = DB::table('mst_countries')->first();
        if (empty($country)) {
            DB::table('mst_countries')->insert([
                    [ 'name' => 'アンドラ公国', 'name_en' => 'Andorra Principality' ],
                    [ 'name' => 'アラブ首長国連邦', 'name_en' => 'United Arab Emirates' ],
                    [ 'name' => 'アフガニスタン・イスラム国', 'name_en' => 'Islamic State of Afghanistan' ],
                    [ 'name' => 'アンチグア・バーブーダ', 'name_en' => 'Antigua and Barbuda' ],
                    [ 'name' => 'アンギラ', 'name_en' => 'Anguilla' ],
                    [ 'name' => 'アルバニア共和国', 'name_en' => 'Republic of Albania' ],
                    [ 'name' => 'アルメニア共和国', 'name_en' => 'Republic of Armenia' ],
                    [ 'name' => 'オランダ領アンティル', 'name_en' => 'Dutch antilles' ],
                    [ 'name' => 'アンゴラ共和国', 'name_en' => 'Republic of Angola' ],
                    [ 'name' => '南極', 'name_en' => 'Antarctic' ],
                    [ 'name' => 'アルゼンチン共和国', 'name_en' => 'Republic of Argentina' ],
                    [ 'name' => '米領サモア', 'name_en' => 'American Samoa' ],
                    [ 'name' => 'オーストリア共和国', 'name_en' => 'Austria' ],
                    [ 'name' => 'オーストラリア', 'name_en' => 'Australia' ],
                    [ 'name' => 'アルバ', 'name_en' => 'Aruba' ],
                    [ 'name' => 'アゼルバイジャン共和国', 'name_en' => 'Republic of Azerbaijan' ],
                    [ 'name' => 'ボスニア・ヘルツェゴビナ', 'name_en' => 'Bosnia-Herzegovina' ],
                    [ 'name' => 'バルバドス', 'name_en' => 'Barbados' ],
                    [ 'name' => 'バングラデシュ人民共和国', 'name_en' => "Bangladesh People's Republic" ],
                    [ 'name' => 'ベルギー王国', 'name_en' => 'Kingdom of Belgium' ],
                    [ 'name' => 'ブルキナファソ', 'name_en' => 'Burkina Faso' ],
                    [ 'name' => 'ブルガリア共和国', 'name_en' => 'Bulgaria' ],
                    [ 'name' => 'バーレーン王国', 'name_en' => 'Kingdom of Bahrain' ],
                    [ 'name' => 'ブルンジ共和国', 'name_en' => 'Republic of Burundi' ],
                    [ 'name' => 'ベナン共和国', 'name_en' => 'Republic of Benin' ],
                    [ 'name' => 'サン・バルテルミー島', 'name_en' => 'Saint Barthelemy' ],
                    [ 'name' => 'バミューダ諸島', 'name_en' => 'Bermuda' ],
                    [ 'name' => 'ブルネイ・ダルサラーム国', 'name_en' => 'Brunei Darussalam' ],
                    [ 'name' => 'ボリビア多民族国', 'name_en' => 'Bolivia multi-ethnic country' ],
                    [ 'name' => 'ブラジル連邦共和国', 'name_en' => 'Federal Republic of Brazil' ],
                    [ 'name' => 'バハマ国', 'name_en' => 'Bahamas country' ],
                    [ 'name' => 'ブータン王国', 'name_en' => 'Kingdom of Bhutan' ],
                    [ 'name' => 'ブーベ島', 'name_en' => 'Bouvet Island' ],
                    [ 'name' => 'ボツワナ共和国', 'name_en' => 'Republic of Botswana' ],
                    [ 'name' => 'ベラルーシ共和国', 'name_en' => 'Republic of Belarus' ],
                    [ 'name' => 'ベリーズ', 'name_en' => 'Belize' ],
                    [ 'name' => 'カナダ', 'name_en' => 'Canada' ],
                    [ 'name' => 'ココス諸島', 'name_en' => 'Cocos Islands' ],
                    [ 'name' => 'コンゴ民主共和国', 'name_en' => 'Democratic Republic of the Congo' ],
                    [ 'name' => '中央アフリカ共和国', 'name_en' => 'Central African Republic' ],
                    [ 'name' => 'コンゴ共和国', 'name_en' => 'Republic of the Congo' ],
                    [ 'name' => 'スイス連邦', 'name_en' => 'Switzerland' ],
                    [ 'name' => 'コートジボアール共和国', 'name_en' => "Republic of Cote d'Ivoire" ],
                    [ 'name' => 'クック諸島', 'name_en' => 'Cook Islands' ],
                    [ 'name' => 'チリ共和国', 'name_en' => 'Republic of Chile' ],
                    [ 'name' => 'カメルーン共和国', 'name_en' => 'Republic of Cameroon' ],
                    [ 'name' => '中華人民共和国', 'name_en' => "People's Republic of China" ],
                    [ 'name' => 'コロンビア共和国', 'name_en' => 'Republic of Colombia' ],
                    [ 'name' => 'コスタリカ共和国', 'name_en' => 'Republic of Costa Rica' ],
                    [ 'name' => 'キューバ共和国', 'name_en' => 'Republic of Cuba' ],
                    [ 'name' => 'カーボベルデ共和国', 'name_en' => 'Republic of Cape Verde' ],
                    [ 'name' => 'クリスマス島', 'name_en' => 'Christmas island' ],
                    [ 'name' => 'キプロス共和国', 'name_en' => 'Republic of Cyprus' ],
                    [ 'name' => 'チェコ共和国', 'name_en' => 'Czech Republic' ],
                    [ 'name' => 'ドイツ連邦共和国', 'name_en' => 'The Federal Republic of Germany' ],
                    [ 'name' => 'ジブチ共和国', 'name_en' => 'Republic of Djibouti' ],
                    [ 'name' => 'デンマーク王国', 'name_en' => 'Kingdom of Denmark' ],
                    [ 'name' => 'ドミニカ国', 'name_en' => 'Dominica' ],
                    [ 'name' => 'ドミニカ共和国', 'name_en' => 'Dominican Republic' ],
                    [ 'name' => 'アルジェリア民主人民共和国', 'name_en' => "Democratic People's Republic of Algeria" ],
                    [ 'name' => 'エクアドル共和国', 'name_en' => 'Republic of Ecuador' ],
                    [ 'name' => 'エストニア共和国', 'name_en' => 'Republic of Estonia' ],
                    [ 'name' => 'エジプト・アラブ共和国', 'name_en' => 'Egypt and Arab Republic' ],
                    [ 'name' => '西サハラ', 'name_en' => 'Western Sahara' ],
                    [ 'name' => 'エリトリア国', 'name_en' => 'Eritrea' ],
                    [ 'name' => 'スペイン', 'name_en' => 'Spain' ],
                    [ 'name' => 'エチオピア連邦民主共和国', 'name_en' => 'Federal Democratic Republic of Ethiopia' ],
                    [ 'name' => 'フィンランド共和国', 'name_en' => 'Republic of Finland' ],
                    [ 'name' => 'フィジー諸島共和国', 'name_en' => 'Republic of Fiji' ],
                    [ 'name' => 'フォークランド(マルビナス)諸島', 'name_en' => 'Falkland (Malvinas) Islands' ],
                    [ 'name' => 'ミクロネシア連邦', 'name_en' => 'Federated States of Micronesia' ],
                    [ 'name' => 'フェロー諸島', 'name_en' => 'Faroe Islands' ],
                    [ 'name' => 'フランス共和国', 'name_en' => 'France' ],
                    [ 'name' => 'ガボン共和国', 'name_en' => 'Republic of Gabon' ],
                    [ 'name' => 'グレートブリテンおよび北部アイルランド連合王国(英国)', 'name_en' => 'United Kingdom of Great Britain and Northern Ireland (United Kingdom)' ],
                    [ 'name' => 'グレナダ', 'name_en' => 'Grenada' ],
                    [ 'name' => 'ジョージア', 'name_en' => 'Georgia' ],
                    [ 'name' => 'フランス領ギアナ', 'name_en' => 'French Guiana' ],
                    [ 'name' => 'ガーナ共和国', 'name_en' => 'Republic of Ghana' ],
                    [ 'name' => 'ジブラルタル', 'name_en' => 'Gibraltar' ],
                    [ 'name' => 'グリーンランド', 'name_en' => 'Greenland' ],
                    [ 'name' => 'ガンビア共和国', 'name_en' => 'Republic of The Gambia' ],
                    [ 'name' => 'ギニア共和国', 'name_en' => 'Republic of Guinea' ],
                    [ 'name' => 'グアドループ島', 'name_en' => 'Guadeloupe' ],
                    [ 'name' => '赤道ギニア共和国', 'name_en' => 'Equatorial Guinea' ],
                    [ 'name' => 'ギリシア共和国', 'name_en' => 'Republic of Greece' ],
                    [ 'name' => '南ジョージア島・南サンドイッチ諸島', 'name_en' => 'South Georgia and the South Sandwich Islands' ],
                    [ 'name' => 'グアテマラ共和国', 'name_en' => 'Republic of Guatemala' ],
                    [ 'name' => 'グアム', 'name_en' => 'Guam' ],
                    [ 'name' => 'ギニアビサウ共和国', 'name_en' => 'Guinea-Bissau Republic' ],
                    [ 'name' => 'ガイアナ協同共和国', 'name_en' => 'Guyana Cooperative Republic' ],
                    [ 'name' => 'ヘアド島・マクドナルド諸島', 'name_en' => 'Heard Island and McDonald Islands' ],
                    [ 'name' => 'ホンジュラス共和国', 'name_en' => 'Republic of Honduras' ],
                    [ 'name' => 'クロアチア共和国', 'name_en' => 'Croatia' ],
                    [ 'name' => 'ハイチ共和国', 'name_en' => 'Republic of Haiti' ],
                    [ 'name' => 'ハンガリー共和国', 'name_en' => 'Republic of Hungary' ],
                    [ 'name' => 'インドネシア共和国', 'name_en' => 'Republic of Indonesia' ],
                    [ 'name' => 'アイルランド', 'name_en' => 'Ireland' ],
                    [ 'name' => 'イスラエル国', 'name_en' => 'Israel' ],
                    [ 'name' => 'インド', 'name_en' => 'India' ],
                    [ 'name' => '英領インド洋地域', 'name_en' => 'British Indian Ocean Territory' ],
                    [ 'name' => 'イラク共和国', 'name_en' => 'Republic of Iraq' ],
                    [ 'name' => 'イラン・イスラム共和国', 'name_en' => 'Iran Islamic Republic' ],
                    [ 'name' => 'アイスランド共和国', 'name_en' => 'Iceland' ],
                    [ 'name' => 'イタリア共和国', 'name_en' => 'Italy' ],
                    [ 'name' => 'ジャマイカ', 'name_en' => 'Jamaica' ],
                    [ 'name' => 'ヨルダン・ハシミテ王国', 'name_en' => 'Kingdom of Hashemite, Jordan' ],
                    [ 'name' => '日本国', 'name_en' => 'Japan' ],
                    [ 'name' => 'ジョンストン島', 'name_en' => 'Johnston Island' ],
                    [ 'name' => 'ケニア共和国', 'name_en' => 'Republic of Kenya' ],
                    [ 'name' => 'キルギス共和国', 'name_en' => 'Republic of Kyrgyzstan' ],
                    [ 'name' => 'カンボジア王国', 'name_en' => 'Kingdom of Cambodia' ],
                    [ 'name' => 'キリバス共和国', 'name_en' => 'Republic of Kiribati' ],
                    [ 'name' => 'コモロ連合', 'name_en' => 'Comoros Union' ],
                    [ 'name' => 'セントクリストファー・ネイビス', 'name_en' => 'Saint Kitts and Nevis' ],
                    [ 'name' => '北朝鮮(=朝鮮民主主義人民共和国)', 'name_en' => "(North Korea = Democratic People's Republic of Korea)" ],
                    [ 'name' => '大韓民国', 'name_en' => 'South Korea' ],
                    [ 'name' => 'クウェート国', 'name_en' => 'Kuwait' ],
                    [ 'name' => 'ケイマン諸島', 'name_en' => 'Cayman Islands' ],
                    [ 'name' => 'カザフスタン共和国', 'name_en' => 'Republic of Kazakhstan' ],
                    [ 'name' => 'ラオス人民民主共和国', 'name_en' => "Lao People's Democratic Republic" ],
                    [ 'name' => 'レバノン共和国', 'name_en' => 'Republic of Lebanon' ],
                    [ 'name' => 'セントルシア', 'name_en' => 'Saint Lucia' ],
                    [ 'name' => 'リヒテンシュタイン公国', 'name_en' => 'Principality of Liechtenstein' ],
                    [ 'name' => 'スリランカ民主社会主義共和国', 'name_en' => 'Democratic Socialist Republic of Sri Lanka' ],
                    [ 'name' => 'リベリア共和国', 'name_en' => 'Republic of Liberia' ],
                    [ 'name' => 'レソト王国', 'name_en' => 'Kingdom of Lesotho' ],
                    [ 'name' => 'リトアニア共和国', 'name_en' => 'Republic of Lithuania' ],
                    [ 'name' => 'ルクセンブルク大公国', 'name_en' => 'Grand Duchy of Luxembourg' ],
                    [ 'name' => 'ラトビア共和国', 'name_en' => 'Republic of Latvia' ],
                    [ 'name' => '社会主義人民リビア・アラブ国', 'name_en' => 'Socialist People Libya Arab Country' ],
                    [ 'name' => 'モロッコ王国', 'name_en' => 'Kingdom of Morocco' ],
                    [ 'name' => 'モナコ公国', 'name_en' => 'Principality of Monaco' ],
                    [ 'name' => 'モルドバ共和国', 'name_en' => 'Republic of Moldova' ],
                    [ 'name' => 'モンテネグロ', 'name_en' => 'Montenegro' ],
                    [ 'name' => 'サン・マルタン島', 'name_en' => 'Saint Martin' ],
                    [ 'name' => 'マダガスカル共和国', 'name_en' => 'Republic of Madagascar' ],
                    [ 'name' => 'マーシャル諸島共和国', 'name_en' => 'Republic of Marshall Islands' ],
                    [ 'name' => 'ミッドウェー諸島', 'name_en' => 'Midway Islands' ],
                    [ 'name' => 'マケドニア旧ユーゴスラビア共和国', 'name_en' => 'Former Yugoslav Republic of Macedonia' ],
                    [ 'name' => 'マリ共和国', 'name_en' => 'Republic of Mali' ],
                    [ 'name' => 'ミャンマー連邦', 'name_en' => 'Myanmar Federation' ],
                    [ 'name' => 'モンゴル国', 'name_en' => 'Mongolia' ],
                    [ 'name' => '北マリアナ諸島', 'name_en' => 'Northern Mariana Islands' ],
                    [ 'name' => 'マルチニーク島', 'name_en' => 'Martinique' ],
                    [ 'name' => 'モーリタニア・イスラム共和国', 'name_en' => 'Islamic Republic of Mauritania' ],
                    [ 'name' => 'モンセラット', 'name_en' => 'Montserrat' ],
                    [ 'name' => 'マルタ共和国', 'name_en' => 'Republic of Malta' ],
                    [ 'name' => 'モーリシャス共和国', 'name_en' => 'Mauritius' ],
                    [ 'name' => 'モルディヴ共和国', 'name_en' => 'Republic of Maldives' ],
                    [ 'name' => 'マラウイ共和国', 'name_en' => 'Republic of Malawi' ],
                    [ 'name' => 'メキシコ合衆国', 'name_en' => 'Mexico United States' ],
                    [ 'name' => 'マレーシア', 'name_en' => 'Malaysia' ],
                    [ 'name' => 'モザンビーク共和国', 'name_en' => 'Republic of Mozambique' ],
                    [ 'name' => 'ナミビア共和国', 'name_en' => 'Republic of Namibia' ],
                    [ 'name' => 'ニューカレドニア', 'name_en' => 'New Caledonia' ],
                    [ 'name' => 'ニジェール共和国', 'name_en' => 'Republic of Niger' ],
                    [ 'name' => 'ノーフォーク島', 'name_en' => 'Norfolk Island' ],
                    [ 'name' => 'ナイジェリア連邦共和国', 'name_en' => 'Federal Republic of Nigeria' ],
                    [ 'name' => 'ニカラグア共和国', 'name_en' => 'Republic of Nicaragua' ],
                    [ 'name' => 'オランダ王国', 'name_en' => 'Kingdom of the Netherlands' ],
                    [ 'name' => 'ノルウェー王国', 'name_en' => 'Kingdom of Norway' ],
                    [ 'name' => 'ネパール連邦民主共和国', 'name_en' => 'Federal Democratic Republic of Nepal' ],
                    [ 'name' => 'ナウル共和国', 'name_en' => 'Republic of Nauru' ],
                    [ 'name' => '中立地帯', 'name_en' => 'Neutral zone' ],
                    [ 'name' => 'ニウエ', 'name_en' => 'Niue' ],
                    [ 'name' => 'ニュージーランド', 'name_en' => 'new Zealand' ],
                    [ 'name' => 'オマーン国', 'name_en' => 'Oman country' ],
                    [ 'name' => 'パナマ共和国', 'name_en' => 'Republic of Panama' ],
                    [ 'name' => 'ペルー共和国', 'name_en' => 'Republic of Peru' ],
                    [ 'name' => 'フランス領ポリネシア', 'name_en' => 'French Polynesia' ],
                    [ 'name' => 'パプアニューギニア', 'name_en' => 'Papua New Guinea' ],
                    [ 'name' => 'フィリピン共和国', 'name_en' => 'Republic of the Philippines' ],
                    [ 'name' => 'パキスタン・イスラム共和国', 'name_en' => 'Islamic Republic of Pakistan' ],
                    [ 'name' => 'ポーランド共和国', 'name_en' => 'Republic of Poland' ],
                    [ 'name' => 'サンピエール島・ミクロン島', 'name_en' => 'Saint Pierre and Micron' ],
                    [ 'name' => 'ピトケアン島', 'name_en' => 'Pitcairn Islands' ],
                    [ 'name' => 'プエルトリコ', 'name_en' => 'Puerto Rico' ],
                    [ 'name' => 'パレスチナ占領区域', 'name_en' => 'Palestinian Occupied Area' ],
                    [ 'name' => 'ポルトガル共和国', 'name_en' => 'Portugal' ],
                    [ 'name' => '米領太平洋諸島', 'name_en' => 'U.S. Pacific Islands' ],
                    [ 'name' => 'パラオ共和国', 'name_en' => 'Republic of Palau' ],
                    [ 'name' => 'パラグアイ共和国', 'name_en' => 'Republic of Paraguay' ],
                    [ 'name' => 'カタール国', 'name_en' => 'Qatar' ],
                    [ 'name' => 'レユニオン', 'name_en' => 'Reunion' ],
                    [ 'name' => 'ルーマニア', 'name_en' => 'Romania' ],
                    [ 'name' => 'セルビア共和国', 'name_en' => 'Republic of Serbia' ],
                    [ 'name' => 'ロシア連邦', 'name_en' => 'Russian Federation' ],
                    [ 'name' => 'ルワンダ共和国', 'name_en' => 'Republic of Rwanda' ],
                    [ 'name' => 'サウジアラビア王国', 'name_en' => 'Kingdom of Saudi Arabia' ],
                    [ 'name' => 'ソロモン諸島', 'name_en' => 'Solomon Islands' ],
                    [ 'name' => 'セイシェル共和国', 'name_en' => 'Republic of Seychelles' ],
                    [ 'name' => 'スーダン共和国', 'name_en' => 'Republic of Sudan' ],
                    [ 'name' => 'スウェーデン王国', 'name_en' => 'Sweden' ],
                    [ 'name' => 'シンガポール共和国', 'name_en' => 'Republic of Singapore' ],
                    [ 'name' => 'セントヘレナ島', 'name_en' => 'St. Helena' ],
                    [ 'name' => 'スロベニア共和国', 'name_en' => 'Republic of Slovenia' ],
                    [ 'name' => 'スロバキア共和国', 'name_en' => 'Republic of Slovakia' ],
                    [ 'name' => 'シエラレオネ共和国', 'name_en' => 'Republic of Sierra Leone' ],
                    [ 'name' => 'サンマリノ共和国', 'name_en' => 'Republic of San Marino' ],
                    [ 'name' => 'セネガル共和国', 'name_en' => 'Republic of Senegal' ],
                    [ 'name' => 'ソマリア民主共和国', 'name_en' => 'Democratic Republic of Somalia' ],
                    [ 'name' => 'スリナム共和国', 'name_en' => 'Republic of Suriname' ],
                    [ 'name' => 'サントメ・プリンシペ民主共和国', 'name_en' => 'Sao Tome Principe Democratic Republic' ],
                    [ 'name' => 'エルサルバドル共和国', 'name_en' => 'Republic of El Salvador' ],
                    [ 'name' => 'シリア・アラブ共和国', 'name_en' => 'Syria Arab Republic' ],
                    [ 'name' => 'スワジランド王国', 'name_en' => 'Kingdom of Swaziland' ],
                    [ 'name' => 'タークス諸島・カイコス諸島', 'name_en' => 'Turks and Caicos Islands' ],
                    [ 'name' => 'チャド共和国', 'name_en' => 'Republic of Chad' ],
                    [ 'name' => 'フランス領極南諸島', 'name_en' => 'French Far South Islands' ],
                    [ 'name' => 'トーゴ共和国', 'name_en' => 'Republic of Togo' ],
                    [ 'name' => 'タイ王国', 'name_en' => 'Kingdom of Thailand' ],
                    [ 'name' => 'タジキスタン共和国', 'name_en' => 'Republic of Tajikistan' ],
                    [ 'name' => 'トケラウ諸島', 'name_en' => 'Tokelau Islands' ],
                    [ 'name' => '東ティモール民主共和国', 'name_en' => 'Democratic Republic of East Timor' ],
                    [ 'name' => 'トルクメニスタン', 'name_en' => 'Turkmenistan' ],
                    [ 'name' => 'チュニジア共和国', 'name_en' => 'Republic of Tunisia' ],
                    [ 'name' => 'トンガ王国', 'name_en' => 'Kingdom of Tonga' ],
                    [ 'name' => 'トルコ共和国', 'name_en' => 'Republic of Turkey' ],
                    [ 'name' => 'トリニダード・トバゴ共和国', 'name_en' => 'Republic of Trinidad and Tobago' ],
                    [ 'name' => 'ツバル', 'name_en' => 'Tuvalu' ],
                    [ 'name' => 'タイワン(台湾)', 'name_en' => 'Taiwan (Taiwan)' ],
                    [ 'name' => 'タンザニア連合共和国', 'name_en' => 'United Republic of Tanzania' ],
                    [ 'name' => 'ウクライナ', 'name_en' => 'Ukraine' ],
                    [ 'name' => 'ウガンダ共和国', 'name_en' => 'Republic of Uganda' ],
                    [ 'name' => '米領太平洋諸島', 'name_en' => 'U.S. Pacific Islands' ],
                    [ 'name' => 'アメリカ合衆国(米国)', 'name_en' => 'United States (USA)' ],
                    [ 'name' => 'ウルグアイ東方共和国', 'name_en' => 'Uruguay Eastern Republic' ],
                    [ 'name' => 'ウズベキスタン共和国', 'name_en' => 'Republic of Uzbekistan' ],
                    [ 'name' => 'バチカン市国', 'name_en' => 'Vatican City' ],
                    [ 'name' => 'セントビンセントおよびグレナディーン諸島', 'name_en' => 'Saint Vincent and the Grenadines' ],
                    [ 'name' => 'ベネズエラ・ボリバル共和国', 'name_en' => 'Republic of Venezuela Bolivar' ],
                    [ 'name' => '英領バージン諸島', 'name_en' => 'British Virgin Islands' ],
                    [ 'name' => '米領バージン諸島', 'name_en' => 'US Virgin Islands' ],
                    [ 'name' => 'ベトナム社会主義共和国', 'name_en' => 'the Socialist Republic of Vietnam' ],
                    [ 'name' => 'バヌアツ共和国', 'name_en' => 'Republic of Vanuatu' ],
                    [ 'name' => 'ワリス・フテュナ諸島', 'name_en' => 'Wallis Futuna Islands' ],
                    [ 'name' => 'ウェーク島', 'name_en' => 'Wake Island' ],
                    [ 'name' => 'サモア独立国', 'name_en' => 'Samoa Independent Country' ],
                    [ 'name' => '出版地不明', 'name_en' => 'Unknown place of publication' ],
                    [ 'name' => 'イエメン共和国', 'name_en' => 'Republic of Yemen' ],
                    [ 'name' => 'マイヨット島', 'name_en' => 'My yacht island' ],
                    [ 'name' => '南アフリカ共和国', 'name_en' => 'Republic of South Africa' ],
                    [ 'name' => 'ザンビア共和国', 'name_en' => 'Republic of Zambia' ],
                    [ 'name' => 'ジンバブエ共和国', 'name_en' => 'Republic of Zimbabwe' ],
                ]
            );
        }
	}
}
