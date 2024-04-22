<style>
	iframe {
		width: 100%;
		height: 100vh;
		border: 2px solid #000;
	}
</style>

<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row justify-content-center">
				<img src="<?=base_url('prixier/img/logo_sph.png')?>" alt="logo" style="max-width: 10%; height: auto; margin-top: 50px; margin-bottom: 15px;">
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<?php if (session()->get('kondisi_pendaftar')== NULL) { ?>
		<section class="section">
			<div class="container">
				<div class="row justify-content-center">
					<p class="text-center">Terima kasih telah melengkapi dokumen.</p>
					<p class="text-center">Silahkan tunggu informasi penerimaan yang akan diinformasikan melalui <strong>Halaman Ini</strong> atau <strong>Whatsapp</strong>,</p>
					<p class="text-center">Anda dapat login di website ini <strong>setiap hari</strong> untuk mengetahui informasi penerimaan</p>
					<p class="text-center">atau bisa mendatangi Sekolah Permata Harapan dengan alamat di bawah.</p>
					<div class="d-flex justify-content-center">
						<a href="<?=base_url('login_pendaftaran/log_out')?>" class="btn btn-primary mb-4">Log Out</a>
					</div>
					<!-- Google Map -->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0513589546!2d104.01296077383368!3d1.1234526622641081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98966f5876889%3A0xeb151aeee8904615!2sSekolah%20Permata%20Harapan%20Batu%20Batam!5e0!3m2!1sen!2sid!4v1699286547281!5m2!1sen!2sid"
					allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
				</iframe>
			</div>
		</div>
	</section>
<?php } else if (session()->get('kondisi_pendaftar') == 1) { ?>
	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<p class="text-center">Selamat Ananda <?= session()->get('nama_pendaftar') ?>, Anda <strong>DITERIMA</strong> di Sekolah Permata Harapan.</p>
				<p class="text-center">Silahkan login dengan kredensial berikut : </p>
				<p class="text-center">Username : <?= $user_data->username ?></p>
				<p class="text-center">Password : <?= $user_data->username ?></p>
				<div class="d-flex justify-content-center">
					<a id="loginBtn" href="<?= base_url('login') ?>" class="btn btn-primary mb-4"><i class="faj-button fa-solid fa-right-to-bracket"></i>Login</a>
				</div>
			</div>
		</div>
	</section>
<?php } else if (session()->get('kondisi_pendaftar') == 2) { ?>
	<section class="section">
		<div class="container">
			<div class="row justify-content-center">
				<p class="text-center">Maaf Ananda <?= session()->get('nama_pendaftar') ?>, Anda <strong>DITOLAK</strong> di Sekolah Permata Harapan</p>
				<p class="text-center">Silahkan log out dengan tombol dibawah.</p>
				<div class="d-flex justify-content-center">
				</div>
			</div>
		</div>
	</section>
<?php } ?>
</div>

<script>
	$(document).ready(function() {
        // Tambahkan event click pada tombol
		$('#loginBtn').click(function(e) {
            // Hentikan default behavior dari tautan
			e.preventDefault();

            // Jalankan log_out menggunakan AJAX
			$.ajax({
				url: '<?= base_url('login_pendaftaran/log_out') ?>',
				type: 'GET',
				success: function(response) {
                    // Log out berhasil, alihkan ke halaman login
					window.location.href = '<?= base_url('login') ?>';
				},
				error: function(xhr, status, error) {
                    // Handle error jika diperlukan
					console.error(xhr.responseText);
				}
			});
		});
	});
</script>
