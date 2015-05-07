jQuery(function($){


    $("#select-site").change(function(){

        getdata($(this)[0].selectedOptions[0], 'name');

    });

    function getdata(opt, type){
        var ajaxurl = opt.dataset['ajaxurl'];

        var url = ajaxurl+'/wp-admin/admin-ajax.php';
        var api = opt.dataset['api'];

        var formdata = {'action':'collect_data', 'key':api, 'sort':type};

        $.post(url, formdata, function(response){
            if(response['success']==1){

                var output = '';
                var data = response['data'];
                for(i=0;i<data.length;i++){

                    var file = data[i];
                    var name = file['name'];
                    var ip = '';

                    if( (data[i]['data'][0]) && (data[i]['data'][0]!==null)) {

                        ip += '<table class="ip-download" cellspacing="0" cellpadding="0">'+
                                '<tr><th>IP Address</th><th class="download-count">Downloads</th></tr>'

                        Object.keys(data[i]['data'][0]).forEach(function(key){

                            ip += '<tr><td>'+key+'</td><td class="download-count">'+data[i]['data'][0][key]['total']+'</td></tr>';

                        });

                        ip += '</table>';
                    }
                    output += '<li><h4>'+name+'</h4>'+ip+'</li>';

                }

                $(".data-output").empty().html(output);

            }else{
                alert("Argh! Something went wrong cap'an");
            }
            return false;
        }, 'json');

    }


    getdata($("#select-site")[0].selectedOptions[0], 'name');

});
