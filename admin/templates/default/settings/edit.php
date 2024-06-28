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
                        <h2 class="content-header-title float-start mb-0">Ayarlar</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'home'); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item active">Ayarlar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- BREADCRUMB -->

        <div class="content-body">
            <div class="row">
                <div class="col-md-12">

                    <?php echo $this->msg->display(); ?>

                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Ayarlar</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form class="needs-validation mt-2" enctype="multipart/form-data" action="<?php $system->router('admin', 'settings', 'edit') ?>" method="POST" novalidate>
                                    <input type="hidden" name="id" value="<?php echo $data['detail']['id'] ?>" />

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="lang_id">Dil Seçiniz</label>
                                            <select class="form-select form-select-lg" id="lang_id" name="lang_id" required>
                                                <option value="">Seçiniz....</option>
                                                <?php

                                                if ($data['languages']['num'] > 0) {
                                                    foreach ($data['languages']['row'] as $row) {
                                                        if ($row['id'] == $data['detail']['lang_id'])
                                                            $slc = 'selected="selected"';
                                                        else
                                                            $slc = ';'
                                                ?>
                                                        <option <?php echo $slc; ?> value="<?php echo $row['id'] ?>"><?php echo $row['short_name'] . ' - ' . $row['name'] ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="site_name">Site Adı</label>
                                            <input type="text" class="form-control form-control-lg" id="site_name" name="site_name" placeholder="Site Adı" value="<?php echo $data['detail']['site_name'] ?>" required />
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="meta_title">Site Başlığı</label>
                                            <input type="text" class="form-control form-control-lg" id="meta_title" name="meta_title" placeholder="Site başlığı" value="<?php echo $data['detail']['meta_title'] ?>" required />
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="meta_description">Site Açıklaması</label>
                                            <textarea class="form-control form-control-lg" name="meta_description" id="meta_description" rows="3" placeholder="Site Açıklaması" required=""><?php echo $data['detail']['meta_description'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="email">E-Posta Adresi</label>
                                            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="E-Posta" value="<?php echo $data['detail']['email'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="whatsapp">Whatsapp</label>
                                            <input type="text" class="form-control form-control-lg" id="whatsapp" name="whatsapp" placeholder="Whatsapp" value="<?php echo $data['detail']['whatsapp'] ?>" />
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-6">
                                        <div class="mb-2 mt-4">
                                            <div class="border-primary rounded p-2">
                                                <span class="btn btn-primary btn-file float-end" style="margin-top: -40px;">
                                                    <i data-feather="upload"></i> Logo 127 × 51 px
                                                    <input class="form-control upload" type="file" data-area="image" data-url="<?php echo $config->get('URL') ?>admin/ajax/util/upload.php" />
                                                    <input type="hidden" name="image" value="<?php echo $data['detail']['image'] ?>" id="image" />
                                                </span>

                                                <img id="image_preview" class="img-fluid border-light" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['detail']['image'] ?>" style="max-width: 300px;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-6">
                                        <div class="mb-2 mt-4">
                                            <div class="border-primary rounded p-2">
                                                <span class="btn btn-primary btn-file float-end" style="margin-top: -40px;">
                                                    <i data-feather="upload"></i> Mobil Logo
                                                    <input class="form-control upload" type="file" data-area="mobil_image" data-url="<?php echo $config->get('URL') ?>admin/ajax/util/upload.php" />
                                                    <input type="hidden" name="mobil_image" value="<?php echo $data['detail']['mobil_image'] ?>" id="mobil_image" />
                                                </span>

                                                <img id="mobil_image_preview" class="img-fluid border-light" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['detail']['mobil_image'] ?>" style="max-width: 300px;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-6">
                                        <div class="mb-2 mt-4">
                                            <div class="border-primary rounded p-2">
                                                <span class="btn btn-primary btn-file float-end" style="margin-top: -40px;">
                                                    <i data-feather="upload"></i> Kare Logo
                                                    <input class="form-control upload" type="file" data-area="square_image" data-url="<?php echo $config->get('URL') ?>admin/ajax/util/upload.php" />
                                                    <input type="hidden" name="square_image" value="<?php echo $data['detail']['logo_square'] ?>" id="square_image" />
                                                </span>

                                                <img id="square_image_preview" class="img-fluid border-light" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['detail']['logo_square'] ?>" style="max-width: 300px;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-6">
                                        <div class="mb-2 mt-4">
                                            <div class="border-primary rounded p-2">
                                                <span class="btn btn-primary btn-file float-end" style="margin-top: -40px;">
                                                    <i data-feather="upload"></i> Favicon
                                                    <input class="form-control upload" type="file" data-area="favicon_image" data-url="<?php echo $config->get('URL') ?>admin/ajax/util/upload.php" />
                                                    <input type="hidden" name="favicon_image" value="<?php echo $data['detail']['favicon'] ?>" id="favicon_image" />
                                                </span>

                                                <img id="favicon_image_preview" class="img-fluid border-light" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['detail']['favicon'] ?>" style="max-width: 300px;" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid col-xl-10 offset-xl-1 col-md-12 col-12 mb-1 mt-2 mb-lg-0">
                                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">GÜNCELLE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $load->view('common', 'footer', $data); ?>