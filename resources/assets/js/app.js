(function(){

    jQuery(document).ready(function($) {
    console.log('consolo bot activated!');

    // initialize MOMENTJS
    var now = moment();
    $('time.counter').each(function (i, e) {

        var date = new Date($(e).attr('datetime')).getTime();
        var time = moment($(e).attr('datetime')).locale("en");

        $(e).html('<span>' + time.from(now) + '</span>');
    });

    $('time.date').each(function (i, e) {
        var time = moment($(e).attr('datetime')).locale("en");
        $(e).html('<span>' + time.format('MMMM Do YYYY, h:mm:ss a') + '</span>');
    });

    $('time.countdown').each(function(i,e){
        var end = moment($(e).attr('datetime'));
        var eventTime= new Date(end).getTime(); // Timestamp - Sun, 21 Apr 2013 13:00:00 GMT
        var currentTime = new Date(moment()).getTime(); // Timestamp - Sun, 21 Apr 2013 12:30:00 GMT
        var diffTime = eventTime - currentTime;
        var duration = moment.duration(diffTime*1000, 'milliseconds');
        var interval = 1000;

        console.log('event:' + eventTime + ' --- current:' + currentTime + ' --- difftime:' + diffTime);

        setInterval(function(){
            duration = moment.duration(duration - interval, 'milliseconds').locale("en");
            $(e).html('<span>' + duration.hours() + ":" + duration.minutes() + ":" + duration.seconds() + '</span>');
        }, interval);
    });


    // init isotope
   /* $('.grid').isotope({
        itemSelector: '.card',
        percentPosition: true,
        masonry: {
            // use outer width of grid-sizer for columnWidth
            columnWidth: '.grid-sizer'
        }
    });*/



    // ajax request likes
    /*
    $('form.ajax input[type=checkbox]').click(function(e){
        e.preventDefault();

        var form = jQuery(this).parents("form:first");
        var dataString = form.serialize();
        var formAction = form.attr('action');

        $.ajax({
            type: "POST",
            url : formAction,
            data : dataString,
            success : function(data){
                console.log( data );

                $data = $(data);

                $('#photos').html($data);
            }
        },"json");
    });

    */

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


    });
})();