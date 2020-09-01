@extends('template.default')

@section('content')

    <div class="container">
        <h2>Video Content Page CRUD table</h2>

        <td><a href="{{ route('videopage.create') }}" class="btn btn-primary">Add New</a></td>

        <table class="table table-bordered" id="laravel_crud">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>URL</th>
                    <th>Description</th>
                    <th>Published</th>
                    <th>Created at</th>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td> <a href="{{ route('videopage.show', $page->id) }}">{{ $page->title }}</a> </td>
                        <td>{{ $page->url }}</td>
                        <td>{{ $page->description }}</td>
                        <td>{{ $page->published ? 'YES' : 'NO' }}</td>
                        <td>{{ date('Y-m-d', strtotime($page->created_at)) }}</td>
                        <td><a href="{{ route('videopage.edit', $page->id) }}"
                                class="btn btn-primary">Edit</a></td>
                        <td>
                            <form
                                action="{{ route('videopage.destroy', $page->id)}}"
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
<div class="container ">
    {{ $pages->links() }}
</div>
    </div>

@endsection
