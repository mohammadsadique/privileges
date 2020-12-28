<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Change</title>
    </head>
    <body>
        @php     
            $url = URL('/').'/login';
            $name = $name;
        @endphp

        <div class="container">
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2><b>Hello {!! $name !!},</b></h2>
                    <h3 style="font-family: sans-serif;"><strong style="font-weight: 100;">
                    Your password has been changed when you confirm your mail address.<br>
                    please verify your mail-id.<br>
                    Click the link below.</strong></h3>
                    <a href="{!! $url !!}" target="_blanks" class="btn btn-success">Verify Email</a>
                </div>
            </div>  
        </div>  
    </body>
</html>





