<?php

namespace Engine45\MakerCommands\Tests;

use Engine45\MakerCommands\DomainCommandServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [DomainCommandServiceProvider::class];
    }
}
