<?php
/**
 * Created by PhpStorm.
 * User: m.korobitsyn
 * Date: 27.09.18
 * Time: 11:54
 */

namespace Tsukasa\PhpTokenizer;

use Tsukasa\PhpTokenizer\Checkers\CastEqualsChecker;
use Tsukasa\PhpTokenizer\Checkers\EqualsChecker;

class Rules implements RulesInterface {

    public $base_incorrect = [
        'TOKEN_PARSE' => '',
        'T_REQUIRE_ONCE' => 'require_once',
        'T_REQUIRE' => 'require',
        'T_EVAL' => 'eval',
        'T_INCLUDE_ONCE' => 'include_once',
        'T_INCLUDE' => 'include',
        'T_LOGICAL_OR' => 'or',
        'T_LOGICAL_XOR' => 'xor',
        'T_LOGICAL_AND' => 'and',
        'T_PRINT' => 'print',
        'T_YIELD' => 'yield',
        'T_DOUBLE_ARROW' => '=>',
        'T_YIELD_FROM' => 'yield from',
        'T_POW_EQUAL' => '**=',
        'T_SR_EQUAL' => '>>=',
        'T_SL_EQUAL' => '<<=',
        'T_XOR_EQUAL' => '^=',
        'T_OR_EQUAL' => '|=',
        'T_AND_EQUAL' => '&=',
        'T_MOD_EQUAL' => '%=',
        'T_CONCAT_EQUAL' => '.=',
        'T_DIV_EQUAL' => '/=',
        'T_MUL_EQUAL' => '*=',
        'T_MINUS_EQUAL' => '-=',
        'T_PLUS_EQUAL' => '+=',
        'T_COALESCE' => '??',
        'T_BOOLEAN_OR' => '||',
        'T_BOOLEAN_AND' => '&&',
        'T_SPACESHIP' => '<=>',
        'T_IS_NOT_IDENTICAL' => '!==',
        'T_IS_IDENTICAL' => '===',
        'T_IS_NOT_EQUAL' => ['!=','<>'],
        'T_IS_EQUAL' => '==',
        'T_IS_GREATER_OR_EQUAL' => '>=',
        'T_IS_SMALLER_OR_EQUAL' => '<=',
        'T_SR' => '>>',
        'T_SL' => '<<',
        'T_INSTANCEOF' => 'instanceof',
        'T_UNSET_CAST' => '(unset)',
        'T_BOOL_CAST' => ['(bool)', '(boolean)'],
        'T_OBJECT_CAST' => '(object)',
        'T_ARRAY_CAST' => '(array)',
        'T_STRING_CAST' => '(string)',
        'T_DOUBLE_CAST' => ['(real)', '(double)', '(float)'],
        'T_INT_CAST' => ['(int)', '(integer)'],
        'T_DEC' => '--',
        'T_INC' => '++',
        'T_POW' => '**',
        'T_CLONE' => 'clone',
        'T_NEW' => 'new',
        'T_ELSEIF' => 'elseif',
        'T_ELSE' => 'else',
        'T_ENDIF' => 'endif',
        'T_PUBLIC' => 'public',
        'T_PROTECTED' => 'protected',
        'T_PRIVATE' => 'private',
        'T_FINAL' => 'final',
        'T_ABSTRACT' => 'abstract',
        'T_STATIC' => 'static',
        'T_LNUMBER' => ['\d+', '\d+E\d+', '0x[0-9a-f]+'],
        'T_DNUMBER' => '\d+.\d+',
        'T_STRING' => '\w[\w\d_]+',
        'T_VARIABLE' => '$\w[\w\d_]',
        'T_INLINE_HTML' => '.*',
        'T_ENCAPSED_AND_WHITESPACE' => '',
        'T_CONSTANT_ENCAPSED_STRING' => '',
        'T_STRING_VARNAME' => '${',
        'T_NUM_STRING' => '',
        'T_EXIT' => '',
        'T_IF' => '',
        'T_ECHO' => '',
        'T_DO' => '',
        'T_WHILE' => '',
        'T_ENDWHILE' => '',
        'T_FOR' => '',
        'T_ENDFOR' => '',
        'T_FOREACH' => '',
        'T_ENDFOREACH' => '',
        'T_DECLARE' => '',
        'T_ENDDECLARE' => '',
        'T_AS' => '',
        'T_SWITCH' => '',
        'T_ENDSWITCH' => '',
        'T_CASE' => '',
        'T_DEFAULT' => '',
        'T_BREAK' => '',
        'T_CONTINUE' => '',
        'T_GOTO' => '',
        'T_FUNCTION' => '',
        'T_CONST' => '',
        'T_RETURN' => '',
        'T_TRY' => '',
        'T_CATCH' => '',
        'T_FINALLY' => '',
        'T_THROW' => '',
        'T_USE' => '',
        'T_INSTEADOF' => '',
        'T_GLOBAL' => '',
        'T_VAR' => '',
        'T_UNSET' => '',
        'T_ISSET' => '',
        'T_EMPTY' => '',
        'T_HALT_COMPILER' => '',
        'T_CLASS' => '',
        'T_TRAIT' => '',
        'T_INTERFACE' => '',
        'T_EXTENDS' => '',
        'T_IMPLEMENTS' => '',
        'T_OBJECT_OPERATOR' => '',
        'T_LIST' => '',
        'T_ARRAY' => ['array', '\[.*\]'],
        'T_CALLABLE' => 'callable',
        'T_LINE' => '__LINE__',
        'T_FILE' => '__FILE__',
        'T_DIR' => '__DIR__',
        'T_CLASS_C' => '__CLASS__',
        'T_TRAIT_C' => '__TRAIT__',
        'T_METHOD_C' => '__METHOD__',
        'T_FUNC_C' => '',
        'T_COMMENT' => '',
        'T_DOC_COMMENT' => '',
        'T_OPEN_TAG' => '<?php|<?',
        'T_OPEN_TAG_WITH_ECHO' => '<?=',
        'T_CLOSE_TAG' => '?>',
        'T_WHITESPACE' => ' ',
        'T_START_HEREDOC' => '<<<',
        'T_END_HEREDOC' => '^',
        'T_DOLLAR_OPEN_CURLY_BRACES' => '',
        'T_CURLY_OPEN' => '{',
        'T_PAAMAYIM_NEKUDOTAYIM' => '',
        'T_NAMESPACE' => '',
        'T_NS_C' => '',
        'T_NS_SEPARATOR' => '',
        'T_ELLIPSIS' => '',
        'T_DOUBLE_COLON' => '',
    ];


