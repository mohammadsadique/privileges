@component('components.admin.master')
@section('main-section')
<!-- 

<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Launch Default Modal
                </button> -->
    
    
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
            <div class="modal fade" id="newmodule">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">@if(session()->has('ban')) {{ 'Update Module' }}@else{{ 'Add Module'}}@endif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('subaddmodule')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="id" name="id" value="@if(session()->has('ban')){{session()->get('ban')->id}}@endif">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Module Name</label>
                                        <input type="text" name="module" value="@if(session()->has('ban')){{session()->get('ban')->module}}@endif{{old('module')}}" class="form-control module" placeholder="Enter ...">
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">@if(session()->has('ban')) {{ 'Update Module' }}@else{{ 'Add Module'}}@endif</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">@if(session()->has('ban')) {{ 'Update Module' }}@else{{ 'Add Module'}}@endif</h3>
                    </div>
                    <form action="{{route('subaddmodule')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@if(session()->has('ban')){{session()->get('ban')->id}}@endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Module Name</label>
                                        <input type="text" name="module" value="@if(session()->has('ban')){{session()->get('ban')->module}}@endif{{old('module')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addmodule" class="btn btn-primary">@if(session()->has('ban')) {{ 'Update Module' }}@else{{ 'Add Module'}}@endif</button>
                        </div>
                    </form>
                </div>
            </div> -->
           
            <div class="col-md-6">
                <button type="submit" class="btn btn-danger" style="margin-bottom: 10px;" data-toggle="modal" data-target="#newmodule"><i class="fas fa-plus"></i> Add New Module</button>
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
            
            <div class="col-md-6">
                <button type="submit" class="btn btn-danger" style="margin-bottom: 10px;" data-toggle="modal" data-target="#newsubmodule"><i class="fas fa-plus"></i> Add New Sub Module</button>
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
        <hr>
        <div class="row">

            <div class="modal fade" id="newsubmodule">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">@if(session()->has('ban2')) {{ 'Update Sub Module' }}@else{{ 'Add Sub Module'}}@endif</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{route('subaddsubmodule')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@if(session()->has('ban2')){{session()->get('ban2')->id}}@endif">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Module </label>
                                        <select name="selmodule" class="form-control select2 categ"
                                            style="width: 100%;">
                                            @if(session()->has('ban3'))
                                                @if(session()->get('ban3') == '')                   
                                                    <option value="nomodule">No Module</option>
                                                @else
                                                    <option value="{{session()->get('ban3')->id}}">{{session()->get('ban3')->module}}</option>
                                                @endif
                                            @endif
                                            {!! $mod !!}                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Sub Module Name</label>
                                        <input type="text" name="submodule" value="@if(session()->has('ban2')){{session()->get('ban2')->submodule}}@endif{{old('submodule')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">@if(session()->has('ban2')) {{ 'Update Sub Module' }}@else{{ 'Add Sub Module'}}@endif</button>
                        </div>
                    </form>

                </div>
                </div>
            </div>
            <!-- <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">@if(session()->has('ban2')) {{ 'Update Sub Module' }}@else{{ 'Add Sub Module'}}@endif</h3>
                    </div>
                    <form action="{{route('subaddsubmodule')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="@if(session()->has('ban2')){{session()->get('ban2')->id}}@endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Module </label>
                                        <select name="selmodule" class="form-control select2 categ"
                                            style="width: 100%;">
                                            @if(session()->has('ban3'))
                                                @if(session()->get('ban3') == '')                   
                                                    <option value="nomodule">No Module</option>
                                                @else
                                                    <option value="{{session()->get('ban3')->id}}">{{session()->get('ban3')->module}}</option>
                                                @endif
                                            @endif
                                            {!! $mod !!}                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Sub Module Name</label>
                                        <input type="text" name="submodule" value="@if(session()->has('ban2')){{session()->get('ban2')->submodule}}@endif{{old('submodule')}}" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>                                 
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addsubmodule" class="btn btn-primary">@if(session()->has('ban2')) {{ 'Update Sub Module' }}@else{{ 'Add Sub Module'}}@endif</button>
                        </div>
                    </form>
                </div>
            </div> -->
            
        </div>
    </div>
