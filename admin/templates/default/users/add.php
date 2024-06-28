<?php $load->view('common', 'header', $data); ?> 
<div class="app-content content ">
    <div class="content-wrapper p-0">

        <!-- BREADCRUMB -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Yeni Kullanıcı Ekle</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'home'); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'users'); ?>">Kullanıcı Yönetimi</a></li>
                                <li class="breadcrumb-item active text-capitalize">YENİ EKLE</li>
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
                    
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">Yeni Kullanıcı Ekle</h4>
                            <a href="<?php $system->router('admin', 'users'); ?>" class="btn btn-sm btn-secondary float-end" style="margin-right: 10px;"><i data-feather="arrow-left"></i> İPTAL</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form class="needs-validation mt-2" enctype="multipart/form-data" action="<?php $system->router('admin', 'users', 'add') ?>" method="POST" novalidate>
                                    
                                    <div class="col-xl-10 offset-xl-1 col-md-12 col-12">
                                                                                
                                    
                                        <div class="mb-1">
                                            <label class="form-label" for="fullname">İsim Soyisim</label>
                                            <input type="text" class="form-control form-control-lg" id="fullname" name="fullname" placeholder="Ad" required />
                                        </div>
                                        
                                        <div class="mb-1">
                                            <label class="form-label" for="phone">Telefon</label>
                                            <input type="number" class="form-control form-control-lg" id="phone" name="phone" placeholder="Telefon" required />
                                        </div>
                                        
                                        <div class="mb-1">
                                            <label class="form-label" for="email">E-Posta</label>
                                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="E-Posta" required />
                                        </div>
                                        
                                        <div class="mb-1">
                                            <label class="form-label" for="password">Şifre</label>
                                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Şifre" required />
                                        </div>
                                        
                                        <div class="mb-1">
                                            <label class="form-label" for="repassword">Şifre Tekrarı</label>
                                            <input type="password" class="form-control form-control-lg" id="repassword" name="repassword" placeholder="Şifre Tekrarı" required />
                                        </div>
                                        
                                        <div class=" mt-4 mb-2">
                                            <div class="border-primary rounded p-2">
                                                <span class="btn btn-primary btn-file float-end" style="margin-top: -40px;">
                                                    <i data-feather="upload"></i> Profil Fotoğrafı 
                                                    <input class="form-control upload" type="file" data-area="image" data-url="<?php echo $config->get('URL') ?>admin/ajax/util/upload.php"  />
                                                    <input type="hidden" name="image" value="" id="image" />
                                                </span>
                                                
                                                <img id="image_preview" class="img-fluid border-light" src="" style="max-width: 300px;" />
                                            </div>
                                        </div>
                                        
                                        <div class="mb-1 mt-2">
                                            <label class="form-label" for="password">İzin Yönetimi</label>
                                            <div class="border-primary rounded p-2">
                                               <div class="row p-1">
                                                   <?php 
                                                   if($data['modules']['num'] > 0)
                                                   {
                                                       foreach($data['modules']['row'] as $row)
                                                       {
                                                       ?>
                                                       <div class="form-check form-check-primary  col-2">
                                                           <input type="checkbox" name="modules[]"  value="<?php echo $row['id'] ?>" class="form-check-input" id="check<?php echo $row['id'] ?>" />
                                                           <label class="form-check-label" for="check<?php echo $row['id'] ?>"><?php echo $row['title'] ?></label>
                                                       </div>
                                                       <?php
                                                       }
                                                   }
                                                   ?>
                                               </div>
                                            </div>
                                        </div>

                                        <div class="mb-1">
                                            <label class="form-check-label mb-50" for="status">Aktif / Pasif</label>
                                            <div class="form-check form-check-primary form-switch">
                                                <input type="checkbox" name="status" checked class="form-check-input" id="status" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid col-xl-10 offset-xl-1 col-md-12 col-12 mb-1 mt-2 mb-lg-0">
                                         <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">KAYDET</button>
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