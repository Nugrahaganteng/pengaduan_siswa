<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apikey ='dfdd33050b8a4fe9909f2c46bcaef59c';
        $url ='https://newsapi.org/v2/top-headlines?country=us&apiKey='. $apikey;

        // Menggunakan Laravel HTTP Client untuk melakukan Request API
        $response = Http::get($url);

        // Mengambil data dari Response API
        if($response->successful()) {
            $articles = $response->json()['articles'];
            return view('news.index', compact('articles'));
        } else {
            return response()->json([
                'error' => 'unable to fetch news'
            ], $response->status());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
