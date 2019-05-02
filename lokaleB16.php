<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div id="content" style="width: 100%;height: 100%;">

    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script>
        $(document).ready(function () { 
            $.ajax({
                url: './admin/administration-logic.php',
                type: 'post', 
                data: 
                { 
                    "val" : "getWebsiteElementsOnSiteID",
                    "siteID" : 16
                },
                success: function(response) { 
                    console.log(response);
                    $("#content").empty();
                    $("#content").append(response);
                }
            });
         });
    </script>
</body>
</html>