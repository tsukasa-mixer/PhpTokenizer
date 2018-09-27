<?php

namespace Tsukasa\PhpTokenizer;

interface RulesInterface {

    /**
     * @return array
     */
    public function getMap();


    /**
     * @param null|string $ruleset
     * @return array
     */
    public function getPatterns($ruleset = null);
}