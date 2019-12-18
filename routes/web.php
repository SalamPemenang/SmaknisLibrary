<?php

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

Route::get('/', function () {
    return view('welcome');
});


//Auth
Route::get('/Masuk', 'Auth\LoginController@ShowMasukForm')->name('Masuk');
Route::post('/Daftar-Akun', 'Auth\RegisterController@Register')->name('post-daftar');
Route::post('/Masuk-Akun', 'Auth\LoginController@Login')->name('post-masuk');
Route::get('/Keluar', 'Auth\LoginController@Keluar')->name('Keluar');

Route::get('/jurusan', 'Auth\LoginController@getJurusan')->name('Jurusan');

//Email
Route::get('/email', function () {
    return view('layouts.email.send_email');
});
Route::post('/sendEmail', 'Auth\EmailController@sendEmail');

//lupa sandi
Route::get('/lupa-sandi', 'Auth\ForgotPasswordController@showForm')->name('konfirmasi_kode_lupasandi');
Route::post('/lupa-sandi/kirim-kode', 'Auth\ForgotPasswordController@sandibaru')->name('sandibaru');

//verifikasi
Route::get('/verifikasi', 'Auth\VerificationController@showverifikasi')->name('verifikasi');
Route::post('/verifikasi/kirim-kode', 'Auth\VerificationController@kirimverifikasi')->name('kirim-kode-verifi');
Route::get('/verifikasi/konfirmasi', 'Auth\VerificationController@konfirmasishowverifikasi')->name('konfirmasi-show-kode-verifi');
Route::post('/verifikasi/konfirmasi-kode', 'Auth\VerificationController@konfirmasiverifikasi')->name('konfirmasi-kode-verifi');

//Pengguna
Route::prefix('pengguna')->group(function(){ 
    Route::get('/dasbor', 'pengguna\PenggunaController@dasbor')->name('dasbor-pengguna');
    Route::get('/resume', 'pengguna\ResumeController@index')->name('pengguna.resume');
    Route::get('/resume/tambah', 'pengguna\ResumeController@tambah')->name('resume.tambah');
    Route::post('/resume/tambah/proses', 'pengguna\ResumeController@tbhproses')->name('resume.tambah.proses');
    Route::get('/resume/edit', 'pengguna\ResumeController@edit')->name('resume.edit');
});
Route::prefix('operator')->group(function(){ 
    Route::get('/dasbor', 'Operator\AnggotaController@dasbor')->name('dasbor-operator');
});
Route::prefix('admin')->group(function(){ 
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/dasbor', 'Admin\AdminController@dasbor')->name('dasbor-admin');

});

// Operator Sirkulasi
Route::prefix('sirkulasi')->group(function(){
    // Peminjaman
	Route::get('/peminjaman', 'Operator\DataSirkulasi\SirkulasiController@peminjaman')->name('operator.sirkulasi.peminjaman');
	Route::get('/perpanjangan/{id}', 'Operator\DataSirkulasi\SirkulasiController@perpanjangan')->name('operator.sirkulasi.perpanjangan');
	Route::post('/perpanjangan/update/{id}', 'Operator\DataSirkulasi\SirkulasiController@perpanjanganProses')->name('operator.sirkulasi.perpanjangan.proses');
    Route::post('/peminjaman/proses', 'Operator\DataSirkulasi\SirkulasiController@peminjamanProses')->name('operator.sirkulasi.peminjaman.proses');
	// Search Ajax
	Route::get('/search/anggota', 'Operator\DataSirkulasi\SirkulasiController@searchAnggota')->name('operator.sirkulasi.search.anggota');
    Route::get('/search/biblio/back','Operator\DataSirkulasi\SirkulasiController@searchBiblioBack')->name('operator.sirkulasi.search.biblio.back');
	Route::get('/search/biblio','Operator\DataSirkulasi\SirkulasiController@searchBiblio')->name('operator.sirkulasi.searchbiblio');
	// Route::get('/search/peminjaman','Operator\DataSirkulasi\SirkulasiController@searchPeminjaman')->name('operator.sirkulasi.searchpeminjaman');
    // Pengembalian
    Route::get('/pengembalian', 'Operator\DataSirkulasi\SirkulasiController@pengembalian')->name('operator.sirkulasi.pengembalian');
    Route::get('/search/biblio/back','Operator\DataSirkulasi\SirkulasiController@searchBiblioBack')->name('operator.sirkulasi.searchbiblio.kembali');
    Route::post('/pengembalian/proses', 'Operator\DataSirkulasi\SirkulasiController@pengembalianProses')->name('operator.sirkulasi.pengembalian.proses');
	// Riwayat
	Route::get('/lihat/riwayat/peminjaman', 'Operator\DataSirkulasi\SirkulasiController@lihatPeminjaman')->name('operator.lihat.peminjaman');
	Route::get('/riwayat/peminjaman', 'Operator\DataSirkulasi\SirkulasiController@riwayatPeminjaman')->name('operator.sirkulasi.riwayat.peminjaman');
	Route::get('/lihat/riwayat/pengembalian', 'Operator\DataSirkulasi\SirkulasiController@lihatPengembalian')->name('operator.lihat.pengembalian');
    Route::get('/riwayat/pengembalian', 'Operator\DataSirkulasi\SirkulasiController@riwayatPengembalian')->name('operator.sirkulasi.riwayat.pengembalian');
});

