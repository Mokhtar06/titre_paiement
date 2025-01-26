<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class controleruser extends Controller
{
  
    public function showLoginForm()
    {
        // Assurez-vous que la vue connexion.connexion existe
        return view('connexion.connexion');
    }

    public function home()
    {
        return view("connexion.home");
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('compte.index')->with('success', 'Vous avez été connecté avec succès.');
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Vous avez été déconnecté avec succès.');
    }

    public function index()
{
    if (auth()->guest()) {
        return redirect()->route('login');
    }
    $users = User::all();
    return view('users.index', compact('users'));
}
public function create()
{
    return view('users.create');
}
public function edit($id)
{
    // Trouver l'utilisateur par son ID
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
}
public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
}
public function store(Request $request)
{
    // Validation des champs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    // Création de l'utilisateur
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Rediriger avec un message de succès
    return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
}
public function update(Request $request, $id)
{
    // Trouver l'utilisateur
    $user = User::findOrFail($id);

    // Validation des champs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6',
    ]);

    // Mise à jour des données
    $user->name = $request->name;
    $user->email = $request->email;

    // Si un mot de passe est fourni, on le met à jour
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    // Sauvegarder les changements
    $user->save();

    // Rediriger avec un message de succès
    return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
}

}
