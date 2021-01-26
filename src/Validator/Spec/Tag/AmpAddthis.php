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

final class AmpAddthis extends Tag
{
    const SPEC = [
        SpecRule::TAG_NAME => Extension::ADDTHIS,
        SpecRule::ATTRS => [
            [
                SpecRule::NAME => 'data-product-code',
                SpecRule::MANDATORY_ONEOF => '[\'data-product-code\', \'data-widget-id\']',
            ],
            [
                SpecRule::NAME => 'data-share-media',
                SpecRule::VALUE_URL => [
                    SpecRule::PROTOCOL => [
                        'http',
                        'https',
                    ],
                    SpecRule::ALLOW_EMPTY => true,
                ],
            ],
            [
                SpecRule::NAME => 'data-share-url',
                SpecRule::VALUE_URL => [
                    SpecRule::PROTOCOL => [
                        'http',
                        'https',
                    ],
                    SpecRule::ALLOW_EMPTY => true,
                ],
            ],
            [
                SpecRule::NAME => 'data-widget-id',
                SpecRule::MANDATORY_ONEOF => '[\'data-product-code\', \'data-widget-id\']',
                SpecRule::TRIGGER => [
                    'alsoRequiresAttr' => [
                        'data-pub-id',
                    ],
                ],
            ],
        ],
        SpecRule::ATTR_LISTS => [
            'extended-amp-global',
        ],
        SpecRule::AMP_LAYOUT => [
            'supportedLayouts' => [
                Layout::FILL,
                Layout::FIXED,
                Layout::FIXED_HEIGHT,
                Layout::FLEX_ITEM,
                Layout::NODISPLAY,
                Layout::RESPONSIVE,
            ],
        ],
        SpecRule::HTML_FORMAT => [
            Format::AMP,
        ],
        SpecRule::REQUIRES_EXTENSION => [
            'amp-addthis',
        ],
    ];
}