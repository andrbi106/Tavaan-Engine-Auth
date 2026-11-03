<?php

declare(strict_types=1);

/*|--------------------------------------------------------------------------
 | Auth Engine Configuration
 |--------------------------------------------------------------------------
 |
 | پیکربندی موتور auth — همهٔ کلیدهای مستندشده در `docs/03-engines/auth.md` بخش «پیکربندی».
 |
 |@see https://github.com/Derogaramin/Tavaan-Doc/blob/main/docs/03-engines/auth.md
 */

return [
    /*| پیش‌فرض موتور (driver/store یا حالت فعال) */
    'default' => env('AUTH_DEFAULT', 'default'),

    /*| کلید کش (در صورت استفاده) */
    'prefix' => env('AUTH_PREFIX', 'auth:'),

    /*| تنظیمات لاگ */
    'log' => [
        'channel' => env('AUTH_LOG_CHANNEL', 'auth'),
    ],

    /*| Facade */
    'facade' => [
        'name' => 'Auth',
        'accessor' => 'auth',
    ],

    /*| سایر کلیدها (طبق مستندات) */
    'options' => [
        // TODO: کلیدهای اضافی طبق سند §۶ (پیکربندی)
    ],
];