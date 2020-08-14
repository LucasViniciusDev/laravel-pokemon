<?php

namespace App\Services;

abstract class Services
{
    public function error(\Exception $e)
    {
        $error = new \stdClass;
        $error->error = true;
        $error->message = $e->getMessage();
        $error->code = $e->getCode();
        return $error;
    }
}
