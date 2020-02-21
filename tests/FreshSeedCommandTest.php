<?php

namespace Arbitraer\FreshSeeds\Tests;

class FreshSeedCommandTest extends TestCase
{
    /** @test */
    public function it_will_throw_an_exception_if_the_given_suite_is_not_configured()
    {
        $this->expectExceptionMessageMatches('/^No configuration set/');

        $this->artisan('fresh', [
            '--suite' => 'non-existing-suite',
        ]);
    }
}