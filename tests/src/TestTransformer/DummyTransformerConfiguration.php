<?php

namespace AmpProject\Tests\TestTransformer;

use AmpProject\Optimizer\TransformerConfiguration;

final class DummyTransformerConfiguration implements TransformerConfiguration
{
    public function get($key)
    {
    }

    public function toArray()
    {
    }
}
