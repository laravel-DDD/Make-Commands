<?php

declare(strict_types=1);

namespace Engine45\MakerCommands\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\ModelMakeCommand as ModelArtisanCommand;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ModelMakeCommand
 *
 * @package Engine45\MakerCommands\Console\Commands
 */
class ModelMakeCommand extends ModelArtisanCommand
{
    /**
     * ModelMakeCommand constructor.
     */
    public function __construct()
    {
        parent::__construct(new Filesystem());
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        if ($domain = $this->option('domain')) {
            return "{$rootNamespace}\\{$domain}\\Entities";
        }

        return "{$rootNamespace}\\Shared\\Entities";
    }

    /**
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        return $this->laravel->basePath().'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return 'App\\Domain\\';
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array_merge(parent::getOptions(), [
            ['domain', 'd', InputOption::VALUE_OPTIONAL, 'Set the domain name'],
        ]);
    }
}
