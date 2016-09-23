<?php

namespace AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class VsUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}