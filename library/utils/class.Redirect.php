<?php
/**
 * Created by PhpStorm.
 * User: pedro
 * Date: 06.11.2017
 * Time: 20:01
 */

namespace SanTourWeb\Library\Utils;


class Redirect
{
    public static function toUrl($link)
    {
        header(sprintf('Location: %s', $link));
        exit;
    }

    public static function toLastPage()
    {
        if (isset($_SERVER['HTTP_REFERER'])) $link = $_SERVER['HTTP_REFERER'];
        else {
            if (isset($_SESSION['user']))
                $link = ABSURL . DS . 'tracks';
            else
                $link = ABSURL;
        }

        header(sprintf('Location: %s', $link));
        exit;
    }

    public static function toAction($controller, $action = 'index', $param = null)
    {
        echo $controller;
        echo $action;
        if (isset($param)) {
            $queryString = '&';
            foreach ($param as $key => $value) {
                $queryString .= sprintf('%s=%s', $key, $value);
            }

            header(sprintf('Location: ' . ABSURL . DS . '%s' . DS . '%s?%s', $controller, $action, $queryString));
            exit;
        } else {
            header(sprintf('Location: ' . ABSURL . DS . '%s', $controller));
            exit;
        }
    }
}