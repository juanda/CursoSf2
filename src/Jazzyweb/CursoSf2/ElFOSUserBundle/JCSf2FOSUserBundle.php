<?php

namespace Jazzyweb\CursoSf2\ElFOSUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class JCSf2FOSUserBundle extends Bundle {

    public function getParent() {
        return 'FOSUserBundle';
    }
}
