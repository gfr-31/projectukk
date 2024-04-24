<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSiswaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KirimTagihanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfilleSiswaController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TagihanSiswaController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\TarifPembayaranController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/404', function() {
//     return view('404');
// });
// Route::get('/coba', function() {
//     return view('admin.layout.tagihan');
// });

Route::prefix('/')->group(function () {
    //Index
    Route::get('/', [Controller::class, 'index']);

    //Admin
    Route::get('login_admin', [AdminController::class, 'login']);
    Route::post('masuk', [AdminController::class, 'authenticat']);
    Route::get('logout', [AdminController::class, 'logout']);

    //Siswa
    Route::get('/login_siswa', [AdminSiswaController::class, 'login_pemsis']);
    Route::post('/siswa_masuk', [AdminSiswaController::class, 'authenticat']);
    Route::get('/logout_siswa', [AdminSiswaController::class, 'logout']);
});

Route::get('cetak-tagihan/{id}', [PembayaranController::class, 'tagihan']);
Route::get('bukti-pembayaran/{tipe}/{nama_pembayaran}/{id}', [PembayaranController::class, 'bukti']);

Route::prefix('admin')->middleware('isLogin')->group(function () {
    //Pembayaran
    Route::get('pembayaran', [PembayaranController::class, 'transaksi']);
    Route::get('pembayaran-', [PembayaranController::class, 'cariSiswa']);
    Route::post('simpan-pembayaran/{tipe}', [PembayaranController::class, 'simpanPembayaran']);
    Route::get('bukti-pembayaran{tipe}/hapus/{kode_transaksi}', [PembayaranController::class, 'hapus_bukti']);
    Route::get('kirim-tagihan-wa/{tipe}-{nama_pembayaran}/{id}', [PembayaranController::class, 'kirim_wa']);
    Route::get('kirim-semua-tagihan-wa/{id}', [PembayaranController::class, 'kirim_semua_wa']);

    //Kirim Tagihan WA
    Route::get('kirim-tagihan', [KirimTagihanController::class, 'kirimTagihan']);
    Route::get('kirim-tagihan/{tipe}/{nama_pembayaran}', [KirimTagihanController::class, 'kirimNotif']);

    //Data Pos Keuangan
    Route::get('pos-keuangan', [KeuanganController::class, 'posKeuangan']);
    Route::post('tambah/pos-keuangan', [KeuanganController::class, 'tambahPosKeuangan']);
    Route::post('update/pos-keuangan', [KeuanganController::class, 'updatePosKeuangan']);
    Route::get('pos-keuangan/hapus/{id}', [KeuanganController::class, 'hapusPosKeuangan']);

    //Data Jenis Pembayaran
    Route::get('jenis-pembayaran', [KeuanganController::class, 'JenisPembayaran']);
    Route::get('tambah-jenis-pembayaran', [KeuanganController::class, 'tambahJenisPembayaran']);
    Route::post('tambah/jenis-pembayaran', [KeuanganController::class, 'insertJenisPembayaran']);
    Route::get('jenis-pembayaran/hapus{id}', [KeuanganController::class, 'deleteJenisPembayaran']);

    // Tarif Pembayaran
    Route::get('tarif-pembayaran/{tahun_ajaran}/{tipe}/id={id}/{nama_pembayaran}', [TarifPembayaranController::class, 'tarifPembayaran']);
    Route::get('tambah/tarif-pembayaran/{tahun_ajaran}/{tipe}/id={id}', [TarifPembayaranController::class, 'ttp']);
    Route::get('tambah/tarif-pembayaran/siswa/{tahun_ajaran}/{tipe}/{nama_pembayaran}/', [TarifPembayaranController::class, 'ttp_siswa']);

    Route::post('tambah/tarif-pembayaran/bulanan', [TarifPembayaranController::class, 'insert_ttp_bulanan']);
    Route::post('tambah/tarif-pembayaran/bulanan/siswa', [TarifPembayaranController::class, 'insert_ttp_bulanan_siswa']);
    Route::post('tambah/tarif-pembayaran/bebas/siswa', [TarifPembayaranController::class, 'insert_ttp_bebas_siswa']);
    Route::get('edit/tarif-pembayaran/{tipe}/{id}', [TarifPembayaranController::class, 'edit_tpb']);
    Route::get('edit/tarif-pembayaran/kelas/{tahun_ajaran}/{tipe}/{nama_pembayaran}', [TarifPembayaranController::class, 'edit_tpb_kelas']);
    Route::post('update/tarif-pembayaran/Bulanan', [TarifPembayaranController::class, 'update_tpb']);
    Route::post('update/tarif-pembayaran/kelas/{tipe}', [TarifPembayaranController::class, 'update_tpb_kelas']);
    Route::get('tarif-pembayaran-bulanan/{tahun_ajaran_id}/hapus{id}', [TarifPembayaranController::class, 'hapus_tpBulanan']);

    Route::post('tambah/tarif-pembayaran/bebas', [TarifPembayaranController::class, 'insert_ttp_bebas']);
    Route::post('update/tarif-pembayaran/Bebas', [TarifPembayaranController::class, 'update_tpb']);
    Route::get('tarif-pembayaran-bebas/{tahun_ajaran}/hapus{id}', [TarifPembayaranController::class, 'hapus_tpBebas']);

    //Tahun Ajaran
    Route::get('tahun-ajaran', [TahunAjaranController::class, 'tahun_ajaran']);
    Route::get('tambah/tahun-ajaran', [TahunAjaranController::class, 'tambah_tahun_ajaran']);
    Route::post('tambah/tahun-ajaran', [TahunAjaranController::class, 'insert_tahun_ajaran']);
    Route::get('tahun-ajaran/hapus{id}', [TahunAjaranController::class, 'hapus_tahun_ajaran']);
    Route::get('edit/tahun-ajaran{id}', [TahunAjaranController::class, 'editTh']);
    Route::post('update/tahun-ajaran', [TahunAjaranController::class, 'updateTh']);

    // Kelas
    Route::get('kelas', [KelasController::class, 'kelas']);
    Route::post('tambah/kelas', [KelasController::class, 'tambah_kelas']);
    Route::get('kelas/hapus{id}', [KelasController::class, 'hapus_kelas']);
    Route::get('edit/kelas{id}', [KelasController::class, 'editKelas']);
    Route::post('update/kelas', [KelasController::class, 'updateKelas']);

    // Siswa
    Route::get('siswa', [SiswaController::class, 'siswa']);
    Route::get('tambah/siswa', [SiswaController::class, 'tambahSiswa']);
    Route::post('insert/siswa', [SiswaController::class, 'insert_siswa']);
    Route::get('edit/siswa{id}', [SiswaController::class, 'editSiswa']);
    Route::get('siswa/hapus{id}', [SiswaController::class, 'hapus_siswa']);
    Route::post('update/siswa', [SiswaController::class, 'updateSiswa']);

    // Data Informasi
    Route::get('data', [DataController::class, 'dataInformasi']);
    Route::get('data/tambah_data', [DataController::class, 'tambahInformasi']);
    Route::post('insert/data', [DataController::class, 'insert_data']);
    Route::get('edit/informasi{id}', [DataController::class, 'edit_informasi']);
    Route::get('data/hapus{id}', [DataController::class, 'hapus_data']);
    Route::post('update/data', [DataController::class, 'update_data']);
    Route::post('NotifWa', [DataController::class, 'NotifWa']);

    //Setting Aplikasi
    Route::get('developers', [SettingController::class, 'developers']);
    Route::prefix('list-user')->group(function (){
        Route::get('/', [SettingController::class, 'user_admin']);
        Route::post('tambah-user', [SettingController::class, 'insert']);
        Route::get('hapus-user/{id}', [SettingController::class, 'delete']);
        Route::post('edit-user/{id}', [SettingController::class, 'update']);
    });
    
});

// =============================================================================================================================================

Route::prefix('siswa')->middleware('isLoginSiswa')->group(function () {
    //Dashboard siswa
    Route::get('dashboard', [AdminSiswaController::class, 'dashboard']);

    //Profille Siswa
    Route::get('profille/{id}', [ProfilleSiswaController::class, 'Profille']);

    Route::get('tagihan/{id}', [TagihanSiswaController::class, 'tagihan']);

    //Setting Aplikasi Siswa
    Route::get('developers', [SettingController::class, 'developers_siswa']);

});



