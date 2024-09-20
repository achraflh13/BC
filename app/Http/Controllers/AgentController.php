<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function agentDashboard()
    {
        return view('agent.index');
    }

    public function agentLogout(Request $request): RedirectResponse
    {
        // Déconnecter l'utilisateur
        Auth::guard('web')->logout();

        // Invalider la session et régénérer le token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Rediriger l'agent vers la page de connexion des agents
        return redirect('/')->with('message', 'Agent déconnecté avec succès');
    }
public function agentLogin(){

        return view('agent.agent_login');

}




public function Allagent(){
    $alladmin = User::where('role','agent')->get();
    return view('agent.allagent', compact('alladmin'));
}




public function Agentprofile(){

    $id = Auth::user()->id;
    $profileData = User::find($id);


    return view('agent.agent_profile',compact('profileData'));
        }

        public function AgentprofileStore (Request $request){
            $id = Auth::user()->id;
            $data = User::find($id);
            $data->username = $request->username;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->adress = $request->adress;

            if($request->file('photo')){
                $file = $request->file('photo');
                @unlink(public_path('img/admin_images/'.$data->photo));
                $filename = date('YmsHi').$file->getClientOriginalExtension();
                $file->move(public_path( 'img/admin_images'), $filename);
                $data['photo'] = $filename;

            }
            $data->save();
            $notification = array(
                'message' => 'Profile Updated Successfully',
                'alert-type' => 'success'

            );
            return redirect()->back()->with($notification);

        }
        public function AgentPasswordChange(){
            $id = Auth::user()->id;
    $profileData = User::find($id);
            return view('admin.admin_password_change',compact('profileData'));
        }

        public function AgentPasswordUpdate(Request $request){
            $request ->validate([
    'old_password' => 'required',
    'new_password' => 'required|confirmed',
            ]);
            if(!Hash::check($request->old_password,auth::user()->password)){
                $notification = array(
                    'message' => 'Un probleme dans ancien mote de passe ',
                    'alert-type' => 'error');
                    return redirect()->back()->with($notification);


            }
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)


            ]);
            $notification = array(
                'message' => 'Tres bien',
                'alert-type' => 'success');
                return redirect()->back()->with($notification);



        }

        public function Alluser(){
            $alladmin = User::where('role','user')->get();
            return view('agent.alluser', compact('alladmin'));
        }

        public function addagent(){
            $roles = Role::all();
            return view('agent.addagent', compact('roles'));
        }
        public function storeagent(Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'adress' => 'required|string',
            'password' => 'required|string',
            'roles' => 'exists:roles,id',
        ]);

        // Création de l'utilisateur
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->adress = $request->adress;
        $user->role = 'agent';
        $user->status = 'active';
        $user->password = bcrypt($request->password);
        $user->save();

        // Attribution du rôle à l'utilisateur
        $user->roles()->attach($request->roles);

        // Redirection ou réponse appropriée
        $notification = array(
            'message' => 'Tres bien',
            'alert-type' => 'success');
        return redirect()->route('all.agent')->with($notification, 'agent created successfully');
    }
    public function Editagent($id){
        $admin = User::find($id);
        $roles = Role::all();
        return view('agent.editagent', compact('admin', 'roles'));

    }
    public function Updateagent(Request $request)
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
        $admin = User::findOrFail($request->id);

        // Mise à jour des informations de l'administrateur
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->adress = $request->adress;

        // Mise à jour du mot de passe uniquement si un nouveau mot de passe est fourni
        if ($request->password) {
            $admin->password = bcrypt($request->password);
        }

        // Mise à jour du rôle de l'utilisateur
        $admin->roles()->sync($request->roles);

        // Sauvegarde des modifications
        $admin->save();

        $notification = array(
            'message' => 'Tres bien',
            'alert-type' => 'success');
        // Redirection avec un message de succès
        return redirect()->route('all.agent')->with($notification, 'L\'agent a été mis à jour avec succès.');
    }
    public function Deleteagent($id)
    {
        // Récupération de l'utilisateur par son ID
        $admin = User::findOrFail($id);

        // Suppression de l'utilisateur
        $admin->delete();
        $notification = array(
            'message' => 'Tres bien',
            'alert-type' => 'warning');
        // Redirection avec un message de succès
        return redirect()->route('all.agent')->with($notification, 'L\'agent a été supprimé avec succès.');
    }


}



