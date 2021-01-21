<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */

namespace AmpProject\Validator\Spec\Tag;

final class AmpIframe
{
    const SPEC = "[\nSpecRule::TAG_NAME => Extension::IFRAME,\nSpecRule::ATTRS => [\n    [\n        SpecRule::NAME => Attribute::ALLOW,\n    ],\n    [\n        SpecRule::NAME => Attribute::ALLOWFULLSCREEN,\n        SpecRule::VALUE => [\n                        '',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::ALLOWPAYMENTREQUEST,\n        SpecRule::VALUE => [\n                        '',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::ALLOWTRANSPARENCY,\n        SpecRule::VALUE => [\n                        '',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::FRAMEBORDER,\n        SpecRule::VALUE => [\n                        '0',\n                        '1',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::REFERRERPOLICY,\n    ],\n    [\n        SpecRule::NAME => Attribute::RESIZABLE,\n        SpecRule::VALUE => [\n                        '',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::SANDBOX,\n    ],\n    [\n        SpecRule::NAME => Attribute::SCROLLING,\n        SpecRule::VALUE => [\n                        'auto',\n                        'no',\n                        'yes',\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::TABINDEX,\n        SpecRule::VALUE_REGEX => '-?\\d+',\n    ],\n    [\n        SpecRule::NAME => Attribute::SRC,\n        SpecRule::DISALLOWED_VALUE_REGEX => '__amp_source_origin',\n        SpecRule::MANDATORY_ONEOF => '[\\'src\\', \\'srcdoc\\']',\n        SpecRule::VALUE_URL => [\n                        SpecRule::PROTOCOL => [\n                            'data',\n                            'https',\n                        ],\n                        SpecRule::ALLOW_RELATIVE => true,\n                    ],\n    ],\n    [\n        SpecRule::NAME => Attribute::SRCDOC,\n        SpecRule::MANDATORY_ONEOF => '[\\'src\\', \\'srcdoc\\']',\n    ],\n    [\n        SpecRule::NAME => '[SRC]',\n        SpecRule::TRIGGER => [\n                        'alsoRequiresAttr' => [\n                            'src',\n                        ],\n                    ],\n    ],\n],\nSpecRule::ATTR_LISTS => [\n                'extended-amp-global',\n            ],\nSpecRule::AMP_LAYOUT => [\n                'supportedLayouts' => [\n                    Layout::FILL,\n                    Layout::FIXED,\n                    Layout::FIXED_HEIGHT,\n                    Layout::FLEX_ITEM,\n                    Layout::INTRINSIC,\n                    Layout::NODISPLAY,\n                    Layout::RESPONSIVE,\n                ],\n            ],\nSpecRule::HTML_FORMAT => [\n                Format::AMP,\n            ],\nSpecRule::REQUIRES_EXTENSION => [\n                'amp-iframe',\n            ],\n];";
}