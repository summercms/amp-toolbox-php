<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */

namespace AmpProject\Validator\Spec\Tag;

final class AmpLightboxAmp4ads
{
    const SPEC = "[\nSpecRule::TAG_NAME => Extension::LIGHTBOX,\nSpecRule::SPEC_NAME => 'amp-lightbox [AMP4ADS]',\nSpecRule::ATTRS => [\n    [\n        SpecRule::NAME => Attribute::ANIMATE_IN,\n        SpecRule::VALUE_CASEI => [\n                        'fade-in',\n                        'fly-in-bottom',\n                        'fly-in-top',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::CLOSE_BUTTON,\n        SpecRule::MANDATORY => true,\n    ],\n    [\n        SpecRule::NAME => Attribute::CONTROLS,\n    ],\n    [\n        SpecRule::NAME => Attribute::FROM,\n    ],\n],\nSpecRule::ATTR_LISTS => [\n                'extended-amp-global',\n            ],\nSpecRule::AMP_LAYOUT => [\n                'supportedLayouts' => [\n                    Layout::NODISPLAY,\n                ],\n            ],\nSpecRule::HTML_FORMAT => [\n                Format::AMP4ADS,\n            ],\nSpecRule::REQUIRES_EXTENSION => [\n                'amp-lightbox',\n            ],\n];";
}