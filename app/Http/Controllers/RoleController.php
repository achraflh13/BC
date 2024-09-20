<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Permission as ModelsPermission;

class RoleController extends Controller
{
    public function AllPermission()
{
    $permissions = ModelsPermission::latest()->get(); // Récupère toutes les permissions
    $user = auth()->user(); // Utilisateur authentifié

    // Vérification du rôle et retour de la vue correspondante
    if ($user->role == 'admin') {
        return view('admin.allpermission', compact('permissions'));
    } elseif ($user->role == 'agent') {
        return view('agent.allpermission', compact('permissions'));
    } elseif ($user->role == 'user') {
        return view('user.allpermission', compact('permissions'));
    } else {
        abort(403, 'Unauthorized'); // Si l'utilisateur n'a pas le rôle requis
    }
}


public function AddPermission()
{
    $user = auth()->user(); // Utilisateur authentifié

    // Vérification du rôle et retour de la vue correspondante
    if ($user->role == 'admin') {
        return view('admin.addpermission');
    } elseif ($user->role == 'agent' ){
        return view('agent.addpermission');
    } elseif ($user->role == 'user') {
        return view('user.addpermission');
    } else {
        abort(403, 'Unauthorized'); // Si l'utilisateur n'a pas le rôle requis
    }
}

public function storePermission(Request $request)
{
    $request->validate([
        'permission_name' => 'required',
        'group_name' => 'required',
    ]);

    ModelsPermission::create([
        'name' => $request->permission_name,
        'group_name' => $request->group_name,

    ]);

    $notification = [
        'message' => 'Permission ajoutée avec succès',
        'alert-type' => 'success',
    ];

    return redirect()->route('all.permission')->with($notification);
}

public function EditPermission($id){
$data = ModelsPermission::findOrFail($id);
    return view('admin.editpermission',compact('data'));
}
public function UpdatePermission(Request $request){
$is=$request->id;
ModelsPermission::find($is)->update(
    [
        'name' => $request->name_permission,
        'group_name' => $request->group_name,
    ]
);
$notification = [
    'message' => 'Permission modifier avec succès',
    'alert-type' => 'success',
];

return redirect()->route('all.permission')->with($notification);

}
public function DeletePermission($id){
    ModelsPermission::find($id)->delete();
    $notification = array(
        'message' => ' Permission delete bien  ',
        'alert-type' => 'error');
        return redirect()->route('all.permission')->with($notification);
    }



}
