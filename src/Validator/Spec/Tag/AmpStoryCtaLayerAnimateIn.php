<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */

namespace AmpProject\Validator\Spec\Tag;

final class AmpStoryCtaLayerAnimateIn
{
    const SPEC = "[\nSpecRule::TAG_NAME => '\$REFERENCE_POINT',\nSpecRule::SPEC_NAME => 'AMP-STORY-CTA-LAYER animate-in',\nSpecRule::ATTRS => [\n    [\n        SpecRule::NAME => Attribute::ANIMATE_IN,\n        SpecRule::VALUE => [\n                        'drop',\n                        'fade-in',\n                        'fly-in-bottom',\n                        'fly-in-left',\n                        'fly-in-right',\n                        'fly-in-top',\n                        'pan-down',\n                        'pan-left',\n                        'pan-right',\n                        'pan-up',\n                        'pulse',\n                        'rotate-in-left',\n                        'rotate-in-right',\n                        'scale-fade-down',\n                        'scale-fade-up',\n                        'twirl-in',\n                        'whoosh-in-left',\n                        'whoosh-in-right',\n                        'zoom-in',\n                        'zoom-out',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::ANIMATE_IN_AFTER,\n    ],\n    [\n        SpecRule::NAME => Attribute::ANIMATE_IN_DELAY,\n    ],\n    [\n        SpecRule::NAME => Attribute::ANIMATE_IN_DURATION,\n    ],\n    [\n        SpecRule::NAME => Attribute::ANIMATE_IN_TIMING_FUNCTION,\n    ],\n    [\n        SpecRule::NAME => Attribute::SCALE_END,\n        SpecRule::VALUE_REGEX => '[0-9]+([.][0-9]+)?',\n    ],\n    [\n        SpecRule::NAME => Attribute::SCALE_START,\n        SpecRule::VALUE_REGEX => '[0-9]+([.][0-9]+)?',\n    ],\n    [\n        SpecRule::NAME => Attribute::TRANSLATE_X,\n        SpecRule::VALUE_REGEX_CASEI => '[0-9]+px',\n    ],\n    [\n        SpecRule::NAME => Attribute::TRANSLATE_Y,\n        SpecRule::VALUE_REGEX_CASEI => '[0-9]+px',\n    ],\n],\nSpecRule::SPEC_URL => 'https://amp.dev/documentation/components/amp-story/',\nSpecRule::REFERENCE_POINTS => [\n                [\n                    'tagSpecName' => 'AMP-STORY-CTA-LAYER animate-in',\n                ],\n            ],\nSpecRule::HTML_FORMAT => [\n                Format::AMP,\n            ],\n];";
}