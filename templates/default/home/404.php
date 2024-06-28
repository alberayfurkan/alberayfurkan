<?php $load->view('common', 'header', $data); ?>

<div class="section">
  <h1 class="error">404</h1>
  <div class="page">Ooops!!! The page you are looking for is not found</div>
  <a class="back-home" href="<?php echo $config->get('URL') . '?lang=' . $_SESSION['lang'] ?>">Back to home</a>
</div>

<?php $load->view('common', 'footer', $data) ?>