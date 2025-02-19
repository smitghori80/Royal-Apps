<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class BookController extends Controller
{

    public function index(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token_key,
        ])->get('https://candidate-testing.com/api/v2/authors', [
            "orderBy" => 'id',
            "direction" => 'ASC',
            "limit" => 100,
            "page" => 1,
        ]);

        if ($response->successful()) {
            $authors = $response->json();
            return view('book.create', compact('authors'));
        } else {
            return back()->with('error', 'Failed to fetch authors. Please try again.');
        }
    }

   
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'format' => 'required|string|max:255',
            'number_of_pages' => 'numeric',
            'release_date' => 'required|date|before:today', 
            'author_id' => 'required|string|max:255'
        ]);
    
        $validatedData['author']['id'] = (int)$request->author_id;
        $validatedData['number_of_pages'] = (int)$request->number_of_pages;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token_key,
        ])->post('https://candidate-testing.com/api/v2/books', $validatedData);
    
        if ($response->successful()) {
            return redirect(route('dashboard'))->with("success", 'Author added successfully.');
        } else {
            return back()->with('error', 'Failed to add author.');
        }
    }

    public function delete($id)  {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token_key,
        ])->delete("https://candidate-testing.com/api/v2/books/{$id}");
    
        if ($response->successful()) {
            return back()->with('success', 'Books deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete books. There may be related books.');
        }

    }

}
