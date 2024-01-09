<?php

use App\Http\Controllers\Frontend\Career\CompanyCareerController;
use App\Http\Controllers\Frontend\Career\JobController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\News\BlogController;
use App\Http\Controllers\Frontend\Page\PageController;
use App\Http\Controllers\Frontend\Service\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomePageController::class, 'index'])->name('home');


Route::any('/register', function() {
    abort(404);
});


Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contact-us');
Route::post('/contact/message', [ContactUsController::class, 'contactStore'])->name('contact-us.store');


//blogs
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/search/', [BlogController::class, 'search'])->name('blog.search');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');

//jobs
Route::get('/job', [JobController::class, 'index'])->name('job.index');
Route::get('/job/search/', [JobController::class, 'search'])->name('job.search');
Route::get('/job/{slug}', [JobController::class, 'show'])->name('job.show');
Route::get('/job/category/{slug}', [JobController::class, 'category'])->name('job.category');

//jobs
Route::get('/career', [CompanyCareerController::class, 'index'])->name('career.index');
Route::get('/career/search/', [CompanyCareerController::class, 'search'])->name('career.search');
Route::get('/career/{slug}', [CompanyCareerController::class, 'show'])->name('career.show');

//document
Route::get('/our-document', [HomePageController::class, 'document'])->name('page.document');
Route::get('/brochure', [HomePageController::class, 'brochure'])->name('page.brochure');

Route::get('/video-gallery', [HomePageController::class, 'document'])->name('page.video_gallery');


Route::get('/categories-we-recruit', [ServiceController::class, 'index'])->name('service.index');
Route::get('/categories-we-recruit/search/', [ServiceController::class, 'search'])->name('service.search');
Route::get('/categories-we-recruit/{slug}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/team', [HomePageController::class, 'team'])->name('page.team');
Route::get('/testimonial', [HomePageController::class, 'testimonial'])->name('page.testimonial');

Route::get('/album', [HomePageController::class, 'album'])->name('page.album');
Route::get('/album/{slug}', [HomePageController::class, 'albumGallery'])->name('page.album_gallery');

//slider list single page
Route::get('slider-detail/{slug}',[PageController::class, 'sliderListSingle'])->name('page.slider_single');
Route::get('/{slug}', [PageController::class, 'index'])->name('page.index');

