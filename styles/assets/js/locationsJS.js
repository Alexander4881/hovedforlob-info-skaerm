alert("test");

$(document).ready(function () {

    console.log("ready");

    setInterval(() => {
        console.log("ran");
        $.ajax({
            url: '../../../admin/administration-logic.php',
            type: 'post',
            data: 
                { 
                    "val": "getWebsiteElementsOnSiteID",
                    "siteID": location
                },
            success: function(response) {
                
                
                
            }
        });
    }, 1000);    
});