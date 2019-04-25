setInterval(() => {
    $.ajax({
        url: '../../../admin/administration-logic.php',
        type: 'post',
        data: 
            { 
                "val": "getWebsites",
                "siteID": location
            },
        success: function(response) {
            
            console.log(response);
            
        }
    });
}, 100000);