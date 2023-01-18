<?php

use App\Http\Controllers\Admin\Articles\ArticleController;
use App\Http\Controllers\Admin\Articles\ArticleProcessingController;
use App\Http\Controllers\Admin\Articles\PendingArticleController;
use App\Http\Controllers\Admin\Articles\PublishedArticleController;
use App\Http\Controllers\Admin\Categories\CategoryController;
use App\Http\Controllers\Admin\Users\AccountController;
use App\Http\Controllers\Admin\Users\AccountSuspensionController;
use App\Http\Controllers\Client\ResponseController;
use App\Http\Controllers\ClientPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Post\PostImageController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\SiteVisitController;
use App\SiteVisits;
use Illuminate\Http\Request;
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

Route::get('/authors/signup', function () {
    return view('landingpage.index');
});

Route::get('/', function () {
    return view('post.index');
});


Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');



//post articles
//Route::get('/users/posts/index', [ClientPostController::class, 'index']);
Route::get('/articles/index', function () {
    return view('post.index');
});
Route::get('/articles/hidden', function () {
    return view('hidden');
});

Route::get('/users/posts/post/{post_id}',[ClientPostController::class, 'show']);
Route::get('/{post_id}',[ClientPostController::class, 'show']);

Route::get('/articles/contact', function () {
    $request = new Request([
        'site' => "contact",
    ]);

    $siteVisit = new SiteVisitController();
    $siteVisit->store($request);

    return view('post.contact');
});
Route::get('/articles/tech', function () {
    $request = new Request([
        'site' => "tech",
    ]);

    $siteVisit = new SiteVisitController();
    $siteVisit->store($request);

    return view('post.tech');
});
Route::get('/articles/sports', function () {
    $request = new Request([
        'site' => "sports",
    ]);

    $siteVisit = new SiteVisitController();
    $siteVisit->store($request);

    return view('post.sports');
});
Route::get('/articles/poems', function () {
    $request = new Request([
        'site' => "poems",
    ]);

    $siteVisit = new SiteVisitController();
    $siteVisit->store($request);

    return view('post.poems');
});
Route::get('/articles/news', function () {
    $request = new Request([
        'site' => "news",
    ]);

    $siteVisit = new SiteVisitController();
    $siteVisit->store($request);

    return view('post.news');
});
Route::get('/articles/business', function () {
    $request = new Request([
        'site' => "business",
    ]);

    $siteVisit = new SiteVisitController();
    $siteVisit->store($request);

    return view('post.business');
});
Route::get('/articles/articles', function () {
    return view('post.articles');
});

//client responses
Route::post('/user/contact/client/response/store', [ResponseController::class, 'store']);

//post
Route::get('/user/post/index', [PostController::class, 'index']);
Route::get('/user/post/create', [PostController::class, 'create']);
Route::post('/user/post/store', [PostController::class, 'store']);
Route::get('/user/post/show/{id}', [PostController::class, 'show']);
Route::get('/user/post/edit/{id}', [PostController::class, 'edit']);
Route::post('/user/post/update/{id}', [PostController::class, 'update']);
Route::post('/user/post/delete/{id}', [PostController::class, 'destroy']);
Route::post('/user/post/preview/{id}', [PostController::class, 'preview']);

//move to word editor
Route::get('/user/post/move_to_editor/{id}', [PostController::class, 'moveToArticleEditor']);
Route::post('/user/post/update-article-desc/{id}', [PostController::class, 'updateArticleDescription']);


//post images
Route::get('/post/image/index', [PostImageController::class, 'index']);
Route::get('/post/image/create', [PostImageController::class, 'create']);
Route::post('/post/image/store/{post_id}', [PostImageController::class, 'store']);
Route::get('/post/image/show/{id}', [PostImageController::class, 'show']);
Route::get('/post/image/edit/{id}', [PostImageController::class, 'edit']);
Route::get('/post/image/update/{id}', [PostImageController::class, 'update']);
Route::get('/post/image/delete/{id}', [PostImageController::class, 'destroy']);

//post article top image

Route::post('/post/image/title/store/{post_id}', [PostImageController::class, 'storeTitleImage']);





//settings
Route::get('/user/settings/index', [SettingController::class, 'index']);
Route::get('firebase','FirebaseController@index');

Route::post('/post/image/firebase', [PostImageController::class, 'uploadImageToFirebase']);


