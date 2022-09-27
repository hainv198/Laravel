<form action="{{route('courses.update', $course)}}" method="post">
    @csrf
    @method('PUT')
    Name
    <input type="text" name="name" value="{{$course -> name}}">
    <br>
    <button>Update</button>

</form>
