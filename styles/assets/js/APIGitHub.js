// Get latest version from api.github.com
function GetReleaseUpdate() {
    // Latest Repository JSON response.
    var apiUrl = 'https://api.github.com/';
    var apiKey = 'repos/Alexander4881/hovedforlob-info-skaerm/releases/latest';
    var insertUrl = '#GitHubAPI a';
    var insertTagName = '#APIRelease';

    $.ajax({
        url: apiUrl + apiKey,
        contentType: "application/json",
        dataType: 'json',
        error: function(){
            var errorUrl = 'https://github.com/Alexander4881/hovedforlob-info-skaerm/releases'
            var errorMessage = 'Could not get release.';

            $(insertUrl).prop('href', errorUrl);
            $(insertTagName).removeClass("bg-success").addClass("bg-danger");
            $(insertTagName).append(errorMessage);
        },
        success: function(apiResult){
            var htmlUrl = apiResult.html_url;
            var tagName = apiResult.tag_name;
            
            $(insertUrl).prop('href', htmlUrl);
            $(insertTagName).append(tagName);
        }
    });
};

function loading() {
    $('.circle-loader').toggleClass('load-complete');
    $('.checkmark').toggle();
    setTimeout(function(){
        $('.circle-loader').toggleClass();
        $('.checkmark').toggle();
        GetReleaseUpdate();
        $('')
    }, 2000);
};

setTimeout(loading, 1500);