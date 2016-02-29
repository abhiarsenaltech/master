@extends('layout')
@section('content')

<div class="row">
    <h3>
        {{ $flyer->street }}
    </h3>
    <h3>
        {{ nl2br($flyer->description) }}
    </h3>
    <h3>
        ${!! number_format($flyer->price) !!}
    </h3>
    <div class="row">

        <div class="col-md-12">

            <ul style="display: inline-block;list-style-type: none  ">
                    @foreach($flyer->photos as $photo)
                    <li style="float: left">
                        <form action="{{url('flyers/'.$photo->id)}}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="delete">
                            <input type="submit" value="delete" class="btn-danger">
                        </form>
                        <a href="uploads/{{$photo->photo}}" data-lity>
                            <img src="{{asset('uploads/'.$photo->photo)}}" alt="">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</div>

 <div class="row">

     <form  method="POST" action="{{url('flyers/'.$flyer->zip.'/'.$flyer->street.'/Photos')}}"
           class="dropzone"
           id="addPhotosForm">
         {{ csrf_field() }}
     </form>
 </div>
@stop
@section('scripts.footer')
  <script  src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    {{--Dropzone.options.addPhotosForm={
            paramName:'photo',
            mazFilesize:3,
            acceptedFiles:'.jpg, .png, .jpeg'--}}
    }
    @stop
