jQuery(document).ready(function($) {

    console.log('consolo bot activated!');

    // initialize MOMENTJS
    $('time.date-h').each(function (i, e) {
        var time = moment($(e).attr('datetime')).locale("en");
        $(e).html('<span>' + time.format('MMMM Do YYYY, h a') + '</span>');
    });

    $('time.date').each(function (i, e) {
        var time = moment($(e).attr('datetime')).locale("en");
        $(e).html('<span>' + time.format('MMMM Do YYYY, h:mm:ss a') + '</span>');
    });



    // ajax update photos vote
    $(document).on('click', 'form.ajax input[type=checkbox]',  function () {

        var form = jQuery(this).parents("form:first");
        var dataString = form.serialize();
        var formAction = form.attr('action');

        return $.ajax({
            cache: false,
            type: "POST",
            url : formAction,
            data : dataString,
            success: function (data) {
                $('#photos').html(data);
            }
        },'json');

    });

    // initialize SKROLLR
    skrollr.init({
        smoothScrolling: false,
        mobileDeceleration: 0.004
    });

});

