
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a class="ms-25" href="#" target="_blank">Woorkon Digital</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
    
    <script type="text/javascript">
        var plugin_path = '<?php echo $config->get('URL') ?>assets/admin/';
        var ajax_path = '<?php echo $config->get('URL') ?>admin/ajax/';
    </script>
    
    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo $config->get('URL') ?>assets/admin/js/vendors.min.js"></script>
    <script src="<?php echo $config->get('URL') ?>assets/admin/js/app-menu.js"></script>
    <script src="<?php echo $config->get('URL') ?>assets/admin/js/app.js"></script>
    
    
    
    <script src="<?php echo $config->get('URL') ?>assets/admin/lib/select2.full.min.js"></script>
    <script src="<?php echo $config->get('URL') ?>assets/admin/lib/form-select2.min.js"></script>
    <script src="<?php echo $config->get('URL') ?>assets/admin/lib/sweetalert/sweetalert2.all.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    
    <!--<script src="<?php echo $config->get('URL') ?>assets/admin/lib/ckfinder/ckfinder.js"></script>-->
    
    <script src="<?php echo $config->get('URL') ?>assets/admin/js/custom.js"></script>
    <!-- END: Theme JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });
        
        /**
        $('#ckfinder-modal-1').click(function(){
           selectFileWithCKFinderMultiple( 'ckfinder-input-1' );
        });

        function selectFileWithCKFinder( elementId ) {
                CKFinder.modal( {
                        chooseFiles: true,
                        width: 800,
                        height: 600,
                        onInit: function( finder ) {
                                finder.on( 'files:choose', function( evt ) {
                                        var file = evt.data.files.first();
                                        var output = document.getElementById( elementId );
                                        output.value = file.getUrl();
                                } );

                                finder.on( 'file:choose:resizedImage', function( evt ) {
                                        var output = document.getElementById( elementId );
                                        output.value = evt.data.resizedUrl;
                                } );
                        }
                } );
        }
        
        function selectFileWithCKFinderMultiple( elementId ) {
                console.log('test');
                CKFinder.modal( {
                        chooseFiles: true,
                        width: 900,
                        height: 600,
                        onInit: function( finder ) {
                                finder.on( 'files:choose', function( evt ) {
                                        var files = evt.data.files;

                                        var chosenFiles = '';

                                        files.forEach( function( file, i ) {
                                            
                                            $('#preview').append('<div id="img-'+i+'" class="col-md-6 col-lg-2">\n\
                                                <div class="card border-primary">\n\
                                                    <div class="card-body">\n\
                                                        <img class="img-fluid" src="'+ file.get('name')+'">\n\
                                                        <button type="button" data-id="'+i+'" class="btn btn-danger waves-effect position-absolute top-100 start-50 translate-middle gallery_delete">SİL</button>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <input type="hidden" name="gallery['+i+']" value="'+file.get('name')+'" />\n\
                                             </div>');
                                            
                                            chosenFiles += ( i + 1 ) + '. ' + file.get( 'name' ) + '\n';
                                        } );
                                        
                                        console.log(chosenFiles);
                                } );

                                finder.on( 'file:choose:resizedImage', function( evt ) {
                                        var output = document.getElementById( elementId );
                                        output.value = evt.data.resizedUrl;
                                } );
                        }
                } );
        }*/
            
        
    </script>
</body>
<!-- END: Body-->

</html>