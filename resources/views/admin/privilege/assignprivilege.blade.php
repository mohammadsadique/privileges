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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Assign Privilege</h3>
                    </div>
                    <div class="card-body">
                        <table class="example1 table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
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
    </div>
</section>
<form method="post" action="{{ route('subassignpri') }}" class="sub_pri">
    @csrf
    <input type="hidden" class="id" name="id">
</form>

@endsection
@section('customjsfile')
    <script>  
    $(document).on('click', '.assignpri', function(e) {
        e.preventDefault();
        var id = $(this).val();
        const staffname = $(this).parent('td').siblings('td').children('.staffname').val();
        if (window.confirm("Are you sure, you want to Assign Privileges to `"+staffname+"`?")) {
            $('input.id').attr('value', id);
            $('.sub_pri').submit();
        }
    });


    </script>
@endsection
@endcomponent