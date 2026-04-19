<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| 1. PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Danh sách sản phẩm
Route::get('/products', [HomeController::class, 'products']);

// Chi tiết sản phẩm
Route::get('/product/{id}', [HomeController::class, 'detail']);


/*
|--------------------------------------------------------------------------
| 2. LOGIN
|--------------------------------------------------------------------------
*/

// Form login
Route::get('/login', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect('/admin/products')
            : redirect('/');
    }
    return view('login');
})->name('login');

// Xử lý login
Route::post('/login', function (Request $request) {

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return Auth::user()->role === 'admin'
            ? redirect('/admin/products')
            : redirect('/');
    }

    return back()->with('error', 'Sai email hoặc mật khẩu!');
});


/*
|--------------------------------------------------------------------------
| 3. REGISTER (THÊM MỚI)
|--------------------------------------------------------------------------
*/

// Form register
Route::get('/register', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('register');
});

// Xử lý register
Route::post('/register', function (Request $request) {

    // check email tồn tại
    if (User::where('email', $request->email)->exists()) {
        return back()->with('error', 'Email đã tồn tại!');
    }

    // check password
    if ($request->password !== $request->password_confirmation) {
        return back()->with('error', 'Mật khẩu không khớp!');
    }

    // tạo user
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user' // mặc định user
    ]);

    return redirect('/login')->with('success', 'Đăng ký thành công!');
});


/*
|--------------------------------------------------------------------------
| 4. TẠO ADMIN (chạy 1 lần rồi xóa cũng được)
|--------------------------------------------------------------------------
*/

Route::get('/create-admin', function () {

    User::where('email', 'admin@gmail.com')->delete();

    User::create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123456'),
        'role' => 'admin'
    ]);

    return "Tạo admin OK! → admin@gmail.com / 123456";
});


/*
|--------------------------------------------------------------------------
| 5. CART
|--------------------------------------------------------------------------
*/

// Thêm giỏ
Route::get('/add-to-cart/{id}', [CartController::class, 'add']);

// Xem giỏ
Route::get('/cart', [CartController::class, 'index']);


/*
|--------------------------------------------------------------------------
| 6. ORDER
|--------------------------------------------------------------------------
*/

// Form checkout
Route::get('/checkout', [OrderController::class, 'checkout']);

// Xử lý đặt hàng
Route::post('/checkout', [OrderController::class, 'store']);


/*
|--------------------------------------------------------------------------
| 7. ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // CRUD sản phẩm
    Route::resource('/admin/products', ProductController::class);

    // Đơn hàng
    Route::get('/admin/orders', [OrderController::class, 'admin']);

    // Giao hàng
    Route::get('/admin/orders/{id}/deliver', [OrderController::class, 'deliver']);

    // Xóa đơn hàng
    Route::delete('/admin/orders/{id}', [OrderController::class, 'destroy']);

    // Logout
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');

});