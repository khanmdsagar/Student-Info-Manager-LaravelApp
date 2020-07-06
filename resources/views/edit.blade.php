@extends('layouts.app')
@section('title','Update Page')

@section('content')

 <!--insert Modal-->
 <div class="app">
   <div class="container center">    
    <div class="box p-all20 text-center bg-white width400px round-br5" >
     <form action="{{ url('/editData', [$result->id] )}}" method="POST" enctype="multipart/form-data">
      @csrf
            <div class="ImageUpload">
                <div class="profileImageSection">
                  <input name="imageFile" type="file" onchange="preview(event)" id="profileInputFile" hidden="hidden">
                  <img class="profileImageView" id="profileImageView" src="{{asset('photos').'/'.$result->photoPath}}">
                  <span onclick="preview(event)" id="profileCamera" class="profileCamera material-icons">camera_alt</span>
                </div>
            </div>
            
            <input required name="name" value="{{ $result -> name}}" id="fullname" class="width200px m-top10 input br-gray input-focus-blue" type="text" placeholder="Full Name"><br>
            <input required name="roll" value="{{ $result -> roll}}" id="roll" class="width200px m-top10 input br-gray input-focus-blue" type="text" placeholder="Roll"><br>
            <input required name="class" value="{{ $result -> class}}" id="class" class="width200px m-top10 input br-gray input-focus-blue" type="text" placeholder="Class"><br>
            <input type="submit" value="Update" class="Width200 m-top10 m-bottom10 btn bg-green fwhite">
       </form>
     </div>
   </div>
</div>

@endsection