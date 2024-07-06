@extends('layout.main')
@section('title', 'Админка')

@section('content')
<section class="admin">
    <form action="{{ route('books.create') }}" method="post">
        @csrf
        <table class="iksweb">
            <tr>
                <th></th>
                <th>Название книги</th>
            </tr>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>
                        <a href="{{ route('adminka.edit', ['id' => $book->id]) }}">{{ $book->title }}</a>
                    </td>
                </tr>
            @endforeach
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
        <button type="button" id="add-row">Добавить книгу</button>
        <input type="submit" value="Сохранить">
    </form>
</section>
@endsection

@push('scripts')
    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            const table = document.querySelector('.iksweb');
            const rowCount = table.rows.length;
            const row = table.insertRow(rowCount);
            row.className = 'newRow';

            const cell1 = row.insertCell(0);
            cell1.innerText = 'New';

            const cell2 = row.insertCell();
            cell2.innerHTML = `<input type="text" name="title[]" value="" required>`;

            const cell5 = row.insertCell();
            cell5.innerHTML = '<i class="delete-row">×</i>';
        });

        document.querySelector('.iksweb').addEventListener('click', (event) => {
            if (event.target.classList.contains('delete-row')) {
                const row = event.target.closest('.newRow');
                if (row) {
                    row.remove();
                }
            }
        });
    </script>
@endpush
