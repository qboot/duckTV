<?php

namespace DuckTV\AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DuckTVAppBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
