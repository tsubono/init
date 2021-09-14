<?php

return [
    // 言語レベル
    'language_levels' => [
        1 => '初心者',
        2 => '中級者',
        3 => '上級者',
        // TODO: 実データに置き換え
    ],

    // コイン有効期限月数
    'coin_expiration_month' => 1,

    // お問い合わせカテゴリ
    'contact_categories' => [
        '生徒・講師登録について',
        '受講申請・キャンセルについて',
        'コインについて',
        '生徒・講師と連絡が取れない',
        '退会について',
        'その他',
    ],

    /**
     * 受講料の負担率
     * key:日
     * value:負担率
     */
    'cancel_rate' => [
        'to_adviser' => [
            7 => 0,
            6 => 0,
            5 => 0.05,
            4 => 0.05,
            3 => 0.05,
            2 => 0.1,
            1 => 0.15,
            0 => 0.2,
        ],

        'to_mate' => [
            7 => 0,
            6 => 0,
            5 => 0.2,
            4 => 0.2,
            3 => 0.2,
            2 => 0.5,
            1 => 1,
            0 => 1,
        ],
    ],

    // 動画種別
    'movie_types' => [
      'youtube',
      'vimeo',
      'twitter',
      'fb',
      'instagram',
      'tiktok',
    ],
];
