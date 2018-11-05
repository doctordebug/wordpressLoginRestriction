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

    $('.loginBtn').click(
        function(){
            $.ajax(
                {
                method: 'POST',
                url: AJAX_HANDLER,
                data: {
                    action: 'login',
                    strategy: 'wordpress',
                    user_login: $('#log').val(),
                    user_password: $('#pwd').val(),
                    remember: false
                },
                success: function(result){
                    console.log(result);
                    if(result === 'success'){
                        location.reload();
                        return;
                    }
                    $('.errormsg').html(result);
                    $('.errormsg').show();
            }});
        }   
    );
});