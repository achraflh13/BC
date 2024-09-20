<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AmentieController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

// Route::get('/', function () {
// $createAdmin = Role::create(['name' => 'admin']);
// $createAgent = Role::create(['name' => 'agent']);
// });












Route::get('/dashboard', function () {
    return view('/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin routes
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'adminlogout'])->name('admin.logout');
});

// Agent routes
Route::middleware(['auth', 'role:agent'])->group(function() {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
    Route::get('/agent/logout', [AgentController::class, 'agentLogout'])->name('agent.logout');

});


// User routes
Route::middleware(['auth','role:user'])->group(function (){
    Route::get('/user/dashboard', [UserController::class, 'userdashboard'])->name('user.dashboard');
    Route::get('/user/logout', [UserController::class, 'userlogout'])->name('user.logout'); // Logout for user
});



Route::get('/',[AdminController::class,'Adminlogin'])->name('admin.login');
Route::get('/admin/profile',[AdminController::class,'Adminprofile'])->name('admin.profile');
Route::post('/admin/profile/store',[AdminController::class,'AdminprofileStore'])->name('admin.profile.store');
Route::get('/admin/profile/password',[AdminController::class,'AdminPasswordChange'])->name('admin.profile.password');
Route::post('/admin/profile/password/change',[AdminController::class,'AdminPasswordUpdate'])->name('admin.password.update');


Route::get('/agent/profile',[AgentController::class,'Agentprofile'])->name('agent.profile');
Route::post('/agent/profile/store',[AgentController::class,'AgentprofileStore'])->name('agent.profile.store');
Route::get('/agent/profile/password',[AgentController::class,'AgentPasswordChange'])->name('agent.profile.password');
Route::post('/agent/profile/password/change',[AgentController::class,'AgentPasswordUpdate'])->name('agent.password.update');





Route::get('/',[UserController::class,'Userlogin'])->name('user.login');
Route::get('/user/profile',[UserController::class,'Userprofile'])->name('user.profile');
Route::post('/user/profile/store',[UserController::class,'UserprofileStore'])->name('user.profile.store');
Route::get('/user/profile/password',[UserController::class,'UserPasswordChange'])->name('user.profile.password');
Route::post('/user/profile/password/change',[UserController::class,'UserPasswordUpdate'])->name('user.password.update');


Route::controller(PropertyTypeController::class)->group(function(){
    Route::get('/all/type', 'AllType')->name('all.type');
    Route::get('/add/type', 'AddType')->name('add.type');
    Route::post('/store/type', 'Store')->name('store.type');
    Route::get('/edit/type/{id}', 'edit')->name('edit.type');
    Route::get('/delete/type/{id}', 'delete')->name('delete.type');
    Route::post('/update/type', 'UpdateType')->name('update.type');
});





Route::controller(AdminController::class)->group(function(){
    Route::get('/all/admin', 'Alladmin')->name('all.admin');
    Route::get('/add/admin', 'Addadmin')->name('add.admin');
    Route::post('/store/admin', 'Storeadmin')->name('store.admin');
    Route::get('/edit/admin/{id}', 'Editadmin')->name('edit.admin');
    Route::post('/update/admin', 'Updateadmin')->name('update.admin');
    Route::get('/delete/admin/{id}', 'Deleteadmin')->name('delete.admin');
});


Route::controller(AgentController::class)->group(function(){
    Route::get('/all/agent', 'Allagent')->name('all.agent');
    Route::get('/add/agent', 'Addagent')->name('add.agent');
    Route::post('/store/agent', 'Storeagent')->name('store.agent');
    Route::get('/edit/agent/{id}', 'Editagent')->name('edit.agent');
    Route::post('/update/agent', 'Updateagent')->name('update.agent');
    Route::get('/delete/agent/{id}', 'Deleteagent')->name('delete.agent');
});


Route::controller(UserController::class)->group(function(){
    Route::get('/all/user', 'Alluser')->name('all.user');
    Route::get('/add/user', 'Adduser')->name('add.user');
    Route::post('/store/user', 'StoreUser')->name('store.user');
    Route::get('/edit/user/{id}', 'Edituser')->name('edit.user');
    Route::post('/update/user', 'Updateuser')->name('update.user');
    Route::get('/delete/user/{id}', 'Deleteuser')->name('delete.user');
});







Route::controller(AmentieController::class)->group(function(){
    Route::get('/all/amentie', 'AllAmentie')->name('all.amentie');
    Route::get('/add/amentie', 'AddAmentie')->name('add.amentie');
    Route::post('/store/amentie', 'StoreAmentie')->name('store.amentie');
    Route::get('/edit/amentie/{id}', 'EditAmentie')->name('edit.amentie');
    Route::post('/update/amentie', 'UpdateAmentie')->name('update.amentie');
    Route::get('/delete/amentie/{id}', 'DeleteAmentie')->name('delete.amentie');

});
Route::controller(RoleController::class)->group(function(){
    Route::get('/all/permission', 'AllPermission')->name('all.permission');
    Route::get('/add/permission', 'AddPermission')->name('add.permission');
    Route::post('/store/permission', 'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
    Route::post('/update/permission/', 'UpdatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');

});

Route::controller(RoleeController::class)->group(function(){
    Route::get('/all/role', 'AllRole')->name('all.role');
    Route::get('/add/role', 'AddRole')->name('add.role');
    Route::get('/add/edit/{id}', 'EditRole')->name('edit.role');
    Route::post('/store/role', 'StoreRole')->name('store.role');
    Route::post('/update/role/', 'UpdateRole')->name('update.role');
    Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');


    Route::get('/add/roles', 'AddRolePermission')->name('add.roles.permission');
    Route::post  ('/add/roles/store', 'StoreRolePermission')->name('role.permission.store');
    Route::get  ('/all/roles/permission', 'AllRolePermission')->name('all.roles.permission');

    Route::get  ('/edit/roles/permission/{id}', 'EditRolePermission')->name('edit.roles.permission');
    Route::post  ('/update/roles/permission/{id}', 'UpdateRolePermission')->name('update.roles.permission');
    Route::get  ('/delete/roles/permission/{id}', 'DeleteRolePermission')->name('delete.roles.permission');


});

