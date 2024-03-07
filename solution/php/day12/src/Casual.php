<?php

declare(strict_types = 1);

namespace App;

class Casual implements GreeterInterface
{
	public function greet(): string
	{
		return 'Sup bro?';
	}
}
