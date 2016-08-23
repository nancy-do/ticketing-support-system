/**
 * Created by WaiTung Yuen on 13/08/2016.
 */
jQuery(document).ready(function() {
    jQuery(".nav.navbar-nav li").click(function(){
        jQuery(".nav.navbar-nav li").removeClass('active');
        jQuery(this).addClass('active');
    })
    var loc = window.location.href;
    jQuery(".nav.navbar-nav li").removeClass('active');
    jQuery(".nav.navbar-nav li a").each(function() {
        if (loc.indexOf(jQuery(this).attr("href")) != -1) {

            jQuery(this).closest('li').addClass("active");
        }
    });
});