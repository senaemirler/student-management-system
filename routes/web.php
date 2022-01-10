<?php

use App\Http\Controllers\CapController;
use App\Http\Controllers\DersIntibakController;
use App\Http\Controllers\DgsController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\YatayGecisController;
use App\Http\Controllers\YazOkuluController;
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

//onclick="window.location = '{{ route("yaz_okulu_gecis")}}'"

Route::get('/', function () {
    return view('login_pages.student_login');
})->name('student_login');

Route::get('/main', function () {
    return view('student_pages.main');
})->name('main');

Route::get('/yazOkulu', [MainController::class,'yazOkulu'])->name('yaz_okulu_gecis');
Route::get('/yatayGecis', [MainController::class,'yatayGecis'])->name('yatay_gecis_gecis');
Route::get('/dgs', [MainController::class,'dgs'])->name('dgs_gecis');
Route::get('/cap', [MainController::class,'cap'])->name('cap_gecis');
Route::get('/dersIntibak', [MainController::class,'dersIntibak'])->name('ders_intibak_gecis');

Route::post('/yazOkuluBasvuru', [YazOkuluController::class,'yazOkuluBasvuru'])->name('yaz_okulu.post');
Route::post('/yatayGecisBasvuru', [YatayGecisController::class,'yatayGecisBasvuru'])->name('yatay_gecis.post');
Route::post('/dgsBasvuru', [DgsController::class,'dgsBasvuru'])->name('dgs.post');
Route::post('/capBasvuru', [CapController::class,'capBasvuru'])->name('cap.post');
Route::post('/dersIntibakBasvuru', [DersIntibakController::class,'dersIntibakBasvuru'])->name('ders_intibak.post');

Route::post('/kayit-ol',[FirebaseController::class,'signUp'])->name('signUp.post');
Route::get('/kayit-ol',[FirebaseController::class,'toSignUp'])->name('signUp');
//Route::post('/kayit-ol/{id}',[FirebaseController::class,'toSignUpBolum'])->name('signUp.bolum');
Route::post('/giris-yap',[FirebaseController::class,'login'])->name('login.post');

Route::get('/admin-giris-yap',[FirebaseController::class,'toLoginAdmin'])->name('login.admin');
Route::post('/admin-giris-yap',[FirebaseController::class,'loginAdmin'])->name('login.admin.post');

Route::get('/profil',[MainController::class,'toProfile'])->name('profile');
Route::get('/profil/cikis',[FirebaseController::class,'signOut'])->name('signOut');
Route::get('/basvurularim',[FirebaseController::class,'basvurularim'])->name('basvurularim');

Route::get('/yazOkuluAdmin', [MainController::class,'yazOkuluAdmin'])->name('yaz_okulu_admin');
Route::get('/yatayGecisAdmin', [MainController::class,'yatayGecisAdmin'])->name('yatay_gecis_admin');
Route::get('/dgsAdmin', [MainController::class,'dgsAdmin'])->name('dgs_admin');

Route::get('/capAdmin', [FirebaseController::class,'capBasvurulari'])->name('cap_admin');

Route::get('/dersIntibakAdmin', [MainController::class,'dersIntibakAdmin'])->name('ders_intibak_admin');

/*Route::get('/insert', function() {
    $stuRef = app('firebase.firestore')->database()->collection('User')->newDocument();
    $stuRef->set([
       'firstname' => 'Seven',
       'lastname' => 'Stac',
       'age'    => 19
]);
echo "<h1>".'inserted'."</h1>";
});

Route::get('/display', function(){
 $student = app('firebase.firestore')->database()->collection('User')->document('166f34ea1c9641dab0a0')->snapshot();
 print_r('Student ID ='.$student->id());
 print_r("<br>". 'Student Name = '.$student->data()['firstname']);
 print_r("<br>".'Student Age = '.$student->data()['age']);
});

Route::get('/update', function(){
 $student = app('firebase.firestore')->database()->collection('User')->document('166f34ea1c9641dab0a0')
->update([
 ['path' => 'age', 'value' => '18']
]);
echo "<h1>".'updated'."</h1>";
});

Route::get('/delete', function(){
app('firebase.firestore')->database()->collection('User')->document('166f34ea1c9641dab0a0')->delete();
echo "<h1>".'deleted'."</h1>";
});

Route::resource('/crud', App\Http\Controllers\CrudController::class);*/

