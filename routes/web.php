<?php
Route::get('/dashboard/ruangan', 'Front\DashboardController@dashboard')->name('dashboard');
Route::middleware("front.auth")->namespace('Front')->prefix('profile')->name('profile.')->group(function() {
    Route::get('/', 'ProfileController@index')->name('index');
    Route::get('/setting', 'ProfileController@setting')->name('setting');
    Route::post('/setting/updateInfo', 'ProfileController@updateInfo')->name('updateInfo');
    Route::post('/setting/updatePass', 'ProfileController@updatePass')->name('updatePass');
});

Route::middleware("front.auth")->namespace('Front')->group(function() {
    Route::get('/', 'FrontController@pageDashboard');
    Route::get('/layout', 'FrontController@layoutDesign')->name('layoutdesign');
 
    //Pemesanan Ruangan

    Route::get('/pemesananruanganhome', 'FrontController@pageHome')->name('pemesananruangan');
    Route::get('/pemesananruangan', 'FrontController@pagePemesananRuangan')->name('pemesananruangan.create');
    Route::post('/pemesananruangan', 'FormRuangController@submit')->name('pemesananruangan.submit');
    Route::get('/listpeminjamanruang', 'FrontController@pageListPeminjamanRuang')->name('list-peminjaman-ruang');
    Route::get('/fetchruangan', 'FrontController@submitRuangan')->name('fetchruangan');

    //Permohonan Konsumsi
    Route::get('/permohonankonsumsi', 'FrontController@pagePermohonanKonsumsi')->name('permohonankonsumsi');
    Route::get('/listpermohonankonsumsi', 'FrontController@pageListPermohonanKonsumsi')->name('list-permohonan-konsumsi');
    Route::post('/permohonankonsumsi', 'FormKonsumsiController@submit')->name('permohonankonsumsi.submit');
    Route::get('/fetchkonsumsi', 'FrontController@submitKonsumsi')->name('fetchkonsumsi');
    
    //Permohonan ATK
    Route::get('/permohonanatk', 'FrontController@pagePermohonanAtk')->name('permohonanatk');
    Route::post('/permohonanatk', 'FormPermohonanAtkController@submit')->name('permohonanatk.submit');
    Route::get('/listpermohonanatk', 'FrontController@pageListPermohonanAtk')->name('list-permohonan-atk');

    // Permohonan Kendaraan
    Route::get('/permohonankendaraan', 'FrontController@pagePermohonanKendaraan')->name('permohonankendaraan');
    Route::get('/getdriver/{tanggal}/{awal}/{akhir}', 'FrontController@getDriver')->name('getDriver');
    Route::post('/permohonankendaraan', 'FormPermohonanKendaraanController@submit')->name('permohonankendaraan.submit');
    Route::get('/listpermohonankendaraan', 'FrontController@pageListPermohonanKendaraan')->name('list-permohonan-kendaraan');
    Route::get('/listsuratperintahjalan', 'FrontController@pageListSuratPerintahJalan')->name('list-surat-perintah-jalan');
    Route::get('/permohonankendaraan/edit/{id}', 'FrontController@pageEditPermohonanKendaraan')->name('permohonankendaraan.edit');
    Route::post('/permohonankendaraan/edit/{id}', 'FormPermohonanKendaraanController@update')->name('permohonankendaraan.update');
    Route::get('/permohonankendaraan/delete/{id}', 'FormPermohonanKendaraanController@destroy')->name('permohonankendaraan.destroy');

    //Surat Perintah Jalan
    // Route::get('/suratperintahjalan', 'FrontController@pageSuratPerintahJalan')->name('suratperintahjalan');
    // Route::post('/suratperintahjalan', 'FormSuratPerintahJalanController@submit')->name('suratperintahjalan.submit');
    
    // Route::get('/approveManagerKonsumsi/{id}', 'FrontController@approveManagerKonsumsi')->name('approve-manager-konsumsi');
    Route::get('/approveManagerKonsumsi/{id}', 'FrontController@approveManagerKonsumsi')->name('approve-manager-konsumsi');
    Route::get('/rejectManagerKonsumsi/{id}', 'FrontController@rejectManagerKonsumsi')->name('reject-manager-konsumsi');
    Route::get('/approveSupervisorKonsumsi/{id}', 'FrontController@approveSupervisorKonsumsi')->name('approve-supervisor-konsumsi');
    Route::get('/rejectSupervisorKonsumsi/{id}', 'FrontController@rejectSupervisorKonsumsi')->name('reject-supervisor-konsumsi');
    Route::get('/deletelistKonsumsi/{id}', 'FrontController@deletelistKonsumsi')->name('delete-list-konsumsi');
    
    Route::get('/approveManagerRuang/{id}', 'FrontController@approveManagerRuang')->name('approve-manager-ruang');
    Route::post('/rejectManagerRuang', 'FrontController@rejectManagerRuang')->name('reject-ruang');
    Route::get('/approveSupervisorRuang/{id}', 'FrontController@approveSupervisorRuang')->name('approve-supervisor-ruang');
    Route::get('/rejectSupervisorRuang/{id}', 'FrontController@rejectSupervisorRuang')->name('reject-supervisor-ruang');
    Route::get('/deletelistRuang/{id}', 'FrontController@deletelistRuang')->name('delete-list-ruang');

    Route::get('/approveManagerAtk/{id}', 'FrontController@approveManagerAtk')->name('approve-manager-atk');
    Route::get('/deletelistAtk/{id}', 'FrontController@deletelistAtk')->name('delete-list-atk');
    Route::get('/approveManagerKendaraan/{id}', 'FrontController@approveManagerKendaraan')->name('approve-manager-kendaraan');
    Route::get('/deletelistKendaraan/{id}', 'FrontController@deletelistKendaraan')->name('delete-list-kendaraan');
    Route::get('/approveManagerSuratPerintahJalan/{id}', 'FrontController@approveManagerSuratPerintahJalan')->name('approve-manager-surat-perintah-jalan');
    Route::get('/approvePenanggungJawabPool/{id}', 'FrontController@approvePenanggungJawabPool')->name('approve-penanggung-jawab-pool');
    Route::get('/deletelistSuratPerintahJalan/{id}', 'FrontController@deletelistSuratPerintahJalan')->name('delete-list-surat-perintah-jalan');
    Route::get('logout', 'LoginController@logout')->name('logout');
});

