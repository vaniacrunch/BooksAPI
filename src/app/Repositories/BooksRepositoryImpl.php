<?php

namespace App\Repositories;

use App\Models\Book;

class BooksRepositoryImpl extends Repository implements BooksRepository
{
    protected $model = Book::class;
}
