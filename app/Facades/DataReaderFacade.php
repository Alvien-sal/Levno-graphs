<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use App\Services\DataReaderService;

class DataReaderFacade extends Facade{

    protected static function getFacadeAccessor(){

        return DataReaderService::class;

    }
}