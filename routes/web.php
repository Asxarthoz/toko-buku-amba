<?php

use App\Http\Controllers\BookController;

Route::get('/', function() {
    return redirect('/books');
});

Route::resource('books', BookController::class);

