<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Give Feedback</title>
    </head>
    <body>
        @php     
            $linkid = encrypt($linkid);
            $userid = encrypt($userid);
            $buyproductid = encrypt($buyproductid);
            $url = URL('/').'/reviews/'.$buyproductid.'/'.$userid.'/'.$linkid;
            $name = $name;
        @endphp
        <div class="container">
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2><b>Hello {!! $name !!},</b></h2>
                    <h3 style="font-family: sans-serif;"><strong style="font-weight: 100;">Please give us feedback <br>
                    Click the link below.</strong></h3>
                    <a href="{!! $url !!}" target="_blanks" class="btn btn-success">Click To Give Feedback</a>
                </div>
            </div>  
        </div>  
    </body>
</html>