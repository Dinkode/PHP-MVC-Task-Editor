<?php
/**
 * Created by PhpStorm.
 * User: vesel
 * Date: 11/5/2018
 * Time: 9:18 PM
 */

namespace Http;


abstract class HttpAbstract
{

    protected function redirect(string $url)
    {
        header('Location: '.$url);
        exit;
    }
}