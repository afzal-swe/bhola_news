<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleUserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;


// Route::get('/customer-logout', [HomeController::class, 'customer_logout'])->name('customer.logout');

// Admin Home Route Section Start //
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login_from')->name('admin_login');
    Route::post('/login', 'login')->name('login');
    Route::get('/register', 'register_from')->name('register_from');
    Route::post('/create', 'user_create')->name('user_create');
});


Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'author'], function () {
        // Admin Home Route Section Start //
        Route::controller(AuthController::class)->group(function () {
            Route::get('/dashboard', 'Admin_dashboard')->name('dashboard');
            Route::get('/logout', 'Admin_logout')->name('admin.logout');
            // Route::get('/password-change', 'password_change')->name('admin.password_change');
            // Route::post('/password-update', 'update_change')->name('pass.update');
        });

        // User Route Section Start //
        Route::group(['prefix' => 'user'], function () {
            // User Route Section
            Route::controller(UserController::class)->group(function () {
                Route::get('/all', 'view_user')->name('view_user');
                Route::get('/create', 'Create_user')->name('Create_user');
                Route::post('/store', 'store_user')->name('store_user');
                // Route::get('/edit/{id}', 'edit_brand')->name('brand.edit');
                // Route::post('/update/{id}', 'brand_update')->name('brand.update');
                // Route::get('/delete/{id}', 'Brand_Delete')->name('brand.delete');
            });
        });

        // Role Route Section Start //
        Route::group(['prefix' => 'role'], function () {
            // User Route Section
            Route::controller(RoleUserController::class)->group(function () {
                Route::get('/view', 'Role_View')->name('role.view');
                Route::get('/create', 'Role_Create')->name('role.create');
                Route::post('/store', 'Role_Store')->name('role.store');
            });
        });

        // category Route Section Start //
        Route::group(['prefix' => 'category'], function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('/view', 'Category_View')->name('Category_View');
                Route::post('/create', 'Add_Category')->name('add_category');
                Route::get('/edit/{slug}', 'Edit_Category')->name('edit_category');
                Route::post('/update/{slug}', 'Update_Category')->name('update_category');
                Route::get('/delete/{slug}', 'Delete_Category')->name('Delete_Category');
            });
        });

        // subcategory Route Section Start //
        Route::group(['prefix' => 'subcategory'], function () {
            Route::controller(SubcategoryController::class)->group(function () {
                Route::get('/view', 'Subategory_View')->name('Subategory_View');
                Route::post('/create', 'Create_Subcategory')->name('create_sub.category');
                Route::get('/edit/{id}', 'Subcategory_Edit')->name('subcategory.edit');
                Route::post('/update/{id}', 'Update_Subcategory')->name('update_subcategory');
                Route::get('/delete/{id}', 'Subcategory_Delete')->name('subcategory.delete');
            });
        });

        // District Route Section Start //
        Route::group(['prefix' => 'district'], function () {
            Route::controller(DistrictController::class)->group(function () {
                Route::get('/view', 'District_View')->name('District_View');
                Route::post('/create', 'Add_District')->name('add_district');
                Route::get('/edit/{slug}', 'District_Edit')->name('district.edit');
                Route::post('/update/{slug}', 'District_Update')->name('district.update');
                Route::get('/delete/{slug}', 'District_Delete')->name('district.delete');
            });
        });

        // Sub-District Route Section Start //
        Route::group(['prefix' => 'sub-district'], function () {
            Route::controller(SubDistrictController::class)->group(function () {
                Route::get('/view', 'District_View')->name('Sub_district_View');
                Route::post('/create', 'Add_Sub_District')->name('add_sub_district');
                Route::get('/edit/{slug}', 'Sub_District_Edit')->name('sub_district.edit');
                Route::post('/update/{slug}', 'Sub_District')->name('sub_district.update');
                Route::get('/delete/{slug}', 'Sub_District_Delete')->name('sub_district.delete');
            });
        });
    });
});
