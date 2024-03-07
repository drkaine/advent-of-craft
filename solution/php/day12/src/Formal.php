<?php

declare(strict_types = 1);

namespace App;

class Formal implements GreeterInterface
{
	public function greet(): string
	{
		return 'Good evening, sir.';
	}
}
