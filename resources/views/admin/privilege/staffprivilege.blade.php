@component('components.admin.master')
@section('main-section')


<style>
.snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

.snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12"><br>
              <div class="card card-success">
                  <div class="card-header"> 
                    <div class="icheck-default d-inline">
                      <input type="checkbox" id="checkall">
                      <label for="checkall"><h3 class="card-title">Check All</h3></label>
                    </div>
                  </div>
                </div>
            </div>

                {!! $mod !!}
                 
                        
        </div>
        <div class="row">
          {!! $hr !!}
          {!! $mod2 !!}          
        </div>
    </div>
</section>
<input type="hidden" class="staffid" value="{!! $staff->id !!}">

<div class="snackbar">Some text some message..</div>
@endsection



@section('customjsfile')



    <script>
          $('#checkall').click(function() {
            const tabname = $(this).val();
            //console.log(tabname)
            if ($(this).is(':checked')) {
              $('input:checkbox').prop('checked', true);
            } else {
                $('input:checkbox').prop('checked', false);
            }
        });
        $('.selectall').click(function() {
            const tabname = $(this).val();
            let token = $('.token').val();
            const staffid = $('.staffid').val();
            // console.log(tabname)
            if ($(this).is(':checked')) {
              $('input[name='+tabname+']').prop('checked', true);
              
                          $.ajax({
                              'url': '{{route('assignmodule')}}',
                              'type': 'post',
                              data: {
                                  'id': tabname,
                                  'staffid': staffid,
                                  _token: token            },
                              success: function(msg) {
                                  if(msg === 1){
                                    const ms = 'Assign privileges successfully.';
                                    myFunction(ms)                               
                                  }
                              }
                          });


            } else {
                $('input[name='+tabname+']').prop('checked', false);


                          $.ajax({
                              'url': '{{route('notassignmodule')}}',
                              'type': 'post',
                              data: {
                                  'id': tabname,
                                  'staffid': staffid,
                                  _token: token            },
                              success: function(msg) {
                                  if(msg === 1){
                                    const ms = 'Not assign privileges successfully.';
                                    myFunction(ms)
                                  }
                              }
                          });



            }
        });

        $(document).Toasts('create', {
            class: 'bg-default', 
            title: '{!! $staff->name !!}',
            body: `Email: {!! $staff->email !!} <br>
                    Phone: {!! $staff->mobile !!} 
                    `
        })
        function myFunction(data) {
          var x = document.getElementByClass("snackbar");
          x.innerHTML(data)
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }

    </script>

@endsection




@endcomponent