Route::namespace('Front')->group(function() {
    Route::get('/login', 'FrontController@pageLogin')->name('front::login');
    Route::post('/login', 'LoginController@login')->name('login.login');
});

/**
 * Generated by LaraSpell
 * 
 * @author Ditama Digital<info@ditamadigtal.co.id>
 * @added  2018-02-05 17:22
 */
Route::name('admin::auth.')->prefix('admin/auth')->namespace('Admin')->group(function() {
    Route::get('login', 'AuthController@showLoginForm')->name('form-login');
    Route::post('login', 'AuthController@login')->name('login');
    Route::get('logout', 'AuthController@logout')->name('logout');
});

Route::get('admin', 'Admin\DashboardController@pageDashboard')->name('admin::dashboard')->middleware('auth');
// Route::get('/admin', function () {
//     return redirect('admin/permohonan-konsumsi');
// })->name('admin::dashboard')->middleware('auth');

Route::name('admin::test.')->prefix('admin/test')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'TestController@pageList')->name('page-list');
    Route::get('create', 'TestController@formCreate')->name('form-create');
    Route::post('create', 'TestController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'TestController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'TestController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'TestController@delete')->name('delete');
    Route::get('view/{id}', 'TestController@pageDetail')->name('page-detail');
});

/**
 * Generated by LaraSpell
 * 
 * @author Ditama Digital<info@ditamadigtal.co.id>
 * @added  2018-06-06 09:10
 */
Route::name('admin::permohonan-konsumsi.')->prefix('admin/permohonan-konsumsi')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'PermohonanKonsumsiController@pageList')->name('page-list');
    Route::get('create', 'PermohonanKonsumsiController@formCreate')->name('form-create');
    Route::post('create', 'PermohonanKonsumsiController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'PermohonanKonsumsiController@formEdit')->name('form-edit');
    Route::get('detail/{id}', 'PermohonanKonsumsiController@pageDetail')->name('detail');
    Route::post('edit/{id}', 'PermohonanKonsumsiController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'PermohonanKonsumsiController@delete')->name('delete');
    Route::get('deletelist/{id}', 'PermohonanKonsumsiController@deletelist')->name('deletelist');
    Route::get('view/{id}', 'PermohonanKonsumsiController@pageDetail')->name('page-detail');
    Route::get('approve/{id}', 'PermohonanKonsumsiController@approve')->name('approve');
    Route::get('terlaksana/{id}', 'PermohonanKonsumsiController@terlaksana')->name('terlaksana');
    Route::get('reject', 'PermohonanKonsumsiController@reject')->name('reject');
    Route::get('approve-supervisor/{id}', 'PermohonanKonsumsiController@approveSupervisor')->name('approve-supervisor');
    Route::get('approve-manager/{id}', 'PermohonanKonsumsiController@approveManager')->name('approve-manager');
    Route::get('approve-manager-list/{id}', 'PermohonanKonsumsiController@approveManagerList')->name('approve-manager-list');
    Route::get('approve-supervisor-list/{id}', 'PermohonanKonsumsiController@approveSupervisorList')->name('approve-supervisor-list');

});

