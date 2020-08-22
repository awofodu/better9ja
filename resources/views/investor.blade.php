@extends('layouts.investor')

@section('content')
    <router-view></router-view>

    <vue-progress-bar></vue-progress-bar>

    @if(session('status_err'))


        <script>
            Swal.fire({{session('status_err')}});
        </script>

    @endif
@endsection
