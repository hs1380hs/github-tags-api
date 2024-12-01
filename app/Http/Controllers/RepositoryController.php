<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repository;
use Illuminate\Support\Facades\Http;
class RepositoryController extends Controller
{
    public function fetchStarredRepositories(Request $request)
    {
        $username = $request->input('username');
        $response = Http::get("https://api.github.com/users/{$username}/starred");

        if ($response->failed()) {
            return response()->json(['message' => 'Unable to fetch repositories'], 500);
        }

        $repositories = $response->json();

        foreach ($repositories as $repo) {
            Repository::updateOrCreate(
                ['github_id' => $repo['id']],
                [
                    'name' => $repo['name'],
                    'description' => $repo['description'],
                    'url' => $repo['html_url'],
                    'language' => $repo['language'],
                ]
            );
        }

        return response()->json(['message' => 'Repositories synced successfully']);
    }
}
