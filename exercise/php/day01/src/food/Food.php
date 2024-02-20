<?php

declare(strict_types = 1);

namespace Food;

use Carbon\Carbon;
use Ramsey\Uuid\UuidInterface;

class Food
{
	public function __construct(
		private readonly ?Carbon $expirationDate,
		private readonly bool $approvedForConsumption,
		private readonly ?UuidInterface $inspectorId,
	) {
	}

	public function isEdible(?Carbon $now): bool
	{
		if($this->expirationDate > $now && $this->approvedForConsumption && $this->inspectorId != null) {
			return true;
		} else {
			return false;
		}
		
	}
}
