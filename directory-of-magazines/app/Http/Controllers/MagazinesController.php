<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MagazinesController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        $page = $request->get('page');
        $perPage = $request->get('perPage');

        if($page && $perPage)
        {
            $magazines = Magazine::offset(($page-1)*$perPage)
                ->limit($perPage)
                ->get();
        }
        else
        {
            $magazines = Magazine::all();
        }

        foreach($magazines as $magazine)
        {
            $magazine->authors;
        }

        return response()->json($magazines);
    }

    public function add(Request $request): JsonResponse
    {
        $magazine = new Magazine($request->except(['authors']));

        $magazine->save();

        $authors = $request->get('authors');

        foreach($authors as $author) {
            $magazine->authors()->attach($author);
        }

        return response()->json($magazine);
    }

//    Default implementation

    public function update(Request $request): JsonResponse
    {
        $magazine = Magazine::find($request->get('id'));

        foreach (['name', 'description', 'img_src', 'release_date'] as $field) {
            if($request->filled($field))
            {
                $magazine->$field = $request->get($field);
            }
        }

        $magazine->save();

        if($request->filled('authors'))
        {
            $magazine->authors()->sync($request->get('authors'));
        }

        return response()->json($magazine);
    }

    public function delete(Request $request): JsonResponse
    {
        $magazine = Magazine::find($request->get('id'));

        $magazine->authors()->detach();

        $magazine->delete();

        return response()->json('Delete successfully');
    }
}
