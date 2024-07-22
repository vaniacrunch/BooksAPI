<?php

namespace App\Models\DTO;

class BookDTO
{
    private string $title;
    private string $publisher;
    private string $author;
    private string $genre;
    private string $bookPublication;
    private int $amountOfWords;
    private float $price;

    public function __construct(
        string $title,
        string $publisher,
        string $author,
        string $genre,
        string $bookPublication,
        int $amountOfWords,
        float $price
    ) {

        $this->title = $title;
        $this->publisher = $publisher;
        $this->author = $author;
        $this->genre = $genre;
        $this->bookPublication = $bookPublication;
        $this->amountOfWords = $amountOfWords;
        $this->price = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function getBookPublication(): string
    {
        return $this->bookPublication;
    }

    public function getAmountOfWords(): int
    {
        return $this->amountOfWords;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function toArray()
    {
        return [
            'title' => $this->getTitle(),
            'publisher' => $this->getPublisher(),
            'author' => $this->getAuthor(),
            'genre' => $this->getGenre(),
            'book_publication' => $this->getBookPublication(),
            'amount_of_words' => $this->getAmountOfWords(),
            'price' => $this->getPrice(),
        ];
    }
}
