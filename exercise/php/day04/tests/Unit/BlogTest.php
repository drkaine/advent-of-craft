<?php

declare(strict_types = 1);

use App\Article;
use Carbon\Carbon;

beforeEach(function (): void {
	$this->text = 'Amazing article !!!';
	$this->author = 'Pablo Escobar';
	$this->date = new Carbon;
	$this->format = 'y-m-d';

	$this->firstComment = 0;

	$this->article = new Article(
		'Lorem Ipsum',
		'consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore'
	);

	$this->article->addComment($this->text, $this->author);
});

	test('A comment should be valid', function (): void {
		$comments = $this->article->getComments()[$this->firstComment]->text;
		expect($comments)->toBe($this->text);

		$author = $this->article->getComments()[$this->firstComment]->author;
		expect($author)->toBe($this->author);

		$firstCommentCreationDate = $this->article->getComments()[$this->firstComment]->creationDate;

		expect($firstCommentCreationDate->format($this->format))->toBe($this->date->format($this->format));
	});

describe('Article in a blog', function (): void {
	test('should have add comment', function (): void {
		expect(count($this->article->getComments()))->toBe(1);
	});

	test('should throw an error when adding existing comment', function (): void {
		expect(function (): void {
			$this->article->addComment($this->text, $this->author);
		})->toThrow('Comment already exists');
	});
});