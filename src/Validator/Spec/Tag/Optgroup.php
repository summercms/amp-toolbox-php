<?php

/**
 * DO NOT EDIT!
 * This file was automatically generated via bin/generate-validator-spec.php.
 */

namespace AmpProject\Validator\Spec\Tag;

final class Optgroup
{
    const SPEC = "[\nSpecRule::TAG_NAME => Element::OPTGROUP,\nSpecRule::MANDATORY_PARENT => Element::SELECT,\nSpecRule::ATTRS => [\n    [\n        SpecRule::NAME => Attribute::DISABLED,\n    ],\n    [\n        SpecRule::NAME => Attribute::LABEL,\n    ],\n    [\n        SpecRule::NAME => '[DISABLED]',\n    ],\n    [\n        SpecRule::NAME => '[LABEL]',\n    ],\n],\nSpecRule::SPEC_URL => 'https://amp.dev/documentation/components/amp-form/',\nSpecRule::HTML_FORMAT => [\n                Format::AMP,\n                Format::AMP4ADS,\n                Format::AMP4EMAIL,\n            ],\n];";
}