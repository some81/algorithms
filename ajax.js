$(function(){
    $("form").submit(function(event){
        var formData = {
            comment: $("textarea[name=comment]").val();
            productId: $("input[name=productId]").val();
        };
        $.ajax({
            type: "POST",
            url: "/api",
            data: formData,
            dataType: "json"
        }).done(function(data) {
            console.log("Success");
        }).fail(function(data) {
            console.log("Failed");
        });
    });
})
