<?php

namespace ProjetL3\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ProjetL3UserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
