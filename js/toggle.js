/**
 * Created by WaiTung on 13/08/2016.
 */

$(document).ready(function(){
    $("#btn").click(function(){
        $("#form").slideToggle("slow");
        $(".col-lg-6").hide("slow");
    });
    
    $("#btn-back").click(function(){
        $(".col-lg-6").show("slow");
        $("#form").slideToggle("slow");
    });
});
