@extends('layouts.app')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $news->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $news->date }} •
                {{ $count  > 0 ? $count : '0' }} Comments
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('assets/images/chat.svg') }}" alt="featured image of post#{{ $news->id }}"
                     class="img-fluid">
                <div class="d-flex justify-content-start">
                    <div class="ml-2">•</div>
                    <div class="ml-2">
                        {{ $count  > 0 ? $count : '0' }}
                        <a href="{{ route('news.show', $news->id) }} {{ $count > 0 ? "#comments" : "#comment" }}">
                            <i class="far fa-comment text-danger ml-2"></i></a>
                    </div>
                </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $news->content !!}</p>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($count < 1)
                        <p class="edica-page-title">There are no comments yet.</p>
                    @else
                        <section id="comments" class="comments-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Comments ({{ $count }})</h2>
                            <div style="background-color: #f8f9fa; padding: .75rem 1.25rem;">
                                @foreach($comments as $comment)
                                        @include('comments::components.comment.comment')
                                @endforeach
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
