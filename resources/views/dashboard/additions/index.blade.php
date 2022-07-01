@foreach ($additions as $addition)
<p>This is {{ $addition->name }}</p>
<p> {{ $addition->price }}</p>




<form method="post" action="{{route('additions.delete',$addition->id)}}">
@method("delete")
@csrf
<input type="submit" value="delete">
</form>
<a href="{{route('additions.edit',$addition->id)}}">edit</a>
@endforeach
<a href="{{route('additions.create')}}">Add addition please</a>
