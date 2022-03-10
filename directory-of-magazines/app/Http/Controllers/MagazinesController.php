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
            $magazine = Magazine::offset(($page-1)*$perPage)
                ->limit($perPage)
                ->get();
        }
        else
        {
            $magazine = Magazine::all();
        }

        return response()->json($magazine);
    }

    public function add(Request $request): JsonResponse
    {
        $magazine = new Magazine($request->all());
        $magazine->save();
        return response()->json($magazine);
    }

//    Default implementation

    public function update(Request $request): JsonResponse
    {
        $magazine = Magazine::find($request->get('id'));

        if($request->filled('name'))
        {
            $magazine->name = $request->get('name');
        }
        if($request->filled('description'))
        {
            $magazine->description = $request->get('description');
        }
        if($request->filled('img_src'))
        {
            $magazine->img_src = $request->get('img_src');
        }
        if($request->filled('authors_list'))
        {
            $magazine->authors_list = $request->get('authors_list');
        }
        if($request->filled('release_date'))
        {
            $magazine->release_date = $request->get('release_date');
        }

        $magazine->save();

        return response()->json($magazine);
    }

    public function delete(Request $request): JsonResponse
    {
        $magazine = Magazine::find($request->get('id'));

        $magazine->delete();

        return response()->json('Delete successfully');
    }

    public function getAuthors(Request $request)
    {
        $magazine = Magazine::find(1);
//        foreach ($magazine->authors as $author) {
//            dd($author);
//        }
        $authors = $magazine->authors;
        return response()->json($authors);
    }

}
