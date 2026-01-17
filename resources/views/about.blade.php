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
                    <section class="edica-about-faq py-5 mb-5">
                        <div class="row">
                            <div class="col-md-12 mb-4 mb-md-0 d-flex flex-column justify-content-center"
                                 data-aos="fade-right">
                                <h2 class="goal-title">API routes:</h2>
                                <div class="accordion" id="edicaAboutFaqCollapse" role="tablist" aria-multiselectable="true">
                                    <div class="card" data-aos="fade-up" data-aos-delay="200">
                                        <div class="card-header" role="tab" id="edicaAboutFaq1">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent1" aria-expanded="true"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Authorization:
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent1" class="collapse in" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq1">
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Method</th>
                                                        <th scope="col">Url</th>
                                                        <th scope="col">Params / Body</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th>Login</th>
                                                        <td>POST</td>
                                                        <td>/login</td>
                                                        <td>email / password</td>
                                                        <td>user3@gmail.com / 11111111</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Register</th>
                                                        <td>POST</td>
                                                        <td>/register</td>
                                                        <td>name / email / password / password_confirmation</td>
                                                        <td> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Logout</th>
                                                        <td>POST</td>
                                                        <td>/logout</td>
                                                        <td> </td>
                                                        <td> </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                After login you get the access_token in response. Put it in the Bearer Authorization Token.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="300">
                                        <div class="card-header" role="tab" id="edicaAboutFaq3">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent3" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Posts:
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent3" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq3">
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Method</th>
                                                        <th scope="col">Url</th>
                                                        <th scope="col">Params / Body</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th>Get post with comments</th>
                                                        <td>GET</td>
                                                        <td>/posts/{$postId}</td>
                                                        <td> </td>
                                                        <td> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Create new post</th>
                                                        <td>POST</td>
                                                        <td>/posts</td>
                                                        <td>title / content</td>
                                                        <td> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Update post</th>
                                                        <td>PUT</td>
                                                        <td>/posts/{$postId}</td>
                                                        <td>title / content</td>
                                                        <td> </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="400">
                                        <div class="card-header" role="tab" id="edicaAboutFaq4">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent4" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    News:
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent4" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq4">
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Method</th>
                                                        <th scope="col">Url</th>
                                                        <th scope="col">Params / Body</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th>Get news with comments</th>
                                                        <td>GET</td>
                                                        <td>/news/{$newsId}</td>
                                                        <td> </td>
                                                        <td> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Create new news</th>
                                                        <td>POST</td>
                                                        <td>/news</td>
                                                        <td>title / content</td>
                                                        <td> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Update news</th>
                                                        <td>PUT</td>
                                                        <td>/news/{$newsId}</td>
                                                        <td>title / content</td>
                                                        <td> </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" data-aos="fade-up" data-aos-delay="500">
                                        <div class="card-header" role="tab" id="edicaAboutFaq5">
                                            <h5 class="mb-0">
                                                <a data-toggle="collapse" data-parent="#edicaAboutFaqCollapse"
                                                   href="#edicaAboutFaqContent5" aria-expanded="false"
                                                   aria-controls="edicaAboutFaqContent1">
                                                    Comments:
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="edicaAboutFaqContent5" class="collapse" role="tabpanel"
                                             aria-labelledby="edicaAboutFaq5">
                                            <div class="card-body">
                                                <table class="table table-bordered table-hover table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">Method</th>
                                                        <th scope="col">Url</th>
                                                        <th scope="col">Params / Body</th>
                                                        <th scope="col">Value</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th>Get post comments</th>
                                                        <td>GET</td>
                                                        <td>/comments</td>
                                                        <td>commentable_type / commentable_id / order_direction</td>
                                                        <td>post/news / {$id} / asc/desc</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Create new comment</th>
                                                        <td>POST</td>
                                                        <td>/comments</td>
                                                        <td>commentable_type / commentable_id / text</td>
                                                        <td>post/news / {$id} / 3~3000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Reply to comment</th>
                                                        <td>POST</td>
                                                        <td>/comments/{$commentId}</td>
                                                        <td>text</td>
                                                        <td>3~3000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Get comment</th>
                                                        <td>GET</td>
                                                        <td>/comments/{$commentId}</td>
                                                        <td> </td>
                                                        <td> </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Update comment</th>
                                                        <td>PUT</td>
                                                        <td>/comments/{$commentId}</td>
                                                        <td>text</td>
                                                        <td>3~3000</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Delete comment</th>
                                                        <td>DELETE</td>
                                                        <td>/comments/{$commentId}</td>
                                                        <td> </td>
                                                        <td> </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
