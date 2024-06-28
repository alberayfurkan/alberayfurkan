<?php $load->view('common', 'header', $data); ?>
<div class="app-content content ">

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper p-0">

        <!-- BREADCRUMB -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Sabit Metin Yönetimi</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'home', ''); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item active">Sabit Metinler</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB -->

        <div class="content-body">

            <section id="datatable">

                <!-- TABLO -->
                <div class="row">
                    <div class="col-12">

                        <?php echo $this->msg->display(); ?>

                        <div class="card">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Dil</th>
                                        <th style="width:130px !important;" scope="col">İşlem</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>TR Sabit İçerik</td>
                                        <td><a class="btn btn-warning" href="<?php echo $config->get('URL') . 'admin/constant/tr/' ?>"><i data-feather="edit"></i></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>EN Sabit İçerik</td>
                                        <td><a class="btn btn-warning" href="<?php echo $config->get('URL') . 'admin/constant/en/' ?>"><i data-feather="edit"></i></a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>DE Sabit İçerik</td>
                                        <td><a class="btn btn-warning" href="<?php echo $config->get('URL') . 'admin/constant/de/' ?>"><i data-feather="edit"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- TABLO -->

            </section>
        </div>
    </div>
</div>
<?php $load->view('common', 'footer', $data); ?>