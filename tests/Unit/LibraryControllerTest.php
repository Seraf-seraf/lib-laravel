<?php

namespace Tests\Unit;

use App\Http\Controllers\LibraryController;
use App\Models\Books;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class LibraryControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new LibraryController();
    }

    public function testIndexReturnsCorrectViewWithBooks()
    {
        Books::factory()->count(2)->create();

        $response = $this->controller->index();

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('library.index', $response->getName());
        $this->assertArrayHasKey('books', $response->getData());
        $this->assertCount(2, $response->getData()['books']);
    }

    public function testShowReturnsCorrectViewWithBook()
    {
        $book = Books::factory()->count(1)->create()->first();
        $response = $this->controller->show($book->id);
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('library.view', $response->getName());
        $this->assertEquals($book->id, $response->getData()['book']->id);
    }

    public function testCreateMethod()
    {
        $formData = [
            'title' => ['Book 1', 'Book 2', 'Book 3'],
        ];

        $request = $this->mock(Request::class);
        $request->shouldReceive('validate')->once()->andReturn($formData);

        $response = $this->controller->create($request);

        $booksData = [];
        foreach ($formData['title'] as $title) {
            $booksData[] = ['title' => $title];
        }

        Books::insert($booksData);
        foreach ($formData['title'] as $title) {
            $this->assertDatabaseHas('books', ['title' => $title]);
        }

        $this->assertNotNull($response);
        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('adminka'), $response->getTargetUrl());
    }

    public function testDeleteMethod()
    {
        $book = Books::factory()->create()->first();

        $response = $this->controller->delete($book->id);

        $this->assertInstanceOf(RedirectResponse::class, $response);
        $this->assertEquals(route('books.index'), $response->getTargetUrl());
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
