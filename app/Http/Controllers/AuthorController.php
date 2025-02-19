<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token_key,
        ])->get('https://candidate-testing.com/api/v2/authors', [
            "orderBy" => $request->input('orderBy') ?? 'id',
            "direction" => $request->input('direction') ?? 'ASC',
            "limit" => $request->input('limit') ?? 12,
            "page" => $request->input('page') ?? 1,
        ]);

        if ($response->successful()) {
            $authors = $response->json();
            return view('author.list', compact('authors'));
        } else {
            return back()->with('error', 'Failed to fetch authors. Please try again.');
        }
    }

    public function create() {
        return view('author.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date|before:today', 
            'biography' => 'required|string|max:5000', 
            'gender' => 'required|in:male,female,other', 
            'place_of_birth' => 'required|string|max:255', 
        ]);
    
        // After validation, you can proceed with storing the data or making an API call
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token_key,
        ])->post('https://candidate-testing.com/api/v2/authors', $validatedData);
    
        if ($response->successful()) {
            return redirect(route('dashboard'))->with("success", 'Author added successfully.');
        } else {
            return back()->with('error', 'Failed to add author.');
        }
    }
    
    public function view($id) {
     
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token_key,
        ])->get("https://candidate-testing.com/api/v2/authors/{$id}");

        if ($response->successful()) {
            $author = $response->json();
            return view('author.view', compact('author'));
        } else {
            return back()->with('error', 'Failed to fetch authors. Please try again.');
        }
    }

    public function delete($id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . auth()->user()->token_key,
        ])->delete("https://candidate-testing.com/api/v2/authors/{$id}");
    
        if ($response->successful()) {
            return back()->with('success', 'Author deleted successfully.');
        } else {
            return back()->with('error', 'Failed to delete author. There may be related books.');
        }
    }
    
   
}
