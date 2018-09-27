<?php

namespace Tsukasa\PhpTokenizer;

class Pattern
{
    public $value;

    public function __construct($pattern)
    {
        $this->value = $pattern;
    }

    public static function fabric($value)
    {
        return new static($value);
    }

    public function __toString()
    {
        return $this->value;
    }
}