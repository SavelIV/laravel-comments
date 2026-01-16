<div class="col-md-{{ $rows }} fetured-post blog-post" data-aos="fade-up">
    <a href="{{ route('news.show', $one->id) }}" class="blog-post-permalink">
        <div class="blog-post-thumbnail-wrapper">
            <img src="{{ asset('assets/images/chat.svg') }}"
                 alt="blog post . {{ $one->id }}" class="{{ $imgClass }}">
        </div>
    </a>
    <div class="d-flex justify-content-start">
        <div class="ml-2">
            {{ $one->comments_count > 0 ? $one->comments_count : '0' }}
            <a href="{{ route('news.show', $one->id) }} {{ $one->comments_count > 0 ? "#comments" : "#comment" }}">
                <i class="far fa-comment text-danger ml-2"></i></a>
        </div>
    </div>
    <a href="{{ route('news.show', $one->id) }}" class="blog-post-permalink">
        <h6 class="{{ $blog }}post-title">{{ $one->shortTitle }}</h6>
    </a>
</div>
