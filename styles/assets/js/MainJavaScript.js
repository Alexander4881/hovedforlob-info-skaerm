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
                    "title": $("#NewWebSiteTitle").val(),
                    "location": location,
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

function run(){
    console.log("testtesttest");

    $("#WebsitesScrollUp").slideToggle(1000);
}


var isHidden = true;
function SlideMeUp(location){
    // 14 for location 14
    // 16 for location 16


  if (isHidden === true) 
  {
    $('#SlideMeUp').show();
    $('#SlideMeUp').animate({ height: '279px' }, 1000);
    isHidden = false;
    $.ajax({
        url: '../../../admin/administration-logic.php',
        type: 'post',
        data: 
            { 
                "val": "getWebsites",
                "location": location 
            },
        success: function(response) {
            console.log(response);
        }
    });

  }
  else if(isHidden === false)
  {
    $('#SlideMeUp').animate({ height: '0px' }, 1000);
    isHidden = true;
    

  }
  else
  {
    console.log("not possible");
  }
}