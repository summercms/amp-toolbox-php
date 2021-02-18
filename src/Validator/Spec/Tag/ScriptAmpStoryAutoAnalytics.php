<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */

namespace AmpProject\Validator\Spec\Tag;

use AmpProject\Format;
use AmpProject\Tag as Element;
use AmpProject\Validator\Spec\ExtensionVersion;
use AmpProject\Validator\Spec\SpecRule;
use AmpProject\Validator\Spec\Tag;
use AmpProject\Validator\Spec\TagWithExtensionSpec;

final class ScriptAmpStoryAutoAnalytics extends Tag implements TagWithExtensionSpec
{
    use ExtensionVersion;

    const EXTENSION_SPEC = [
        SpecRule::NAME => 'amp-story-auto-analytics',
        SpecRule::VERSION => [
            '0.1',
            'latest',
        ],
    ];

    const SPEC = [
        SpecRule::TAG_NAME => Element::SCRIPT,
        SpecRule::ATTR_LISTS => [
            'common-extension-attrs',
        ],
        SpecRule::HTML_FORMAT => [
            Format::AMP,
        ],
        SpecRule::EXTENSION_SPEC => self::EXTENSION_SPEC,
    ];
}