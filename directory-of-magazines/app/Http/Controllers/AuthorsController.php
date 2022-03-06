<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{

    public function list(Request $request): JsonResponse
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');

        if($page && $perPage)
        {
            $authors = Author::offset(($page-1)*$perPage)
                ->limit($perPage)
                ->get();
        }
        else
        {
            $authors = Author::all();
        }
        return response()->json($authors);
    }

    public function add(Request $request): JsonResponse
    {
        $author = new Author($request->all());
        $author->save();
        return response()->json($author);
    }

    public function update(Request $request): JsonResponse
    {
        $author = Author::find($request->get('id'));

        if($request->filled('name')) {
            $author->surname = $request->get('name');
        }
        if($request->filled('surname')) {
            $author->surname = $request->get('surname');
        }
        if($request->filled('middle_name')) {
            $author->middle_name = $request->get('middle_name');
        }

        $author->save();

        return response()->json($author);
    }
}
