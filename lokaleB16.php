<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name=”viewport” content=”width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;” />
    <meta name=”viewport” content=”width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=false;” />
    <meta name=”viewport” content=”width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;” />
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <title>Document</title>
</head>

<body style="width: 1920px;height: 1080px;">
    <div id="content" style="width: 100%;height: 100%;">

    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script>
    $(document).ready(function() {
        setInterval(() => {
            console.log("ran");
            $.ajax({
                url: './admin/administration-logic.php',
                type: 'post',
                data: {
                    "val": "getWebsiteElementsOnSiteID",
                    "siteID": 16
                },
                success: function(response) {
                    console.log("update");
                    $("#content").empty();
                    $("#content").append(response);
                }
            });
        }, 10000);
    });
    </script>
</body>

</html>