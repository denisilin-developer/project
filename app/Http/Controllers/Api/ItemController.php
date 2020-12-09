<?php

namespace App\Http\Controllers\Api;

use App\Filters\ItemsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Item\ItemCollection;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $filters = ItemsFilter::hydrate($request->query());

        $items = Item::query()->filterBy($filters)->get();

        return new ItemCollection($items);
    }
}
