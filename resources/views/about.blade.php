@extends('layouts.app')
@section('content')
    <main class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 mx-auto">
                    <h1 class="edica-page-title" data-aos="fade-up">About This Project</h1>
                    <section class="edica-about-intro py-5">
                        <div class="row">
                            <div class="col-md-6" data-aos="fade-right" data-aos-delay="150">
                                <h2 class="intro-title pb-3 pb-md-0 mb-4 mb-md-0">
                                    This project presents a variant of the comment system integrated into various models
                                    <span>of any Laravel framework project.</span>
                                </h2>
                            </div>
                            <div class="col-md-6 intro-content" data-aos="fade-left" data-aos-delay="150">
                                <p>
                                    <span class="first-letter">T</span>he goal is to implement a simple content commenting system.
                                </p>
                                <p>
                                    <span class="first-letter">E</span>ntities: <br> News, Post, User, Comment.
                                </p>
                                <p>
                                    <span class="first-letter">C</span>omments can be replied to – this is considered a
                                    separate comment, as is replying to a comment on a comment, etc.
                                </p>
                                <p>
                                    <span class="first-letter">API:</span>
                                    Creating/reading posts and news. <br>
                                    CRUD comments on behalf of the user to a post/news/comment.
                                </p>
                                <p>
                                    <span class="first-letter">R</span>equirements: <br>
                                    PHP 8.2+, Laravel 11+, MySQL 8+.
                                </p>
                                <p>
                                    <span class="first-letter">Y</span>ou can change all the entities by Postman on {{ config('app.url') . '/api' }}
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
