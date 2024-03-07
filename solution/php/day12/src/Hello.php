<?php

declare(strict_types = 1);

namespace App;

class Hello implements GreeterInterface
{
	public function greet(): string
	{
		return 'Hello.';
	}
}
