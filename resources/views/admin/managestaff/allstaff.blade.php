@component('components.admin.master')
@section('main-section')



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <br>
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
                        <h3 class="card-title">Our Categories</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Date-Time</th>
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

<form method="post" action="{{ route('delstaff') }}" class="sub_del">
    @csrf
    <input type="hidden" class="id_val" name="delid">
</form>
<form method="post" action="{{ route('updstaff') }}" class="sub_upd">
    @csrf
    <input type="hidden" class="upd_val" name="upd">
</form>
@endsection

@section('customjsfile')
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).val();
            if (window.confirm("Are you sure, you want to delete?")) {
                $('input.id_val').attr('value', id);
                $('.sub_del').submit();
            }
        });
        $(document).on('click', '.upd', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('input.upd_val').attr('value', id);
            $('.sub_upd').submit();
        });
   </script>
@endsection 
@endcomponent