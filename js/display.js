jQuery(function($){

    var select_site = $("#select-site");
    var order_list = $("#sort-list");

    select_site.change(function(){
        getdata(select_site[0].selectedOptions[0], order_list[0].selectedOptions[0]);
    });
    order_list.change(function(){
        getdata(select_site[0].selectedOptions[0], order_list[0].selectedOptions[0]);
    });


    function getdata(opt, type){

        $(".spinner.get-data").show();

        var ajaxurl = opt.dataset['ajaxurl'];

        var url = ajaxurl+'/wp-admin/admin-ajax.php';
        var api = opt.dataset['api'];

        var formdata = {'action':'collect_data', 'key':api, 'sort':type['value']};

        $.post(url, formdata, function(response){
            if(response['success']==1){

                var output = '';
                var data = response['data'];
                var post_id = 0
                for(i=0;i<data.length;i++){

                    var file = data[i];

                    var ip = '';

                    ip = '<table class="ip-download" cellspacing="0" cellpadding="0">'+
                            '<tr><th>'+response['return_sub']+'</th><th class="download-count">Downloads</th></tr>';

                    for(ci=0;ci<file['content'].length;ci++){
                        ip += '<tr><td>'+file['content'][ci]['ip']+'</td><td class="download-count">'+file['content'][ci]['data']['total']+'</td></tr>';
                    }
                    ip += '</table>';


                    output += '<li><h4>'+file['post_title']+' <span class="total-count">Total Downloads: '+file['total']+'</span></h4>'+ip+'</li>';



                }

                $(".data-output").empty().html(output);
                $(".spinner.get-data").hide();

            }else{
                alert("Argh! Something went wrong cap'an");
            }
            return false;
        }, 'json');

    }


    getdata(select_site[0].selectedOptions[0], order_list[0].selectedOptions[0]);

});
