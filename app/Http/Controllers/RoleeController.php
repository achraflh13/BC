<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission as ModelsPermission;

class RoleeController extends Controller
{
    public function AllRole()
    {
        $data = Role::latest()->get();
        return view('admin.allrole', compact('data'));
    }

    public function AddRole()
    {

        return view('admin.addrole');
    }
    public function StoreRole(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'guard_name' => 'nullable', // Correction de l'espace ici
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web', // Ajout de 'guard_name' ici si nécessaire
        ]);

        $notification = array(
            'message' => 'Rôle ajouté avec succès',
            'alert-type' => 'success'
        );

        return redirect()->route('all.role')->with($notification);
    }

    public function EditRole($id)
    {

        $data = Role::findOrFail($id);
        return view('admin.editrole', compact('data'));
    }
    public function UpdateRole(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'guard_name' => $request->guard_name ?? 'web',

        ]);
        $ie = $request->id;
        Role::findOrFail($ie)->update([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => ' Role modifiee bien  ',
            'alert-type' => 'success'
        );
        return redirect()->route('all.role')->with($notification);
    }
    public function DeleteRole($id)
    {
        Role::find($id)->delete();
        $notification = array(
            'message' => ' Role supprimee bien  ',
            'alert-type' => 'success'
        );
        return redirect()->route('all.role')->with($notification);
    }
    public function AddRolePermission()
    {

        $role = Role::all();
        $permission = ModelsPermission::all();
        $permission_groups = User::getpermissionGroups();
        return view('admin.add_role_permission', compact('role', 'permission', 'permission_groups'));
    }

    public function StoreRolePermission(Request $request)
    {
        $data = array();
        $permissions = $request->permission;
        foreach ($permissions as $key =>$item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        }
        $notification = array(
            'message' => ' Tres bien  ',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }
    public function AllRolePermission(){
        $roles = Role::all();
        $roles = Role::with('permissions')->get();
        $permission = ModelsPermission::all();
        return view('admin.all_roles_permission', compact('roles', 'permission'));

    }
    public function EditRolePermission($id){
$role = Role::findOrFail($id);
$permissions = ModelsPermission::all();
$permission_groups = User::getpermissionGroups();
return view('admin.edit_role_permission', compact('role','permissions','permission_groups'));
    }
    public function updateRolePermission(Request $request, $id)
{
    // Validation des données (ajoutez des règles de validation selon vos besoins)
    $request->validate([
        'permissions' => 'nullable|array',
        'permissions.*' => 'integer|exists:permissions,id', // Assurez-vous que les IDs de permissions existent dans la table `permissions`
        'permission_all' => 'nullable|boolean', // Validation pour la case "Permission All"
    ]);

    // Si "Permission All" est sélectionnée, on récupère toutes les permissions disponibles
    if ($request->input('permission_all')) {
        $permissions = DB::table('permissions')->pluck('id')->toArray();
    } else {
        $permissions = $request->input('permissions', []);
    }

    // Suppression des permissions existantes pour le rôle spécifié
    DB::table('role_has_permissions')->where('role_id', $id)->delete();

    // Préparation des données pour l'insertion
    $data = [];
    foreach ($permissions as $permissionId) {
        $data[] = [
            'role_id' => $id,
            'permission_id' => $permissionId,
        ];
    }

    // Insertion des nouvelles permissions
    if (!empty($data)) {
        DB::table('role_has_permissions')->insert($data);
    }

    // Notification de succès
    $notification = [
        'message' => 'Permissions mises à jour avec succès',
        'alert-type' => 'success',
    ];

    return redirect()->route('all.roles.permission')->with($notification);
}



public function DeleteRolePermission($id){
    DB::table('role_has_permissions')->where('role_id', $id)->delete();
    $notification = array(
        'message' => ' Role supprimee bien  ',
        'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);


}


    }

