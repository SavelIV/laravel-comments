<div class="col-md-{{ $rows }} fetured-post blog-post" data-aos="fade-up">
    <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
        <div class="blog-post-thumbnail-wrapper">
            <img src="{{ asset('assets/images/picture.svg') }}"
                 alt="blog post . {{ $post->id }}" class="{{ $imgClass }}">
        </div>
    </a>
    <div class="d-flex justify-content-start">
        <div class="ml-2">
            {{ $post->comments_count > 0 ? $post->comments_count : '0' }}
            <a href="{{ route('post.show', $post->id) }} {{ $post->comments_count > 0 ? "#comments" : "#comment" }}">
                <i class="far fa-comment text-danger ml-2"></i></a>
        </div>
    </div>
    <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
        <h6 class="{{ $blog }}post-title">{{ $post->shortTitle }}</h6>
    </a>
</div>
