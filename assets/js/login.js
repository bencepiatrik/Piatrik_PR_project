$(document).ready(function() {
    $('#profile-icon').click(function() {
        $('#login-form').toggle();
    });

    $('#close-icon').click(function() {
        $('#login-form').hide();
    });
});