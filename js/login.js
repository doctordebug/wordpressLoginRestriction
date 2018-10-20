$(function(){

    const AJAX_HANDLER = ULR_PLUGIN_URL + 'classes/utils/AjaxHandler.php';

    $('.submitRegisterBtn').click(
        function(){
            $.ajax(
                {
                method: 'POST',
                url: AJAX_HANDLER,
                data: {
                    action: 'register',
                    strategy: 'wordpress',
                    email: $('#registerEmail').val(),
                    password1: $('#registerPassword1').val(),
                    password2: $('#registerPassword2').val(),
                    username: $('#registerName').val(),
                },
                success: function(result){

                    location.reload();
                 
            }});
        }   
    );
});