<?php

namespace Hantless\SimpleVat\Tests;

use Hantless\SimpleVat\SimplevatServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class SimplevatValidatorTest extends BaseTestCase
{
    protected $validator;

    public function setUp()
    {
        parent::setUp();

        $this->validator = $this->app['validator'];
    }

    /**
     * @test
     */
    public function it_validates_something()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function it_validates_correct_vat_format()
    {
        $this->assertTrue($this->validator->make(
            ['field' => 'BE0123456789'],
            ['field' => 'vat_format']
        )->passes());
    }

    /**
     * @test
     */
    public function it_invalidates_incorrect_vat_format()
    {
        $this->assertFalse($this->validator->make(
            ['field' => '1940'],
            ['field' => 'vat_format']
        )->passes());
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [SimplevatServiceProvider::class];
    }
}