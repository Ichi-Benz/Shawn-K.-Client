/**
 * Created by Stan on 9/12/14.
 */
$(document).ready(function(){
    $("#slideshow > div:gt(0)").hide();

    setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
    },  4000);
});
$(document).ready(function(){
    $("#quotes > div:gt(0)").hide();

    setInterval(function() {
        $('#quotes > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#quotes');
    },  2000);
});
$(document).ready(function(){
$("#breakfast > div:gt(0)").hide();

setInterval(function() {
    $('#breakfast > div:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('#breakfast');
},  5000);
});