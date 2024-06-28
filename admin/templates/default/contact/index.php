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
                        <h2 class="content-header-title float-start mb-0">İletişim Listesi</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php $system->router('admin'); ?>">Kontrol Paneli</a></li>
                                <li class="breadcrumb-item active">İletişim Listesi</li>
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
                        <div class="card-header border-bottom">
                                <h4 class="card-title"></h4>
                                <div class="content-header-right text-md-end col-md-5 col-12 d-md-block d-none">
                                    <div class="breadcrumb-right">
                                        <a href="<?php $system->router('admin', 'contact', 'dataDownload'); ?>" class="btn btn-success btn-sm float-end"><i data-feather="download"></i> İletişim Listesi İndir</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header border-bottom d-flex">
                                <input type="text" class="form-control form-control-md" id="filterSearch" placeholder="Arama..." />
                            </div>
                            
                            <table class="datatables-basic table" 
                                data-url="<?php echo $config->get('URL') ?>admin/ajax/contact/list.php">
                                <thead>
                                    <tr>
                                        <th style="width:40px;">#</th>
                                        <th>ADI SOYADI</th>
                                        <th>EMAİL</th>
                                        <th>MESAJ</th>
                                        <th>TARİH</th>
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