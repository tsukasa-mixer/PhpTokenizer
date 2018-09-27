<?php
/**
 * Created by PhpStorm.
 * User: tsukasa
 * Date: 27.09.18
 * Time: 23:43
 */


namespace Tsukasa\PhpTokenizer\Checkers;


class CastEqualsChecker extends EqualsChecker
{
    public function check($value)
    {
        $value = str_replace(' ', '',$value);

        return parent::check($value);
    }
}