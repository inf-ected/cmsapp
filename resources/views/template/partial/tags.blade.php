<div class="container">

    <hr>
    <h4>THIS PAGE TAGS!</h4>
    @foreach ($page->tags as $tag)

        <span class="badge badge-info">{{ $tag->name }}</span>

    @endforeach
    <hr>
    <h4>ALL EXISTING TAGS!</h4>
    @foreach ($all_tags as $tag)

        <span class="badge badge-info">{{ $tag }}</span>

    @endforeach
<hr>
    <br>
</div>
