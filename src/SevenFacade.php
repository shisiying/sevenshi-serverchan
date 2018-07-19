<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/7/18
 * Time: 10:52
 */

namespace Sevenshi\Serverchan;

use \Illuminate\Support\Facades\Facade;

class SevenFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'serverchan';
    }
}