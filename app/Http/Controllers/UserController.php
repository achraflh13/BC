<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userDashboard()
    {
        return view('user.index');
    }

    public function userLogout(Request $request): RedirectResponse
    {
        // Déconnecter l'utilisateur
        Auth::guard('web')->logout();

        // Invalider la session et régénérer le token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger l'utilisateur vers la page de connexion
        return redirect('/')->with('message', 'Utilisateur déconnecté avec succès');
    }

    public function userLogin()
    {
        return view('user.user_login');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        return view('user.user_profile', compact('profileData'));
    }

    public function userProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->adress = $request->adress;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('img/user_images/' . $data->photo));
            $filename = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/user_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();
        $notification = array(
            'message' => 'Profil mis à jour avec succès',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function userPasswordChange()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.user_password_change', compact('profileData'));
    }

    public function userPasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $notification = array(
                'message' => 'Problème avec l\'ancien mot de passe',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            'message' => 'Mot de passe mis à jour avec succès',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }

    public function alluser()
    {
        $alladmin = User::where('role', 'user')->get();
        return view('user.alluser', compact('alladmin'));
    }

    public function addUser()
    {
        $roles = Role::all();

        return view('user.adduser', compact('roles'));
    }

    public function StoreUser(Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'adress' => 'required|string',  // Correction du champ 'adress' en 'address'
            'password' => 'required|string',
            'roles' => 'exists:roles,id',// Assurez-vous que 'roles' est un tableau
        ]);

        // Création de l'utilisateur
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->adress = $request->adress; // Correction du champ 'adress' en 'address'
        $user->role = 'user';
        $user->status = 'active';
        $user->password = bcrypt($request->password);
        $user->save();

        // Attribution des rôles à l'utilisateur
        $user->roles()->sync($request->roles); // Utilisez 'sync' si vous avez plusieurs rôles à attribuer

        // Redirection ou réponse appropriée
        $notification = array(
            'message' => 'Equipier created successfully', // Message à afficher
            'alert-type' => 'success'
        );
        return redirect()->route('all.user')->with($notification);
    }


    public function editUser($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('user.edituser', compact('user', 'roles'));
    }

    public function updateUser(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $request->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'phone' => 'required|string|max:20',
            'adress' => 'required|string|max:255',
            'password' => 'nullable|string|min:8', // Optionnel pour la mise à jour
            'roles' => 'exists:roles,id',
        ]);

        // Récupération de l'utilisateur par son ID
        $user = User::findOrFail($request->id);

        // Mise à jour des informations de l'utilisateur
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->adress = $request->adress;

        // Mise à jour du mot de passe uniquement si un nouveau mot de passe est fourni
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        // Mise à jour du rôle de l'utilisateur
        $user->roles()->sync($request->roles);

        // Sauvegarde des modifications
        $user->save();

        $notification = array(
            'message' => 'Utilisateur mis à jour avec succès',
            'alert-type' => 'success',
        );
        return redirect()->route('all.user')->with($notification);
    }

    public function deleteUser($id)
    {
        // Récupération de l'utilisateur par son ID
        $user = User::findOrFail($id);

        // Suppression de l'utilisateur
        $user->delete();

        $notification = array(
            'message' => 'Utilisateur supprimé avec succès',
            'alert-type' => 'warning',
        );
        return redirect()->route('all.user')->with($notification);
    }
}
