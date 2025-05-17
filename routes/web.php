<?php

use App\Http\Controllers\AnggotaSidangController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DaftarSidangTaMahasiswaController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardAdminKaprodiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DashboardDosenKaprodiController;
use App\Http\Controllers\DashboardKaprodiController;
use App\Http\Controllers\DashboardKaprodiKaprodiController;
use App\Http\Controllers\DashboardMahasiswaController;
use App\Http\Controllers\DashboardMahasiswaKaprodiController;
use App\Http\Controllers\JadwalProposalController;
use App\Http\Controllers\JadwalProposalDosenController;
use App\Http\Controllers\JadwalProposalKaprodiController;
use App\Http\Controllers\JadwalProposalMahasiswaController;
use App\Http\Controllers\JadwalSidangTaAdminController;
use App\Http\Controllers\JadwalSidangTaDosenController;
use App\Http\Controllers\JadwalSidangTaKaprodiController;
use App\Http\Controllers\JadwalSidangTaMahasiswaController;
use App\Http\Controllers\KetuaSidangTaController;
use App\Http\Controllers\NilaiKeseluruhanAdminController;
use App\Http\Controllers\NilaiKetuaSidangController;
use App\Http\Controllers\NilaiPembimbing1Controller;
use App\Http\Controllers\NilaiPembimbing2Controller;
use App\Http\Controllers\NilaiPenguji1Controller;
use App\Http\Controllers\NilaiPenguji2Controller;
use App\Http\Controllers\NilaiPenguji3Controller;
use App\Http\Controllers\NilaiSidangTaMahasiswaAdminController;
use App\Http\Controllers\NilaiSidangTaMahasiswaController;
use App\Http\Controllers\NilaiSidangTaMahasiswaKaprodiController;
use App\Http\Controllers\PengujiSidangController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ProdiKaprodiController;
use App\Http\Controllers\ProposalTaMahasiswaController;
use App\Http\Controllers\ReportSidangAdminController;
use App\Http\Controllers\ReportSidangKaprodiController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\RuangKaprodiController;
use App\Http\Controllers\SekretarisSidangTaController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SesiTaController;
use App\Http\Controllers\SesiTaKaprodiController;
use App\Http\Controllers\SidangTaMahasiswaController;
use App\Http\Controllers\StatusProposalMahasiswaController;
use App\Http\Controllers\StatusSidangTaMahasiswaController;
use App\Http\Controllers\TampilanAdminController;
use App\Http\Controllers\TampilanDosenController;
use App\Http\Controllers\TampilanKaprodiController;
use App\Http\Controllers\TampilanMahasiswaController;

