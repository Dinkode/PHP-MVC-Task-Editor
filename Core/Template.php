<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 11/5/2018
 * Time: 8:57 PM
 */

namespace Core;


class Template
{
    private const TEMPLATE_PATH = 'Templates/';
    private const TEMPLATE_SUFFIX = '.php';

    public function render(string $template_name, $data = []){
        include (self::TEMPLATE_PATH.$template_name.self::TEMPLATE_SUFFIX);
    }
}