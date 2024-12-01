<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repository;
use App\Models\Tag;

class TagController extends Controller
{
    public function addTag(Request $request, $repositoryId)
    {
        $repository = Repository::findOrFail($repositoryId);
        $tag = Tag::firstOrCreate(['name' => $request->input('name')]);
        $repository->tags()->syncWithoutDetaching([$tag->id]);

        return response()->json(['message' => 'Tag added successfully']);
    }

    public function removeTag($repositoryId, $tagId)
    {
        $repository = Repository::findOrFail($repositoryId);
        $repository->tags()->detach($tagId);

        return response()->json(['message' => 'Tag removed successfully']);
    }

    public function searchByTag(Request $request)
    {
        $tag = $request->input('tag');
        $repositories = Repository::whereHas('tags', function ($query) use ($tag) {
            $query->where('name', 'like', "%{$tag}%");
        })->get();

        return response()->json($repositories);
    }
}

