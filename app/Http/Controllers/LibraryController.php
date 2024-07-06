<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Books;
use Illuminate\Http\Request;

use function view;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Books::inRandomOrder()->take(10)->get();

        return view('library.index', ['books' => $books]);
    }

    public function show($id)
    {
        $book = Books::findOrFail($id);

        return view('library.view', ['book' => $book]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title.*' => 'string|max:64|required',
        ], [
            'max' => 'Максимум :max символов',
            'min' => 'Минимум :min символов',
            'required' => 'Поле :attribute обязательно для заполнения'
        ]);

        // Создание каждой книги на основе валидированных данных
        if (!empty($validatedData['title'])) {
            foreach ($validatedData['title'] as $key => $title) {
                $book = new Books();
                $book->create(['title' => $title]);
            }
        }

        return redirect()->route('adminka');
    }

    public function update(Request $request, $id)
    {
        $book = Books::findOrFail($id);

        if ($request->isMethod('put')) {
            if ($request->post('delete')) {
                return redirect()->route('books.delete', ['id' => $id]);
            }

            $validatedData = $request->validate([
                'title' => 'string|max:64|required',
                'authors' => 'nullable|string|max:64',
                'year' => 'nullable|integer|min:-9999|max:2050'
            ], [
                'max' => 'Максимум :max символов',
                'min' => 'Минимум :min символов',
                'year.min' => 'Минимумальный год :min',
                'year.max' => 'Максимальный год :max',
                'required' => 'Поле :attribute обязательно для заполнения'
            ]);

            $book->fill($validatedData)->save();

            $book->save();
            return redirect()->route('adminka');
        }

        return view('admin.edit-book', ['book' => $book]);
    }

    public function delete($id)
    {
        $book = Books::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }

    public function adminka()
    {
        $books = Books::all();

        return view('admin.admin-table', ['books' => $books]);
    }
}
