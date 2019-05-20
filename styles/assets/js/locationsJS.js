alert("test");

$(document).ready(function () {

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
                console.log("update");                
            }
        });
    }, 1000);    
});