



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Summary</title>
    </head>
    <body>
        @php     
            $url = URL('/').'/orders';
            $name = $name;
        @endphp

        <div class="container">
            <div class="col-md-6">
                <div class="jumbotron">
                    <h2><b>Hello {!! $name !!},</b></h2>
                    <h3 style="font-family: sans-serif;"><strong style="font-weight: 100;">
                    Your order has been placed, we delivered product shortly.<br>
                    Thank you for purchasing with us.<br>
                    Check your product status, click the link below.
                    <a href="{!! $url !!}" target="_blanks" class="btn btn-success">Delivery Status</a>
                </div>
            </div>  
        </div>  
    </body>
</html>




