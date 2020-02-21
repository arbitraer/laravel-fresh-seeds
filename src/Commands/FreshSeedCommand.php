<?php

namespace Arbitraer\FreshSeeds\Commands;

use Illuminate\Database\Console\Migrations\FreshCommand;
use Symfony\Component\Console\Input\InputOption;

class FreshSeedCommand extends FreshCommand
{
    /**
     * {@inheritdoc}
     */
    protected $name = 'migrate:fresh-seed';

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

        return config('fresh-seeds.suites.'.$suite);
    }
}