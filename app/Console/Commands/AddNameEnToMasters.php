<?php

namespace App\Console\Commands;

use App\Mail\AttendanceReminderMail;
use App\Models\Attendance;
use App\Models\MstCategory;
use App\Models\MstCountry;
use App\Models\MstLanguage;
use App\Models\MstRoom;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AddNameEnToMasters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:name_en_to_masters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add name_en to master tables';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $nameEnForLanguage = $this->getNameEnForLanguage();
        MstLanguage::all()->each(function (MstLanguage $mstLanguage) use ($nameEnForLanguage) {
            $mstLanguage->update(['name_en' => $nameEnForLanguage[$mstLanguage->id - 1]]);
        });
        if (!MstLanguage::query()->where('name', '韓国語')->exists()) {
            MstLanguage::create([
                'name' => '韓国語',
                'name_en' => 'Korean',
            ]);
        }

        $nameEnForCategory = $this->getNameEnForCategory();
        MstCategory::all()->each(function (MstCategory $mstCategory) use ($nameEnForCategory) {
            $mstCategory->update(['name_en' => $nameEnForCategory[$mstCategory->id - 1]]);
        });

        $nameEnForRoom = $this->getNameEnForRoom();
        MstRoom::all()->each(function (MstRoom $mstRoom) use ($nameEnForRoom) {
            $mstRoom->update(['name_en' => $nameEnForRoom[$mstRoom->id - 1]]);
        });

        $nameEnForCountry = $this->getNameEnForCountry();
        MstCountry::all()->each(function (MstCountry $mstCountry) use ($nameEnForCountry) {
            $mstCountry->update(['name_en' => $nameEnForCountry[$mstCountry->id - 1]]);
        });
    }

    /**
     * @return string[]
     */
    private function getNameEnForLanguage()
    {
        return [
            'Japanese',
            'English language',
            'Thai',
            'Korean',
        ];
    }

    /**
     * @return string[]
     */
    private function getNameEnForCategory()
    {
        return [
            'Language',
            'Qualification acquisition',
            'fashion',
            'Beauty',
            'Lifestyle',
            'Fitness',
            'Language',
            'IT',
            'music',
            'art',
            'Sports',
            'Therapy / fortune-telling',
        ];
    }

    /**
     * @return string[]
     */
    private function getNameEnForRoom()
    {
        return [
            'Business room',
            'Self-polishing room',
            'Skill up room',
        ];
    }

    /**
     * @return string[]
     */
    private function getNameEnForCountry()
    {
        return [
            'Andorra Principality',
            'United Arab Emirates',
            'Islamic State of Afghanistan',
            'Antigua and Barbuda',
            'Anguilla',
            'Republic of Albania',
            'Republic of Armenia',
            'Dutch antilles',
            'Republic of Angola',
            'Antarctic',
            'Republic of Argentina',
            'American Samoa',
            'Austria',
            'Australia',
            'Aruba',
            'Republic of Azerbaijan',
            'Bosnia-Herzegovina',
            'Barbados',
            "Bangladesh People's Republic",
            'Kingdom of Belgium',
            'Burkina Faso',
            'Bulgaria',
            'Kingdom of Bahrain',
            'Republic of Burundi',
            'Republic of Benin',
            'Saint Barthelemy',
            'Bermuda',
            'Brunei Darussalam',
            'Bolivia multi-ethnic country',
            'Federal Republic of Brazil',
            'Bahamas country',
            'Kingdom of Bhutan',
            'Bouvet Island',
            'Republic of Botswana',
            'Republic of Belarus',
            'Belize',
            'Canada',
            'Cocos Islands',
            'Democratic Republic of the Congo',
            'Central African Republic',
            'Republic of the Congo',
            'Switzerland',
            "Republic of Cote d'Ivoire",
            'Cook Islands',
            'Republic of Chile',
            'Republic of Cameroon',
            "People's Republic of China",
            'Republic of Colombia',
            'Republic of Costa Rica',
            'Republic of Cuba',
            'Republic of Cape Verde',
            'Christmas island',
            'Republic of Cyprus',
            'Czech Republic',
            'The Federal Republic of Germany',
            'Republic of Djibouti',
            'Kingdom of Denmark',
            'Dominica',
            'Dominican Republic',
            "Democratic People's Republic of Algeria",
            'Republic of Ecuador',
            'Republic of Estonia',
            'Egypt and Arab Republic',
            'Western Sahara',
            'Eritrea',
            'Spain',
            'Federal Democratic Republic of Ethiopia',
            'Republic of Finland',
            'Republic of Fiji',
            'Falkland (Malvinas) Islands',
            'Federated States of Micronesia',
            'Faroe Islands',
            'France',
            'Republic of Gabon',
            'United Kingdom of Great Britain and Northern Ireland (United Kingdom)',
            'Grenada',
            'Georgia',
            'French Guiana',
            'Republic of Ghana',
            'Gibraltar',
            'Greenland',
            'Republic of The Gambia',
            'Republic of Guinea',
            'Guadeloupe',
            'Equatorial Guinea',
            'Republic of Greece',
            'South Georgia and the South Sandwich Islands',
            'Republic of Guatemala',
            'Guam',
            'Guinea-Bissau Republic',
            'Guyana Cooperative Republic',
            'Heard Island and McDonald Islands',
            'Republic of Honduras',
            'Croatia',
            'Republic of Haiti',
            'Republic of Hungary',
            'Republic of Indonesia',
            'Ireland',
            'Israel',
            'India',
            'British Indian Ocean Territory',
            'Republic of Iraq',
            'Iran Islamic Republic',
            'Iceland',
            'Italy',
            'Jamaica',
            'Kingdom of Hashemite, Jordan',
            'Japan',
            'Johnston Island',
            'Republic of Kenya',
            'Republic of Kyrgyzstan',
            'Kingdom of Cambodia',
            'Republic of Kiribati',
            'Comoros Union',
            'Saint Kitts and Nevis',
            "(North Korea = Democratic People's Republic of Korea)",
            'South Korea',
            'Kuwait',
            'Cayman Islands',
            'Republic of Kazakhstan',
            "Lao People's Democratic Republic",
            'Republic of Lebanon',
            'Saint Lucia',
            'Principality of Liechtenstein',
            'Democratic Socialist Republic of Sri Lanka',
            'Republic of Liberia',
            'Kingdom of Lesotho',
            'Republic of Lithuania',
            'Grand Duchy of Luxembourg',
            'Republic of Latvia',
            'Socialist People Libya Arab Country',
            'Kingdom of Morocco',
            'Principality of Monaco',
            'Republic of Moldova',
            'Montenegro',
            'Saint Martin',
            'Republic of Madagascar',
            'Republic of Marshall Islands',
            'Midway Islands',
            'Former Yugoslav Republic of Macedonia',
            'Republic of Mali',
            'Myanmar Federation',
            'Mongolia',
            'Northern Mariana Islands',
            'Martinique',
            'Islamic Republic of Mauritania',
            'Montserrat',
            'Republic of Malta',
            'Mauritius',
            'Republic of Maldives',
            'Republic of Malawi',
            'Mexico United States',
            'Malaysia',
            'Republic of Mozambique',
            'Republic of Namibia',
            'New Caledonia',
            'Republic of Niger',
            'Norfolk Island',
            'Federal Republic of Nigeria',
            'Republic of Nicaragua',
            'Kingdom of the Netherlands',
            'Kingdom of Norway',
            'Federal Democratic Republic of Nepal',
            'Republic of Nauru',
            'Neutral zone',
            'Niue',
            'new Zealand',
            'Oman country',
            'Republic of Panama',
            'Republic of Peru',
            'French Polynesia',
            'Papua New Guinea',
            'Republic of the Philippines',
            'Islamic Republic of Pakistan',
            'Republic of Poland',
            'Saint Pierre and Micron',
            'Pitcairn Islands',
            'Puerto Rico',
            'Palestinian Occupied Area',
            'Portugal',
            'U.S. Pacific Islands',
            'Republic of Palau',
            'Republic of Paraguay',
            'Qatar',
            'Reunion',
            'Romania',
            'Republic of Serbia',
            'Russian Federation',
            'Republic of Rwanda',
            'Kingdom of Saudi Arabia',
            'Solomon Islands',
            'Republic of Seychelles',
            'Republic of Sudan',
            'Sweden',
            'Republic of Singapore',
            'St. Helena',
            'Republic of Slovenia',
            'Republic of Slovakia',
            'Republic of Sierra Leone',
            'Republic of San Marino',
            'Republic of Senegal',
            'Democratic Republic of Somalia',
            'Republic of Suriname',
            'Sao Tome Principe Democratic Republic',
            'Republic of El Salvador',
            'Syria Arab Republic',
            'Kingdom of Swaziland',
            'Turks and Caicos Islands',
            'Republic of Chad',
            'French Far South Islands',
            'Republic of Togo',
            'Kingdom of Thailand',
            'Republic of Tajikistan',
            'Tokelau Islands',
            'Democratic Republic of East Timor',
            'Turkmenistan',
            'Republic of Tunisia',
            'Kingdom of Tonga',
            'Republic of Turkey',
            'Republic of Trinidad and Tobago',
            'Tuvalu',
            'Taiwan (Taiwan)',
            'United Republic of Tanzania',
            'Ukraine',
            'Republic of Uganda',
            'U.S. Pacific Islands',
            'United States (USA)',
            'Uruguay Eastern Republic',
            'Republic of Uzbekistan',
            'Vatican City',
            'Saint Vincent and the Grenadines',
            'Republic of Venezuela Bolivar',
            'British Virgin Islands',
            'US Virgin Islands',
            'the Socialist Republic of Vietnam',
            'Republic of Vanuatu',
            'Wallis Futuna Islands',
            'Wake Island',
            'Samoa Independent Country',
            'Unknown place of publication',
            'Republic of Yemen',
            'My yacht island',
            'Republic of South Africa',
            'Republic of Zambia',
            'Republic of Zimbabwe',
        ];
    }
}
