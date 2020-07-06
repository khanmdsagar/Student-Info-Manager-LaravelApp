@extends('layouts.app')
@section('title','Home Page')

@section('content')
<div class="app p-all10">

<!--add button-->
<div class="addSearch flex-space-between m-top20">
    <div class="anchorAdd flex-center">
        <a href="{{url('/insertPage')}}" class="button md-24 material-icons">library_add</a>
    </div>
    <div class="inputSearch flex-center">
        <form action="{{ url('/search') }}" method="get">
            <input name="name" type="text" placeholder="Search here..." class="input br-gray input-focus-blue">
        </form>
    </div>
</div>

<div class="m-top20 flex-end">
    {{ $collection->links() }}
</div>

<div class="relative">

    @if (session('status'))
        <div class="success-alert m-top10">
            <span class="close-btn material-icons" onclick="this.parentElement.style.display='none';">close</span> 
            {{session('status')}}
        </div>
    @endif
 
<div class="mobile-xscroll">
<!--table-->
<table class="table m-top20 bg-white tr-bottom-blue">
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Roll</th>
        <th>Class</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    @foreach ($collection as $item)
    <tr class="table-hover">
        <td><img style="border-radius: 50%" width="50px" height="50px" src="{{asset('photos').'/'.$item->photoPath}}"></td>
        <td>{{$item->name}}</td>
        <td>{{$item->roll}}</td>
        <td>{{$item->class}}</td>
        <td><a style="border-radius: 50%" href="{{ url('/editPage', [$item->id]) }}" class="btn bg-blue fwhite material-icons">edit</a></td>
        <td><button style="border-radius: 50%" onclick="deleteItem( {{$item->id}} )" class="btn bg-red fwhite material-icons">delete</button></td>
        <!--
        <td><a href="{{ url('/deleteData', [$item->id]) }}" class="btn bg-red fwhite material-icons">delete</a></td>
        -->
    </tr>
    @endforeach
</table>

</div>

<script type="text/javascript">

function deleteItem(id){
    var r = confirm("Do you want to delete?")
    if(r == true){
       location.href = '/deleteData/'+ id
    }
}

</script>
</div>
</div>
@endsection