$(document).ready(function() {

    $('#lang').change(function(){

        console.log($(this));
        window.location = '/mvc_2/language/change?lang=' + $(this).val();
    });
});