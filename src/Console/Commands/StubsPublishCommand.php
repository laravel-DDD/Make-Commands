<?php

declare(strict_types=1);

namespace Engine45\MakerCommands\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\ConfirmableTrait;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Class StubsPublishCommand
 *
 * @package Engine45\MakerCommands\Console\Commands
 */
class StubsPublishCommand extends Command
{
    use ConfirmableTrait;

    protected $signature = 'engine45-stub:publish {--force : Overwirte any existing files}';

    protected $description = 'Publish all opinionated stubs that are available for customization';

    public function handle()
    {
        if (! $this->confirmToProceed()) {
            return 1;
        }

        if (! is_dir($stubsPath = $this->laravel->basePath('stubs'))) {
            (new Filesystem)->makeDirectory($stubsPath);
        }

        collect(File::files(__DIR__ . '/../../../stubs'))->each(function (SplFileInfo $file) use ($stubsPath): void {
            $sourcePath = $file->getPathname();
            $targetPath = $stubsPath . "/{$file->getFilename()}";

            if (! file_exists($targetPath) || $this->option('force')) {
                file_put_contents($targetPath, file_get_contents($sourcePath));
            }
        });
    }
}
