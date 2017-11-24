<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 06.11.2017
 * Time: 20:01
 */

namespace ResaBike\Library\Utils;


class Redirect
{
    public static function toUrl($link) {
        header(sprintf('Location: %s', $link));
        exit;
    }

    public static function toLastPage() {
        if(isset($_SERVER['HTTP_REFERER'])) $link = $_SERVER['HTTP_REFERER'];
        else {
            if (isset($_SESSION['user']))
                $link = DS . 'resabike' . DS . 'books';
            else
                $link = DS . 'resabike';
        }

        header(sprintf('Location: %s', $link));
        exit;
    }

    public static function toAction($controller, $action = 'index', $param = null){
        if(isset($param)) {
            $queryString = '&';
            foreach($param as $key => $value) {
                $queryString .= sprintf('%s=%s', $key, $value);
            }
        }
        else
            $queryString = '';

        header(sprintf('Location: '.DS.'resabike'.DS.'%s'.DS.'%s?%s', $controller, $action, $queryString));
        exit;
    }
}