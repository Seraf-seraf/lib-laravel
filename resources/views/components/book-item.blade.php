<div class="book">
    <img src="https://placehold.co/200x300" width="200" height="300" alt="img">
    <div class="book-info">
        <a href="{{route('books.show', ['id' => $id])}}">
            <div class="book-title">{{$title}}</div>
        </a>
        <div class="book-authors">{{$authors}}</div>
        <div class="book-year">{{$year}}</div>
    </div>
</div>
