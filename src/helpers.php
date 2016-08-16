<?php

if (!function_exists('pinba')) {
    /**
     * Get the LaravelPinba instance
     *
     * @return \tochkaDevelopers\Pinba\LaravelPinba
     */
    function pinba()
    {
        return app('pinba');
    }
}
