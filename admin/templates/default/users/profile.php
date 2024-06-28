<?php $load->view('common', 'header', $data); ?> 
<div class="app-content content ">
    <div class="content-wrapper p-0">

        <!-- Breadcrumbs -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Profil Düzenle</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'home'); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'users'); ?>">Profil Yönetimi</a></li>
                                <li class="breadcrumb-item active">Profil Düzenle</li>
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
                            <h4 class="card-title">Profil Düzenle [ <?php echo $data['detail']['fullname'] ?> ]</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form method="post" class="needs-validation" novalidate>
                                    <div class="form-row">            
                                        
                                        <div class="col-md-6 offset-md-3 my-3">
                                            <div class="form-group">
                                                <label class="small mb-1" for="pname">Ad Soyad</label>
                                                <input class="form-control py-4" id="pname" name="fullname" value="<?php echo $data['detail']['fullname'] ?>" type="text" placeholder="Ad Soyad girin..." required />
                                                <div class="invalid-feedback">Lütfen ad soyad girin.</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 offset-md-3 my-3">
                                            <div class="form-group">
                                                <label class="small mb-1" for="phone">Telefon</label>
                                                <input class="form-control py-4" id="phone" name="phone" value="<?php echo $data['detail']['phone'] ?>" type="number" placeholder="Lütfen telefon numarası girin." required />
                                                <div class="invalid-feedback">Lütfen telefon numarası girin.</div>
                                            </div>
                                        </div>
                                        
                                        <?php
                                        if(empty($data['detail']['image'])){
                                            $src1 = $config->get('URL').'assets/admin/img/noimage.jpg';
                                        }else{
                                            $src1 = $config->get('URL').'uploads/images/'.$data['detail']['image'];
                                        }
                                        ?>

                                        <div class="col-md-6 offset-md-3 my-3">
                                            <div class="border rounded p-2">
                                                <span class="btn btn-primary btn-file float-end" style="margin-top: -40px;">
                                                    <i data-feather="upload"></i> Profil Fotoğrafı  
                                                    <input class="form-control upload" type="file" data-area="image" data-url="<?php echo $config->get('URL') ?>admin/ajax/util/upload.php"  />
                                                    <input type="hidden" name="image" value="<?php echo $data['detail']['image'] ?>" id="image" />
                                                </span>
                                                
                                                <img id="image_preview" class="img-fluid border-light" src="<?php echo $src1 ?>" style="max-width: 300px;" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">E-Posta</label>
                                                <input class="form-control py-4" id="pname" name="email" value="<?php echo $data['detail']['email'] ?>" type="text" disabled />
                                                <div class="invalid-feedback">Lütfen geçerli bir e-posta girin.</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 offset-md-3 mt-2 mb-2">
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Şifre</label>
                                                <input class="form-control py-4" id="email" name="password" value="*" type="password" placeholder="Şifre girin..." required />
                                                <div class="invalid-feedback">Lütfen geçerli bir şifre girin.</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 offset-md-3">
                                            <div class="form-group">
                                                <label class="small mb-1" for="repassword">Şifre tekrarı</label>
                                                <input class="form-control py-4" id="repassword" value="*" name="repassword" type="password" placeholder="Şifre tekrarı..." required />
                                                <div class="invalid-feedback">Lütfen şifre tekrarını giriniz.</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 offset-md-3">  
                                            <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">KAYDET</button>
                                        </div>
                                        
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
