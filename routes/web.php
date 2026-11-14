<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/subjects/filter/{value?}', function ($value = null) {
    if ($value === null) {
        return redirect()->route('subjects.index');
    }

    return redirect()->route('subjects.index', [
        'code' => $value
    ]);
});

Route::resource('subjects', SubjectController::class);

    
