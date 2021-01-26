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

final class AmpSidebar extends Tag
{
    const SPEC = [
        SpecRule::TAG_NAME => Extension::SIDEBAR,
        SpecRule::SPEC_NAME => 'amp-sidebar',
        SpecRule::ATTRS => [
            [
                SpecRule::NAME => 'side',
                SpecRule::VALUE => [
                    'left',
                    'right',
                ],
            ],
        ],
        SpecRule::ATTR_LISTS => [
            'extended-amp-global',
        ],
        SpecRule::SPEC_URL => 'https://amp.dev/documentation/components/amp-sidebar/',
        SpecRule::AMP_LAYOUT => [
            'supportedLayouts' => [
                Layout::NODISPLAY,
            ],
        ],
        SpecRule::DISALLOWED_ANCESTOR => [
            'AMP-STORY',
        ],
        SpecRule::HTML_FORMAT => [
            Format::AMP,
        ],
        SpecRule::REQUIRES_EXTENSION => [
            'amp-sidebar',
        ],
        SpecRule::MARK_DESCENDANTS => [
            'marker' => [
                'AUTOSCROLL',
            ],
        ],
    ];
}