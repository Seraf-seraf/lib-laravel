@extends('layout/main')

@section('content')
@if(!empty($books))
<section class="books">
    <h1 class="section-title">Книги</h1>
    <div class="books-wrapper swiper mySwiper">
        <div class="books-list swiper-wrapper">
            @foreach($books as $book)
                <div class="swiper-slide">
                    <x-book-item id="{{$book->id}}" title="{{$book->title}}" authors="{{$book->authors}}" year="{{$book->year}}"/>
                </div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
@endif
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper(".mySwiper", {
            slidesPerView: 5,
            spaceBetween: 10,
            freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endpush
