$(document).ready(function() {
    $("#userInputRegex").hide();
});

function ShowAlertTextBox(easeInTimeInMilliSeconds,timeOpenInMilliSeconds) {
    $("#userInputRegex").fadeIn(easeInTimeInMilliSeconds,"swing");
    setTimeout(function() {
        $("#userInputRegex").fadeOut(easeInTimeInMilliSeconds,"swing");
    },timeOpenInMilliSeconds);
}

function NewWebSite(location) {
    $("#NewWebsiteTitle").text(location);
    $("#NewWebsite").modal();
    $("#NewWebSite").unbind();
    $("#NewWebSite").click(function() {
        var pattern = /^[a-zA-Z0-9æøåÆØÅ]+$/;
        var userTitle = $("#NewWebSiteTitle").val();
        var userDesc = $("#NewWebSiteDescription").val();
    if (pattern.test(userTitle) && pattern.test(userDesc)) {
            $.ajax({
                url: '../../../admin/administration-logic.php',
                type: 'post',
                data:
                    {
                        "val": "newWebSite",
                        "title": $("#NewWebSiteTitle").val(),
                        "location": location,
                        "description": $("#NewWebSiteDescription").val(),
                        "isTemplate": document.getElementById("IsTemplate").checked
                    },
                success: function(response) {
                    var temp = response.split(",");
                    window.location.replace("../../../admin/administration.php?id=" + temp[0] + "&title=" + temp[1]);
                }
            });
        }else {
            $("#userInputRegex").show();
            ShowAlertTextBox(500, 1000);
        }
    });
}

var isHidden = true;
function SlideMeUp(location) {
  if (isHidden === true) {
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
                $("#WebsitesCarouselInner").append('<div class="carousel-item active"><div class="container-fluid"><div class="row"><p class="text-center w-100 h1 text-capitalize">No Database Connection</p></div></div></div>');                
                $('#SlideMeUp').show();
                $('#SlideMeUp').animate({ height: '279px' }, 1000);
                isHidden = false;
            }else {
                var tempArray = JSON.parse(response);
                $("#CarouselIndicators").append(tempArray[0]);
                $("#WebsitesCarouselInner").append(tempArray[1]);
                $("#WebsitesCarouselInner .carousel-item").eq(0).addClass("active");
                $('#SlideMeUp').show();
                $('#SlideMeUp').animate({ height: '279px' }, 1000);
                isHidden = false;
            }
        }
    });
  }else if(isHidden === false) {
    $('#SlideMeUp').animate({ height: '0px' }, 1000);
    isHidden = true;
    setTimeout(function() {
        $("#WebsitesCarouselInner > div").remove(); $("#CarouselIndicators > li").remove();
    }, 1000);
  }else {
    console.log("not possible");
  }
}

function ChangeActiveWebsite(websiteID,location) {
    var iconToBeReplacedOnSuccess = event.target;
    //console.log(iconToBeReplacedOnSuccess);
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