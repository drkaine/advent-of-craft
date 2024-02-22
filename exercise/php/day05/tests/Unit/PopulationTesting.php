<?php

declare(strict_types = 1);

namespace Tests\Unit;

use App\Person;
use App\Pet;

class PopulationTesting
{
	public function getTheYoungestPetOwner(array $population): Person
	{
		$filtered = $population;

		usort($filtered, [$this, 'isTheYoungest']);

		$filtered = reset($filtered);

		return $filtered;
	}

	public function formatPopulation(array $population): string
	{
		$getResponseArray = array_map([$this, 'formatPersonWithTheirPets'], $population);

		$getResponseString = implode('\\n', $getResponseArray);

		return $getResponseString;
	}

	private function isTheYoungest($person1, $person2): int
	{
		$person1_pet_age = $person1->pets[0]->age ?? PHP_INT_MAX;
		$person2_pet_age = $person2->pets[0]->age ?? PHP_INT_MAX;

		if ($person1_pet_age < $person2_pet_age) {
			return -1;
		}
		if ($person1_pet_age > $person2_pet_age) {
			return 1;
		}

		return 0;
	}

	private function formatPersonWithTheirPets(Person $person): string
	{
		$response = $this->formatOwnersName($person);

		if (count($person->pets) > 0) {
			$response .= ' who owns : ';

			$getPetNameArray = array_map([$this, 'formatPetsName'], $person->pets);

			$getPetNameString = implode('', $getPetNameArray);

			$response .= $getPetNameString;
		}

		return $response;
	}

	private function formatOwnersName(Person $person): string
	{
		return $person->firstName . ' ' . $person->lastName;
	}

	private function formatPetsName(Pet $pet): string
	{
		return $pet->name . ' ';
	}
}
