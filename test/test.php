<?php
/**
 * Created by PhpStorm.
 * User: m.korobitsyn
 * Date: 27.09.18
 * Time: 13:54
 */

use Tsukasa\PhpTokenizer\Rules;
use Tsukasa\PhpTokenizer\Tokenizer;

require_once '../vendor/autoload.php';

$content = file_get_contents('./test_data.php');

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


print_r(getPhpContent($content));
//print_r(getTokensNative($content));