<?php
/**
 * Created by PhpStorm.
 * User: m.korobitsyn
 * Date: 27.09.18
 * Time: 13:54
 */

use Tsukasa\PhpTokenizer\Rules;
use Tsukasa\PhpTokenizer\Tokenizer;

require_once dirname(__FILE__) .'/../vendor/autoload.php';

$content = file_get_contents(dirname(__FILE__) . '/test_data.php');

function getPhpContent($content) {

    $tokenizer = new Tokenizer( new Rules() );

    return $tokenizer->parse($content);
}

function getTokensNative($content) {
    $tokens = token_get_all($content);

    foreach ($tokens as $k => $v) {
        if (is_array($v)) {
            $tokens[$k][] = token_name($v[0]);
        }
    }
    return $tokens;
}

function gettesttokens($content) {

    if (preg_match_all('/(\<\?(php|\=|)).*?(\?\>|$)/s', $content, $match)) {

        foreach ($match[0] as $i => $code) {

            if (preg_match_all('~' .(new Rules())->getTokensPattern() . '~As', $code, $tokens, PREG_SET_ORDER)) {

                print_r($tokens);
                die();
            }


            print_r($code);
            die();

        }

    }

}

//print_r(gettesttokens($content));

print_r(getPhpContent($content));
//print_r(getTokensNative($content));