Route::name('admin::sumber-dana.')->prefix('admin/sumber-dana')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'SumberDanaController@pageList')->name('page-list');
    Route::get('create', 'SumberDanaController@formCreate')->name('form-create');
    Route::post('create', 'SumberDanaController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'SumberDanaController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'SumberDanaController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'SumberDanaController@delete')->name('delete');
    Route::get('view/{id}', 'SumberDanaController@pageDetail')->name('page-detail');
});

Route::name('admin::anggaran-sumber-dana.')->prefix('admin/anggaran-sumber-dana')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'AnggaranSumberDanaController@pageList')->name('page-list');
    Route::get('create', 'AnggaranSumberDanaController@formCreate')->name('form-create');
    Route::post('create', 'AnggaranSumberDanaController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'AnggaranSumberDanaController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'AnggaranSumberDanaController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'AnggaranSumberDanaController@delete')->name('delete');
    Route::get('view/{id}', 'AnggaranSumberDanaController@pageDetail')->name('page-detail');
});

Route::name('admin::ruang.')->prefix('admin/ruang')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'RuangController@pageList')->name('page-list');
    Route::get('create', 'RuangController@formCreate')->name('form-create');
    Route::post('create', 'RuangController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'RuangController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'RuangController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'RuangController@delete')->name('delete');
    Route::get('view/{id}', 'RuangController@pageDetail')->name('page-detail');
    
});

Route::name('admin::layout-ruang.')->prefix('admin/layout-ruang')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'LayoutRuangController@pageList')->name('page-list');
    Route::get('create', 'LayoutRuangController@formCreate')->name('form-create');
    Route::post('create', 'LayoutRuangController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'LayoutRuangController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'LayoutRuangController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'LayoutRuangController@delete')->name('delete');
    Route::get('view/{id}', 'LayoutRuangController@pageDetail')->name('page-detail');
    
});
Route::name('admin::kendaraan.')->prefix('admin/kendaraan')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'KendaraanController@pageList')->name('page-list');
    Route::get('create', 'KendaraanController@formCreate')->name('form-create');
    Route::post('create', 'KendaraanController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'KendaraanController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'KendaraanController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'KendaraanController@delete')->name('delete');
    Route::get('view/{id}', 'KendaraanController@pageDetail')->name('page-detail');
    
});
Route::name('admin::driver.')->prefix('admin/driver')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'DriverController@pageList')->name('page-list');
    Route::get('create', 'DriverController@formCreate')->name('form-create');
    Route::post('create', 'DriverController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'DriverController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'DriverController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'DriverController@delete')->name('delete');
    Route::get('view/{id}', 'DriverController@pageDetail')->name('page-detail');
    
});

Route::name('admin::pemesanan-ruangan.')->prefix('admin/pemesanan-ruangan')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'PemesananRuanganController@pageList')->name('page-list');
    Route::get('create', 'PemesananRuanganController@formCreate')->name('form-create');
    Route::post('create', 'PemesananRuanganController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'PemesananRuanganController@formEdit')->name('form-edit');
    Route::get('detail/{id}', 'PemesananRuanganController@pageDetail')->name('detail');
    Route::post('edit/{id}', 'PemesananRuanganController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'PemesananRuanganController@delete')->name('delete');
    Route::get('deletelist/{id}', 'PemesananRuanganController@deletelist')->name('deletelist');
    Route::get('view/{id}', 'PemesananRuanganController@pageDetail')->name('page-detail');
    Route::get('approve/{id}', 'PemesananRuanganController@approve')->name('approve');
    Route::get('reject', 'PemesananRuanganController@reject')->name('reject');
    Route::get('terlaksana/{id}', 'PemesananRuanganController@terlaksana')->name('terlaksana');
});

Route::name('admin::karyawan.')->prefix('admin/karyawan')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'KaryawanController@pageList')->name('page-list');
    Route::get('create', 'KaryawanController@formCreate')->name('form-create');
    Route::post('create', 'KaryawanController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'KaryawanController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'KaryawanController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'KaryawanController@delete')->name('delete');
    Route::get('view/{id}', 'KaryawanController@pageDetail')->name('page-detail');
});

/**
 * Generated by LaraSpell
 * 
 * @author Ditama Digital<info@ditamadigtal.co.id>
 * @added  2018-07-19 11:01
 */
