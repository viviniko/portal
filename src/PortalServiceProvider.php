<?php

namespace Viviniko\Portal;

use Viviniko\Portal\Console\Commands\BlogTableCommand;
use Viviniko\Portal\Console\Commands\PortalTableCommand;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class PortalServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer =false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config files
        $this->publishes([
            __DIR__ . '/../config/portal.php' => config_path('portal.php'),
        ]);

        // Register commands
        $this->commands('command.portal.table');
        $this->commands('command.blog.table');

        $config = $this->app['config'];

        Relation::morphMap([
            'portal.page' => $config->get('portal.page'),
            'portal.blog_category' => $config->get('portal.blog_category'),
            'portal.blog' => $config->get('portal.blog'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/portal.php', 'portal');

        $this->registerPageService();
        $this->registerWidgetService();
        $this->registerWidgetItemService();

        $this->registerBlogService();

        $this->registerCommands();
    }

    private function registerWidgetItemService()
    {
        $this->app->singleton(
            \Viviniko\Portal\Contracts\WidgetItemService::class,
            \Viviniko\Portal\Services\WidgetItem\EloquentWidgetItem::class
        );
    }

    private function registerPageService()
    {
        $this->app->singleton(
            \Viviniko\Portal\Contracts\PageService::class,
            \Viviniko\Portal\Services\Page\EloquentPage::class
        );
    }

    private function registerWidgetService()
    {
        $this->app->singleton(
            \Viviniko\Portal\Contracts\WidgetService::class,
            \Viviniko\Portal\Services\Widget\EloquentWidget::class
        );
    }

    private function registerCommands()
    {
        $this->app->singleton('command.portal.table', function ($app) {
            return new PortalTableCommand($app['files'], $app['composer']);
        });
        $this->app->singleton('command.blog.table', function ($app) {
            return new BlogTableCommand($app['files'], $app['composer']);
        });
    }

    private function registerBlogService()
    {
        $this->app->singleton(
            \Viviniko\Portal\Contracts\BlogCategoryService::class,
            \Viviniko\Portal\Services\BlogCategory\EloquentBlogCategory::class
        );
        $this->app->singleton(
            \Viviniko\Portal\Contracts\BlogTagService::class,
            \Viviniko\Portal\Services\BlogTag\EloquentBlogTag::class
        );
        $this->app->singleton(
            \Viviniko\Portal\Contracts\BlogService::class,
            \Viviniko\Portal\Services\Blog\EloquentBlog::class
        );
    }

    public function provides()
    {
        return [
            \Viviniko\Portal\Contracts\PageService::class,
            \Viviniko\Portal\Contracts\WidgetService::class,
            \Viviniko\Portal\Contracts\WidgetItemService::class,

            \Viviniko\Portal\Contracts\BlogCategoryService::class,
            \Viviniko\Portal\Contracts\BlogTagService::class,
            \Viviniko\Portal\Contracts\BlogService::class,
        ];
    }
}
