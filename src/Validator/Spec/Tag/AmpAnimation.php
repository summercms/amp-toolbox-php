<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */

namespace AmpProject\Validator\Spec\Tag;

use AmpProject\Extension;
use AmpProject\Format;
use AmpProject\Layout;
use AmpProject\Validator\Spec\SpecRule;
use AmpProject\Validator\Spec\Tag;

final class AmpAnimation extends Tag
{
    const SPEC = [
        SpecRule::TAG_NAME => Extension::ANIMATION,
        SpecRule::ATTRS => [
            [
                SpecRule::NAME => 'trigger',
                SpecRule::VALUE => [
                    'visibility',
                ],
            ],
        ],
        SpecRule::ATTR_LISTS => [
            'extended-amp-global',
        ],
        SpecRule::AMP_LAYOUT => [
            'supportedLayouts' => [
                Layout::NODISPLAY,
            ],
        ],
        SpecRule::CHILD_TAGS => [
            'mandatoryNumChildTags' => 1,
            'childTagNameOneof' => [
                'SCRIPT',
            ],
        ],
        SpecRule::HTML_FORMAT => [
            Format::AMP,
            Format::AMP4ADS,
        ],
        SpecRule::REQUIRES => [
            'amp-animation extension .json script',
        ],
        SpecRule::REQUIRES_EXTENSION => [
            'amp-animation',
        ],
    ];
}