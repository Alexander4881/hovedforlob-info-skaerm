$(document).ready(function(){
    $("#userInputRegex").hide();
});

function ShowAlertTextBox(easeInTimeInMilliSeconds,timeOpenInMilliSeconds){
    $("#userInputRegex").fadeIn(easeInTimeInMilliSeconds,"swing");
    setTimeout(function(){
        $("#userInputRegex").fadeOut(easeInTimeInMilliSeconds,"swing");
    },timeOpenInMilliSeconds);
}

function NewWebSite(location){
    $("#NewWebsiteTitle").text(location);
    $("#NewWebsite").modal();
    
    $("#NewWebSite").unbind();
    $("#NewWebSite").click(function(){
        if ($("#NewWebSiteTitle").val().match(/^[a-zA-Z0-9ÆØÅæøå\s]/) && $("#NewWebSiteDescription").val().match(/^[a-zA-Z0-9ÆØÅæøå\s]/)) {
            $.ajax({
                url: '../../../admin/administration-logic.php',
                type: 'post',
                data: 
                    { 
                        "val": "newWebSite",
                        "title": $("#NewWebSiteTitle").val(),
                        "location": location,
                        "description": $("#NewWebSiteDescription").val()
                    },
                success: function(response) {
                    console.log("Log me please " + response);
                    var temp = response.split(",");
                    window.location.replace("../../../admin/administration.php?id=" + temp[0] + "&title=" + temp[1]);
                }
            });
        } else {
            $("#userInputRegex").show();
            ShowAlertTextBox(500, 1000);
        }
    });
}

function NewWebsiteModal(){
    if ($("#NewWebSiteTitle").val().match(/^[a-zA-Z0-9ÆØÅæøå\s]/) && $("#NewWebSiteDescription").val().match(/^[a-zA-Z0-9ÆØÅæøå\s]/)) {
        $.ajax({
            url: '../../../admin/administration-logic.php',
            type: 'post',
            data: 
                { 
                    "val": "newWebSite",
                    "title": $("#NewWebSiteTitle").val(),
                    "location": location,
                    "description": $("#NewWebSiteDescription").val()
                },
            success: function(response) {
                console.log("Log me please " + response);
                var temp = response.split(",");
                window.location.replace("../../../admin/administration.php?id=" + temp[0] + "&title=" + temp[1]);
            }
        });
    } else {
        $("#userInputRegex").show();
        ShowAlertTextBox(500, 1000);
    }
}

var isHidden = true;
function SlideMeUp(location){
    
  if (isHidden === true) 
  {
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
            
            if (response.includes("Connection Failed:")) {
            
                $("#CarouselIndicators").append('<div class="carousel-item active"><div class="container-fluid"><div class="row"><p class="text-center w-100 h1 text-capitalize">THE DATABASE IS EMPTY</p></div></div></div>');
                
                
                $('#SlideMeUp').show();
                $('#SlideMeUp').animate({ height: '279px' }, 1000);
                isHidden = false;
                
            }else{
                
                var tempArray = JSON.parse(response);
            
                console.log("test " + tempArray);

                
                $("#CarouselIndicators").append(tempArray[0]);
                $("#WebsitesCarouselInner").append(tempArray[1]);
                
                
                $('#SlideMeUp').show();
                $('#SlideMeUp').animate({ height: '279px' }, 1000);
                isHidden = false;
            }
        }
    });

  }
  else if(isHidden === false)
  {
    $('#SlideMeUp').animate({ height: '0px' }, 1000);
    isHidden = true;
    setTimeout(function(){$("#WebsitesCarouselInner > div").remove(); $("#CarouselIndicators > li").remove();},1000);

  }
  else
  {
    console.log("not possible");
  }
}

function ChangeActiveWebsite(websiteID,location) {

    var iconToBeReplacedOnSuccess = event.target;
    console.log(iconToBeReplacedOnSuccess);

    if (iconToBeReplacedOnSuccess.classList.contains("fa-eye-slash")) {
        $.ajax({
            url: '../../../admin/administration-logic.php',
            type: 'post',
            data: 
                { 
                    "val": "changeActiveWebsite",
                    "website": websiteID,
                    "location": location
                },
            success: function(response) {
    
                // if response = 1 then changes icon else console log error
                if (response == 1) {
    
                    // get the old icons and replaces the with eye-slash
                    $(".fa-eye").replaceWith('<i class="fas fa-eye-slash"></i>');
    
                    // replaces the old icon with the new
                    $(iconToBeReplacedOnSuccess).replaceWith('<i class="fas fa-eye activeWebsite"></i>');
                }
    
                console.log(response);
            }
        });
    }
}