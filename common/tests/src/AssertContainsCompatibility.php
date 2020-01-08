<?php

namespace Amp\Tests;

/**
 * Compatibility trait for assertStringContainsString support.
 *
 * @package amp/common
 */

trait AssertContainsCompatibility
{

    /**
     * Assert whether a string contains a given substring.
     *
     * This indirection (and non-conflicting naming) is needed to keep compatible across PHPUnit versions without the
     * following deprecation notice:
     * Using assertNotContains() with string haystacks is deprecated and will not be supported in PHPUnit 9. Refactor
     * your test to use assertStringNotContainsString() or assertStringNotContainsStringIgnoringCase() instead.
     *
     * @param string $needle   Needle to look for.
     * @param string $haystack Haystack to search through.
     * @param string $message  Message to show in case the assert fails.
     */
    public function assertStringContains($needle, $haystack, $message = '')
    {
        if (method_exists($this, 'assertStringContainsString')) {
            $this->assertStringContainsString($needle, $haystack, $message);
        } else {
            $this->assertContains($needle, $haystack, $message);
        }
    }
}