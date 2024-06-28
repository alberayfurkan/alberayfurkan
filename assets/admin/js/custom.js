var _arr  = {};
function loadScript(scriptName, callback) 
{
    if (!_arr[scriptName]) 
    {
        _arr[scriptName] = true;
        var body         = document.getElementsByTagName('body')[0];
        var script       = document.createElement('script');
        script.type      = 'text/javascript';
        script.src       = scriptName;
        script.onload    = callback;
        body.appendChild(script);
    } 
    else if (callback) 
        callback();
        
};   

(function (window, undefined) {
  'use strict';

    // Fonkstion Varmı ?
    $.fn.exists = function () {
        return this.length > 0;
    };
    
    // Image Upload -- Single
    $(".upload").change(function(){
        
        $('#prload').fadeIn();
        
        var url     = $(this).data('url');
        var area    = $(this).data('area');
        
        var file_data = $(this).prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);                            
        $.ajax({
            url: url, // <-- point to server-side PHP script 
            dataType: 'json',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(response){
                if(response.status == 1)
                {
                    $('#'+area+'_preview').attr('src', response.url);
                    $('#'+area).val(response.image);
                }
                else
                {
                    custom_alert('Hata', response.message, 'warning');
                }
                console.log(response);
            }
         });
         
         $('#prload').fadeOut();
    });
    
    // Video Upload -- Single
    $(".videoupload").change(function(){
        var url     = $(this).data('url');
        var area    = $(this).data('area');
        
        var file_data = $(this).prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);                            
        $.ajax({
            url: url, // <-- point to server-side PHP script 
            dataType: 'json',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(response){
                if(response.status == 1)
                {
                    $('#'+area+'_preview').html('<video width="320" height="240" controls><source src="'+response.url+'" type="video/mp4"></video>');
                    $('#'+area).val(response.image);
                }
                else
                {
                    custom_alert('Hata', response.message, 'warning');
                }
                console.log(response);
            }
         });
    });
    
    // Image Upload -- Multi
    $("#multiupload").change(function(){
        
        $('#prload').fadeIn();
        
        var form_data = new FormData();
        var totalfiles = document.getElementById('multiupload').files.length;
        
        for (var index = 0; index < totalfiles; index++) {
           form_data.append("files[]", $(this).prop('files')[index]);
        }
        
        var url     = $(this).data('url');
        var area    = $(this).data('area');
                                                   
        $.ajax({
            url: url, // <-- point to server-side PHP script 
            dataType: 'json',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(response){
                if(response.status == 1)
                {
                    for(var index = 0; index < response.files.length; index++)
                    {
                        $('#preview').append('<div id="img-'+file_count+'" class="col-md-12 col-lg-12">\n\
                                                <div class="card border-light">\n\
                                                    <div class="card-body d-flex align-items-center justify-content-between" style="padding:10px;">\n\
                                                        <img class="img-fluid border-light rounded" style="max-height:49px;" src="'+response.files[index].url+'">\n\
                                                        <input style="flex: 5 1 0%;" class="form-control form-control-lg mx-2" placeholder="Açıklama" type="text" name="image_title['+file_count+']" value="" />\n\
                                                        <input style="flex: 1 0 0%;" class="form-control form-control-lg mx-2" placeholder="Sıra" type="text" name="image_sort['+file_count+']" value="" />\n\
                                                        <button type="button" data-id="'+file_count+'" class="btn btn-danger waves-effect my-1 gallery_delete"><i data-feather="trash-2"></i></button>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <input type="hidden" name="gallery['+file_count+']" value="'+response.files[index].image+'" />\n\
                                             </div>');
                        feather.replace();
                        file_count++;
                        
                        console.log(response.files[index]);
                    }
                }
                else
                {
                    $('#prload').fadeOut();
                    custom_alert('Hata', response.message, 'warning');
                }
                $('#prload').fadeOut();
            }
         });
    });
    
     // Multi Upload -- Delete Button
    $('#preview').on('click','.gallery_delete',function(){
        console.log('Delete Butonu Tetiklendi');
        
        var id = $(this).data('id');
        console.log(id);
        var img = '#img-'+id;
        console.log(img);
        $(img).remove();
    });
    
    
    //Multiple File Upload
    $("#multifileupload").change(function(){
        
        var form_data = new FormData();
        var totalfiles = document.getElementById('multifileupload').files.length;
        
        for (var index = 0; index < totalfiles; index++) {
           form_data.append("files[]", $(this).prop('files')[index]);
        }
        
        var url     = $(this).data('url');
        var area    = $(this).data('area');
                                                   
        $.ajax({
            url: url, // <-- point to server-side PHP script 
            dataType: 'json',  // <-- what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post',
            success: function(response){
                if(response.status == 1)
                {
                    for(var index = 0; index < response.files.length; index++)
                    {
                        $('#preview_file').append('<div id="img-'+file_count+'" class="col-md-6 col-lg-4">\n\
                                                <div class="card border-primary">\n\
                                                    <div class="card-body">\n\
                                                        '+response.files[index].image+'\n\
                                                        <input class="form-control form-control-sm my-1" placeholder="Döküman açıklaması" type="text" name="files_title['+file_count+']" value="" />\n\
                                                        <button type="button" data-id="'+file_count+'" class="btn btn-danger waves-effect position-absolute top-100 start-50 translate-middle gallery_delete">SİL</button>\n\
                                                    </div>\n\
                                                </div>\n\
                                                <input type="hidden" name="files_list['+file_count+']" value="'+response.files[index].image+'" />\n\
                                             </div>');
                        feather.replace();
                        file_count++;
                        console.log(response.files[index]);
                    }
                }
                
            }
         });
    });
    
    // Multi File Upload -- Delete Button
    $('#preview_file').on('click','.gallery_delete',function(){
        var id = $(this).data('id');
        var img = '#img-'+id;
        $(img).remove();
    });


    // Datatable
    if ($('#datatable').exists()) 
    {
        
        loadScript(plugin_path + 'lib/datatable/js/jquery.dataTables.min.js', function() {
            loadScript(plugin_path + 'lib/datatable/js/dataTables.bootstrap5.min.js', function() {
                loadScript(plugin_path + 'lib/datatable/js/dataTables.responsive.min.js', function() {
                    loadScript(plugin_path + 'lib/datatable/js/responsive.bootstrap5.min.js', function() {
                        
                        // LİSTELEME
                        var datatable = $('.datatables-basic').DataTable( 
                        {
                            columnDefs: [ { targets: [$('.datatables-basic').find('th').length - 1], orderable: false }],
                            stateSave: false, processing: true, serverSide: true, filter : true, bLengthChange: false,
                            ajax : {
                                url:$('.datatables-basic').data('url'),
                                method:"POST"
                            },
                            language: { "url": plugin_path + "lib/datatable/js/Turkish.json" },
                            drawCallback: function(settings) { feather.replace(); }
                        });
                        
                        
                        $('#filterSearch').keyup(function(){
                                datatable.search($(this).val()).draw() ;
                        });
                        
                        // SİLME
                        $('.datatables-basic').on('click','.del_content_btn',function()
                        {
                            var id = $(this).data('id');
                            var url = $('.datatables-basic').data('delurl');
                            
                            Swal.fire({
                               title: id+' ID\'li içeriği silmek istediğinize emin misiniz?',
                               text: "Bu işlem geri alınamaz",
                               icon: 'warning',
                               showCancelButton: true,
                               confirmButtonColor: '#3085d6',
                               cancelButtonColor: '#d33',
                               confirmButtonText: 'Sil',
                               cancelButtonText: "İptal",   
                            }).then((result) => {
                                if (result.isConfirmed) {
                                   
                                   $('#prload').fadeIn();
                                   
                                   $.ajax({
                                        url: url,
                                        type: 'post',
                                        data: {id: id},
                                        success: function(response){
                                            datatable.ajax.reload(null, false);
                                            $('#prload').fadeOut();
                                            custom_alert(response.title, response.message, response.alert);
                                        },
                                        error: function() {
                                            custom_alert('Hata', 'Belirlenemeyen bir hata oluştu.', 'warning');
                                            $('#prload').fadeOut();
                                        }
                                    });
                                }
                            });
                         });
                         
                        
                    });
                });
            });
       });
    }
    
    // Text Editör
    if ($('#editor').exists()) 
    {
        CKEDITOR.replace('detail');
        CKEDITOR.config.basicEntities = false;
        CKEDITOR.config.entities_greek = false; 
        CKEDITOR.config.entities_latin = false; 
        CKEDITOR.config.entities_additional = '';
        CKEDITOR.config.extraAllowedContent = '*(*)';
    }
    
    
    
})(window);


function custom_alert(title, message, alert){
    Swal.fire({
        position: 'top-end',
        title: title,
        text: message,
        icon: alert,
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
     });
}
