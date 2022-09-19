<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('Sections', App\Http\Controllers\SectionsController::class)->middleware('auth');
Route::resource('invoices', App\Http\Controllers\InvoicesController::class)->middleware('auth');
Route::resource('Products', App\Http\Controllers\ProductsController::class)->middleware('auth');

Route::get('Invoices/archive', [App\Http\Controllers\InvoicesController::class, 'archive'])->name('invoices.archive')->middleware('auth');
Route::get('Invoices/{id}/getproducts', [App\Http\Controllers\InvoicesController::class, 'getproducts'])->name('invoices.getproducts')->middleware('auth');
Route::get('Invoices/{id}/show', [App\Http\Controllers\InvoicesController::class, 'show'])->name('invoices.show')->middleware('auth');
Route::get('Invoices/{id}/restore', [App\Http\Controllers\InvoicesController::class, 'restore'])->name('invoices.restore')->middleware('auth');
Route::get('Invoices/{id}/paid', [App\Http\Controllers\InvoicesController::class, 'paid'])->name('invoices.paid')->middleware('auth');
Route::get('Invoices/markAsRead', [App\Http\Controllers\InvoicesController::class, 'markAsRead'])->name('invoices.markAsRead')->middleware('auth');
Route::post('Invoices/store', [App\Http\Controllers\InvoicesController::class, 'store'])->name('invoices.store')->middleware('auth');
Route::PUT('invoices/{id}/update', [App\Http\Controllers\InvoicesController::class, 'update'])->name('invoices.update')->middleware('auth');
Route::PUT('Invoices/{id}/Paidupdate', [App\Http\Controllers\InvoicesController::class, 'Paidupdate'])->name('invoices.Paidupdate')->middleware('auth');
Route::DELETE('Invoices/{id}/delete', [App\Http\Controllers\InvoicesController::class, 'delete'])->name('invoices.delete')->middleware('auth');

Route::POST('Sections/store', [App\Http\Controllers\SectionsController::class, 'store'])->name('Sections.store')->middleware('auth');
Route::POST('Sections/update', [App\Http\Controllers\SectionsController::class, 'update'])->name('Sections.update')->middleware('auth');
Route::DELETE('Sections/destroy', [App\Http\Controllers\SectionsController::class, 'destroy'])->name('Sections.destroy')->middleware('auth');

Route::POST('Products/store', [App\Http\Controllers\ProductsController::class, 'store'])->name('Products.store')->middleware('auth');
Route::POST('Products/update', [App\Http\Controllers\ProductsController::class, 'update'])->name('Products.update')->middleware('auth');
Route::DELETE('Products/destroy', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('Products.destroy')->middleware('auth');

Route::get('attachments/{id}/download', [App\Http\Controllers\InvoicesAttachmentsController::class, 'download'])->name('attachment.download')->middleware('auth');


Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('auth');

Route::resource('users', App\Http\Controllers\UserController::class )->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{page}', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
