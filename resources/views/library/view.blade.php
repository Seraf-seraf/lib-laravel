@extends('layout/main')

@section('title', $book->title)

@section('content')
    <section class="book-detail">
        <div class="book-wrapper">
            <div class="book-header">
                <h1 class="book-title">{{$book->title}}</h1>
                <div class="book-authors">{{$book->authors}}</div>
            </div>
            <div class="book-info">
                <img src="https://placehold.co/220x346" width="220" height="346" alt="img">
                <div class="book-description">
                    {{  \Faker\Factory::create()->sentence(50) }}
                </div>
            </div>
        </div>
    </section>
@endsection

