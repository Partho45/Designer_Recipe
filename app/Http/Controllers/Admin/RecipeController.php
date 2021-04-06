<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recipe;
use App\Category;
use App\Notifications\NewRecipeNotify;
use App\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Notification;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::where('is_approved', 'yes')->latest()->paginate(12);
        return view('admin.recipe.index',compact('recipes'));
    }


    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:recipes',
            'body' => 'required',
            'featured_image' => 'required|mimes:jpeg,png,jpg',
            'images.*' => 'required|mimes:jpeg,png,jpg',
            'categories' => 'required',
           ]);



           //handle featured image
           $featured_image = $request->file('featured_image');
           if($featured_image)
           {
                // Make Unique Name for Image 
               $currentDate = Carbon::now()->toDateString();
               $featured_image_name = $currentDate.'-'.uniqid().'.'.$featured_image->getClientOriginalExtension();
     
     
             // Check Dir is exists
     
                 if (!Storage::disk('public')->exists('featured')) {
                    Storage::disk('public')->makeDirectory('featured');
                 }
     
     
                 // Resize Image  and upload
                 $cropImage = Image::make($featured_image)->resize(400,400)->stream();
                 Storage::disk('public')->put('featured/'.$featured_image_name,$cropImage);
     
            }
          


           if($request->hasfile('images'))
           {
                foreach($request->file('images') as $file)
                {
                    $name = time() . '-'. uniqid() . '.'.$file->extension();
                    $file->move(public_path().'/images/', $name);  
                    $data[] = $name;  
                }
           }

           
  
            $recipe = new Recipe();
            $recipe->title = $request->title;
            $recipe->slug = str_slug($request->title);
            $recipe->body = $request->body;
            $recipe->images = json_encode($data);
            $recipe->featured_image = $featured_image_name;
            $recipe->user_id = Auth::id();
            $recipe->category_id = $request->categories;
            $recipe->is_approved = 'yes';
            $recipe->save();

            $subscribers = Subscriber::all();
            foreach ($subscribers as $subscriber) {
                Notification::route('mail',$subscriber->email)
                ->notify(new NewRecipeNotify($recipe));
            }

            return redirect(route('admin.recipe.index'))->with('success', 'Design Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function approval($id)
    {
        $recipe = Recipe::find($id);
        $recipe->is_approved = 'yes';
        $recipe->save();

        $subscribers = Subscriber::all();
        foreach ($subscribers as $subscriber) {
            Notification::route('mail',$subscriber->email)
            ->notify(new NewRecipeNotify($recipe));
        }

        session()->flash('success', 'Design Approved Successfully');
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('admin.recipe.show', compact('recipe')); 
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        $categories = Category::all();
        return view('admin.recipe.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $this->validate($request,[
            'title' => 'required|unique:recipes,title,'. $recipe->id,
            'body' => 'required',
            'categories' => 'required',
            'images.*' => 'mimes:jpeg,png,jpg',
            'featured_image' => 'mimes:jpeg,png,jpg',
           ]);



           //handle featured image

           $featured_image = $request->file('featured_image');

           if($featured_image)
           {
        
                // Make Unique Name for Image 
               $currentDate = Carbon::now()->toDateString();
               $featured_image_name =$currentDate.'-'.uniqid().'.'.$featured_image->getClientOriginalExtension();
     
     
                // Check Dir is exists
                 if (!Storage::disk('public')->exists('featured')) {
                    Storage::disk('public')->makeDirectory('featured');
                 }

                 
                 // Resize Image and upload
                 $cropImage = Image::make($featured_image)->resize(400,400)->stream();
                 Storage::disk('public')->put('featured/'.$featured_image_name,$cropImage);

                 if(Storage::disk('public')->exists('featured/'.$recipe->featured_image)){
                    Storage::disk('public')->delete('featured/'.$recipe->featured_image);
                }
                $recipe->featured_image = $featured_image_name;
            }

          
           //handle multiple images update
           if($request->hasfile('images'))
           {
              
                foreach(json_decode($recipe->images) as $picture){
                        @unlink("images/". $picture);
                }
            
                foreach($request->file('images') as $file)
                {
                    $name = time() . '-'. uniqid() . '.'.$file->extension();
                    $file->move(public_path().'/images/', $name);  
                    $data[] = $name;  
                }

                $recipe->images=json_encode($data);


           }
     
            $recipe->title = $request->title;
            $recipe->slug = str_slug($request->title);
            $recipe->body = $request->body;
            $recipe->category_id = $request->categories;

            $recipe->save();
            return redirect(route('admin.recipe.index'))->with('success', 'Design Updated Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //delete multiple added images
        foreach(json_decode($recipe->images) as $picture){
                @unlink("images/". $picture);
        }

        //delete old featured image
        if(Storage::disk('public')->exists('featured/'.$recipe->featured_image)){
            Storage::disk('public')->delete('featured/'.$recipe->featured_image);
        }

        $recipe->delete();
        session()->flash('success', 'Design Deleted Successfully');
        return redirect()->back();
    }


    public function pending(){
        $recipes = Recipe::where('is_approved', 'no')->latest()->paginate(12);
        return view('admin.recipe.pendingList', compact('recipes'));
    }
}
