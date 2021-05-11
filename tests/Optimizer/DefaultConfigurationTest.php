<?php

namespace AmpProject\Optimizer;

use AmpProject\Optimizer\Exception\InvalidConfigurationValue;
use AmpProject\Optimizer\Exception\UnknownConfigurationKey;
use AmpProject\Tests\TestCase;

/**
 * Test the configuration storage and validation.
 *
 * @covers \AmpProject\Optimizer\DefaultConfiguration
 * @package ampproject/amp-toolbox
 */
final class DefaultConfigurationTest extends TestCase
{
    /**
     * Test whether we can retrieve the default configuration.
     *
     * @covers \AmpProject\Optimizer\DefaultConfiguration::has()
     * @covers \AmpProject\Optimizer\DefaultConfiguration::get()
     */
    public function testDefaultConfiguration()
    {
        $configuration = new DefaultConfiguration();
        $this->assertTrue($configuration->has(Configuration::KEY_TRANSFORMERS));
        $this->assertFalse($configuration->has('unknown_key'));
        $this->assertEquals(Configuration::DEFAULT_TRANSFORMERS, $configuration->get(Configuration::KEY_TRANSFORMERS));
    }

    /**
     * Test whether we can add to the default configuration.
     *
     * @covers \AmpProject\Optimizer\DefaultConfiguration::has()
     * @covers \AmpProject\Optimizer\DefaultConfiguration::get()
     */
    public function testUserProvidedConfigurationCanAddKeys()
    {
        $configuration = new DefaultConfiguration(['custom_key' => 'custom_value']);
        $this->assertTrue($configuration->has(Configuration::KEY_TRANSFORMERS));
        $this->assertTrue($configuration->has('custom_key'));
        $this->assertEquals(Configuration::DEFAULT_TRANSFORMERS, $configuration->get(Configuration::KEY_TRANSFORMERS));
        $this->assertEquals('custom_value', $configuration->get('custom_key'));
    }

    /**
     * Test whether we can override the default configuration.
     *
     * @covers \AmpProject\Optimizer\DefaultConfiguration::has()
     * @covers \AmpProject\Optimizer\DefaultConfiguration::get()
     */
    public function testUserProvidedConfigurationCanOverrideKeys()
    {
        $configuration = new DefaultConfiguration([Configuration::KEY_TRANSFORMERS => ['my_transformer']]);
        $this->assertTrue($configuration->has(Configuration::KEY_TRANSFORMERS));
        $this->assertEquals(['my_transformer'], $configuration->get(Configuration::KEY_TRANSFORMERS));
    }

    /**
     * Test whether unknown keys throw an exception.
     *
     * @covers \AmpProject\Optimizer\DefaultConfiguration::get()
     */
    public function testUnknownKeyThrowsException()
    {
        $configuration = new DefaultConfiguration();
        $this->expectException(UnknownConfigurationKey::class);
        $configuration->get('unknown_key');
    }

    /**
     * Test whether invalid keys throw an exception.
     *
     * @covers \AmpProject\Optimizer\DefaultConfiguration::validateConfigurationKeys()
     */
    public function testInvalidTransformersTypeThrowsException()
    {
        $this->expectException(InvalidConfigurationValue::class);
        $this->expectExceptionMessage("The configuration key 'transformers' expected a value of type 'array', got 'integer' instead.");
        new DefaultConfiguration([Configuration::KEY_TRANSFORMERS => 42]);
    }

    /**
     * Test whether invalid sub-keys throw an exception.
     *
     * @covers \AmpProject\Optimizer\DefaultConfiguration::validateConfigurationKeys()
     */
    public function testInvalidTransformersSubTypeThrowsException()
    {
        $this->expectException(InvalidConfigurationValue::class);
        $this->expectExceptionMessage("The configuration value '2' for the key 'transformers' expected a value of type 'string', got 'integer' instead.");
        new DefaultConfiguration([Configuration::KEY_TRANSFORMERS => ['first_one_is_good', 'second_one_is_good_as_well_but...', 42]]);
    }
}
