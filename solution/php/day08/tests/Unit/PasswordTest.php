<?php

declare(strict_types = 1);

use App\Password;

beforeEach(function (): void {
	$this->password = new Password;
});

describe('Password need to return', function (): void {
    test('false if he have less than 8 character', function (): void {
		expect($this->password->isValid('2345.Aa'))->toBe(false);
	});
});
