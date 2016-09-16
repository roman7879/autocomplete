$(document).ready(function() {
    var $submit = $('input[type="submit"]');
    $submit.prop('disabled', true);
    $('input[type="text"]').on('input change', function() { //'input change keyup paste'
        $submit.prop('disabled', !$(this).val().length);
    });
});
