<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Recipe;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        $recipes = Recipe::where('is_approved', 'yes')->latest()->get();
        $members = User::latest()->where('role_id', '=', 2 )->get();
        $subscribers = Subscriber::latest()->get();
        $pendingRecipes = Recipe::where('is_approved', 'no')->get();
        return view('admin.dashboard', compact('categories', 'members', 'recipes', 'pendingRecipes', 'subscribers'));
    }
}
