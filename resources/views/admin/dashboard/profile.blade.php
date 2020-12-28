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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Change Your Profile</h3>
                    </div>
                    <form action="{{route('subprofile')}}" role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="updval" 
                        value="@if (!empty($wc)) {{ $wc->id }} @endif">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="@if (!empty($wc)) {{ $wc->name }} @endif" class="form-control"
                                            placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <div class="input-group">
                                            <input type="text" name="mobile" value="@if (!empty($wc)) {{ $wc->mobile }} @endif" class="form-control"
                                                data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                data-mask="" im-insert="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" value="@if (!empty($wc)) {{ $wc->email }} @endif" class="form-control"
                                            placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="customFile">Change Image</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        @if (!empty($wc))
                                        <img src="{{url('/')}}/public/img/staff/{{$wc->image}}" alt="Your Image" class="img-responsive imgtag" style="width: 60px;height: 60px;">
                                        @else
                                        <img src="{{url('/')}}/adminlte3/dist/img/AdminLTELogo.png" alt="Your Logo" class="img-responsive imgtag" style="width:128px;height:128px;">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" rows="4" placeholder="Enter ...">@if (!empty($wc)) {{ $wc->address }} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="addbasicchange" class="btn btn-primary">Submit Changes</button>
                        </div>
                    </form>
                </div>
            </div>            
        </div>

    </div>
</section>
@endsection
@endcomponent