<?php

namespace elgazar\Certificate;

use Illuminate\Support\Facades\Schema;
use Botble\PluginManagement\Abstracts\PluginOperationAbstract;

class Plugin extends PluginOperationAbstract
{
    public static function remove(): void
    {
        Schema::dropIfExists('Certificates');
        Schema::dropIfExists('Certificates_translations');
    }
}
