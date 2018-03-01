<?php

namespace Page;

class Index extends \Controller
{
    public function getTest( $id, $test = 'a' )
    {
        return \Response::json( func_get_args() );
    }
}