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
     * @test
     */
    public function it_validates_correct_BE_checksum()
    {
        $this->assertTrue($this->validator->make(
            ['field' => 'BE0842956229'],
            ['field' => 'vat_format']
        )->passes());
    }

    /**
     * @return array
     * @internal param \Illuminate\Foundation\Application $app
     */
    protected function getPackageProviders()
    {
        return [SimplevatServiceProvider::class];
    }
}