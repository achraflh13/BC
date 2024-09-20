<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PropertyTypeController extends Controller
{
    public function AllType()
    {
        $types = PropertyType::latest()->get();

        // Get the current authenticated user
        $user = auth()->user();

        // Check the user's role assuming it's stored in a 'role' column in the users table
        if ($user->role == 'admin') {
            return view('admin.all_type', compact('types'));
        } elseif ($user->role == 'agent') {
            return view('agent.all_type', compact('types'));
        } elseif ($user->role == 'user') {
            return view('user.all_type', compact('types'));
        } else {
            abort(403, 'Unauthorized');
        }
    }




    public function AddType()
{
    // Get the current authenticated user
    $user = auth()->user();

    // Check the user's role assuming it's stored in a 'role' column in the users table
    if ($user->role == 'admin') {
        return view('admin.add_type');
    } elseif ($user->role == 'agent') {
        return view('agent.add_type');
    } elseif ($user->role == 'user') {
        return view('user.add_type');
    } else {
        abort(403, 'Unauthorized');
    }
}

    public function store(Request $request)
    {
        // Validation des champs
        $request->validate([
            'type_name' => 'required|string|max:255',

            'pdf_file' => 'nullable|file|mimes:pdf|max:2048', // PDF seulement, max 2 Mo
        ]);

        // Création du type de propriété
        $type = new PropertyType();
        $type->type_name = $request->type_name;

        // Gestion de l'upload du fichier PDF
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/pdfs'), $filename); // Sauvegarde du fichier

            // Enregistrement du chemin du fichier dans la base de données
            $type->pdf_file = $filename;
        }

        // Sauvegarde dans la base de données
        $type->save();

        // Redirection avec un message de succès
        return redirect()->route('all.type')->with('success', 'Property type added successfully!');
    }


    public function edit($id){
        $types = PropertyType::findOrFail($id);
        return view('admin.edit_type',compact('types'));
    }

    public function UpdateType(Request $request){
        $pid=$request->id;

        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,



        ]);

$notification = array(
            'message' => ' la modification est fait   ',
            'alert-type' => 'success');

            return redirect()->route('all.type')->with($notification);


     }

     public function delete($id){
        PropertyType::findOrFail($id)->delete();

        $notification = array(
            'message' => ' la suppression  est fait   ',
            'alert-type' => 'success');

            return redirect()->route('all.type')->with($notification);

     }

}
