<?php

use App\Models\Book;

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

const ENDPOINT = 'api/books';

test('returns list of books', function() {
    Book::factory(100)->create();

    $response = $this->get(ENDPOINT);

    $response->assertStatus(200);
    $response->assertJson(['data' => [[
        'title' => true
        ]]]);
});

test('returns single book', function() {
    $book = Book::factory()->create();

    $response = $this->get(sprintf('%s/%s', ENDPOINT, $book->id));

    $response->assertStatus(200);
    $response->assertJson(['data' => [
        'id' => $book->id
    ]]);
});

test('creates book', function() {
    $book = Book::factory()->make();

    $response = $this->post(ENDPOINT, $book->toArray());

    $response->assertStatus(201);
    $response->assertJson(['data' => [
        'title' => $book->title
    ]]);

    $bookId = json_decode($response->getContent(), true)['data']['id'];
    $this->assertDatabaseHas('books', [
        'id' => $bookId,
    ]);
});

test('updates book', function() {
    $book = Book::factory()->create();
    $book->title = $book->title. ' ' . 'Updated';

    $response = $this->put(sprintf('%s/%s', ENDPOINT, $book->id), $book->toArray());

    $response->assertStatus(200);
    $response->assertJson(['data' => [
        'id' => $book->id,
        'title' => $book->title
    ]]);

    $this->assertDatabaseHas('books', [
        'id' => $book->id,
    ]);
});

test('deletes book', function() {
    $book = Book::factory()->create();

    $response = $this->delete(sprintf('%s/%s', ENDPOINT, $book->id));

    $response->assertStatus(200);

    $this->assertDatabaseMissing('books', [
        'id' => $book->id,
    ]);
});
