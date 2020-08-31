@extends('template.default')

@section('content')


    <div class="container">

    <h2>{{ $title }}</h2>
        <form action="
        @if ($title=='Create New Static Page')
        {{ route('stpage.store') }} 
        "
        method="post">
        @endif
        @if ($title=='Edit Existing Page')
        {{ route('stpage.update',$page->id) }}
        "
        method="post">
        @method('PATCH') 
        @endif
            
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" class="form-control" type="text" placeholder="title"
                            value="{{ $page->title ?? '' }}">
                        <span class="text-danger">{{ $errors->first('title') }}</span>
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
                        <label for="content"></label>
                        <textarea name="content" id="content" rows="10" class="form-control">{{ $page->content ?? 'put some code here' }}
                        </textarea>
                        <span class="text-danger">{{ $errors->first('content') }}</span>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="p1">Published</label>
                        <input type="radio" name="published" value="1" id="p1" @if (isset($page))
                        {{ $page->published == 1 ? 'checked="checked"' : '' }}>
                        @endif

                        <label for="p0">Not Published</label>
                        <input type="radio" name="published" value="0" id="p0" @if (isset($page))
                        {{ $page->published == 0 ? 'checked="checked"' : '' }}>

                        @endif

                    </div>
                </div>
                <button type="submit" class="btn btn-primary"
                 {{ $title=='Create New Static Page' || $title=='Edit Existing Page' ?'':'disabled' }}
                 >Submit</button>
            </div>


        </form>


    </div>




@endsection
