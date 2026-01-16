@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-11 mx-auto">
                <h1 class="edica-page-title" data-aos="fade-up">Laravel-Comments</h1>
                <section class="edica-coming-soon py-5 mb-5">
                    <div class="row">
                        <div class="col-md-8">
                            <h6 class="comimg-soon-subtitle" data-aos="fade-up">
                                This project presents a variant of the comment system
                                <a href="{{ route('about') }}">integrated</a> into various models of any Laravel framework project.
                            </h6>
                        </div>
                        <div class="col-md-4" data-aos="fade-left">
                            <img src="{{ asset('assets/images/img.png') }}" alt="coming soon" class="img-fluid">
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
