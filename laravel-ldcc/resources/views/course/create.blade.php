<form action="{{route('courses.store')}}" method="post">
    @csrf
    Name
    <input type="text" name="name">
    <br>
    <button>Submit</button>
</form>
