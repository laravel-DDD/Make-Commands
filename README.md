# Make commands

PHP Artisan make commands for our DDD starter template of the Laravel template.
Because we broke the default structure of the laravel structure to a more DDD approach.

We provide this package to make the default make commands compatible. 

## Installation

You can install the package via composer:

```
composer require engine45/artisan-maker-commands
```

The package will automatically register itself. 

You can optionally publish the config file with: 

```
php artisan vendor:publish --tag="maker-commands-config"
```

## Laravel stubs 

This repo also comes with opinionated versions of the Laravel stubs. You can simply publish
them you your project with the following command:

```
$ php artisan engine45-stub:publish
```

If you want to keep your stubs up to date with every update, you can add this composer hook 
to your composer.json file

```
"scripts": {
    "post-update-cmd": [
        "@php artisan engine45-stub:publish"
    ]
}

```

## Artisan `make:` command overriding 

This package does basically overwrite all the default make commands. We also implemented the 
`-d|--domain` options to specify the given domain for the class. If the option is not filled 
in it will be fallback to `App\Domain\Shared`

## Changelog 

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

### Laravel Stubs

The functionality for publish the stubs is heavily inspired by [spatie/laravel-stube](https://github.com/spatie/laravel-stubs)
All the copyright goes to the hard work of spatie. We implemented the functionality just 
for the proof of concept for our Domain Driven starter. That will be available later.

### Make commands

The logic that is used to overriding the make commands from artisan is heavily inspired by 
[signifly/laravel-domain-commands](https://github.com/signifly/laravel-domain-commands)
All the copyrights for the commands goes to the hard work of them. We implemented the functionality just
for the proof of concept for our Domain Driven starter. That will be available later.

The MIT License (MIT). Please see [LICENSE](LICENSE) for more information.
