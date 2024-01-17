<?php

use App\Http\Controllers\Frontend\Agency\AuthorizedAgencyController;
use App\Http\Controllers\Frontend\Career\CompanyCareerController;
use App\Http\Controllers\Frontend\Career\JobController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\News\BlogController;
use App\Http\Controllers\Frontend\News\NoticeController;
use App\Http\Controllers\Frontend\News\PressReleaseController;
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

//notice
Route::get('/our-notice', [NoticeController::class, 'index'])->name('notice.index');
Route::get('/our-notice/search/', [NoticeController::class, 'search'])->name('notice.search');
Route::get('/our-notice/{slug}', [NoticeController::class, 'show'])->name('notice.show');

//press release
Route::get('/press-release', [PressReleaseController::class, 'index'])->name('press_release.index');
Route::get('/press-release/search/', [PressReleaseController::class, 'search'])->name('press_release.search');
Route::get('/press-release/{slug}', [PressReleaseController::class, 'show'])->name('press_release.show');

//career
Route::get('/career', [CompanyCareerController::class, 'index'])->name('career.index');
Route::get('/career/search/', [CompanyCareerController::class, 'search'])->name('career.search');
Route::get('/career/{slug}', [CompanyCareerController::class, 'show'])->name('career.show');

//document
Route::get('/our-document', [HomePageController::class, 'document'])->name('page.document');
Route::get('/brochure', [HomePageController::class, 'brochure'])->name('page.brochure');

Route::get('/video-gallery', [HomePageController::class, 'document'])->name('page.video_gallery');

Route::get('/our-category', [ServiceController::class, 'index'])->name('service.index');
Route::get('/our-category/search/', [ServiceController::class, 'search'])->name('service.search');
Route::get('/our-category/{slug}', [ServiceController::class, 'show'])->name('service.show');

Route::get('/team', [HomePageController::class, 'team'])->name('page.team');
Route::get('/past-president', [HomePageController::class, 'pastPresident'])->name('page.past_president');
Route::get('/testimonial', [HomePageController::class, 'testimonial'])->name('page.testimonial');

Route::get('/album', [HomePageController::class, 'album'])->name('page.album');
Route::get('/album/{slug}', [HomePageController::class, 'albumGallery'])->name('page.album_gallery');

//authorized agency
Route::get('/authorized-agencies', [AuthorizedAgencyController::class, 'index'])->name('authorized_agency.index');
Route::post('/authorized-agencies/data', [AuthorizedAgencyController::class, 'dataForAgency'])->name('authorized_agency.data');
Route::post('/authorized-agencies/detail', [AuthorizedAgencyController::class, 'agencyDetails'])->name('authorized_agency.details');


//slider list single page
Route::get('slider-detail/{slug}',[PageController::class, 'sliderListSingle'])->name('page.slider_single');
Route::get('/{slug}', [PageController::class, 'index'])->name('page.index');

