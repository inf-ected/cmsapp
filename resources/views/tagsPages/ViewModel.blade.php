@extends('template.default')

@section('content')


    <div class="container">

        <h2>{{ $title }}</h2>
        <form action="
             @if ($title == 'Edit Existing Tag')
                {{ route('tag.update', $tag->id) }}
                "
                method="post">
                @method('PATCH')
            @endif
            @if ($title == 'Create New Tag')
            {{ route('tag.store', $tag->id) }}
            "
            method="post">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" type="text" placeholder="name"
                            value="{{ $tag->name ?? '' }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
               
                <button type="submit" class="btn btn-primary"
                    {{ $title == 'Create New Tag' || $title == 'Edit Existing Tag' ? '' : 'disabled' }}>Submit</button>
            </div>


        </form>


    </div>




@endsection
