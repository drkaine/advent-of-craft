<?php

declare(strict_types = 1);

use App\Password;

beforeEach(function (): void {
	$this->password = new Password;
});

describe('Password need to be', function (): void {
	test('invalid if he have less than 8 character', function (): void {
		expect($this->password->isValid('2345.Aa'))->toBe(false);
	});

	test('invalid if he have less than 1 lowercase letter', function (): void {
		expect($this->password->isValid('123456.A'))->toBe(false);
	});

	test('invalid if he have less than 1 capital letter', function (): void {
		expect($this->password->isValid('123456.a'))->toBe(false);
	});

	test('invalid if he have less than 1 number', function (): void {
		expect($this->password->isValid('bbbbb.Aa'))->toBe(false);
	});

	test('invalid if he have less than a special character in this list . * # @ $ % &', function (): void {
		expect($this->password->isValid('123456Aa'))->toBe(false);
	});

	test('invalid if he have a character not in this list . * # @ $ % &', function (): void {
		expect($this->password->isValid('123456.Aa '))->toBe(false);
	});

	test('valid if it\'s a valid password', function (): void {
		expect($this->password->isValid('123456.Aa'))->toBe(true);
	});
});
