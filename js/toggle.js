/**
 * Created by WaiTung on 13/08/2016.
 */

$(document).ready(function(){
    $("#btn").click(function(){
        $("#form").slideToggle("slow");
        $(".col-lg-4").hide("slow");
    });
});


$(document).ready(function(){
    $("#btn-back").click(function(){
        $(".col-lg-4").show("slow");
        $("#form").slideToggle("slow");
    });
});
