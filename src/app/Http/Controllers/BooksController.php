<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\DTO\BookDTO;
use App\Services\BooksService;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    private BooksService $booksService;

    public function __construct(BooksService $booksService)
    {
        $this->booksService = $booksService;
    }

    public function list()
    {
        return BookResource::collection($this->booksService->getAllBooks());
    }

    public function create(StoreBookRequest $request)
    {
        $newBook = new BookDTO(
            $request->get('title'),
            $request->get('publisher'),
            $request->get('author'),
            $request->get('genre'),
            $request->get('book_publication'),
            $request->get('amount_of_words'),
            $request->get('price'),
        );

       return new BookResource($this->booksService->storeNewBook($newBook));
    }

    public function show(Book $book)
    {
        return new BookResource($this->booksService->getSingleBook($book->id));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $updateBook = new BookDTO(
            $request->get('title'),
            $request->get('publisher'),
            $request->get('author'),
            $request->get('genre'),
            $request->get('book_publication'),
            $request->get('amount_of_words'),
            $request->get('price'),
        );

        return new BookResource($this->booksService->updateBook($book->id, $updateBook));
    }

    public function delete(Book $book)
    {
       return $this->booksService->delete($book->id);
    }
}
