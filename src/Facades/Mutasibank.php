<?php

namespace Indofx\Mutasibank\Facades;

use Illuminate\Support\Facades\Facade;

class Mutasibank extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mutasibank';
    }
}
