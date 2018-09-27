<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 27.09.18
 * Time: 23:07
 */

namespace Tsukasa\PhpTokenizer\Checkers;

interface CheckerInterface
{
    /**
     * @param string $value
     * @return string
     */
    public function check($value);
}