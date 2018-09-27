<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 27.09.18
 * Time: 22:49
 */

namespace Tsukasa\PhpTokenizer;

class EqualsChecker implements CheckerInterface
{
    protected $equals;
    protected $default;

    public function __construct(array $equals, $default)
    {
        $this->equals = array_map('strtolower', $equals);
        $this->default = $default;
    }

    public function check($value)
    {
        $val = mb_strtolower($value);

        if (in_array($val, $this->equals)) {
            $equals = array_flip($this->equals);
            return $equals[$val];
        }

        return $this->default;
    }
}