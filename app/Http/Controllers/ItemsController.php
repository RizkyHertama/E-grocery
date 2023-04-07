<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function viewHome(){
        $item = Items::latest();

        return view('home',[
            'item' => $item->paginate(6)
        ]);

    }

    public function viewItemDetail($id)
    {
        $item  = Items::find($id);

        return view('viewItemDetail', compact('item'));
    }


}
