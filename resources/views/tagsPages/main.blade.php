@extends('template.default')


@section('content')

<div class="container">
    <h2>Tags CRUD Table</h2>

    <td><a href="{{ route('tag.create') }}" class="btn btn-primary">Add New</a></td>

        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
 
                    <th>Created at</th>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td> <a href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a> </td>

                        <td>{{ date('Y-m-d', strtotime($tag->created_at)) }}</td>
                        <td><a href="{{ route('tag.edit', $tag->id) }}"
                                class="btn btn-primary">Edit</a></td>
                        <td>
                            <form
                                action="{{ route('tag.destroy', $tag->id)}}"
                                method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $tags->links() }}
</div>




@endsection