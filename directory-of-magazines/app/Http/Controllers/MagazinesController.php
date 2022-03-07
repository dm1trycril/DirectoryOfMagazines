<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

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

    public function delete(Request $request): JsonResponse
    {
        $magazine = Magazine::find($request->get('id'));

        $magazine->delete();

        return response()->json('Delete successfully');
    }
}
