@extends('theme.layout.app')
@section('content')
<crear-anuncio :usuario="{{ json_encode(auth()->user()) }}">

</crear-anuncio>
@endsection


@section('scripts')
<script>
   
</script>
@endsection