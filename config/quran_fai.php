<?php

return [

    'languages' => [
        'en' => ['name' => 'English', 'flag' => '🇬🇧'],
        'ms' => ['name' => 'Bahasa Melayu', 'flag' => '🇲🇾'],
        'id' => ['name' => 'Bahasa Indonesia', 'flag' => '🇮🇩'],
        'ar' => ['name' => 'العربية', 'flag' => '🇸🇦'],
    ],

    'flow' => [
        'listen',
        'repeat',
        'touch',
        'match',
        'read',
        'challenge',
        'reward',
    ],

    'levels' => [

        1 => [
            'icon' => 'ا',
            'titles' => [
                'en' => 'Arabic Letters',
                'ms' => 'Huruf Hijaiyah',
                'id' => 'Huruf Hijaiyah',
                'ar' => 'الحروف العربية',
            ],
            'descriptions' => [
                'en' => 'Recognise and pronounce the Hijaiyah letters.',
                'ms' => 'Kenali dan sebut huruf Hijaiyah dengan betul.',
                'id' => 'Kenali dan ucapkan huruf Hijaiyah dengan benar.',
                'ar' => 'تعرّف على الحروف الهجائية وانطقها نطقًا صحيحًا.',
            ],
            'content' => [
                'ا','ب','ت','ث','ج','ح','خ',
                'د','ذ','ر','ز','س','ش','ص',
                'ض','ط','ظ','ع','غ','ف','ق',
                'ك','ل','م','ن','ه','و','ي'
            ],
        ],

        2 => [
            'icon' => 'ب',
            'titles' => [
                'en' => 'Letter Sounds',
                'ms' => 'Bunyi Huruf',
                'id' => 'Bunyi Huruf',
                'ar' => 'أصوات الحروف',
            ],
        ],

        3 => [
            'icon' => 'بَ',
            'titles' => [
                'en' => 'Fathah, Kasrah & Dammah',
                'ms' => 'Fathah, Kasrah & Dammah',
                'id' => 'Fathah, Kasrah & Dammah',
                'ar' => 'الفتحة والكسرة والضمة',
            ],
            'examples' => ['بَ','بِ','بُ'],
        ],

        4 => [
            'icon' => 'ـبـ',
            'titles' => [
                'en' => 'Joining Letters',
                'ms' => 'Menyambung Huruf',
                'id' => 'Menyambung Huruf',
                'ar' => 'وصل الحروف',
            ],
        ],

        5 => [
            'icon' => 'بْ',
            'titles' => [
                'en' => 'Tanwin, Sukun & Shaddah',
                'ms' => 'Tanwin, Sukun & Shaddah',
                'id' => 'Tanwin, Sukun & Shaddah',
                'ar' => 'التنوين والسكون والشدة',
            ],
            'examples' => ['بً','بٍ','بٌ','بْ','بّ'],
        ],

        6 => [
            'icon' => 'بَا',
            'titles' => [
                'en' => 'Madd — Long Sounds',
                'ms' => 'Mad — Bacaan Panjang',
                'id' => 'Mad — Bacaan Panjang',
                'ar' => 'المدود',
            ],
        ],

        7 => [
            'icon' => '۞',
            'titles' => [
                'en' => 'Basic Tajwid',
                'ms' => 'Asas Tajwid',
                'id' => 'Dasar Tajwid',
                'ar' => 'أساسيات التجويد',
            ],
        ],

        8 => [
            'icon' => 'كلمة',
            'titles' => [
                'en' => 'Quranic Words',
                'ms' => 'Perkataan Al-Quran',
                'id' => 'Kata-Kata Al-Quran',
                'ar' => 'كلمات قرآنية',
            ],
        ],

        9 => [
            'icon' => 'آية',
            'titles' => [
                'en' => 'Short Ayat',
                'ms' => 'Ayat Pendek',
                'id' => 'Ayat Pendek',
                'ar' => 'آيات قصيرة',
            ],
        ],

        10 => [
            'icon' => '📖',
            'titles' => [
                'en' => 'Read with FAI',
                'ms' => 'Baca Bersama FAI',
                'id' => 'Baca Bersama FAI',
                'ar' => 'اقرأ مع FAI',
            ],
        ],
    ],

    'voice' => [
        'teacher_languages' => ['en', 'ms', 'id', 'ar'],
        'pronunciation_language' => 'ar',
        'audio_root' => '/audio/quran-fai',
        'require_human_review' => true,
    ],

];
