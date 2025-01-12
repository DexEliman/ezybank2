<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('Admin.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('Admin.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string',
            'adresse' => 'required|integer',
            'localisation' => 'required|integer',
            'tel' => 'required|string',
            'Email' => 'required|string',
            'Password' => 'required|string',
        ]);

        $admin = new Admin();
        $admin->Nom = $request->Nom;
        $admin->adresse = $request->adresse;
        $admin->localisation = $request->localisation;
        $admin->tel = $request->tel;
        $admin->Email = $request->Email;
        $admin->Password = bcrypt($request->Password);
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Administrateur ajouté avec succès');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('Admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string',
            'adresse' => 'required|integer',
            'localisation' => 'required|integer',
            'tel' => 'required|string',
            'Email' => 'required|string',
            'Password' => 'required|string',
        ]);

        $admin = Admin::find($id);
        $admin->Nom = $request->Nom;
        $admin->adresse = $request->adresse;
        $admin->localisation = $request->localisation;
        $admin->tel = $request->tel;
        $admin->Email = $request->Email;
        $admin->Password = bcrypt($request->Password);
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Administrateur modifié avec succès');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Administrateur supprimé avec succès');
    }
}
