<?php

namespace Grupo51\ProyectoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Grupo51ProyectoBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
	
}
