<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function instagramFeed()
    {
        $accessToken = env('INSTAGRAM_TOKEN'); // Simpan di .env
        $userId = env('INSTAGRAM_USER_ID');

        $response = Http::get("https://graph.instagram.com/{$userId}/media", [
            'fields' => 'id,caption,media_type,media_url,permalink,timestamp',
            'access_token' => $accessToken,
        ]);

        $posts = $response->json()['data'] ?? [];

        return view('pages.sosmed.instagram', compact('posts'));
    }
}
