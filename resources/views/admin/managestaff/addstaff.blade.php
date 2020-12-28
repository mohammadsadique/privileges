@component('components.admin.master')
@section('main-section')



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
                @if(session()->has('error2'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fas fa-skull-crossbones"></i> Alert!</h5>                                       
                    {{ session()->get('error2') }}
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Alert!</h5>
                    {{ session()->get('success') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="fas fa-skull-crossbones"></i> Alert!</h5>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">@if(session()->has('ban')) {{ 'Update Staff' }}@else{{ 'Add New Staff'}}@endif</h3>
                    </div>
                    <form action="{{route('subaddstaff')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="updval" value="@if(session()->has('ban')){{session()->get('ban')->id}}@endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="@if(session()->has('ban')){{session()->get('ban')->name}}@endif{{old('name')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <div class="input-group">
                                            <input type="text" name="mobile" value="@if(session()->has('ban')){{session()->get('ban')->mobile}}@endif{{old('mobile')}}" class="form-control" data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                data-mask="" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" value="@if(session()->has('ban')){{session()->get('ban')->email}}@endif{{old('email')}}" class="form-control" placeholder="Enter ..." @if(session()->has('ban')){{ 'readonly' }}@endif >
                                    </div>
                                </div>                                
                                @if(empty(session()->has('ban')))
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm" value="{{old('confirm')}}" class="form-control"
                                            placeholder="Enter ...">
                                    </div>
                                </div>                                
                                @endif
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="customFile">Change Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        @if(session()->has('ban'))
                                        <img src="{{url('/')}}/public/img/staff/{{session()->get('ban')->image}}" alt="staff" class="img-responsive imgtag" style="width: 149px;height: 52px;">
                                        @else
                                        <img src="{{url('/')}}/adminlte3/dist/img/AdminLTELogo.png" alt="staff" class="img-responsive imgtag" style="width:128px;height:128px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="4" placeholder="Enter ...">@if(session()->has('ban')){{session()->get('ban')->address}}@endif{{old('address')}}</textarea>
                                    </div>
                                </div>
                                @if(session()->has('ban'))
                                <div class="col-md-12"><a href="#" class="resetpass">Reset Password?</a></div>
                                <div class="col-sm-6 chanpass">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6 chanpass">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="confirm" value="{{old('confirm')}}" class="form-control"
                                            placeholder="Enter ...">
                                    </div>
                                </div>   
                                @endif  
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addstaff" class="btn btn-primary">@if(session()->has('ban')) {{ 'Update Staff' }}@else{{ 'Add Staff'}}@endif</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>

    </div>
</section>
@endsection
@section('customjsfile')
    <script>
    $(function(){
        $('.chanpass').css({'display':'none'});
        $(document).on('click', '.resetpass', function(e) {
            e.preventDefault();
            $('.chanpass').css({'display':'block'});
            $(this).html('Not Reset Password.');
            $(this).removeClass('resetpass');
            $(this).addClass('notresetpass');
        });
        $(document).on('click', '.notresetpass', function(e) {
            e.preventDefault();
            $('.chanpass').css({'display':'none'});
            $(this).html('Reset Password?');
            $(this).removeClass('notresetpass');
            $(this).addClass('resetpass');
        });
    });
    </script>
@endsection
@endcomponent