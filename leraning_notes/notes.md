Laravel Breeze :

Scaffold minimaliste d’authentification.

Fournit l’inscription, la connexion, la réinitialisation de mot de passe et la vérification d’e-mail.

Simple, léger, facile à personnaliser.

Laravel Jetstream :

Scaffold avancé d’authentification.

Inclut tout ce que Breeze propose plus : gestion des équipes, sessions actives, authentification à deux facteurs (2FA).

Plus complet mais plus complexe.

Différence clé : Breeze = simple et léger ; Jetstream = complet et sécurisé avec fonctionnalités avancées.


1. Comment créer une table pivot pour Many-to-Many ?
** tout d'abords on crée un tableau pour table pivot utilise cette commande 
php artisan make:migration create_role_user_table
ensuit on remplie le 
Schema::create('user_favorites', function (Blueprint $table) {
    $table->foreignId('user_id')->constrained();
    $table->foreignId('restaurante_id')->constrained();
    $table->primary(['user_id', 'restaurante_id']); (optional)
});
Dans chaque modèle, on définit une méthode qui permet de déclarer la relation avec l’autre modèle concerné.
Par exemple, dans le modèle User, on définit une méthode qui établit la relation avec le modèle Restaurant.
     public function favoriteRestaurants(): BelongsToMany
     {
            return $this->belongsToMany(Restaurant::class, 'users_favorites', 'user_id', 'restaurant_id')->withTimestamps();
     } **

    ** La méthode Eloquent utilisée pour une relation Many-to-Many est :

 belongsToMany()**


 Quelle méthode pour ajouter/supprimer d'une relation ?
  il ya plusieur méthodes
  ![alt text](image-2.png);




















====Challenge2====
Comment créer une migration avec php artisan ?
//php artisan make:migration create_users_table
pour ajouter un column 
//php artisan make:migration add_Role_to_users_table  --table=users

 Quelle méthode Eloquent pour valider les données ?
 C'est validator 
 En Laravel, un validateur est un outil qui vérifie que les données reçues respectent certaines règles avant de les utiliser.

 ===En Blade, pour vérifier si un utilisateur est connecté
 @auth
    <p>Bienvenue {{ auth()->user()->name }}</p>
@endauth

@if(Auth::check())
    <p>Utilisateur connecté</p>
@endif

redirection avec message d’erreur en Laravel
return redirect()->back()->with('error', 'Message d’erreur');

en blade on affiche comme ça 
@if(session('error'))
    {{ session('error') }}
@endif





Restaurant::query() crée une requête vide sur la table restaurants.

*when() permet d’ajouter une condition seulement si une valeur existe.*
*User::when($role, function($q) => $q->where('role', $role))->get();*
 *Like est un opérateur de comparaison, on l'utilise avec clause Where() pour la recherche*


 *public function index(Request $request)
{
    $request->get('role');

      return $role;
}*
 Quelle méthode Laravel pour la pagination automatique ?
 *on utilise la méthode paginate()*
 Comment personnaliser le nombre d'éléments par page ?
 *Pour personnaliser le nombre d’éléments par page, je dois passer un nombre en argument à la méthode paginate()
 par exemple $restos = Restaurant::paginate(15);*


 
