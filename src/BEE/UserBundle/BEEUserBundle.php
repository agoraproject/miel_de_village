<?php

namespace BEE\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BEEUserBundle extends Bundle
{
    public function getParent()
  {
    return 'FOSUserBundle';
  }
}
