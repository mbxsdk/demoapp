<?php

namespace App\Index;


use App\Index\Provider\IndexRouteProvider;
use Mibexx\Index\IndexFactory as MibexxIndexFactory;

class IndexFactory extends MibexxIndexFactory
{
    /**
     * @return IndexRouteProvider
     */
    public function createRouteProvider()
    {
        return new IndexRouteProvider();
    }
}