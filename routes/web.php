<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| 1. Public Routes (Ai cũng có thể xem)
|--------------------------------------------------------------------------
*/

// Trang chủ hiển thị danh sách sản phẩm
Route::get('/', function () {
    $products = Product::all();
    return view('home', compact('products'));
})->name('home');

// Giao diện đăng nhập
Route::get('/login', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin' ? redirect('/admin/products') : redirect('/');
    }
    return view('login');
})->name('login');

// Xử lý logic đăng nhập
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate(); // Bảo mật session

        // Phân quyền hướng đi sau khi đăng nhập thành công
        if (Auth::user()->role === 'admin') {
            return redirect('/admin/products');
        }
        return redirect('/');
    }

    // Nếu sai tài khoản, quay lại kèm thông báo lỗi
    return back()->with('error', 'Email hoặc mật khẩu không chính xác!');
});

/*
|--------------------------------------------------------------------------
| 2. Route khởi tạo Admin (Dùng để sửa lỗi đăng nhập)
|--------------------------------------------------------------------------
| Hướng dẫn: Truy cập đường dẫn /create-admin 1 lần duy nhất để tạo/cập nhật tài khoản.
*/
Route::get('/create-admin', function () {
    // Xóa user cũ nếu có để tránh xung đột mật khẩu chưa mã hóa
    User::where('email', 'admin@gmail.com')->delete();

    // Tạo mới tài khoản admin chuẩn mã hóa Bcrypt
    User::create([
        'name'     => 'Admin System',
        'email'    => 'admin@gmail.com',
        'password' => Hash::make('123456'), // Mật khẩu là 123456
        'role'     => 'admin'
    ]);

    return "Đã làm sạch dữ liệu cũ và tạo Admin thành công! <br> Email: admin@gmail.com | Pass: 123456 <br> <a href='/login'>Đi tới Đăng nhập</a>";
});

/*
|--------------------------------------------------------------------------
| 3. Admin Routes (Chỉ dành cho người đã đăng nhập)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // Quản lý sản phẩm (Resource Route)
    Route::resource('/admin/products', ProductController::class);

    // Đăng xuất
    Route::post('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});
//sản phẩm
Route::get('/products', function () {
    $products = \App\Models\Product::all();
    return view('products', compact('products'));
});
//chi tiết sản phẩm
Route::get('/product/{id}', function ($id) {
    $p = \App\Models\Product::find($id);
    return view('detail', compact('p'));
});