<?php

use Botble\Base\Facades\AdminHelper;
use elgazar\Certificate\Http\Controllers\CertificateController;
use Botble\Theme\Facades\Theme;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Support\Facades\Route;

// مسارات لوحة التحكم
AdminHelper::registerRoutes(function () {
    Route::group(['prefix' => 'certificates', 'as' => 'certificate.'], function () {
        Route::resource('', CertificateController::class)->parameters(['' => 'certificate']);
    });
});

if (defined('THEME_MODULE_SCREEN_NAME')) {
    Theme::registerRoutes(function (): void {
        Route::get(SlugHelper::getPrefix(Certificate::class, 'certificates') ?: 'certificates', [CertificateController::class, 'certificates'])
            ->name('public.certificates');
    });
}