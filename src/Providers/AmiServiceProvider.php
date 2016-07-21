<?php

namespace Enniel\Ami\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Config\Repository;
use Enniel\Ami\Commands\AmiListen;
use Enniel\Ami\Commands\AmiCli;
use Enniel\Ami\Commands\AmiAction;
use Enniel\Ami\Commands\AmiSms;
use Enniel\Ami\Commands\AmiUssd;
use React\EventLoop\StreamSelectLoop;
use React\EventLoop\LoopInterface;
use Clue\React\Ami\Factory;

class AmiServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Deferred providers.
     *
     * @var array
     */
    protected $providers = [
        'command.ami.listen',
        'command.ami.cli',
        'command.ami.action',
        'command.ami.dongle.sms',
        'command.ami.dongle.ussd',
        'ami.eventloop',
        'ami.connector',
        'ami.config',
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        //
        $this->publishes([
            realpath(__DIR__.'/../../config/ami.php') => config_path('ami.php'),
        ], 'ami');
    }

    /**
     * Register any package services.
     */
    public function register()
    {
        $this->registerConfig();
        $this->registerConfigRepository();
        $this->registerEventLoop();
        $this->registerConnector();
        $this->registerAmiListen();
        $this->registerAmiCli();
        $this->registerAmiAction();
        $this->registerDongleSms();
        $this->registerDongleUssd();
    }

    /**
     * Register the configuration.
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(realpath(__DIR__.'/../../config/ami.php'), 'ami');
    }

    /**
     * Register the configuration repository.
     */
    protected function registerConfigRepository()
    {
        $this->app->singleton('ami.config', function() {
            return new Repository(config('ami'));
        });
    }

    /**
     * Register the ami listen command.
     */
    protected function registerAmiListen()
    {
        $this->app->singleton('command.ami.listen', function ($app) {
            return new AmiListen($app->make('ami.eventloop'), $app->make('ami.connector'), $app->make('ami.config'));
        });
        $this->commands('command.ami.listen');
    }

    /**
     * Register the ami listen command.
     */
    protected function registerAmiCli()
    {
        $this->app->singleton('command.ami.cli', function ($app) {
            return new AmiCli($app->make('ami.eventloop'), $app->make('ami.connector'), $app->make('ami.config'));
        });
        $this->commands('command.ami.cli');
    }

    /**
     * Register the ami action sender.
     */
    protected function registerAmiAction()
    {
        $this->app->singleton('command.ami.action', function ($app) {
            return new AmiAction($app->make('ami.eventloop'), $app->make('ami.connector'), $app->make('ami.config'));
        });
        $this->commands('command.ami.action');
    }

    /**
     * Register the dongle sms.
     */
    protected function registerDongleSms()
    {
        $this->app->singleton('command.ami.dongle.sms', function ($app) {
            return new AmiSms($app->make('ami.eventloop'), $app->make('ami.connector'), $app->make('ami.config'));
        });
        $this->commands('command.ami.dongle.sms');
    }

    /**
     * Register the dongle ussd.
     */
    protected function registerDongleUssd()
    {
        $this->app->singleton('command.ami.dongle.ussd', function ($app) {
            return new AmiUssd($app->make('ami.eventloop'), $app->make('ami.connector'), $app->make('ami.config'));
        });
        $this->commands('command.ami.dongle.ussd');
    }

    /**
     * Register event loop.
     */
    protected function registerEventLoop()
    {
        $this->app->singleton('ami.eventloop', function () {
            return new StreamSelectLoop();
        });
        $this->app->bind(LoopInterface::class, StreamSelectLoop::class);
    }

    /**
     * Register connector.
     */
    protected function registerConnector()
    {
        $this->app->singleton('ami.connector', function ($app) {
            return new Factory($app->make('ami.eventloop'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return $this->providers;
    }
}
