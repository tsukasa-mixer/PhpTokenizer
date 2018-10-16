<?php

if (!extension_loaded('Tokenizer')) {

    /**
     * Split given source into PHP tokens
     * @link  https://php.net/manual/en/function.token-get-all.php
     *
     * @param string $source <p>
     *                       The PHP source to parse.
     *                       </p>
     * @param int $flags
     *                       <p>
     *                       <p>
     *                       Valid flags:
     *                       </p><ul>
     *                       <li>
     *
     * <b>TOKEN_PARSE</b> - Recognises the ability to use
     * reserved words in specific contexts.
     * </li>
     * </ul>
     * </p>
     *
     * @return array An array of token identifiers. Each individual token identifier is either
     * a single character (i.e.: ;, .,
     * &gt;, !, etc...),
     * or a three element array containing the token index in element 0, the string
     * content of the original token in element 1 and the line number in element 2.
     * @since 4.2.0
     * @since 5.0
     */
    function token_get_all($source, $flags = 0)
    {
        static $tokenizer;

        if (!$tokenizer) {
            $tokenizer = new \Tsukasa\PhpTokenizer\Tokenizer(
                new \Tsukasa\PhpTokenizer\Rules()
            );
            
            trigger_error('Extension Tokenizer is disabled, used polyfill', E_USER_NOTICE);
        }

        return $tokenizer->parse($source);
    }

    /**
     * Get the symbolic name of a given PHP token
     * @link  https://php.net/manual/en/function.token-name.php
     *
     * @param int $token <p>
     *                   The token value.
     *                   </p>
     *
     * @return string The symbolic name of the given <i>token</i>.
     * @since 4.2.0
     * @since 5.0
     */
    function token_name($token)
    {
        return \Tsukasa\PhpTokenizer\Helper::getConstantName($token);
    }

    \Tsukasa\PhpTokenizer\Helper::registerConstants();
}
