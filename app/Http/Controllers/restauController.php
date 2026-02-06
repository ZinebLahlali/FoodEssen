<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\users_favorites;

use Illuminate\Http\Request;

class restauController extends Controller

{
    public function create()
    {
       return view('resaurant.home');
    }

    public function showDashboard()
    {
        return view('Restaurateur.dashboardR');
    }

    public function ShowFormResaurateur()
    {
        return view('Restaurateur.AjouterR');
    }


   public function store(Request $request)
{ 
    // if (Auth::user()->role !== 'restaurateur') {
    //     return back()->with('error', 'Accès refusé');
    // }

      Restaurant::create(
        $request->validate([
            'nom' => 'required',
            'localisation' =>  [ 
                'required',
                'regex:/^(https?:\/\/)?(www\.)?google\.[a-z]{2,}\/maps\/.*/i'
    ],
            'type_de_cuisine' => 'required',
            'capacite' => 'required',
            'horaires' => 'required|integer|min=1',
        ]) +
        ['statut' => 1]
    );

    return redirect('/dashboardR')->with('success', 'Restaurant créé avec succès');
 }

    public function ShowFormEdit()
    {
        return view('Restaurateur.edit');
    }




  public function edit($id)
  { $restau = Restaurant::findorFail($id);
     return view('Edit', compact('restau'));
  }

    public function updateRestau(Request $request, $id)
    {
        $request->validate([
                'nom' => 'required',
                'localisation' =>  [ 
                    'required',
                    'regex:/^(https?:\/\/)?(www\.)?google\.[a-z]{2,}\/maps\/.*/i'],
                'type_de_cuisine' => 'required',
                'capacite' => 'required',
                'horaires' => 'required|integer|min=1',
            ]);

            $path = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('upload', 'public');
        }


        $restau = Restaurant::findOrFail($id);
        $restau->name = $request->name;
        $restau->localisation = $request->localisation;
        $restau->type_de_cuisine = $request->type_de_cuisine;
        $restau->capacite = $request->capacite;  
        $restau->horaires = $request->horaires;
        $restau->image = $path;
        $restau->save();

        return redirect('/dashboardR')->route('edit', $id)->with('success', 'Retaurant  updated with successfully!');
    } 

    public function showAllRestaurant()
    {
        $restaurants = Restaurant::all();

        return view('restaurant/home',['restau' => $restaurants]);
    }





     public function destroy(Restaurant $restaurant)
        {
            if ($restaurant->image) {
                Storage::disk('public')->delete($restaurant->image);
            }


            $restaurant->delete();

            return redirect()->route('home')
                            ->with('success', 'Restaurant supprimée avec succès');
        }




    //search

    // public function search(Request $request)
    // {
    //       $restos = Restaurant::when(request('localisation'), function($q){
    //         $q->where('localisation', 'like', '%'.request('localisation').'%');
    //       })

    //       ->when(request('type_de_cuisine'), function($q){
    //          $q->where('type_de_cuisine', 'like', '%'.request('type_de_cuisine').'%');

    //       })
    //       ->paginate(request('per_page', 10));

    //       return view('home', compact('restos'));
            
    // }




    //recherche avancée
    public function index(Request $request)
    {     $search = $request->input('search');
        $restaurants = Restaurant::query()
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search){
                $q->where('localisation', 'ilike' ,"%{$search}%")
                ->orWhere('type_de_cuisine', 'ilike' , "%{$search}%");
            });
        });

        return view('restaurant.home',['restau'=>$restaurants->get()]);  
    }

   
    public function favoriteRestau($restaurant)
    {
        $user= Auth::user();
        $this->toggleFavorite($restaurant->id);
        users_favorites::create([
            'restaurant_id' => $restaurant->id,
            'user_id' => $user->id,
            'statut' => true,
        ]);

       return back();
    }

   public function toggleFavorite($restaurant_id)
   { 
    if(Auth::user()->role != 'client'){
       return back()->with('error', 'Clients seulement');
   }
    

   }
    

    public function unfavoriteRestau(Restaurant $restaurant)
    {
        $user = auth()->user();


        $user->favoriteRestaurants()->detach($restaurant->id);
        return back();
    }

    public function listFavorites()
    {
         $restaurants = Restaurant::whereHas('favoritedByUsers', function($query){
               $query->where('user_id', Auth::user()->id);    
         })->with('favoritedByUsers')->get();
         return view('restaurant.viewFavorites' , compact('restaurants'));
    }

}

