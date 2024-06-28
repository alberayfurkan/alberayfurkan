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
                        <h2 class="content-header-title float-start mb-0">DE Sabit İçerikler Düzenle</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'home'); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'constant'); ?>">DE Sabit İçeriklerler</a></li>
                                <li class="breadcrumb-item active">DE Sabit İçerikler Düzenle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <a href="<?php $system->router('admin', 'constant'); ?>" class="btn btn-secondary float-end"><i data-feather="arrow-left"></i> İPTAL</a>
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
                            <h4 class="card-title">DE Sabit İçerikler Düzenle</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form class="needs-validation mt-2" enctype="multipart/form-data" action="<?php $system->router('admin', 'constant', 'de') ?>" method="POST" novalidate>

                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="detail">DE</label>
                                            <textarea class="form-control form-control-lg" name="detail" id="detail" rows="33" placeholder="Meta Açıklaması" required=""><?php echo $data['content'] ?></textarea>
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