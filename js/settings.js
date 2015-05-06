jQuery(function($){

    function validate_init(){
        $(".r-fields input").each(function(){

            if($(this).data('req')==1){
                if($(this).val().length!=0){
                    $(this).parent().parent().find('.append').addClass('success').find('.fa').removeClass('fa-exclamation-triangle').addClass("fa-check");
                }
            }

        });
    }


    validate_init();



    $("button.clone").click(function(e){

        sitecount++;

        e.preventDefault();
        var clonewhat = $(this).data('clone');

        $(".clonefrom").find(clonewhat).clone().appendTo('.r-fields');

        $(".r-fields").find(clonewhat).eq(sitecount).find('input').each(function(){
            var data = $(this).attr('name');
            $(this).attr('name', data.replace('$i', sitecount));
        });
        $(".r-fields").find(clonewhat).eq(sitecount).find('td.count').html((sitecount+1));

        return false;

    });

});
