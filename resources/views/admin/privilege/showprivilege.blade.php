@component('components.admin.master')
@section('main-section')


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


            <div class="col-md-4">
                <br>                
                <div class="card card-success">
                  <div class="card-header">       
                    <div class="icheck-default d-inline" >
                      <input type="checkbox" value="3" id="tabname" class="selectall">
                      <label for="tabname"><h3 class="card-title">Tab Name</h3></label>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" name="3" id="checkboxPrimary1">
                            <label for="checkboxPrimary1">Primary checkbox</label>
                          </div>                     
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" name="3" id="checkboxDanger1">
                            <label for="checkboxDanger1">Primary checkbox</label>
                          </div>                     
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" name="3" id="checkboxSuccess1">
                            <label for="checkboxSuccess1">Primary checkbox</label>
                          </div>                     
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div> 
            <div class="col-md-4">
                <br>                
                <div class="card card-success">
                  <div class="card-header">       
                    <div class="icheck-default d-inline" >
                      <input type="checkbox" value="2" id="tabname2" class="selectall">
                      <label for="tabname2"><h3 class="card-title">Tab Name 2</h3></label>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" name="2" id="2a">
                            <label for="2a">Primary checkbox 2</label>
                          </div>                     
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" name="2" id="2b">
                            <label for="2b">Primary checkbox 2</label>
                          </div>                     
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group clearfix">
                          <div class="icheck-success d-inline">
                            <input type="checkbox" name="2" id="2c">
                            <label for="2c">Primary checkbox 2</label>
                          </div>                     
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>               
        </div>
    </div>
</section>

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
            //console.log(tabname)
            if ($(this).is(':checked')) {
              $('input[name='+tabname+']').prop('checked', true);
            } else {
                $('input[name='+tabname+']').prop('checked', false);
            }
        });

    </script>

@endsection




@endcomponent