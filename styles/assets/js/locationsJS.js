setInterval(() => {
    $.ajax({
        url: '../../../admin/administration-logic.php',
        type: 'post',
        data: 
            { 
                "val": "getWebsites",
                "websiteID": id,
                "siteID": location
            },
        success: function(response) {
            
            console.log(response);
            
            var tempArray = JSON.parse(response);
            
            
    
            $("#CarouselIndicators").append(tempArray[0]);
            $("#WebsitesCarouselInner").append(tempArray[1]);
            
            $('#SlideMeUp').show();
            $('#SlideMeUp').animate({ height: '279px' }, 1000);
            isHidden = false;
        }
    });
}, 100000);