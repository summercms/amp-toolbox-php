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

final class AmpWistiaPlayer extends Tag
{
    const SPEC = [
        SpecRule::TAG_NAME => Extension::WISTIA_PLAYER,
        SpecRule::ATTRS => [
            [
                SpecRule::NAME => 'data-media-hashed-id',
                SpecRule::MANDATORY => true,
                SpecRule::VALUE_REGEX => '[0-9a-zA-Z]+',
            ],
            [
                SpecRule::NAME => 'rotate-to-fullscreen',
                SpecRule::VALUE => [
                    '',
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
                Layout::RESPONSIVE,
            ],
        ],
        SpecRule::HTML_FORMAT => [
            Format::AMP,
        ],
        SpecRule::REQUIRES_EXTENSION => [
            'amp-wistia-player',
        ],
    ];
}