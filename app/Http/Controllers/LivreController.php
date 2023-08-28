<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class LivreController extends Controller
{

    public function home()
    {
        return view('home.home');
    }

    //-----------------Avec route WEB-----------------------------
    // Vue complete
    public function indexWeb()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    // Vue 1 livre
    public function showWeb($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.show', compact('livre'));
    }

    // Vue modif livre
    public function editWeb($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.edit', compact('livre'));
    }

    // update version web
    public function updateWeb(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'auteur' => 'required|max:255',
            'date_publication' => 'required|date',
        ]);

        // Récupérer le livre à mettre à jour
        $livre = Livre::findOrFail($id);

        // Mettre à jour les attributs du livre avec les données validées
        $livre->titre = $validatedData['titre'];
        $livre->auteur = $validatedData['auteur'];
        $livre->date_publication = $validatedData['date_publication'];

        // Enregistrer les modifications dans la base de données
        $livre->save();

        // Rediriection
        return redirect()->route('livres.show', ['id' => $livre->id])->with('success', 'Livre mis à jour avec succès');
    }

    // Vue delete
    public function deleteWeb($id)
    {
        $livre = Livre::findOrFail($id);
        return view('livres.delete', compact('livre'));
    }

    // Requete delete
    public function destroyWeb($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return redirect()->route('livres.index')
            ->with('success', 'Livre supprimé avec succès.');
    }


    // Requete creation
    public function storeWeb(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string',
            'auteur' => 'required|string',
            'date_publication' => 'required|date',
        ]);

        $livre = new Livre();
        $livre->fill($data);
        $livre->save();

        return redirect()->route('livres.index')
            ->with('success', 'Livre créé avec succès.');
    }

    // Vue creation
    public function createWeb()
    {
        return view('livres.create');
    }

    //-----------------Avec route API-----------------------------
    // Vue complete
    public function index()
    {
        $livres = Livre::all();
        return response()->json($livres);
    }

    // Vue 1 livre
    public function show($id)
    {
        $livre = Livre::findOrFail($id);
        return response()->json($livre);
    }

    // Requete update
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'titre' => 'required|string',
            'auteur' => 'required|string',
            'date_publication' => 'required|date',
        ]);

        $livre = Livre::findOrFail($id);
        $livre->fill($data);
        $livre->save();

        return response()->json($livre);
    }

    // requete delete
    public function destroy($id)
    {
        $livre = Livre::findOrFail($id);
        $livre->delete();

        return response()->json(null, 204); // statut 204 (No Content)
    }

    // requete creation
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|string',
            'auteur' => 'required|string',
            'date_publication' => 'required|date',
        ]);

        $livre = new Livre();
        $livre->fill($data);
        $livre->save();

        return response()->json($livre, 201); // statut 201 (Created)
    }
}
