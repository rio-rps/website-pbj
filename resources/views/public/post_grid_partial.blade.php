@foreach ($posts as $post)
<div class="card">
    <div class="card-header">{{ $post->post_title }}</div>
</div>
@endforeach