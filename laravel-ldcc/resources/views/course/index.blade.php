@extends('layout.master')

@section('content')


<h1>List</h1>

<a class="btn btn-success" href="{{route('courses.create')}}">Add new</a>
<br>
<br>
<caption>
    <form>
        Search <input type="search" name="q" value="{{$search}}">
    </form>
</caption>
<br>
<br>

<table  width="70%" class="table table-striped table-centered mb-0 ">



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
                <a class="btn btn-primary p-2" href="{{route('courses.edit', ['course' => $each -> id])}}">Edit</a>
            </td>
            <td>
                <form
                    class=""
                    action="{{route('courses.destroy', ['course' => $each -> id])}}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>
    @endforeach
</table>
<nav>
    <ul class="pagination pagination-rounded mb-0">
        {{ $data->links() }}
    </ul>
</nav>



@endsection
