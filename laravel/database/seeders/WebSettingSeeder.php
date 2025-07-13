<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\WebSettings;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'type' => 'image',
                'title' => 'Default Banner Background',
                'key' => 'DEFAULT_BANNER_BG',
                'img' => 'web_settings/defaults/banner_bg.png',
                'value_th' => null
            ],[
                'type' => 'image',
                'title' => 'Website Navigation Logo',
                'key' => 'WEBSITE_NAVIGATION_LOGO',
                'img' => 'web_settings/defaults/logo_h.png',
                'value_th' => null
            ],[
                'type' => 'image',
                'title' => 'Website Favicon',
                'key' => 'WEBSITE_FAVICON',
                'img' => 'web_settings/defaults/favicon.png',
                'value_th' => null
            ],[
                'type' => 'text',
                'title' => 'Website Name',
                'key' => 'WEBSITE_NAME',
                'img' => null,
                'value_th' => 'ECOCELLULAB - Official Website'
            ],[
                'type' => 'text',
                'title' => 'Website Description',
                'key' => 'WEBSITE_DESCRIPTION',
                'img' => null,
                'value_th' => null
            ],[
                'type' => 'text',
                'title' => 'Website Keywords',
                'key' => 'WEBSITE_KEYWORDS',
                'img' => null,
                'value_th' => null
            ],[
                'type' => 'text',
                'title' => 'Website Author',
                'key' => 'WEBSITE_AUTHOR',
                'img' => null,
                'value_th' => null
            ],[
                'type' => 'image',
                'title' => 'Website Share Image',
                'key' => 'WEBSITE_SHARE_IMAGE',
                'img' => 'web_settings/defaults/share_image.png',
                'value_th' => null
            ],[
                'type' => 'code',
                'title' => 'Google Analytics Script',
                'key' => 'GOOGLE_ANALYTICS_SCRIPT',
                'img' => null,
                'value_th' => null
            ],[
                'type' => 'code',
                'title' => 'Facebook Pixel Script',
                'key' => 'FACEBOOK_PIXEL_SCRIPT',
                'img' => null,
                'value_th' => null
            ],[
                'type' => 'image',
                'title' => 'Website Logo',
                'key' => 'WEBSITE_LOGO',
                'img' => 'web_settings/defaults/logo_v.png',
                'value_th' => null
            ],[
                'type' => 'text',
                'title' => 'Company Name',
                'key' => 'COMPANY_NAME',
                'img' => null,
                'value_th' => 'ECOCELLULAB CO., LTD.'
            ],[
                'type' => 'longText',
                'title' => 'Company Address',
                'key' => 'COMPANY_ADDRESS',
                'img' => null,
                'value_th' => '<p>20 / 295 Country Park 2 Village Moo 2, Liang Nong Mon Road, Huaikapi, Mueang Chonburi, Chonburi 20000</p>'
            ],[
                'type' => 'email',
                'title' => 'Company Email',
                'key' => 'COMPANY_EMAIL',
                'img' => null,
                'value_th' => 'pc.ceo@ecocellulab.com'
            ],[
                'type' => 'tel',
                'title' => 'Company Phone',
                'key' => 'COMPANY_PHONE',
                'img' => null,
                'value_th' => '+(66) 81 659 9949'
            ],[
                'type' => 'text',
                'title' => 'Company Registration Number',
                'key' => 'COMPANY_REGISTRATION_NUMBER',
                'img' => null,
                'value_th' => '0105556000001'
            ],[
                'type' => 'map',
                'title' => 'Company Map',
                'key' => 'COMPANY_MAP',
                'img' => null,
                'value_th' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1941.5026860084836!2d100.94545428246835!3d13.287604743767245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3102b5b23a0092bd%3A0xd0de3adb32127142!2zMjAg4LiE4Lix4LiZ4LiX4Lij4Li14Lib4Liy4Lij4LmM4LiEIDLguYDguJ_guKogMg!5e0!3m2!1sen!2sth!4v1749657430310!5m2!1sen!2sth'
            ],[
                'type' => 'link',
                'title' => 'Company Facebook',
                'key' => 'COMPANY_FACEBOOK',
                'img' => null,
                'value_th' => 'https://www.facebook.com/ecocellulab'
            ],[
                'type' => 'link',
                'title' => 'Company Twitter',
                'key' => 'COMPANY_TWITTER',
                'img' => null,
                'value_th' => 'https://twitter.com/ecocellulab'
            ],[
                'type' => 'link',
                'title' => 'Company YouTube',
                'key' => 'COMPANY_YOUTUBE',
                'img' => null,
                'value_th' => 'https://www.youtube.com/@ecocellulab'
            ],[
                'type' => 'link',
                'title' => 'Company Instagram',
                'key' => 'COMPANY_INSTAGRAM',
                'img' => null,
                'value_th' => 'https://www.instagram.com/ecocellulab/'
            ],[
                'type' => 'link',
                'title' => 'Company LinkedIn',
                'key' => 'COMPANY_LINKEDIN',
                'img' => null,
                'value_th' => 'https://www.linkedin.com/company/ecocellulab/'
            ],[
                'type' => 'email',
                'title' => 'Company Contact Email',
                'key' => 'COMPANY_CONTACT_EMAIL',
                'img' => null,
                'value_th' => 'pc.ceo@ecocellulab.com'
            ]
        ];

        foreach( $datas as $item ){
            $webSetting = WebSettings::where('key', $item['key']);
            if( $webSetting->count() <= 0 ){
                $webSetting->insert([
                    'type' => $item['type'],
                    'title' => $item['title'],
                    'key' => $item['key'],
                    'img' => $item['img'],
                    'value_th' => $item['value_th'],
                    'created_at' => now()
                ]);
            }
        }
    }
}
