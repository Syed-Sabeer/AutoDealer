<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            ['name' => 'English', 'iso_code' => 'en', 'native_name' => 'English'], // USA, UK, Australia, etc.
            ['name' => 'Spanish', 'iso_code' => 'es', 'native_name' => 'Español'], // Spain, Mexico, etc.
            ['name' => 'French', 'iso_code' => 'fr', 'native_name' => 'Français'], // France, Canada, etc.
            ['name' => 'Chinese', 'iso_code' => 'zh', 'native_name' => '中文'], // China
            ['name' => 'Arabic', 'iso_code' => 'ar', 'native_name' => 'العربية'], // Many Arab nations
            ['name' => 'Hindi', 'iso_code' => 'hi', 'native_name' => 'हिन्दी'], // India
            ['name' => 'Russian', 'iso_code' => 'ru', 'native_name' => 'Русский'], // Russia
            ['name' => 'Portuguese', 'iso_code' => 'pt', 'native_name' => 'Português'], // Portugal, Brazil
            ['name' => 'Bengali', 'iso_code' => 'bn', 'native_name' => 'বাংলা'], // Bangladesh
            ['name' => 'Urdu', 'iso_code' => 'ur', 'native_name' => 'اردو'], // Pakistan
            ['name' => 'Japanese', 'iso_code' => 'ja', 'native_name' => '日本語'], // Japan
            ['name' => 'German', 'iso_code' => 'de', 'native_name' => 'Deutsch'], // Germany
            ['name' => 'Korean', 'iso_code' => 'ko', 'native_name' => '한국어'], // South Korea
            ['name' => 'Turkish', 'iso_code' => 'tr', 'native_name' => 'Türkçe'], // Turkey
            ['name' => 'Italian', 'iso_code' => 'it', 'native_name' => 'Italiano'], // Italy
            ['name' => 'Persian', 'iso_code' => 'fa', 'native_name' => 'فارسی'], // Iran
            ['name' => 'Dutch', 'iso_code' => 'nl', 'native_name' => 'Nederlands'], // Netherlands, Belgium
            ['name' => 'Swedish', 'iso_code' => 'sv', 'native_name' => 'Svenska'], // Sweden
            ['name' => 'Greek', 'iso_code' => 'el', 'native_name' => 'Ελληνικά'], // Greece
            ['name' => 'Hebrew', 'iso_code' => 'he', 'native_name' => 'עברית'], // Israel
            ['name' => 'Thai', 'iso_code' => 'th', 'native_name' => 'ไทย'], // Thailand
            ['name' => 'Vietnamese', 'iso_code' => 'vi', 'native_name' => 'Tiếng Việt'], // Vietnam
            ['name' => 'Polish', 'iso_code' => 'pl', 'native_name' => 'Polski'], // Poland
            ['name' => 'Romanian', 'iso_code' => 'ro', 'native_name' => 'Română'], // Romania
            ['name' => 'Hungarian', 'iso_code' => 'hu', 'native_name' => 'Magyar'], // Hungary
            ['name' => 'Czech', 'iso_code' => 'cs', 'native_name' => 'Čeština'], // Czech Republic
            ['name' => 'Finnish', 'iso_code' => 'fi', 'native_name' => 'Suomi'], // Finland
            ['name' => 'Malay', 'iso_code' => 'ms', 'native_name' => 'Bahasa Melayu'], // Malaysia
            ['name' => 'Indonesian', 'iso_code' => 'id', 'native_name' => 'Bahasa Indonesia'], // Indonesia
            ['name' => 'Norwegian', 'iso_code' => 'no', 'native_name' => 'Norsk'], // Norway
            ['name' => 'Danish', 'iso_code' => 'da', 'native_name' => 'Dansk'], // Denmark
            ['name' => 'Slovak', 'iso_code' => 'sk', 'native_name' => 'Slovenčina'], // Slovakia
            ['name' => 'Serbian', 'iso_code' => 'sr', 'native_name' => 'Српски'], // Serbia
            ['name' => 'Bulgarian', 'iso_code' => 'bg', 'native_name' => 'Български'], // Bulgaria
            ['name' => 'Lithuanian', 'iso_code' => 'lt', 'native_name' => 'Lietuvių'], // Lithuania
            ['name' => 'Latvian', 'iso_code' => 'lv', 'native_name' => 'Latviešu'], // Latvia
            ['name' => 'Estonian', 'iso_code' => 'et', 'native_name' => 'Eesti'], // Estonia
            ['name' => 'Croatian', 'iso_code' => 'hr', 'native_name' => 'Hrvatski'], // Croatia
            ['name' => 'Slovenian', 'iso_code' => 'sl', 'native_name' => 'Slovenščina'], // Slovenia
            ['name' => 'Swahili', 'iso_code' => 'sw', 'native_name' => 'Kiswahili'], // Kenya, Tanzania, etc.
            ['name' => 'Afrikaans', 'iso_code' => 'af', 'native_name' => 'Afrikaans'], // South Africa
            ['name' => 'Albanian', 'iso_code' => 'sq', 'native_name' => 'Shqip'], // Albania
            ['name' => 'Armenian', 'iso_code' => 'hy', 'native_name' => 'Հայերեն'], // Armenia
            ['name' => 'Georgian', 'iso_code' => 'ka', 'native_name' => 'ქართული'], // Georgia
            ['name' => 'Pashto', 'iso_code' => 'ps', 'native_name' => 'پښتو'], // Afghanistan
            ['name' => 'Kurdish', 'iso_code' => 'ku', 'native_name' => 'Kurdî'], // Iraq, Iran, Turkey
            ['name' => 'Sindhi', 'iso_code' => 'sd', 'native_name' => 'سنڌي'], // Pakistan
            ['name' => 'Tamil', 'iso_code' => 'ta', 'native_name' => 'தமிழ்'], // Sri Lanka, India
            ['name' => 'Telugu', 'iso_code' => 'te', 'native_name' => 'తెలుగు'], // India
            ['name' => 'Marathi', 'iso_code' => 'mr', 'native_name' => 'मराठी'], // India
            ['name' => 'Gujarati', 'iso_code' => 'gu', 'native_name' => 'ગુજરાતી'], // India
        ];

        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
