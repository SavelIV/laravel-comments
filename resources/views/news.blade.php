@extends('layouts.app')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Latest News</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($news as $one)
                        @include('includes.news', ['rows' => 4, 'imgClass' => '', 'blog' => 'blog-'])
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
