<?php

namespace LaraSpells\AssetCollector;

use Blade;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeDirectives();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AssetCollector::class, function($app) {
            return new AssetCollector;
        });
    }

    /**
     * Register blade directives
     *
     * @return void
     */
    protected function registerBladeDirectives()
    {
        $class = AssetCollector::class;

        Blade::directive('css', function($css) use ($class) {
            return "<?php app('{$class}')->addExternalStyle($css); ?>";
        });

        Blade::directive('js', function($js) use ($class) {
            return "<?php app('{$class}')->addExternalScript($js); ?>";
        });

        Blade::directive('style', function($alias = null) {
            $alias = $alias ?: 'null';
            return "<?php \$__style_alias = {$alias}; ob_start(); ?>";
        });

        Blade::directive('endstyle', function() use ($class) {
            return "<?php app('{$class}')->addInternalStyle(ob_get_clean(), \$__style_alias) ?>";
        });

        Blade::directive('script', function($alias = null) {
            $alias = $alias ?: 'null';
            return "<?php \$__script_alias = {$alias}; ob_start(); ?>";
        });

        Blade::directive('endscript', function() use ($class) {
            return "<?php app('{$class}')->addInternalScript(ob_get_clean(), \$__script_alias) ?>";
        });

        Blade::directive('styles', function() use ($class) {
            return "<?= app('{$class}')->renderStyles() ?>";
        });

        Blade::directive('scripts', function() use ($class) {
            return "<?= app('{$class}')->renderScripts() ?>";
        });
    }
}
