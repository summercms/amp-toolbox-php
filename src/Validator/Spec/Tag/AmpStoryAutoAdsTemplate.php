<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */

namespace AmpProject\Validator\Spec\Tag;

use AmpProject\Extension;
use AmpProject\Format;
use AmpProject\Tag as Element;
use AmpProject\Validator\Spec\SpecRule;
use AmpProject\Validator\Spec\Tag;

final class AmpStoryAutoAdsTemplate extends Tag
{
    const SPEC = [
        SpecRule::TAG_NAME => Element::TEMPLATE,
        SpecRule::SPEC_NAME => 'amp-story-auto-ads > template',
        SpecRule::MANDATORY_PARENT => Extension::STORY_AUTO_ADS,
        SpecRule::ATTRS => [
            [
                SpecRule::NAME => 'type',
                SpecRule::MANDATORY => true,
                SpecRule::VALUE => [
                    'amp-mustache',
                ],
                SpecRule::DISPATCH_KEY => 'NAME_VALUE_PARENT_DISPATCH',
            ],
        ],
        SpecRule::REFERENCE_POINTS => [
            [
                'tagSpecName' => 'AMP-STORY-GRID-LAYER default',
            ],
            [
                'tagSpecName' => 'AMP-STORY-GRID-LAYER animate-in',
            ],
        ],
        SpecRule::HTML_FORMAT => [
            Format::AMP,
        ],
        SpecRule::REQUIRES_EXTENSION => [
            'amp-mustache',
        ],
        SpecRule::DESCENDANT_TAG_LIST => 'amp-story-grid-layer-allowed-descendants',
    ];
}