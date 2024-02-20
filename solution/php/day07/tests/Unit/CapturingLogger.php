<?php

declare(strict_types = 1);

namespace Tests\Unit;

use App\Dependancies\Logger;

class CapturingLogger implements Logger
{
	private array $lines = [];

	public function info(string $message): void
	{
		$this->lines[] = 'INFO: ' . $message;
	}

	public function error(string $message): void
	{
		$this->lines[] = 'ERROR: ' . $message;
	}

	public function loggedLines(): array
	{
		return $this->lines;
	}
}
