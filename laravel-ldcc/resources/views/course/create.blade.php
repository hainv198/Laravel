
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('courses.store')}}" method="post">
    @csrf
    Name
    <input type="text" name="name">
    <br>
    <button>Submit</button>
</form>