// Operator Konfirmasi
Route::prefix('konfirmasi')->group(function(){
	Route::get('/', 'Operator\DataSirkulasi\SirkulasiController@konfirmasi')->name('operator.lihat.konfirmasi');
	Route::get('/datatable', 'Operator\DataSirkulasi\SirkulasiController@konfirmasiDatatable')->name('operator.konfirmasi');
	Route::get('/edit/{id}', 'Operator\DataSirkulasi\SirkulasiController@konfirmasiGet')->name('operator.konfirmasi.edit');
	Route::post('/update/{id}', 'Operator\DataSirkulasi\SirkulasiController@konfirmasiProses')->name('operator.konfirmasi.proses');
	Route::get('/riwayat', 'Operator\DataSirkulasi\SirkulasiController@lihatKonfirmasi')->name('operator.riwayat.konfirmasi');
	Route::get('/riwayat/datatable', 'Operator\DataSirkulasi\SirkulasiController@riwayatKonfirmasi')->name('operator.lihat.riwayat.konfirmasi.datatable');
});

// Halaman Operator

	// Operator : Anggota
	Route::prefix('anggota')->group( function() {
		Route::get('/', 'Operator\DataMaster\AnggotaController@daftarAnggota')->name('operator.anggota');
		// DataTable-Anggota
		Route::get('/datatable', 'Operator\DataMaster\AnggotaController@anggotaDatatable')->name('operator.anggota.datatables');
		// Tambah-Anggota
		Route::get('/tambah-anggota', 'Operator\DataMaster\AnggotaController@anggotaTambah')->name('operator.anggota.tambah');
		Route::get('/tambah-anggota/store', 'Operator\DataMaster\AnggotaController@anggotaStore')->name('operator.anggota.store');
		// Ubah-Anggota
		Route::get('/ubah-anggota', 'Operator\DataMaster\AnggotaController@anggotaUbah')->name('operator.anggota.ubah');
	});

	// Operator : Data Pendukung
	Route::prefix('datapendukung')->group(function() {
		// DataPendukung-Anggota
		Route::get('/anggota', 'Operator\DataPendukung\AnggotaPendukungController@anggotaPendukung')->name('anggota.pendukung');
		// DataTable-Pendukung Anggota
		Route::get('/datatable/tipe-anggota', 'Operator\DataPendukung\AnggotaPendukungController@tipeAnggotaDatatable')->name('operator.pendukung.datatable.tipeAnggota'); 
		Route::get('/datatable/jurusan', 'Operator\DataPendukung\AnggotaPendukungController@jurusanDatatable')->name('operator.pendukung.datatable.jurusan'); 
		Route::get('/datatable/kelas', 'Operator\DataPendukung\AnggotaPendukungController@kelasDatatable')->name('operator.pendukung.datatable.kelas'); 
		// Tambah DataPendukung
		Route::get('/tambah/data-pendukung', 'Operator\DataPendukung\AnggotaPendukungController@tambahDatapendukung')->name('operator.tambah.DataPendukung');
		// Store DataPendukung
		Route::post('/store/data-pendukung/anggota-tipe', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungTipe')->name('operator.store.DataPendukung.tipe');
		Route::post('/store/data-pendukung/jurusan', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungJurusan')->name('operator.store.DataPendukung.jurusan');
		Route::post('/store/data-pendukung/kelas', 'Operator\DataPendukung\AnggotaPendukungController@storeDatapendukungKelas')->name('operator.store.DataPendukung.kelas');

		//Biblio
			Route::get('/', 'Operator\DataPendukung\BiblioPendukungController@index')->name('operator.pendukung.biblio');
			//Datatables
			Route::get('/datatable/penulis', 'Operator\DataPendukung\BiblioPendukungController@penulisdatatable')->name('operator.pendukung.datatable.penulis');
			Route::get('/datatable/penerbit', 'Operator\DataPendukung\BiblioPendukungController@penerbitdatatable')->name('operator.pendukung.datatable.penerbit');
			Route::get('/datatable/statusitem', 'Operator\DataPendukung\BiblioPendukungController@statusitemdatatable')->name('operator.pendukung.datatable.statusitem');
			Route::get('/datatable/sumberitem', 'Operator\DataPendukung\BiblioPendukungController@sumberitemdatatable')->name('operator.pendukung.datatable.sumberitem');
			Route::get('/datatable/tipekoleksi', 'Operator\DataPendukung\BiblioPendukungController@tipekoleksidatatable')->name('operator.pendukung.datatable.tipekoleksi');
			Route::get('/datatable/klasifikasi', 'Operator\DataPendukung\BiblioPendukungController@klasifikasidatatable')->name('operator.pendukung.datatable.klasifikasi');
			Route::get('/datatable/statussirkulasi', 'Operator\DataPendukung\BiblioPendukungController@statussirkulasidatatable')->name('operator.pendukung.datatable.statussirkulasi');
			//Tambah Data
			Route::get('/biblio/tambah', 'Operator\DataPendukung\BiblioPendukungController@create')->name('operator.pendukung.biblio.tambah');
			//Proses Data
			Route::post('/biblio/penulis/proses', 'Operator\DataPendukung\BiblioPendukungController@storePenulis')->name('operator.pendukung.biblio.penulis.proses');
			Route::post('/biblio/penerbit/proses', 'Operator\DataPendukung\BiblioPendukungController@storePenerbit')->name('operator.pendukung.biblio.penerbit.proses');
			Route::post('biblio/klasifikasi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.proses');
			Route::post('/biblio/tipekoleksi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeTipekoleksi')->name('operator.pendukung.biblio.tipekoleksi.proses');
			Route::post('/biblio/statusitem/proses', 'Operator\DataPendukung\BiblioPendukungController@storeStatusitem')->name('operator.pendukung.biblio.statusitem.proses');
			Route::post('/biblio/sumberitem/proses', 'Operator\DataPendukung\BiblioPendukungController@storeSumberitem')->name('operator.pendukung.biblio.sumberitem.proses');
			Route::post('/biblio/statussirkulasi/proses', 'Operator\DataPendukung\BiblioPendukungController@storeStatusSirkulasi')->name('operator.pendukung.biblio.statussirkulasi.proses');
			//ubah data
			Route::get('/biblio/penulis/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editPenulis')->name('operator.pendukung.biblio.penulis.edit');
			Route::get('/biblio/penerbit/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editPenerbit')->name('operator.pendukung.biblio.penerbit.edit');
			Route::get('/biblio/klasifikasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.edit');
			Route::get('/biblio/klasifikasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editKlasifikasi')->name('operator.pendukung.biblio.klasifikasi.edit');
			Route::get('/biblio/tipekoleksi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editTipekoleksi')->name('operator.pendukung.biblio.tipekoleksi.edit');
			Route::get('/biblio/sumberitem/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editSumberitem')->name('operator.pendukung.biblio.sumberitem.edit');
			Route::get('/biblio/statusitem/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editStatusitem')->name('operator.pendukung.biblio.statusitem.edit');
			Route::get('/biblio/statussirkulasi/ubah/{id}', 'Operator\DataPendukung\BiblioPendukungController@editStatussirkulasi')->name('operator.pendukung.biblio.statussirkulasi.edit');
			// Riwayat Data Pendukung
			Route::get('biblio/riwayat', 'Operator\DataPendukung\BiblioPendukungController@riwayat')->name('operator.pendukung.biblio.riwayat');
				//Datatables riwayat
				Route::get('/biblio/riwayat/datatables/penulis', 'Operator\DataPendukung\BiblioPendukungController@penulisRiwayatData')->name('operator.pendukung.biblio.penulis.datatables.riwayat');
				Route::get('biblio/riwayat/datatables/penerbit', 'Operator\DataPendukung\BiblioPendukungController@penerbitRiwayatData')->name('operator.pendukung.biblio.penerbit.datatables.riwayat');
				Route::get('biblio/riwayat/datatables/statusitem', 'Operator\DataPendukung\BiblioPendukungController@statusitemRiwayatData')->name('operator.pendukung.biblio.statusitem.datatables.riwayat');
				Route::get('biblio/riwayat/datatables/sumberitem', 'Operator\DataPendukung\BiblioPendukungController@sumberitemRiwayatData')->name('operator.pendukung.biblio.sumberitem.datatables.riwayat');
				Route::get('biblio/riwayat/datatables/klasifikasi', 'Operator\DataPendukung\BiblioPendukungController@klasifikasiRiwayatData')->name('operator.pendukung.biblio.klasifikasi.datatables.riwayat');
				Route::get('biblio/riwayat/datatables/tipekoleksi', 'Operator\DataPendukung\BiblioPendukungController@tipekoleksiRiwayatData')->name('operator.pendukung.biblio.tipekoleksi.datatables.riwayat');
				Route::get('biblio/riwayat/datatables/statussirkulasi', 'Operator\DataPendukung\BiblioPendukungController@statussirkulasiRiwayatData')->name('operator.pendukung.biblio.statussirkulasi.datatables.riwayat');
		// Akhir Biblio
		
		// Anggota
			Route::get('/anggota', 'Operator\DataPendukung\AnggotaPendukungController@anggotaPendukung')->name('anggota.pendukung');
			// Datatables
			Route::get('/datatable/tipe-anggota', 'Operator\DataPendukung\AnggotaPendukungController@tipeAnggotaDatatable')->name('operator.pendukung.datatable.tipeAnggota'); 
			Route::get('/datatable/jurusan', 'Operator\DataPendukung\AnggotaPendukungController@jurusanDatatable')->name('operator.pendukung.datatable.jurusan'); 
			Route::get('/datatable/kelas', 'Operator\DataPendukung\AnggotaPendukungController@kelasDatatable')->name('operator.pendukung.datatable.kelas'); 
			// Tambah Data
			Route::get('/tambah/data-pendukung', 'Operator\DataPendukung\AnggotaPendukungController@tambahDatapendukung')->name('operator.tambah.DataPendukung');	
		// Akhir Anggota
	});

	//Operator : Biblio
	Route::prefix('biblio')->group(function() {
		Route::get('/', 'Operator\DataMaster\BiblioController@daftarbiblio')->name('operator.biblio');
		//Datatable
		Route::get('/datatablebiblio', 'Operator\DataMaster\BiblioController@bibliodatatable')->name('operator.biblio.datatable');
		//Tambah Biblio
		Route::get('/tambahbiblio', 'Operator\DataMaster\BiblioController@create')->name('operator.biblio.tambah');
		Route::post('/simpanbiblio', 'Operator\DataMaster\BiblioController@store')->name('operator.biblio.kirim');
		//cari penerbit dan penulis
		Route::get('/penulis/cari', 'Operator\DataMaster\BiblioController@caripenulis');
		Route::get('/penerbit/cari', 'Operator\DataMaster\BiblioController@caripenerbit');
		Route::get('/sumberitem/cari', 'Operator\DataMaster\BiblioController@carisumberitem');
		//ubah biblio
		Route::get('/ubah/biblio/{biblio_id}', 'Operator\DataMaster\BiblioController@edit')->name('operator.biblio.edit');
		Route::post('/{id}', 'Operator\DataMaster\BiblioController@update')->name('operator.biblio.ubah');
		//detail biblio
		Route::get('/detail/biblio/{id}', 'Operator\DataMaster\BiblioController@show')->name('operator.biblio.detail');
		//Export
		Route::get('/export/excel', 'Operator\DataMaster\BiblioController@export')->name('operator.biblio.export');
		//Import
		Route::get('/upload/excel', 'Operator\DataMaster\BiblioController@uploadexcel')->name('operator.biblio.upload.excel');
		Route::post('/import/excel', 'Operator\DataMaster\BiblioController@import')->name('operator.biblio.import.excel');
		//delete 
		Route::post('/hapus/{id}', 'Operator\DataMaster\BiblioController@delete')->name('operator.biblio.hapus');
		//riwayat biblio
		Route::get('/riwayat', 'Operator\DataMaster\BiblioController@indexRiwayat')->name('operator.biblio.riwayat');
		//datatable riwayat biblio
		Route::get('/riwayat/datatable', 'Operator\DataMaster\BiblioController@riwayatdatatable')->name('operator.biblio.riwayat.datatable');


	});


	// Route Anggota
Route::prefix('pengaturan')->group( function() {
	// Edit Data-Profile
	Route::get('/profile/{id}', 'Operator\Pengaturan\ProfileController@profile')->name('anggota.profile');
	Route::post('/profile/update/{id}', 'Operator\Pengaturan\ProfileController@profileUpdate')->name('anggota.profile.update');

	// Edit Foto-Profile
	Route::get('/foto/edit/{id}', 'Operator\Pengaturan\ProfileController@fotoEdit')->name('anggota.foto.ubah');
	Route::post('/foto/update/{id}', 'Operator\Pengaturan\ProfileController@fotoUpdate')->name('anggota.foto.update');

	// Pengaturan Sistem
	Route::get('/sistem/{id}', 'Operator\Pengaturan\SistemController@index')->name('operator.sistem');
	Route::post('/sistem/update/{id}', 'Operator\Pengaturan\SistemController@sistemUpdate')->name('operator.sistem.update');
});

// Batas Akhir Halaman Operator

