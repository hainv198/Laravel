<h1>List</h1>

<a href="{{route('courses.create')}}">Add new</a>
<br>
<table border="1" width="70%">

    <caption>
        <form>
          Search <input type="search" name="q" value="{{$search}}">
        </form>
    </caption>

    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Create At</th>
        <th>Edit</th>
        <th>Delete</th>


    </tr>
    @foreach($data as $each)
        <tr>
            <td>{{$each -> id}}</td>
            <td>{{$each -> name}}</td>
            <td>{{$each -> created_at -> format('Y-m-d') }}</td>
            <td>
                <a href="{{route('courses.edit', ['course' => $each -> id])}}">Edit</a>
            </td>
            <td>
                <form action="{{route('courses.destroy', ['course' => $each -> id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </td>

        </tr>
    @endforeach
</table>

{{ $data->links() }}
