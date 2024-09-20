<?php

namespace App\Http\Controllers;

use App\Models\Amentie;
use Illuminate\Http\Request;

class AmentieController extends Controller
{
    public function AllAmentie()
{
    $data = Amentie::get();

    // Get the current authenticated user
    $user = auth()->user();

    // Check the user's role assuming it's stored in a 'role' column in the users table
    if ($user->role == 'admin') {
        return view('admin.all_amentie', compact('data'));
    } elseif ($user->role == 'agent') {
        return view('agent.all_amentie', compact('data'));
    } elseif ($user->role == 'user') {
        return view('user.all_amentie', compact('data'));
    } else {
        abort(403, 'Unauthorized');
    }
}



public function AddAmentie()
{
    // Get the current authenticated user
    $user = auth()->user();

    // Check the user's role assuming it's stored in a 'role' column in the users table
    if ($user->role == 'admin') {
        return view('admin.add_amentie');
    } elseif ($user->role == 'agent') {
        return view('agent.add_amentie');
    } elseif ($user->role == 'user') {
        return view('user.add_amentie');
    } else {
        abort(403, 'Unauthorized');
    }
}



    public function storeAmentie(Request $request)
    {
        // Valider les champs du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'pdf_file' => 'nullable|file|mimes:pdf|max:2048',  // Limite à 2 Mo et fichier de type PDF seulement
        ]);

        // Créer une nouvelle instance de Amentie
        $amentie = new Amentie();
        $amentie->name = $request->name;

        // Si un fichier PDF est uploadé, on le sauvegarde
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName(); // Renommer le fichier pour éviter les conflits
            $file->move(public_path('uploads/pdfs'), $filename); // Enregistrer le fichier dans 'uploads/pdfs'

            // Enregistrer le nom du fichier dans la base de données
            $amentie->pdf_file = $filename;
        }

        // Sauvegarder les données
        $amentie->save();

        // Redirection avec un message de succès
        return redirect()->route('all.amentie')->with('success', 'Amentie added successfully!');
    }


 public function UpdateAmentie(Request $request){
$ik=$request->id;
Amentie::find($ik)->update([
    'name' => $request->name,
]);
$notification = array(
    'message' => ' amentie update bien  ',
    'alert-type' => 'success');
    return redirect()->route('all.amentie')->with($notification);

 }
 public function EditAmentie($id)
 {
     $data = Amentie::findOrFail($id);
     return view('admin.edit_amentie', compact('data'));
 }
 public function DeleteAmentie($id){
Amentie::find($id)->delete();
$notification = array(
    'message' => ' amentie delete bien  ',
    'alert-type' => 'error');
    return redirect()->route('all.amentie')->with($notification);
}
}
