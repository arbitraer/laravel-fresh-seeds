<?php

return [
    /*
     * Example seeder suites for different cases. Change, extend or delete them as fits your needs.
     */
    'suites' => [
        'basic'     => 'DatabaseSeeder', // basic seed suite that could be used for settings, admin accounts or existing content
        // 'demo'      => 'DemoDatabaseSeeder', // e. g. more realistic / humanized fake data for development, presentation purposes or QA 
        // 'test'      => 'TestDatabaseSeeder', // e. g. full data with many edge cases and stress testing and therefore much less realistic but more complete
    ],

    /*
     * The default suite being used, when running migrate:fresh-seed without a specified suite.
     */
    'default_suite' => env('SEED_SUITE_DEFAULT', 'basic'),
];