Route::name('admin::surat-perintah-jalan.')->prefix('admin/surat-perintah-jalan')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'SuratPerintahJalanController@pageList')->name('page-list');
    Route::get('create', 'SuratPerintahJalanController@formCreate')->name('form-create');
    Route::post('create', 'SuratPerintahJalanController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'SuratPerintahJalanController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'SuratPerintahJalanController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'SuratPerintahJalanController@delete')->name('delete');
    Route::get('view/{id}', 'SuratPerintahJalanController@pageDetail')->name('page-detail');
    Route::get('getPDF/{id}', 'SuratPerintahJalanController@exportPDF')->name('page-pdf');
    Route::get('sendEmail/{id}', 'SuratPerintahJalanController@sendEmail')->name('send-email');
    Route::get('sampai/{id}', 'SuratPerintahJalanController@sampai')->name('sampai');
});

Route::name('admin::permohonan-pemakaian-kendaraan.')->prefix('admin/permohonan-pemakaian-kendaraan')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'PermohonanPemakaianKendaraanController@pageList')->name('page-list');
    Route::get('create', 'PermohonanPemakaianKendaraanController@formCreate')->name('form-create');
    Route::post('create', 'PermohonanPemakaianKendaraanController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'PermohonanPemakaianKendaraanController@formEdit')->name('form-edit');
    Route::get('detail/{id}', 'PermohonanPemakaianKendaraanController@pageDetail')->name('detail');
    Route::post('edit/{id}', 'PermohonanPemakaianKendaraanController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'PermohonanPemakaianKendaraanController@delete')->name('delete');
    Route::get('view/{id}', 'PermohonanPemakaianKendaraanController@pageDetail')->name('page-detail');
    Route::get('approve/{id}', 'PermohonanPemakaianKendaraanController@approve')->name('approve');
    Route::get('reject', 'PermohonanPemakaianKendaraanController@reject')->name('reject');
});

Route::name('admin::permohonan-atk.')->prefix('admin/permohonan-atk')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'PermohonanAtkController@pageList')->name('page-list');
    Route::get('create', 'PermohonanAtkController@formCreate')->name('form-create');
    Route::post('create', 'PermohonanAtkController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'PermohonanAtkController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'PermohonanAtkController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'PermohonanAtkController@delete')->name('delete');
    Route::get('view/{id}', 'PermohonanAtkController@pageDetail')->name('page-detail');
});

Route::name('admin::barang.')->prefix('admin/barang')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'BarangController@pageList')->name('page-list');
    Route::get('create', 'BarangController@formCreate')->name('form-create');
    Route::post('create', 'BarangController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'BarangController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'BarangController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'BarangController@delete')->name('delete');
    Route::get('view/{id}', 'BarangController@pageDetail')->name('page-detail');
});

Route::name('admin::kategori-barang.')->prefix('admin/kategori-barang')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'KategoriBarangController@pageList')->name('page-list');
    Route::get('create', 'KategoriBarangController@formCreate')->name('form-create');
    Route::post('create', 'KategoriBarangController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'KategoriBarangController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'KategoriBarangController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'KategoriBarangController@delete')->name('delete');
    Route::get('view/{id}', 'KategoriBarangController@pageDetail')->name('page-detail');
});

Route::name('admin::child-ruang.')->prefix('admin/child-ruang')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'ChildRuangController@pageList')->name('page-list');
    Route::get('create', 'ChildRuangController@formCreate')->name('form-create');
    Route::post('create', 'ChildRuangController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'ChildRuangController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'ChildRuangController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'ChildRuangController@delete')->name('delete');
    Route::get('view/{id}', 'ChildRuangController@pageDetail')->name('page-detail');
});

/**
 * Generated by LaraSpell
 * 
 * @author Ditama Digital<info@ditamadigtal.co.id>
 * @added  2019-02-21 11:28
 */
Route::name('admin::setting.')->prefix('admin/setting')->middleware('auth')->namespace('Admin')->group(function() {
    Route::get('/', 'SettingController@pageList')->name('page-list');
    Route::get('create', 'SettingController@formCreate')->name('form-create');
    Route::post('create', 'SettingController@postCreate')->name('post-create');
    Route::get('edit/{id}', 'SettingController@formEdit')->name('form-edit');
    Route::post('edit/{id}', 'SettingController@postEdit')->name('post-edit');
    Route::get('delete/{id}', 'SettingController@delete')->name('delete');
    Route::get('view/{id}', 'SettingController@pageDetail')->name('page-detail');
});

// API
Route::get('api/permohonankonsumsi', 'Admin\PermohonanKonsumsiController@getJson');
Route::get('api/biayapermeter', 'Admin\SuratPerintahJalanController@getBiayaPerMeter');
Route::get('api/getdetailkendaraan/{id}', 'Admin\SuratPerintahJalanController@kendaraanDetail');
Route::get('api/getdatapermohonan/{id}', 'Admin\SuratPerintahJalanController@getDataPermohonan');
Route::get('api/permohonankendaraan', 'Admin\SuratPerintahJalanController@getPermohonanKendaraan');