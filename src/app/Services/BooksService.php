<?php

namespace App\Services;

use App\Models\Book;
use App\Models\DTO\BookDTO;
use App\Repositories\BooksRepository;
use Illuminate\Support\Collection;

class BooksService
{
    private BooksRepository $booksRepository;

    public function __construct(BooksRepository $booksRepository)
    {
        $this->booksRepository = $booksRepository;
    }
    public function getAllBooks() : Collection
    {
        return $this->booksRepository->all();
    }

    public function getSingleBook(int $bookId) : Book
    {
        return $this->booksRepository->find($bookId);
    }

    public function storeNewBook(BookDTO $newBook) : Book
    {
        return $this->booksRepository->store($newBook->toArray());
    }

    public function updateBook(int $bookId, BookDTO $bookDTO) : Book
    {
        $this->booksRepository->update($bookId, $bookDTO->toArray());

        return  $this->booksRepository->find($bookId);
    }

    public function delete(int $bookId)
    {
        return $this->booksRepository->destroy($bookId);
    }
}
