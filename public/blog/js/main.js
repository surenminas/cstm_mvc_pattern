$(document).ready(function() {

    $('#lang').change(function(){
        window.location = '/cstm_mvc_pattern/language/change?lang=' + $(this).val();
    });
});