use App\Http\Controllers\ValidasiProposalDosenController;
use App\Http\Controllers\ValidasiProposalKaprodiController;
use App\Http\Controllers\ValidasiProposalPembimbing2Controller;
use App\Http\Controllers\ValidasiSidangTaKaprodiController;
use App\Models\nilaipembimbing2;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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
Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class,'landing'] );
Route::get('/login', [SesiController::class,'index'] )->name('login');
Route::post('/login', [SesiController::class,'login'] );
Route::get('/next-register', [SesiController::class,'nextregister'] )->name('nextregister');
Route::get('/proses-next-register', [SesiController::class,'prosesnextregister'] )->name('prosesnextregister');
Route::get('/register', [SesiController::class,'register'] )->name('register');
Route::get('/forgot-password', [SesiController::class,'forgot'] )->name('forgot_password');
Route::post('/forgot-proses', [SesiController::class,'forgotproses'] )->name('forgot_proses');
Route::get('/validasi-forgot-password/{token}', [SesiController::class,'validasiforgot'] )->name('validasi_forgot_password');
Route::post('/validasi-forgot-proses', [SesiController::class,'validasiforgotproses'] )->name('validasi_forgot_proses');
Route::post('/proses-register-admin', [SesiController::class,'prosesregisteradmin'] )->name('prosesregisteradmin');
Route::post('/proses-register-dosen', [SesiController::class,'prosesregisterdosen'] )->name('prosesregisterdosen');
Route::post('/proses-register-mahasiswa', [SesiController::class,'prosesregistermahasiswa'] )->name('prosesregistermahasiswa');
Route::post('/proses-register-kaprodi', [SesiController::class,'prosesregisterkaprodi'] )->name('prosesregisterkaprodi');
Route::post('/register-proses', [SesiController::class,'register_proses'] )->name('register_proses');
// Route::get('/validasi-register/{token}', [SesiController::class,'validasiregister'] )->name('validasi_register');
// Route::post('/validasi-register', [SesiController::class,'validasiregisterproses'] )->name('validasi_register_proses');
Route::get('/email/verify', function () {
    return view('mail-register');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


});
Route::get('/home',function(){
 return redirect('/tadmin');
});
Route::middleware(['auth'])->group(function(){
// Route::get('/tdosen',[DashboardController::class,'tabeldosen'])->middleware('userAkses:admin');
Route::resource('/dashboard-dosen',DashboardDosenController::class)->middleware('userAkses:admin');
Route::resource('/dashboard-mahasiswa',DashboardMahasiswaController::class)->middleware('userAkses:admin');
Route::resource('/dashboard-admin',DashboardAdminController::class)->middleware('userAkses:admin');
Route::resource('/dashboard-kaprodi',DashboardKaprodiController::class)->middleware('userAkses:admin');
Route::resource('/ruang',RuangController::class)->middleware('userAkses:admin');
Route::resource('/sesi-ta',SesiTaController::class)->middleware('userAkses:admin');
Route::resource('/prodi',ProdiController::class)->middleware('userAkses:admin');
Route::resource('/dashboard-admins',TampilanAdminController::class)->middleware('userAkses:admin');
Route::resource('/jadwal-proposal',JadwalProposalController::class)->middleware('userAkses:admin');
Route::resource('/daftar-sidang-ta',DaftarSidangTaMahasiswaController::class)->middleware('userAkses:admin');
Route::resource('/jadwal-ta-admin',JadwalSidangTaAdminController::class)->middleware('userAkses:admin');
Route::resource('/nilai-keseluruhan-admin',NilaiKeseluruhanAdminController::class)->middleware('userAkses:admin');
Route::resource('/nilai-sidang-ta-mahasiswa-admin',NilaiSidangTaMahasiswaAdminController::class)->middleware('userAkses:admin');
Route::get('/get-pembimbing/{proposal_id}', 'JadwalProposalController@getPembimbing')->middleware('userAkses:admin');
Route::get('dosen/export', [DashboardDosenController::class, 'export'])
    ->name('dosen.export')
    ->middleware('userAkses:admin');
Route::get('kaprodi/export', [DashboardKaprodiController::class, 'export'])
    ->name('kaprodi.export')
    ->middleware('userAkses:admin');
Route::get('mahasiswa/export', [DashboardMahasiswaController::class, 'export'])
    ->name('mahasiswa.export')
    ->middleware('userAkses:admin');
Route::get('admin/export', [DashboardAdminController::class, 'export'])
    ->name('admin.export')
    ->middleware('userAkses:admin');
    Route::get('/nilai-sidang-ta-mahasiswa-admin/{id}/pem1', [NilaiSidangTaMahasiswaAdminController::class, 'pem1'])
    ->name('nilai.pem1')
    ->middleware('userAkses:admin');
    Route::get('/nilai-sidang-ta-mahasiswa-admin/{id}/pem2', [NilaiSidangTaMahasiswaAdminController::class, 'pem2'])
    ->name('nilai.pem2')
    ->middleware('userAkses:admin');
    Route::get('/nilai-sidang-ta-mahasiswa-admin/{id}/ketua', [NilaiSidangTaMahasiswaAdminController::class, 'ketua'])
    ->name('nilai.ketua')
    ->middleware('userAkses:admin');
    Route::get('/nilai-sidang-ta-mahasiswa-admin/{id}/penguji1', [NilaiSidangTaMahasiswaAdminController::class, 'penguji1'])
    ->name('nilai.penguji1')
    ->middleware('userAkses:admin');
    Route::get('/nilai-sidang-ta-mahasiswa-admin/{id}/penguji2', [NilaiSidangTaMahasiswaAdminController::class, 'penguji2'])
    ->name('nilai.penguji2')
    ->middleware('userAkses:admin');
    Route::get('/nilai-sidang-ta-mahasiswa-admin/{id}/penguji3', [NilaiSidangTaMahasiswaAdminController::class, 'penguji3'])
    ->name('nilai.penguji3')
    ->middleware('userAkses:admin');
    Route::get('/nilai-sidang-ta-mahasiswa-admin/{id}/total', [NilaiSidangTaMahasiswaAdminController::class, 'total'])
    ->name('nilai.total')
    ->middleware('userAkses:admin');
    Route::post('/dosen/import', [DashboardDosenController::class, 'import'])
    ->name('dosen.import')
    ->middleware('userAkses:admin');
    Route::post('/admin/import', [DashboardAdminController::class, 'import'])
    ->name('admin.import')
    ->middleware('userAkses:admin');
    Route::post('/mahasiswa/import', [DashboardMahasiswaController::class, 'import'])
    ->name('mahasiswa.import')
    ->middleware('userAkses:admin');
    Route::post('/kaprodi/import', [DashboardKaprodiController::class, 'import'])
    ->name('kaprodi.import')
    ->middleware('userAkses:admin');
    Route::resource('/report-sidang-admins',ReportSidangAdminController::class)->middleware('userAkses:admin');
    Route::get('/report-sidang-admin', [ReportSidangAdminController::class, 'reportsidang'])
    ->name('reportsidang.admin')
    ->middleware('userAkses:admin');
    Route::get('/report-status-admin', [ReportSidangAdminController::class, 'reportstatus'])
    ->name('reportstatus.admin')
    ->middleware('userAkses:admin');

// Route::resource('/dashboard-admin'Das::class)->middleware('userAkses:admin');
Route::get('/tadmin',[DashboardController::class,'tabeladmin'])->middleware('userAkses:admin');
// Route::get('/proses-create-admin',[DashboardController::class,'prosescreateadmin'])->middleware('userAkses:admin');
// Route::get('/create-admin',[DashboardController::class,'createadmin'])->middleware('userAkses:admin');
// Route::get('/tkaprodi',[DashboardController::class,'tabelkaprodi'])->middleware('userAkses:admin');
// Route::get('/tmahasiswa',[DashboardController::class,'tabelmahasiswa'])->middleware('userAkses:admin');
Route::get('/kaprodi',[DashboardController::class,'dashboardkaprodi'])->middleware('userAkses:kaprodi');
Route::resource('/dashboard-kaprodis',TampilanKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/dashboard-dosen-kaprodi',DashboardDosenKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/dashboard-admin-kaprodi',DashboardAdminKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/dashboard-kaprodi-kaprodi',DashboardKaprodiKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/dashboard-mahasiswa-kaprodi',DashboardMahasiswaKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/sesi-ta-kaprodi',SesiTaKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/ruang-kaprodi',RuangKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/prodi-kaprodi',ProdiKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/validasi-proposal-kaprodi',ValidasiProposalKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/jadwal-proposal-kaprodi',JadwalProposalKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/jadwal-ta-kaprodi',JadwalSidangTaKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/validasi-sidang-kaprodi',ValidasiSidangTaKaprodiController::class)->middleware('userAkses:kaprodi');
Route::resource('/nilai-sidang-ta-mahasiswa-prod',NilaiSidangTaMahasiswaKaprodiController::class)->middleware('userAkses:kaprodi');
Route::get('/get-pembimbing/{proposal_id}', 'JadwalProposalController@getPembimbing')->middleware('userAkses:kaprodi');
Route::get('dsn/export', [DashboardDosenKaprodiController::class, 'export'])
    ->name('dsn.export')
    ->middleware('userAkses:kaprodi');
Route::get('prod/export', [DashboardKaprodiKaprodiController::class, 'export'])
    ->name('kaprod.export')
    ->middleware('userAkses:kaprodi');
Route::get('mhs/export', [DashboardMahasiswaKaprodiController::class, 'export'])
    ->name('mhsprod.export')
    ->middleware('userAkses:kaprodi');
Route::get('adm/export', [DashboardAdminKaprodiController::class, 'export'])
    ->name('admprod.export')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-kaprodi/{id}/pem1', [NilaiSidangTaMahasiswaKaprodiController::class, 'pem1'])
    ->name('nilai.pem1.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-kaprodi/{id}/pem2', [NilaiSidangTaMahasiswaKaprodiController::class, 'pem2'])
    ->name('nilai.pem2.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-kaprodi/{id}/ketua', [NilaiSidangTaMahasiswaKaprodiController::class, 'ketua'])
    ->name('nilai.ketua.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-kaprodi/{id}/penguji1', [NilaiSidangTaMahasiswaKaprodiController::class, 'penguji1'])
    ->name('nilai.penguji1.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-kaprodi/{id}/penguji2', [NilaiSidangTaMahasiswaKaprodiController::class, 'penguji2'])
    ->name('nilai.penguji2.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-kaprodi/{id}/penguji3', [NilaiSidangTaMahasiswaKaprodiController::class, 'penguji3'])
    ->name('nilai.penguji3.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-kaprodi/{id}/total', [NilaiSidangTaMahasiswaKaprodiController::class, 'total'])
    ->name('nilai.total.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::post('/dsn/import', [DashboardDosenKaprodiController::class, 'import'])
    ->name('dsn.import')
    ->middleware('userAkses:kaprodi');
    Route::post('/adm/import', [DashboardAdminKaprodiController::class, 'import'])
    ->name('admprod.import')
    ->middleware('userAkses:kaprodi');
    Route::post('/mhs/import', [DashboardMahasiswaKaprodiController::class, 'import'])
    ->name('mhsprod.import')
    ->middleware('userAkses:kaprodi');
    Route::post('/prod/import', [DashboardKaprodiKaprodiController::class, 'import'])
    ->name('kaprod.import')
    ->middleware('userAkses:kaprodi');
    Route::get('/nilai-sidang-ta-mahasiswa-prod/cetak-pdf/{id}', [NilaiSidangTaMahasiswaKaprodiController::class, 'cetakPDF'])
    ->name('nilai.sidang.ta.cetakpdf');
    Route::resource('/report-sidang-kaprodi',ReportSidangKaprodiController::class)->middleware('userAkses:kaprodi');
    Route::get('/report-sidang', [ReportSidangKaprodiController::class, 'reportsidang'])
    ->name('reportsidang.kaprodi')
    ->middleware('userAkses:kaprodi');
    Route::get('/report-status', [ReportSidangKaprodiController::class, 'reportstatus'])
    ->name('reportstatus.kaprodi')
    ->middleware('userAkses:kaprodi');
    


Route::get('/dosen',[DashboardController::class,'dashboarddosen'])->middleware('userAkses:dosen');

Route::resource('/dashboard-dosens',TampilanDosenController::class)->middleware('userAkses:dosen');
Route::resource('/validasi-proposal-dosen',ValidasiProposalDosenController::class)->middleware('userAkses:dosen');
Route::resource('/validasi-proposal-pembimbing2',ValidasiProposalPembimbing2Controller::class)->middleware('userAkses:dosen');
Route::resource('/jadwal-proposal-dosen',JadwalProposalDosenController::class)->middleware('userAkses:dosen');
Route::resource('/jadwal-ta-dosen',JadwalSidangTaDosenController::class)->middleware('userAkses:dosen');
Route::resource('/ketua-sidang-ta',KetuaSidangTaController::class)->middleware('userAkses:dosen');
Route::resource('/sekretaris-sidang-ta',SekretarisSidangTaController::class)->middleware('userAkses:dosen');
Route::resource('/anggota-sidang-ta',AnggotaSidangController::class)->middleware('userAkses:dosen');
Route::resource('/nilai-ketua-sidang-ta',NilaiKetuaSidangController::class)->middleware('userAkses:dosen');
Route::resource('/nilai-pembimbing1-sidang-ta',NilaiPembimbing1Controller::class)->middleware('userAkses:dosen');
Route::resource('/nilai-pembimbing2-sidang-ta',NilaiPembimbing2Controller::class)->middleware('userAkses:dosen');
Route::resource('/nilai-penguji1-sidang-ta',NilaiPenguji1Controller::class)->middleware('userAkses:dosen');
Route::resource('/nilai-penguji2-sidang-ta',NilaiPenguji2Controller::class)->middleware('userAkses:dosen');
Route::resource('/nilai-penguji3-sidang-ta',NilaiPenguji3Controller::class)->middleware('userAkses:dosen');
Route::resource('/penguji-proposal',PengujiSidangController::class)->middleware('userAkses:dosen');


Route::get('/mahasiswa',[DashboardController::class,'dashboardmahasiswa'])->middleware('userAkses:mahasiswa');
Route::resource('/proposal-ta-mahasiswa',ProposalTaMahasiswaController::class)->middleware('userAkses:mahasiswa');
Route::resource('/sidang-ta-mahasiswa',SidangTaMahasiswaController::class)->middleware('userAkses:mahasiswa');
Route::resource('/dashboard-mahasiswas',TampilanMahasiswaController::class)->middleware('userAkses:mahasiswa');
Route::resource('/jadwal-proposal-mahasiswa',JadwalProposalMahasiswaController::class)->middleware('userAkses:mahasiswa');
Route::resource('/jadwal-ta-mahasiswa',JadwalSidangTaMahasiswaController::class)->middleware('userAkses:mahasiswa');
Route::resource('/status-proposal-mahasiswa',StatusProposalMahasiswaController::class)->middleware('userAkses:mahasiswa');
Route::resource('/status-sidang-mahasiswa',StatusSidangTaMahasiswaController::class)->middleware('userAkses:mahasiswa');
Route::resource('/nilai-ta-mahasiswa',NilaiSidangTaMahasiswaController::class)->middleware('userAkses:mahasiswa');

// Route::get('/dashboard',[DashboardController::class,'dashboard']);
Route::get('/logout',[SesiController::class,'logout']);
});
