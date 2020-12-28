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
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">@if(session()->has('ban')) {{ 'Update Module' }}@else{{ 'Add Module'}}@endif</h3>
                    </div>
                    <form action="{{route('subaddmodule')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="updval" value="@if(session()->has('ban')){{session()->get('ban')->id}}@endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Module Name</label>
                                        <input type="text" name="module" value="@if(session()->has('ban')){{session()->get('ban')->name}}@endif{{old('module')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addmodule" class="btn btn-primary">@if(session()->has('ban')) {{ 'Update Staff' }}@else{{ 'Add Module'}}@endif</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Module</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Module</th>
                                    <th>Date-Time</th>
                                    <th>Show-Hide</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                               {!! $tb !!}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>           
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">@if(session()->has('ban')) {{ 'Update Sub Module' }}@else{{ 'Add Sub Module'}}@endif</h3>
                    </div>
                    <form action="{{route('subaddsubmodule')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="updval" value="@if(session()->has('ban')){{session()->get('ban')->id}}@endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Module </label>
                                        <select name="selmodule" class="form-control select2 categ"
                                            style="width: 100%;">
                                            {!! $mod !!}                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Sub Module Name</label>
                                        <input type="text" name="submodule" value="@if(session()->has('ban')){{session()->get('ban')->name}}@endif{{old('submodule')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addsubmodule" class="btn btn-primary">@if(session()->has('ban')) {{ 'Update Staff' }}@else{{ 'Add Sub Module'}}@endif</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub Module</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Module</th>
                                    <th>Sub Module</th>
                                    <th>Show-Hide</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                               {!! $tb2 !!}
                            </tbody>
                        </table>
                    </div>
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