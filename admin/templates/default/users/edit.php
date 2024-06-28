<?php $load->view('common', 'header', $data); ?>
<div class="app-content content ">
    <div class="content-wrapper p-0">

        <!-- Breadcrumbs -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Kullanıcı Düzenle</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'home'); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'users'); ?>">Kullanıcı Yönetimi</a></li>
                                <li class="breadcrumb-item active">Kullanıcı Düzenle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="breadcrumb-right">
                    <a href="<?php $system->router('admin', 'users'); ?>" class="btn btn-secondary btn-sm float-end"><i data-feather="arrow-left"></i>İPTAL</a>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs -->

        <div class="content-body">
            <div class="row">
                <div class="col-md-12">

                    <?php echo $this->msg->display(); ?>

                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Kullanıcı Düzenle [ <?php echo $data['detail']['fullname'] ?> ]</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form class="needs-validation mt-2" enctype="multipart/form-data" action="<?php $system->router('admin', 'users', 'edit', $data['detail']['id']) ?>" method="POST" novalidate>

                                    <input type="hidden" name="id" value="<?php echo $data['detail']['id'] ?>" />

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">

                                        <div class="mb-2">
                                            <label class="form-label" for="fullname">İsim Soyisim</label>
                                            <input type="text" class="form-control form-control-lg" id="fullname" name="fullname" placeholder="Ad" value="<?php echo $data['detail']['fullname'] ?>" required />
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="phone">Telefon</label>
                                            <input type="number" class="form-control form-control-lg" id="lastname" name="phone" placeholder="Telefon" value="<?php echo $data['detail']['phone'] ?>" required />
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="email">E-Posta</label>
                                            <input type="text" class="form-control form-control-lg" id="email" name="email" placeholder="E-Posta" value="<?php echo $data['detail']['email'] ?>" required />
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="password">Şifre</label>
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Şifre" value="*" required />
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-label" for="repassword">Şifre ekrarı</label>
                                            <input type="password" class="form-control form-control-lg" id="repassword" name="repassword" placeholder="Şifre Tekrarı" value="*" required />
                                        </div>

                                        <div class="mb-1 mt-2">
                                            <label class="form-label" for="password">İzin Yönetimi</label>
                                            <div class="border-primary rounded p-2">
                                                <div class="row p-1">
                                                    <?php
                                                    if ($data['modules']['num'] > 0) {
                                                        foreach ($data['modules']['row'] as $row) {
                                                            if ($data['access_modules']['num'] > 0) {
                                                                foreach ($data['access_modules']['row'] as $row2) {
                                                                    if ($row2['module_id'] == $row['id']) {
                                                                        $slc = 'checked="checked"';
                                                                        break;
                                                                    } else {
                                                                        $slc = '';
                                                                        continue;
                                                                    }
                                                                }
                                                            }

                                                    ?>
                                                            <div class="form-check form-check-primary  col-2 mt-1">
                                                                <input type="checkbox" name="modules[]" value="<?php echo $row['id'] ?>" <?php echo $slc; ?> class="form-check-input" id="check<?php echo $row['id'] ?>" />
                                                                <label class="form-check-label" for="check<?php echo $row['id'] ?>"><?php echo $row['title'] ?></label>
                                                            </div>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-2 mt-4">
                                            <div class="border-primary rounded p-2">
                                                <span class="btn btn-primary btn-file float-end" style="margin-top: -40px;">
                                                    <i data-feather="upload"></i> Profil Fotoğrafı
                                                    <input class="form-control upload" type="file" data-area="image" data-url="<?php echo $config->get('URL') ?>admin/ajax/util/upload.php" />
                                                    <input type="hidden" name="image" value="<?php echo $data['detail']['image'] ?>" id="image" />
                                                </span>

                                                <img id="image_preview" class="img-fluid border-light" src="<?php echo $config->get('URL') ?>uploads/images/<?php echo $data['detail']['image'] ?>" style="max-width: 300px;" />
                                            </div>
                                        </div>

                                        <div class="mb-2">
                                            <label class="form-check-label mb-50" for="status">Yayın Durumu</label>
                                            <div class="form-check form-check-primary form-switch">
                                                <input type="checkbox" name="status" <?php echo $data['detail']['status'] == 1 ? 'checked' : ''; ?> class="form-check-input" id="status" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-grid col-xl-10 offset-xl-1 col-md-12 col-12 mb-1 mt-2 mb-lg-0">
                                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">GÜNCELLE</button>
                                    </div>
                                </form>
                                <div class="d-grid col-xl-10 offset-xl-1 col-md-12 col-12 mb-1 mt-2 mb-lg-0">
                                    <div class="border-bottom">
                                        <h4 class="card-title">İşlem Kayıtları</h4>
                                    </div>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Aksiyon</th>
                                                <th scope="col">Kullanıcı</th>
                                                <th scope="col">Tarih</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if ($data['detailLog']['num'] > 0) {
                                            $i = 1;
                                            foreach ($data['detailLog']['row'] as $row) {
                                        ?>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><?php echo $i++ ?></th>
                                                        <td><?php echo $row['actions'] ?></td>
                                                        <td><?php echo $row['user'] ?></td>
                                                        <td><?php echo $row['created'] ?></td>
                                                    </tr>
                                                </tbody>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $load->view('common', 'footer', $data); ?>