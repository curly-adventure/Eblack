@php
    echo "TOUTES LES COMMUNES"."<br>";
    App\Models\Villes::get()->each(function($communes)
{
    
    foreach ($communes->communes as $key => $value) {
        echo $value->nom;
        echo "<br>";
    } 
    
});

echo "LA VILLES DE LA COMMUNE AVEC L'ID 5"."<br>";

App\Models\Communes::find(5)->ville()->each(function($ville)
{
   echo $ville->nom;
        echo "<br>";
    
});

echo "SOUS CATEGORIE DE LA CATEGORIE AVEC L'ID 1"."<br>";
\App\Models\Category::find(1)->sousCategories->each(function($souscate)
{
    echo $souscate->nom;
    echo '<br>';
});


echo "TOUS LES CATEGORIE DE LA SOUS CATEGORIE AVEC L'ID 1"."<br>";
\App\Models\Souscategorie::find(1)->categories->each(function($categorie)
{
    echo $categorie->nom;
    echo '<br>';
});
@endphp