###Admin Routes
//article categories
Route::get('/admin/articles/category/index', [CategoryController::class, 'index']);
Route::get('/admin/articles/category/create', [CategoryController::class, 'create']);
Route::post('/admin/articles/category/store', [CategoryController::class, 'store']);
Route::get('/admin/articles/category/show/{id}', [CategoryController::class, 'show']);
Route::get('/admin/articles/category/edit/{id}', [CategoryController::class, 'edit']);
Route::get('/admin/articles/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/admin/articles/category/delete/{id}', [CategoryController::class, 'destroy']);

//articles
//post images
Route::get('/admin/articles/index', [ArticleController::class, 'index']);
Route::get('/admin/articles/create', [ArticleController::class, 'create']);
Route::post('/admin/articles/store', [ArticleController::class, 'store']);
Route::get('/admin/articles/show/{id}', [ArticleController::class, 'show']);
Route::get('/admin/articles/edit/{id}', [ArticleController::class, 'edit']);
Route::get('/admin/articles/update/{id}', [ArticleController::class, 'update']);
Route::get('/admin/articles/delete/{id}', [ArticleController::class, 'destroy']);

//pending articles
Route::get('/admin/articles/pending/index', [PendingArticleController::class, 'index']);
Route::get('/admin/articles/pending/create', [PendingArticleController::class, 'create']);
Route::post('/admin/articles/pending/store', [PendingArticleController::class, 'store']);
Route::get('/admin/articles/pending/show/{id}', [PendingArticleController::class, 'show']);
Route::get('/admin/articles/pending/edit/{id}', [PendingArticleController::class, 'edit']);
Route::get('/admin/articles/pending/update/{id}', [PendingArticleController::class, 'update']);
Route::get('/admin/articles/pending/delete/{id}', [PendingArticleController::class, 'destroy']);

//published articles
Route::get('/admin/articles/published/index', [PublishedArticleController::class, 'index']);
Route::get('/admin/articles/published/create', [PublishedArticleController::class, 'create']);
Route::post('/admin/articles/published/store', [PublishedArticleController::class, 'store']);
Route::get('/admin/articles/published/show/{id}', [PublishedArticleController::class, 'show']);
Route::get('/admin/articles/published/edit/{id}', [PublishedArticleController::class, 'edit']);
Route::get('/admin/articles/published/update/{id}', [PublishedArticleController::class, 'update']);
Route::get('/admin/articles/published/delete/{id}', [PublishedArticleController::class, 'destroy']);

//articlesProcessing
Route::get('/admin/articles/process/index', [ArticleProcessingController::class, 'index']);
Route::get('/admin/articles/process/create', [ArticleProcessingController::class, 'create']);
Route::post('/admin/articles/process/store', [ArticleProcessingController::class, 'store']);
Route::get('/admin/articles/process/show/{id}', [ArticleProcessingController::class, 'show']);
Route::get('/admin/articles/process/edit/{id}', [ArticleProcessingController::class, 'edit']);
Route::get('/admin/articles/process/update/{id}', [ArticleProcessingController::class, 'update']);
Route::get('/admin/articles/process/delete/{id}', [ArticleProcessingController::class, 'destroy']);

//Users

Route::get('/admin/account/users/index', [AccountController::class, 'index']);
Route::get('/admin/account/users/create', [AccountController::class, 'create']);
Route::post('/admin/account/users/store', [AccountController::class, 'store']);
Route::get('/admin/account/users/show/{id}', [AccountController::class, 'show']);
Route::get('/admin/account/users/edit/{id}', [AccountController::class, 'edit']);
Route::get('/admin/account/users/update/{id}', [AccountController::class, 'update']);
Route::get('/admin/account/users/delete/{id}', [AccountController::class, 'destroy']);


//Account Suspension
Route::get('/admin/account/suspend/index', [AccountSuspensionController::class, 'index']);
Route::get('/admin/account/suspend/create', [AccountSuspensionController::class, 'create']);
Route::post('/admin/account/suspend/store', [AccountSuspensionController::class, 'store']);
Route::get('/admin/account/suspend/show/{id}', [AccountSuspensionController::class, 'show']);
Route::get('/admin/account/suspend/edit/{id}', [AccountSuspensionController::class, 'edit']);
Route::get('/admin/account/suspend/update/{id}', [AccountSuspensionController::class, 'update']);
Route::get('/admin/account/suspend/delete/{id}', [AccountSuspensionController::class, 'destroy']);

