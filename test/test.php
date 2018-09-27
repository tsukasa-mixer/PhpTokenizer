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

//    foreach ($tokens as $k => $v) {
//        if (is_array($v)) {
//            $tokens[$k][] = token_name($v[0]);
//        }
//    }
    return $tokens;
}

$time1 = microtime(true);
$c1 = getPhpContent($content);
$time1 = microtime(true) - $time1;
$time1 *= 100;

$time2 = microtime(true);
$c2 = getTokensNative($content);
$time2 = microtime(true) - $time2;
$time2 *= 100;

print_r($c1);

echo "getPhpContent - {$time1}\n";
echo "getTokensNative - {$time2}\n";