<?php

declare(strict_types = 1);

namespace App;

class Intimate implements GreeterInterface
{
	public function greet(): string
	{
		return 'Hello Darling!';
	}
}
