<?php $load->view('common','header', $data) ?>
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Kontrol Paneli</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Anasayfa</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <section id="dashboard-ecommerce">
                
                
                <div class="row match-height">
                    <!-- Medal Card -->
                    <div class="col-xl-4 col-md-6 col-12">
                      <div class="card card-congratulation-medal">
                        <div class="card-body">
                          <h5>Hoşgeldin 🎉 <?php echo $_COOKIE['fullname']; ?>!</h5>
                          <p class="card-text font-small-3">Başarılı şekilde giriş yaptınız</p>
                          
                        </div>
                      </div>
                    </div>
                    <!--/ Medal Card -->
                  </div>
                
                
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<?php $load->view('common', 'footer', $data) ?>


