<?php

namespace AmpProject\Tooling\Validator\SpecGenerator;

use Nette\PhpGenerator\Dumper as NetteDumper;

final class Dumper
{

    use ConstantNames;

    /** @var NetteDumper */
    private $dumper;

    /**
     * Dump a variable so it can be used for code generation.
     *
     * @param mixed         $variable Variable to dump.
     * @param int           $level    Indentation level to use.
     * @param callable|null $callback Optional. Callback used to filter individual values. Returns a string
     *                                representation of the value, or false if no special representation needed.
     * @return string Dump of the provided variable.
     */
    public function dump($variable, $level, $callback = null)
    {
        if ($this->dumper === null) {
            $this->dumper = new NetteDumper();
        }

        $extraIndentation = str_pad('', $level * 4, ' ');

        if (is_array($variable)) {
            if (count($variable) === 0) {
                return "[],";
            }

            $line = '';
            foreach ($variable as $key => $value) {
                $line .= "{$extraIndentation}    ";
                if (is_string($key)) {
                    $line .= "{$this->dumpWithKey($key, $value, $level + 1, $callback)}\n";
                } else {
                    $line .= "{$this->dump($value, $level + 1, $callback)}\n";
                }
            }
            return "[\n" . $line . "{$extraIndentation}],";
        }

        return "{$this->getValueString($variable, $callback)},";
    }

    /**
     * Dump a key-value pair so it can be used for code generation.
     *
     * @param string        $key      Key to dump.
     * @param mixed         $value    Value to dump.
     * @param int           $level    Indentation level to use.
     * @param callable|null $callback Optional. Callback used to filter individual values. Returns a string
     *                                representation of the value, or false if no special representation needed.
     * @return string Dump of the provided variable.
     */
    public function dumpWithKey($key, $value, $level, $callback = null)
    {
        if ($this->dumper === null) {
            $this->dumper = new NetteDumper();
        }

        $extraIndentation = str_pad('', $level * 4, ' ');

        if (is_array($value)) {
            if (count($value) === 0) {
                return "'{$key}' => [],";
            }

            $line = '';
            foreach ($value as $subKey => $subValue) {
                $line .= "{$extraIndentation}    ";
                if (is_string($subKey)) {
                    $line .= "{$this->dumpWithKey($subKey, $subValue, $level + 1, $callback)}\n";
                } else {
                    $line .= "{$this->dump($subValue, $level + 1, $callback)}\n";
                }
            }

            return "'{$key}' => [\n" . $line . "{$extraIndentation}],";
        }

        return "'{$key}' => {$this->getValueString($value, $callback)},";
    }


    /**
     * Dump a key-value pair so it can be used for code generation.
     *
     * @param string        $key      Key to dump.
     * @param mixed         $value    Value to dump.
     * @param int           $level    Indentation level to use.
     * @param callable|null $callback Optional. Callback used to filter individual values. Returns a string
     *                                representation of the value, or false if no special representation needed.
     * @return string Dump of the provided variable.
     */
    public function dumpWithSpecRuleKey($key, $value, $level, $callback = null)
    {
        if ($this->dumper === null) {
            $this->dumper = new NetteDumper();
        }

        $specRuleConstant = "SpecRule::{$this->getConstantName($key)}";
        $specRuleSubKeys  = [
            'cdata',
            'valueUrl',
        ];

        $extraIndentation = str_pad('', $level * 4, ' ');

        if (is_array($value)) {
            if (count($value) === 0) {
                return "{$specRuleConstant} => [],";
            }

            $line = '';
            foreach ($value as $subKey => $subValue) {
                $line .= "{$extraIndentation}    ";
                if (is_string($subKey)) {
                    if (in_array($key, $specRuleSubKeys, true)) {
                        $line .= "{$this->dumpWithSpecRuleKey($subKey, $subValue, $level + 1, $callback)}\n";
                    } else {
                        $line .= "{$this->dumpWithKey($subKey, $subValue, $level + 1, $callback)}\n";
                    }
                } else {
                    $line .= "{$this->dump($subValue, $level + 1, $callback)}\n";
                }
            }

            return "{$specRuleConstant} => [\n" . $line . "{$extraIndentation}],";
        }

        return "{$specRuleConstant} => {$this->getValueString($value, $callback)},";
    }

    /**
     * Get the string representation of a value.
     *
     * This takes into account the optional callback that might have been passed in.
     *
     * @param mixed         $value    Value to get the string representation of.
     * @param callable|null $callback Optional. Callback used to filter individual values. Returns a string
     *                                representation of the value, or false if no special representation needed.
     * @return string String representation of the value.
     */
    private function getValueString($value, $callback = null)
    {
        $valueString = false;

        if (!is_callable($callback)) {
            $callback = [$this, 'filterValueStrings'];
        }

        $valueString = $callback($value);

        if ($valueString === false) {
            $valueString = $this->dumper->dump($value);
        }

        return $valueString;
    }

    /**
     * Filtering callback to use for ensuring constants are not put between quotes.
     *
     * @param mixed $value Value to filter.
     * @return string|false String to use, or false if fallback to the regular variable dumper should be used.
     */
    public function filterValueStrings($value)
    {
        if (!is_string($value)) {
            return false;
        }

        if (
            strpos($value, 'Attribute::') === 0
            ||
            strpos($value, 'Element::') === 0
            ||
            strpos($value, 'ErrorCode::') === 0
            ||
            strpos($value, 'Extension::') === 0
            ||
            strpos($value, 'Format::') === 0
            ||
            strpos($value, 'Internal::') === 0
            ||
            strpos($value, 'Layout::') === 0
        ) {
            return $value;
        }

        return false;
    }
}