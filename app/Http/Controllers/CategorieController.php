<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
    try {
    $categories=Categorie::all();
    return response()->json($categories);
    } catch (\Exception $e) {
    return response()->json("probleme de récupération de la liste des catégories");
    }
    }
    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
    try {
    $categorie=new Categorie([
    "nomcategorie"=>$request->input("nomcategorie"),
    "imagecategorie"=>$request->input("imagecategorie")
    ]);
    $categorie->save();
    return response()->json($categorie);

    } catch (\Exception $e) {
    return response()->json("insertion impossible");
    }
    }
    public function show($id)
{
try {$categorie=Categorie::findOrFail($id);
    return response()->json($categorie);
    } catch (\Exception $e) {
    return response()->json("probleme de récupération des données");
    }
    }
    public function update(Request $request, $id)
{
try {
$categorie=Categorie::findorFail($id);
$categorie->update($request->all());
return response()->json($categorie);
} catch (\Exception $e) {
return response()->json("probleme de modification");
}
}
public function destroy($id)
{
try {
$categorie=Categorie::findOrFail($id);
$categorie->delete();
return response()->json("catégorie supprimée avec succes");
} catch (\Exception $e) {
return response()->json("probleme de suppression de catégorie");
}
}
}