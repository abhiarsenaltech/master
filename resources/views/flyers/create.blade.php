@inject('countries','App\Http\Utilities\Country')
@extends('layout')
@section('content')
    @if(count($errors)>0)
        <div>
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
        </div>
    @endif

    <h2>Selling Your Home..!!</h2>
    <hr>
    <div class="row">
        <form enctype="multipart/form-data" method="POST" action="{{url('flyers')}}">
            {{ csrf_field() }}
            @include('flyers.form')
        </form>
    </div>
@stop
