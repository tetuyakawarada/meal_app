<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Meal;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Meal $meal)
    {
        $like = new Like();
        $like->user_id = Auth::id();
        $like->meal_id = $meal->id;
        $like->save();
        return back();
    }

    public function destroy($meal_id, $like_id)
    {
        $like = Like::find($like_id);
        $like->delete();
        return back();
    }
}
