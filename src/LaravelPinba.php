<?php

namespace tochkaDevelopers\Pinba;

class LaravelPinba
{
    /**
     * The Laravel application instance.
     *
     * @var \Illuminate\Foundation\Application
     */
    protected $app;

    /**
     * Set to true if pinba service is enabled and extension is loaded
     *
     * @var bool
     */
    protected $enabled;

    /**
     * @param \Illuminate\Contracts\Foundation\Application $app
     * @param bool $enabled
     */
    public function __construct($app = null, $enabled = false)
    {
        if (!$app) {
            $app = app(); // Fallback when $app is not given
        }
        $this->app = $app;

        $this->enabled = $enabled;
    }
}