</section>
<form method="post" action="{{route('delmodule')}}" class="sub_del">
    @csrf 
    <input type="hidden" class="id_val" name="id">
</form>
<form method="post" action="{{route('delsubmodule')}}" class="sub_del2">
    @csrf 
    <input type="hidden" class="id_val" name="id">
</form>
<form method="post" action="{{route('updmodule')}}" class="sub_upd">
    @csrf
    <input type="hidden" class="upd_val" name="id">
</form>
<form method="post" action="{{route('updsubmodule')}}" class="sub_upd2">
    @csrf
    <input type="hidden" class="upd_val" name="id">
</form>
<form method="post" action="{{ route('hidemodule') }}" class="sub_unavail">
    @csrf
    <input type="hidden" class="p1id" name="id">
</form>
<form method="post" action="{{ route('showmodule') }}" class="sub_avail">
    @csrf
    <input type="hidden" class="p1id2" name="id">
</form>
<form method="post" action="{{ route('hidesubmodule') }}" class="sub_unavail2">
    @csrf
    <input type="hidden" class="p1id" name="id">
</form>
<form method="post" action="{{ route('showsubmodule') }}" class="sub_avail2">
    @csrf
    <input type="hidden" class="p1id2" name="id">
</form>
@endsection
@section('customjsfile')
    <script>   
    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).val();
        const modulename = $(this).parent('div').parent('td').siblings('td').children('.modulename').val();
        if (window.confirm("Are you sure, you want to delete `"+modulename+"`?")) {
            $('input.id_val').attr('value', id);
            $('.sub_del').submit();
        }
    });
    $(document).on('click', '.delete2', function(e) {
        e.preventDefault();
        var id = $(this).val();
        const submodulename = $(this).parent('div').parent('td').siblings('td').children('.submodulename').val();
        if (window.confirm("Are you sure, you want to delete `"+submodulename+"`?")) {
            $('input.id_val').attr('value', id);
            $('.sub_del2').submit();
        }
    });       
    $(document).on('click', '.upd', function(e) {
        e.preventDefault();
        var id = $(this).val();
        //$('input.upd_val').attr('value', id);
       // $('.sub_upd').submit();

        let token = $('.token').val();
        $.ajax({
            'url': '{{route('updmodule')}}',
            'type': 'post',
            data: {
                'id': id,
                _token: token            },
            success: function(msg) {
               $('.id').val(msg.id)
               $('.module').val(msg.module)
            }
        });
    });      
    $(document).on('click', '.upd2', function(e) {
        e.preventDefault();
        var id = $(this).val();
        $('input.upd_val').attr('value', id);
        $('.sub_upd2').submit();
    }); 
        $(document).on('click', '.available', function(e) {
            e.preventDefault();
            var id = $(this).val();
            const modulename = $(this).parent('td').siblings('td').children('.modulename').val();
            if (window.confirm("Are you sure, you want to Hide `"+modulename+"` Module?")) {
                $('input.p1id').attr('value', id);
                $('.sub_unavail').submit();
            }
        });
        $(document).on('click', '.unavailable', function(e) {
            e.preventDefault();
            var id = $(this).val();
            const modulename = $(this).parent('td').siblings('td').children('.modulename').val();
            if (window.confirm("Are you sure, you want to Show `"+modulename+"` Module?")) {
                $('input.p1id2').attr('value', id);
                $('.sub_avail').submit();
            }
        });
        $(document).on('click', '.available2', function(e) {
            e.preventDefault();
            var id = $(this).val();
            const submodulename = $(this).parent('td').siblings('td').children('.submodulename').val();
            if (window.confirm("Are you sure, you want to Hide `"+submodulename+"` Sub Module?")) {
                $('input.p1id').attr('value', id);
                $('.sub_unavail2').submit();
            }
        });
        $(document).on('click', '.unavailable2', function(e) {
            e.preventDefault();
            var id = $(this).val();
            const submodulename = $(this).parent('td').siblings('td').children('.submodulename').val();
            if (window.confirm("Are you sure, you want to Show `"+submodulename+"` Sub Module?")) {
                $('input.p1id2').attr('value', id);
                $('.sub_avail2').submit();
            }
        });
    </script>
@endsection
@endcomponent