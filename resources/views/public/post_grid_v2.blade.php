@section('content')
<div class="posts">
    @foreach ($posts as $post)
    <div class="card">
        <div class="card-header">{{ $post->post_title }}</div>
    </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>

</div>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            // load more data here
            var a = '{{ $posts->currentPage() + 1 }}';
            $.ajax({
                url: '{{ route("post_grid") }}?page=' + a,
                success: function(data) {
                    $('.posts').append(data);
                }
            });
        }
    });
</script> -->


@endsection