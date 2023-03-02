<?php

namespace App\Providers;

use Collective\Html\FormFacade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $component = 'admin.components.';
        FormFacade::component('cEmail', $component . 'email', ['label', 'name', 'attributes', 'required', 'extras']);
        FormFacade::component('cText', $component . 'text', ['label', 'name', 'attributes', 'required', 'extras']);
        FormFacade::component('cSwitch', $component . 'switch', ['label', 'name', 'value', 'checked']);
    }
}
