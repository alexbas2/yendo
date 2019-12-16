@extends('theme.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Unco.Yendo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        <div class="col-12 col-lg-12 mx-auto mb-12 mb-lg-0">
            <div class="pr-lg-5"><img src="{{asset('theme/img/home.jpg')}}" alt="home" class="img-fluid"></div>
        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
