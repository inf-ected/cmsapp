@extends('template.default')

@section('content')


    <div class="container">

        <h2>{{ $title }}</h2>
        <form action="
             @if ($title == 'Edit Existing Video Page')
                {{ route('videopage.update', $page->id) }}
                "
                method="post">
                @method('PATCH')
            @endif
            @if ($title == 'Create New Video Page')
            {{ route('videopage.store', $page->id) }}
            "
            method="post">
            @endif
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" class="form-control" type="text" placeholder="title"
                            value="{{ $page->title ?? '' }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input name="url" class="form-control" type="text" placeholder="url" value="{{ $page->url ?? '' }}">
                        <span class="text-danger">{{ $errors->first('url') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description"></label>
                        <textarea name="description" id="description" rows="10"
                            class="form-control">{{ $page->description ?? 'put some code here' }}
                        </textarea>
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="p1">Published</label>
                        <input type="radio" name="published" value="1" id="p1" @isset($page)
                        {{ $page->published == 1 ? 'checked="checked"' : '' }}>
                        @endisset 

                        <label for="p0">Not Published</label>
                        <input type="radio" name="published" value="0" id="p0" @if (isset($page))
                        {{ $page->published == 0 ? 'checked="checked"' : '' }}>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"
                    {{ $title == 'Create New Video Page' || $title == 'Edit Existing Video Page' ? '' : 'disabled' }}>Submit</button>
            </div>
        </form>
    </div>

@endsection
