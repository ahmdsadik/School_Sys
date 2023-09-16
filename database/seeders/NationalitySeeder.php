<?php

namespace Database\Seeders;

use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitySeeder extends Seeder
{
    public function run(): void
    {
        // Delete all rows from nationalities table
//        \DB::table('nationalities')->truncate();

        $nationalities = [
            [
                'ar' => 'مصري',
                'en' => 'Egyptian'
            ],
            [
                'ar' => 'سعودي',
                'en' => 'Saudi Arabian'
            ],
            [
                'ar' => 'لبناني',
                'en' => 'Lebanese'
            ],
            [
                'ar' => 'فلسطيني',
                'en' => 'Palestinian'
            ],
            [
                'ar' => 'أردني',
                'en' => 'Jordanian'
            ],
            [
                'ar' => 'سوري',
                'en' => 'Syrian'
            ],
            [
                'ar' => 'عراقي',
                'en' => 'Iraqi'
            ],
            [
                'ar' => 'كويتي',
                'en' => 'Kuwaiti'
            ],
            [
                'ar' => 'قطري',
                'en' => 'Qatari'
            ],
            [
                'ar' => 'إماراتي',
                'en' => 'Emirati'
            ],
            [
                'ar' => 'بحريني',
                'en' => 'Bahraini'
            ],
            [
                'ar' => 'عماني',
                'en' => 'Omani'
            ],
            [
                'ar' => 'يمني',
                'en' => 'Yemeni'
            ],
            [
                'ar' => 'جزائري',
                'en' => 'Algerian'
            ],
            [
                'ar' => 'تونسي',
                'en' => 'Tunisian'
            ],
            [
                'ar' => 'مغربي',
                'en' => 'Moroccan'
            ],
            [
                'ar' => 'ليبي',
                'en' => 'Libyan'
            ],
            [
                'ar' => 'موريتاني',
                'en' => 'Mauritanian'
            ],
            [
                'ar' => 'صومالي',
                'en' => 'Somali'
            ],
            [
                'ar' => 'جيبوتي',
                'en' => 'Djiboutian'
            ],
            [
                'ar' => 'سوداني',
                'en' => 'Sudanese'
            ],
            [
                'ar' => 'جنوب السوداني',
                'en' => 'South Sudanese'
            ],
            [
                'ar' => 'مالي',
                'en' => 'Malian'
            ],
            [
                'ar' => 'نيجري',
                'en' => 'Nigerien'
            ],
            [
                'ar' => 'تشادي',
                'en' => 'Chadian'
            ],
            [
                'ar' => 'ليبيري',
                'en' => 'Liberian'
            ],
            [
                'ar' => 'غاني',
                'en' => 'Ghanaian'
            ],
            [
                'ar' => 'نيجيري',
                'en' => 'Nigerian'
            ],
            [
                'ar' => 'سنغالي',
                'en' => 'Senegalese'
            ],
            [
                'ar' => 'غامبي',
                'en' => 'Gambian'
            ],
            [
                'ar' => 'غيني',
                'en' => 'Guinean'
            ],
            [
                'ar' => 'سيراليوني',
                'en' => 'Sierra Leonean'
            ],
            [
                'ar' => 'ليبي',
                'en' => 'Libyan'
            ],
            [
                'ar' => 'موريتاني',
                'en' => 'Mauritanian'
            ],
            [
                'ar' => 'توغولي',
                'en' => 'Togolese'
            ],
            [
                'ar' => 'بنيني',
                'en' => 'Beninese'
            ],
            [
                'ar' => 'بوركيني',
                'en' => 'Burkinabe'
            ],
            [
                'ar' => 'كوت ديفواري',
                'en' => 'Ivorian'
            ],
            [
                'ar' => 'غينيا-بيساوية',
                'en' => 'Guinea-Bissauan'
            ],
            [
                'ar' => 'غينيا الاستوائية',
                'en' => 'Equatorial Guinean'
            ],
            [
                'ar' => 'كونغولي',
                'en' => 'Congolese'
            ],
            [
                'ar' => 'غابوني',
                'en' => 'Gabonese'
            ],
            [
                'ar' => 'رواندي',
                'en' => 'Rwandan'
            ],
            [
                'ar' => 'بوروندي',
                'en' => 'Burundian'
            ],
            [
                'ar' => 'أوغندي',
                'en' => 'Ugandan'
            ],
            [
                'ar' => 'كيني',
                'en' => 'Kenyan'
            ],
            [
                'ar' => 'تنزاني',
                'en' => 'Tanzanian'
            ],
            [
                'ar' => 'زامبي',
                'en' => 'Zambian'
            ],
            [
                'ar' => 'زيمبابوي',
                'en' => 'Zimbabwean'
            ],
            [
                'ar' => 'مالاوي',
                'en' => 'Malawian'
            ],
            [
                'ar' => 'مدغشقري',
                'en' => 'Malagasy'
            ],
            [
                'ar' => 'جزر القمري',
                'en' => 'Comorian'
            ],
            [
                'ar' => 'أنجولي',
                'en' => 'Angolan'
            ],
            [
                'ar' => 'غينيا الجديدة',
                'en' => 'Papua New Guinean'
            ],
            [
                'ar' => 'سليماني',
                'en' => 'Solomon Islander'
            ],
            [
                'ar' => 'فانواتوي',
                'en' => 'Ni-Vanuatu'
            ],
            [
                'ar' => 'فيجياني',
                'en' => 'Fijian'
            ],
            [
                'ar' => 'تونغاني',
                'en' => 'Tongan'
            ],
            [
                'ar' => 'ساموي',
                'en' => 'Samoan'
            ],
            [
                'ar' => 'كيريباتي',
                'en' => 'Kiribati'
            ],
            [
                'ar' => 'توفالوي',
                'en' => 'Tuvaluan'
            ],
            [
                'ar' => 'ناوروي',
                'en' => 'Nauruan'
            ],
            [
                'ar' => 'ماوريتانيا',
                'en' => 'Mauritanian'
            ],
            [
                'ar' => 'دومينيكاني',
                'en' => 'Dominican'
            ],
            [
                'ar' => 'هايتي',
                'en' => 'Haitian'
            ],
            [
                'ar' => 'بورتوريكي',
                'en' => 'Puerto Rican'
            ],
            [
                'ar' => 'كوبي',
                'en' => 'Cuban'
            ],
            [
                'ar' => 'جامايكي',
                'en' => 'Jamaican'
            ],
            [
                'ar' => 'ترينيدادي',
                'en' => 'Trinidadian'
            ],
            [
                'ar' => 'جزر البهاماس',
                'en' => 'Bahamian'
            ],
            [
                'ar' => 'جزر العذراء البريطانية',
                'en' => 'British Virgin Islander'
            ],
            [
                'ar' => 'أنتيغوي',
                'en' => 'Antiguan'
            ],
            [
                'ar' => 'كيماني',
                'en' => 'Caymanian'
            ],
            [
                'ar' => 'دومينيكي',
                'en' => 'Dominican'
            ],
            [
                'ar' => 'غرينادي',
                'en' => 'Grenadian'
            ],
        ];

        // loop over the nationalities array
        foreach ($nationalities as $nationality) {
            Nationality::create([
                'name' => $nationality
            ]);
        }
    }
}