    protected $patterns;


    protected $map = [
        'T_CONSTANT_ENCAPSED_STRING_1' => 'T_CONSTANT_ENCAPSED_STRING',
        'T_CONSTANT_ENCAPSED_STRING_2' => 'T_CONSTANT_ENCAPSED_STRING',
        'T_OPEN_TAG_1' => 'T_OPEN_TAG',
        'T_OPEN_TAG_2' => 'T_OPEN_TAG',
        'T_INT_CAST_1' => 'T_INT_CAST',
        'T_INT_CAST_2' => 'T_INT_CAST',
        'T_BOOL_CAST_1' => 'T_BOOL_CAST',
        'T_BOOL_CAST_2' => 'T_BOOL_CAST',
        'T_DOUBLE_CAST_1' => 'T_DOUBLE_CAST',
        'T_DOUBLE_CAST_2' => 'T_DOUBLE_CAST',
        'T_DOUBLE_CAST_3' => 'T_DOUBLE_CAST',
    ];

    public function __construct()
    {
        $this->patterns = [
            'base' => [
                ['\<\?.*?\?\>', 'php-tokens'],
                ['\<\?.*?$', 'php-tokens'],
                'T_INLINE_HTML' => ['.'],
            ],
            'php-tokens' => [
                'T_OPEN_TAG_1' => '\<\?php',
                'T_OPEN_TAG_WITH_ECHO' => '\<\?\=',
                'T_OPEN_TAG_2' => '\<\?',
                'T_DOC_COMMENT' => '\/\*\*.+?\*\/',
                'T_COMMENT' => '//.+\n',
                'T_OBJECT_OPERATOR' => '\-\>',
                'T_VARIABLE' => '\$\w[\w\d_]+',
                'T_STRING' => ['\w[\w\d]+', 'php-T_STRING'],
                'T_CONSTANT_ENCAPSED_STRING_2' => ['".*?"'],
                'T_CONSTANT_ENCAPSED_STRING_1' => '\'.*?\'',
                'T_WHITESPACE' => '[\t \r\n]+',
                'T_CLOSE_TAG' => '\?\>',
                '.',
            ],

            'php-T_STRING' => [
                ['\(\s*\w+\s*\)', new CastEqualsChecker([
                    'T_INT_CAST_1' => '(int)',
                    'T_INT_CAST_2' => '(integer)',
                    'T_OBJECT_CAST' => '(object)',
                    'T_STRING_CAST' => '(string)',
                    'T_UNSET_CAST' => '(unset)',
                    'T_ARRAY_CAST' => '(unset)',
                    'T_BOOL_CAST_1' => '(bool)',
                    'T_BOOL_CAST_2' => '(boolean)',
                    'T_DOUBLE_CAST_1' => '(real)',
                    'T_DOUBLE_CAST_2' => '(double)',
                    'T_DOUBLE_CAST_3' => '(float)',
                ], 'T_STRING')],
                ['.+', new EqualsChecker([
                    'T_REQUIRE_ONCE' => 'require_once',
                    'T_INCLUDE_ONCE' => 'include_once',
                    'T_REQUIRE' => 'require',
                    'T_INCLUDE' => 'include',
                ], 'T_STRING')],
            ],
        ];
    }


    public function getPatterns($set = null)
    {
        $set = $set ?: 'base';

        if ($this->patterns[$set] !== null) {
            return $this->patterns[$set];
        }

        throw new \RuntimeException("Non exist ruleset '{$set}'");
    }

    public function getMap()
    {
        return $this->map;
    }
}
