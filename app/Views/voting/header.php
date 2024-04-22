<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link
      rel="shortcut icon"
      href="<?php echo base_url('assets/compiled/svg/obor.png')?>"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="<?php echo base_url('assets/compiled/svg/obor.png')?>"
      type="image/png"
    />

    <link rel="stylesheet" href="<?php echo base_url('assets/compiled/css/app.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/compiled/css/app-dark.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('assets/compiled/css/iconly.css')?>" />
    <link
      rel="stylesheet"
      href="<?php echo base_url('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css')?>"/>

    <link
      rel="stylesheet"
      href="<?php echo base_url('assets/compiled/css/table-datatable-jquery.css')?>"/>
      <link
      rel="stylesheet"
      href="<?php echo base_url('assets/extensions/flatpickr/flatpickr.min.css')?>"/>
      <link rel="stylesheet"href="<?php echo base_url('assets/extensions/filepond/filepond.css')?>"/>
    <link
      rel="stylesheet"
      href="<?php echo base_url('assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css')?>"/>
    <link
      rel="stylesheet"
      href="<?php echo base_url('assets/extensions/toastify-js/src/toastify.css')?>"/>
      <link rel="stylesheet" href="<?php echo base_url('assets/compiled/css/auth.css')?>"/>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      
  <script>
  const timeoutDuration = 600000; // 10 menit
  let timeout;


  function startTimeout() {
    clearTimeout(timeout);
    timeout = setTimeout(logout, timeoutDuration);
  }

  // Fungsi logout
  function logout() {
	window.location.href = "<?= base_url('landinpage/home/logout')?>";

  }

  // Reset timeout saat ada aktivitas
  document.addEventListener('mousemove', startTimeout);
  document.addEventListener('keydown', startTimeout);
</script>

  </head>
  