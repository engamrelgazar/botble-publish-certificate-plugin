<?php

namespace elgazar\Certificate\Providers;

use Botble\Base\Supports\ServiceProvider;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Botble\Base\Facades\DashboardMenu;
use elgazar\Certificate\Models\Certificate;
use Botble\Theme\Facades\Theme;

class CertificateServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function boot(): void
    {
        $this
            ->setNamespace('plugins/certificate')
            ->loadHelpers()
            ->loadAndPublishConfigurations(['permissions'])
            ->loadAndPublishTranslations()
            ->loadRoutes()
            ->loadAndPublishViews()
            ->loadMigrations();
            
            if (defined('LANGUAGE_ADVANCED_MODULE_SCREEN_NAME')) {
                \Botble\LanguageAdvanced\Supports\LanguageAdvancedManager::registerModule(Certificate::class, [
                    'name',
                ]);
            }
          Theme::asset()->container('footer')->add('fslightbox-js', 'https://cdn.jsdelivr.net/npm/fslightbox/index.js', [], []);

            DashboardMenu::default()->beforeRetrieving(function () {
                DashboardMenu::registerItem([
                    'id' => 'cms-plugins-certificate',
                    'priority' => 5,
                    'parent_id' => null,
                    'name' => 'plugins/certificate::certificate.name',
                    'icon' => 'fa-regular fa-file',
                    'url' => route('certificate.index'),
                    'permissions' => ['certificate.index'],
                ]);
            });
    }
}