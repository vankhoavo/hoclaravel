<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

// Route::get('/', function () {
//     // return view('home');
//     return view('welcome');
// });

// // Route::get('/unicode', function(){
// //     return view('home');
// //     // $user = new User();
// //     // $allUser = $user::all();
// //     // dd($allUser);
// // });

// Route::get('/san-pham', function(){
//     return view('product');
// });

// Route::get('/test', function(){
//     $html = '<h1>Học lập trình tại Unicode</h1>';
//     return $html;
// });

// Route::get('/test1', function(){
//     return view('form');
// });

// Route::post('/test1', function(){
//     return 'Phương thức Post của path/ unicode';
// });

// Route::put('/test1', function(){
//     return 'Phương thức Put của path/ unicode';
// });

// Route::delete('/test1', function(){
//     return 'Phương thức Delete của path/ unicode';
// });

// Route::patch('/test1', function(){
//     return 'Phương thức Patch của path/ unicode';
// });

// Route::match(['get', 'post'], 'unicode', function(){
//     return $_SERVER['REQUEST_METHOD'];
// });

// Route::any('/unicode', function(Request $request){
//     $request = new Request();
//     return $request->method();
//     // return $_SERVER['REQUEST_METHOD'];
// });

// Route::get('/show-form', function(){
//     return view('form');
// });

// Route::redirect('/unicode', 'show-form', 302);
// Yêu cầu phải sử dụng 301 302

// Route::view('show-form', 'form');

// Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
// Route::get('/tin-tuc', 'HomeController@getNews')->name('news');
// Route::get('/chuyen-muc/{id}', [HomeController::class, 'getCategory']);

// Route::prefix('admin')->group(function () {
//     Route::get('tin-tuc/{id?}/{slug?}.html', function ($id = null, $slug = null) {
//         $content = 'Phương thức Get của path/ unicode: ';
//         $content .= "có id: " . $id . '<br/>';
//         $content .= "có slug: " . $slug;
//         return $content;
//     })->where(
//         // 'slug'  => '.+',
//         // 'id'    => '[0-9]+',
//         'id',
//         '\d+'
//     )->where('slug', '.+')->name('admin.tintuc');

//     Route::get('show-form', function () {
//         return view('form');
//     })->name('admin.show-form');

//     Route::prefix('products')->middleware('checkpermisson')->group(function () {
//         Route::get('/', function () {
//             return 'Danh sách sản phẩm';
//         });
//         Route::get('/add', function () {
//             return 'Thêm sản phẩm';
//         })->name('admin.products.add');
//         Route::get('/edit', function () {
//             return 'Sửa sản phẩm';
//         });
//         Route::get('/delete', function () {
//             return 'Xoá sản phẩm';
//         });
//     });
// });

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth.admin');

// Client Route
Route::middleware('auth.admin')->prefix('categories')->group(function () {

    // Danh sách chuyên mục
    Route::get('/', [CategoriesController::class, 'index'])->name('categories.list');

    // Lấy chi tiết 1 chuyên mục (Áp dụng show form sửa chuyên mục)
    Route::get('/edit/{id}', [CategoriesController::class, 'getCategory'])->name('categories.edit');

    // Xử lí update chuyên mục
    Route::post('/edit/{id}', [CategoriesController::class, 'updateCategory']);

    // Hiển thị form add dữ liệu
    Route::get('/add', [CategoriesController::class, 'addCategory'])->name('categories.add');

    // Xử lí thêm chuyên mục
    Route::post('/add', [CategoriesController::class, 'handleAddCategory']);

    // Xoá chuyên mục
    Route::delete('/delete/{id}', [CategoriesController::class, 'deleteCategory'])->name('categories.delete');
});


//Admin Route
Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('products', ProductsController::class)->middleware('auth.admin.product');
});

Route::get('/san-pham/{id}', [HomeController::class, 'getProductDetail']);
