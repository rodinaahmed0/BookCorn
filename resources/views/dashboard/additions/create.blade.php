<form action="{{route('additions.store')}}" method="post">
    @csrf


    <input type="text" name="name" placeholder="addition name">

    <input type="number" name="price" placeholder="addition price">




    <input type="submit">
</form>
