<?php

declare(strict_types=1);

namespace Engine45\MakerCommands;

use Engine45\MakerCommands\Console\Commands\CastMakeCommand;
use Engine45\MakerCommands\Console\Commands\ChannelMakeCommand;
use Engine45\MakerCommands\Console\Commands\ComponentMakeCommand;
use Engine45\MakerCommands\Console\Commands\ConsoleMakeCommand;
use Engine45\MakerCommands\Console\Commands\ControllerMakeCommand;
use Engine45\MakerCommands\Console\Commands\EventMakeCommand;
use Engine45\MakerCommands\Console\Commands\ExceptionMakeCommand;
use Engine45\MakerCommands\Console\Commands\FactoryMakeCommand;
use Engine45\MakerCommands\Console\Commands\JobMakeCommand;
use Engine45\MakerCommands\Console\Commands\ListenerMakeCommand;
use Engine45\MakerCommands\Console\Commands\MailMakeCommand;
use Engine45\MakerCommands\Console\Commands\MiddlewareMakeCommand;
use Engine45\MakerCommands\Console\Commands\ModelMakeCommand;
use Engine45\MakerCommands\Console\Commands\NotificationMakeCommand;
use Engine45\MakerCommands\Console\Commands\ObserverMakeCommand;
use Engine45\MakerCommands\Console\Commands\PolicyMakeCommand;
use Engine45\MakerCommands\Console\Commands\ProviderMakeCommand;
use Engine45\MakerCommands\Console\Commands\RequestMakeCommand;
use Engine45\MakerCommands\Console\Commands\ResourceMakeCommand;
use Engine45\MakerCommands\Console\Commands\RuleMakeCommand;
use Engine45\MakerCommands\Console\Commands\SeederMakeCommand;
use Engine45\MakerCommands\Console\Commands\StubsPublishCommand;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;


/**
 * Class DomainCommandServiceProvider
 *
 * @package Engine45\MakerCommands
 */
class DomainCommandServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Boot any application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([StubsPublishCommand::class]);
        }
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->app->extend('command.cast.make',         fn () => new CastMakeCommand());
            $this->app->extend('command.channel.make',      fn () => new ChannelMakeCommand());
            $this->app->extend('command.component.make',    fn () => new ComponentMakeCommand());
            $this->app->extend('command.console.make',      fn () => new ConsoleMakeCommand());
            $this->app->extend('command.controller.make',   fn () => new ControllerMakeCommand());
            $this->app->extend('command.event.make',        fn () => new EventMakeCommand());
            $this->app->extend('command.exception.make',    fn () => new ExceptionMakeCommand());
            $this->app->extend('command.factory.make',      fn () => new FactoryMakeCommand());
            $this->app->extend('command.job.make',          fn () => new JobMakeCommand());
            $this->app->extend('command.listener.make',     fn () => new ListenerMakeCommand());
            $this->app->extend('command.mail.make',         fn () => new MailMakeCommand());
            $this->app->extend('command.middleware.make',   fn () => new MiddlewareMakeCommand());
            $this->app->extend('command.model.make',        fn () => new ModelMakeCommand());
            $this->app->extend('command.notification.make', fn () => new NotificationMakeCommand());
            $this->app->extend('command.observer.make',     fn () => new ObserverMakeCommand());
            $this->app->extend('command.policy.make',       fn () => new PolicyMakeCommand());
            $this->app->extend('command.provider.make',     fn () => new ProviderMakeCommand());
            $this->app->extend('command.request.make',      fn () => new RequestMakeCommand());
            $this->app->extend('command.resource.make',     fn () => new ResourceMakeCommand());
            $this->app->extend('command.rule.make',         fn () => new RuleMakeCommand());
            $this->app->extend('command.seeder.make',       fn () => new SeederMakeCommand());
        }
    }

    /**
     * Provides services.
     */
    public function provides(): array
    {
        return [
            'command.cast.make',
            'command.channel.make',
            'command.component.make',
            'command.console.make',
            'command.controller.make',
            'command.event.make',
            'command.exception.make',
            'command.factory.make',
            'command.job.make',
            'command.listener.make',
            'command.mail.make',
            'command.middleware.make',
            'command.model.make',
            'command.notification.make',
            'command.observer.make',
            'command.policy.make',
            'command.provider.make',
            'command.request.make',
            'command.resource.make',
            'command.rule.make',
            'command.seeder.make'
        ];
    }
}