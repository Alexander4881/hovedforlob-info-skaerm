function NewWebSite(location){
    $("#NewWebsiteTitle").text(location);
    $("#NewWebsite").modal();
    
    $("#NewWebSite").click(function(){
        $.ajax({
            url: '../../../admin/administration-logic.php',
            type: 'post',
            data: 
                { 
                    "val": "newWebSite",
                    "title":$("#NewWebSiteTitle").val(),
                    "location":location
                },
            success: function(response) {
                console.log(response);
                var temp = response.split(",");
                window.location.replace("../../../admin/administration.php?id=" + temp[0] + "&title=" + temp[1]);
            }
        });
        $("#NewWebSite").unbind();
    });
    
}