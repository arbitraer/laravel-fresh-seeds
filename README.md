# A shortcut structure and command for seeder classes

[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This Laravel package adds the `php artisan fresh` command with an editable default seeder class, so you can call your most important seeds when running a fresh migration much more quicker.


## Installation

Install via composer

``` bash
composer require arbitraer/laravel-fresh-seeds
```

## Configuration

After installation you can publish the config file:

``` bash
php artisan vendor:publish --provider="Arbitraer\FreshSeeds\FreshSeedsServiceProvider" --tag="config"
```

## Usage

To seed the default Laravel database seeder `database/seeds/DatabaseSeeder.php` with a fresh migration:

``` bash
php artisan fresh
```

### Creating a suite

If you find yourself calling different seeders for different cases (testing, demoing or setting up the application) with a fresh migration, you can create dedicated seeder suites in the `app/config/fresh-seeds.php` config file, referencing a seeder class in `database/seeds/` and then run a fast and easy to remember command:

``` php
...
    'suites' => [
        'basic' => 'DatabaseSeeder',
        'demo'  => 'DemoDatabaseSeeder'
    ],
...
```

Then you can use the `--suite=` or `-s` option with this command, to specify the desired seeder suite:

``` bash
php artisan fresh -s demo
```

### Changing the default suite

You can change the default suite to be run when calling `php artisan fresh` by changing the `default_suite` setting in the `fresh-seeds.php` config file or by adding the `SEED_SUITE_DEFAULT` variable to your `.env` file:

``` env
SEED_SUITE_DEFAULT=demo
```

### Suggested structure

It can make sense, to move the **table** seeds into single files within a seperate folder in the `database/seeds/` directory and then call them from your seeder suite classes. This way you can easily reuse them from different suites. For example:

    .
    ├── ...
    ├── database
    │   ├── ...
    │   ├── ...
    │   └── seeds
    │      ├── DatabaseSeeder.php
    │      ├── DemoDatabaseSeeder.php       # custom seeder suite that calls the required table seeders
    │      └── seeders
    │           └── PostTableSeeder.php     # a post table seeder callable by different seeder suites
    │           └── ...
    └── ...

To get you started with this structure, this package provides some example files and folders according to the examples in the published config file:
``` bash
php artisan vendor:publish --provider="Arbitraer\FreshSeeds\FreshSeedsServiceProvider" --tag="suites"
```

## Testing
``` bash
composer test
```

## Credits

[arbiträr](https://arbitraer.de) – Digital agency for web development in Flensburg, Germany

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.