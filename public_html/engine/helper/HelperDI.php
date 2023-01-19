<?php


namespace engine\helper;


class HelperDI
{
    /**
     * @return \Engine\DI\DI
     */
    public static function get()
    {
        global $di;

        return $di;
    }
}