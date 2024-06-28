<?php global $db; $load->view('common','header', $data); ?>
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
            <section id="dashboard-analytics">
                <div class="row match-height">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-congratulations">
                          <div class="card-body text-center">
                            <div class="avatar avatar-xl bg-primary shadow">
                              <div class="avatar-content">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-award font-large-1"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
                              </div>
                            </div>
                            <div class="text-center">
                              <h1 class="mb-1 text-white">Üzgünüz !</h1>
                              <h5 class="mb-1 text-white">
                              <h5><?php
                              global $db;
                              $id = $_COOKIE['user_id'];

                              $users = $db->getRows("SELECT * FROM users WHERE id = $id");

                              foreach($users['row'] as $row)
                                  {
                              ?>
                                  <h5 class="mb-1 text-white"><?php echo $row['fullname'].'!'; ?></h5>
                              <?php
                                  }
                              ?></h5>
                              </h5>
                              <p class="card-text font-small-3">Bu sayfaya erişiminiz bulunmamaktadır.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- END: Content-->
<?php $load->view('common', 'footer', $data) ?>