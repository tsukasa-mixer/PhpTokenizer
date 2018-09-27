<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 27.09.18
 * Time: 22:49
 */

namespace Tsukasa\PhpTokenizer\Checkers;

class EqualsChecker implements CheckerInterface
{
    protected $equals = [];
    protected $default;
    protected $filter;

    public function __construct(array $equals, $default, \Closure $filter = null)
    {
        foreach ($equals as $type => $equal) {
            if (!is_array($equal)) {
                $equal = [$equal];
            }
            foreach ($equal as $item) {
                $this->equals[$item] = $type;
            }
        }

        $this->default = $default;
        $this->filter = $filter;
    }

    public function check($value)
    {
        if ($this->filter) {
            $value = call_user_func($this->filter, $value);
        }

        $val = mb_strtolower($value);

        if (array_key_exists($val, $this->equals)) {
            return $this->equals[$val];
        }

        return $this->default;
    }
}