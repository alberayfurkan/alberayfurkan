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
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin', 'home', ''); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item active">Ayarlar</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    <a href="<?php //$system->router('admin', 'news', 'add'); ?>" class="create-new btn btn-primary float-end"><i data-feather="plus"></i> YENİ EKLE</a>
                </div>
            </div> -->
        </div>
        <!-- BREADCRUMB -->

        <div class="content-body">

            <section id="datatable">

                <!-- TABLO -->
                <div class="row">
                    <div class="col-12">
                        
                        <?php echo $this->msg->display(); ?>
                        
                        <div class="card">
                            
                            <div class="card-header border-bottom d-flex">
                                <input type="text" class="form-control form-control-md" id="filterSearch" placeholder="Arama..." />
                            </div>
                            
                            <table class="datatables-basic table"  
                                data-url="<?php echo $config->get('URL') ?>admin/ajax/settings/list.php"
                                data-delurl="<?php echo $config->get('URL') ?>admin/ajax/settings/delete.php">
                                <thead>
                                    <tr>
                                        <th style="width:40px;">ID</th>
                                        <th>DİL</th>
                                        <th>BAŞLIK</th>
                                        <th>DURUM</th>
                                        <th style="width:130px !important;">İŞLEMLER</th>
                                    </tr>
                                </thead>
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