/*global $*/
$(document).ready(function () {
    
    $("input").on("change", function(){
        $(this).next("label").children("span").text($(this).val());
    });
    $(".add ").on("click", "i", function (){
        
        $("<div class='upload-file'><input type='file' value='choose-file'><label><span>upload file</span></label></div>").insertBefore($(this));
        
        $("input").on("change", function(){ 
            $(this).next("label").children("span").text($(this).val());
        });
    
    });
    
});