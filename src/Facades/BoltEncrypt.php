<?php

namespace Dipenparmar12\BoltEncrypt\Facades;

use Illuminate\Support\Facades\Facade;

class BoltEncrypt extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bolt-encrypt';
    }
}
