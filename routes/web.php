<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ProductSearch;
use App\Livewire\ContactForm;

Route::get('/product-search', function() {
    return view('product');
})->name('home');

Route::get('/contact-form', function() {
    return view('contact');
})->name('contact');

Route::get('/todo-list', function() {
    return view('task');
})->name('todo');

Route::get('/product-list', function() {
    return view('product-list');
})->name('product-list');

Route::get('/', function() {
    return view('welcome');
});