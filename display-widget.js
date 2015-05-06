jQuery(window).load(function($){
    $ = jQuery;
    function sp_db_widget_init(){
        $("#sp_at_db_widget").each(function(){
            $(".tab-content").first().addClass("active");

            $(".sp_at_tabs").find('a').click(function(){
                var item = $(this).attr('href');
                
                var url = 'http://'+$(this).data('ajaxurl')+'/wp-admin/admin-ajax.php';
                var api = $(this).data('api');
                
                var formdata = {'action':'collect_data', 'key':api};
                
                $.post(url, formdata, function(response){
                    if(response['success']==1){
                     
                        var content = '<table>';
                        
                        for(i=0;i<Object.keys(response['data']).length;i++){
                            var key = Object.keys(response['data'])[i];
                            var fileObj = response['data'][key];
                            content += '<tr><td colspan="2"><strong>'+fileObj['name']+'</strong></td></tr>';
                            
                            if(fileObj['data']){
                                for(ci=0;ci<Object.keys(fileObj['data']).length;ci++){
                                    var dKey = Object.keys(fileObj['data'])[ci];
                                    var dateObj = fileObj['data'][dKey];

                                    content += '<tr><td colspan="2"><em>'+dKey+'</em></td></tr>';
                                    
                                    for(ii=0;ii<Object.keys(dateObj).length;ii++){
                                        var ipKey = Object.keys(dateObj)[ii];
                                        content += '<tr><td>'+ipKey+'</td><td>'+dateObj[ipKey]['count']+'</td></tr>';
                                    }
                                }
                            }
                            
                        }
                        
                        content += '</table>';
                        
                        $(item).find('.inner').empty().html(content);
                        
                    }
                }, 'json');
                
                
                $(".tab-content, .tab-head").removeClass("active");
                $(item).addClass("active");
                $(this).parent().addClass("active");

                return false;
            });
        });
    }
    sp_db_widget_init();
});