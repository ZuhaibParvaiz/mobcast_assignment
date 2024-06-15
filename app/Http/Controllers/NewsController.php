<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\NewsArticle;

class NewsController extends Controller
{
    public function fetchAndStoreNews()
    {
        $response = Http::get('https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json');
        $data = $response->json();

        foreach ($data['items'] as $item) {
            NewsArticle::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'link' => $item['link'],
                'published_at' => $item['pubDate'],
            ]);
        }

        return redirect()->route('news.index');
    }

    public function index()
    {
        $newsArticles = NewsArticle::all();
        return view('news.index', compact('newsArticles'));
    }
}
