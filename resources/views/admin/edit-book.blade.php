@extends('layout.main')
@section('title', $book->title)

@section('content')
    <section class="admin">
        <form action="{{ route('books.update', ['id' => $book->id]) }}" method="post">
            @csrf
            @method('put')
            <table class="iksweb">
                <tr>
                    <th></th>
                    <th>Название книги</th>
                    <th>Авторы</th>
                    <th>Год выпуска</th>
                    <th>Удалить</th>
                </tr>
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>
                        <label for="book-title-{{ $book->id }}" class="visually-hidden">Название книги</label>
                        <input id="book-title-{{ $book->id }}" type="text" name="title" value="{{ old('title', $book->title) }}" required>
                    </td>
                    <td>
                        <label for="book-authors-{{ $book->id }}" class="visually-hidden">Авторы</label>
                        <input id="book-authors-{{ $book->id }}" type="text" name="authors" value="{{ old('authors', $book->authors) }}">
                    </td>
                    <td>
                        <label for="book-year-{{ $book->id }}" class="visually-hidden">Год выпуска</label>
                        <input id="book-year-{{ $book->id }}" type="text" name="year" value="{{ old('year', $book->year) }}">
                    </td>
                    <td>
                        <label for="book-delete-{{ $book->id }}" class="visually-hidden">Удалить</label>
                        <input id="book-delete-{{ $book->id }}" type="checkbox" name="delete">
                    </td>
                </tr>
            </table>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="submit" value="Сохранить">
        </form>
    </section>
@endsection
