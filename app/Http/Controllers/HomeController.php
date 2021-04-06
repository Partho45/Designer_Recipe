<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    
    public function index()
    {
        $recipes = Recipe::where('is_approved', 'yes')->latest()->take(6)->get();
        $categories = Category::all();
        return view('welcome', compact('recipes', 'categories'));
    }

    public function details($slug){
        $recipe = Recipe::where('slug', '=', $slug)->first();

        $blogKey = 'blog_' . $recipe->id;
        if(!Session::has($blogKey)){
            $recipe->increment('view_count');
            Session::put($blogKey,1);
        }

        return view('singlepost', compact('recipe'));
    }

    public function allRecipe(){
        $recipes = Recipe::where('is_approved', 'yes')->latest()->paginate(6);
        return view('recipes', compact('recipes'));
    }

    public function categoryWisePost($id){
        $category = Category::find($id);
        $recipes = Recipe::where('is_approved', 'yes')->where('category_id', '=' ,$id)->paginate(6);
        return view('categoryWiseShow', compact('category', 'recipes'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $recipes = Recipe::where('is_approved', 'yes')->where('title','LIKE',"%$query%")->paginate(6);
        return view('search', compact('recipes', 'query'));
    }
}
