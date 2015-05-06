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



    $("button.clone").click(function(){
        var clonewhat = $(this).data('clone');

        $(".clonefrom").find('.'+clonewhat).clone().appendTo('.r-fields');

        return false;

    });

});
