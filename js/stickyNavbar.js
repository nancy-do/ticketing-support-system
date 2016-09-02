/**
 * Created by WaiTung Yuen on 13/08/2016.
 */
$(document).ready(function() {
    $(".nav.navbar-nav li").click(function(){
        $(".nav.navbar-nav li").removeClass('active');
        $(this).addClass('active');
    })
    var loc = window.location.href;
    $(".nav.navbar-nav li").removeClass('active');
    $(".nav.navbar-nav li a").each(function() {
        if (loc.indexOf($(this).attr("href")) != -1) {

            $(this).closest('li').addClass("active");
        }
    });
});