
<form action="{{route('additions.update',$addition->id)}}" method="post">
    @csrf

    <input type="text" name="name" placeholder="addition name" value="{{old('name') ?? $addition->name}}">

    <input type="number" name="price" placeholder="addition price" value="{{old('price') ?? $addition->price}}">
    <input type="submit">

</form>

