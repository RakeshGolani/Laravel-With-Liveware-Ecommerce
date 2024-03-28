<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'website_name' => 'Riyaan Ecom',
            'website_url'=> 'https://www.riyaanecom.com/',
            'page_title'=> 'Ecommerce',
            'meta_keyword'=> 'Laravel Ecommerce',
            'address'=> '1301-1307, iSquare, Shukan Cross Road, Science City Rd, Sola, Ahmedabad, Gujarat 380060',
            'phone1'=> '+917984861620',
            'phone2'=> '+919800000000',
            'email1'=> 'ecommerce@gmail.com',
            'email2'=> 'xyz@gmail.com',
            'facebook'=> 'https://www.facebook.com/',
            'twitter'=> 'https://www.twitter.com/',
            'instagram'=> 'https://www.instagram.com/',
            'youtube'=> 'https://www.youtube.com/',
        ]);
    }
}
