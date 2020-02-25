<?php

namespace Arbitraer\FreshSeeds\Commands;

use Exception;
use Illuminate\Database\Console\Migrations\FreshCommand;
use Symfony\Component\Console\Input\InputOption;

class FreshSeedCommand extends FreshCommand
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'fresh';

    /**
     * {@inheritdoc}
     */
    protected $description = 'Drop all tables, re-run all migrations and run seeder';

    /**
     * {@inheritdoc}
     */
    public function handle()
    {
        if (! $this->confirmToProceed()) {
            return;
        }

        $this->call('migrate:fresh', ['--seeder' => $this->getSuiteSeederClass()]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getOptions()
    {
        $options = parent::getOptions();

        array_push($options,
            ['suite', 's', InputOption::VALUE_OPTIONAL, 'The seed suite to use. Default is defined in config file']
        );

        return $options;
    }

    protected function getSuiteSeederClass()
    {
        $suite = $this->option('suite') ?: config('fresh-seeds.default_suite');
        $config = config('fresh-seeds.suites.'.$suite);

        if (! isset($config)) {
            throw new Exception("No configuration set for suite `{$suite}`. Make sure this suite is specified in the `fresh-seeds` config file!");
        }

        return $config;
    }
}