<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use File;




class RoleController extends Controller
{

    public function index()
    {
        $items = Role::all();
        return view('roles.index',compact('items'));
    }

    public function create()
    {

          return view('roles.create');

    }

    public function store(Request $request)
    {
        $request->validate([
                            'name' => 'required',
                            'slug' => 'required',
                    ]);

        $requestData = $request->all();




        Role::create($requestData);

        return redirect()->route('roles.index')->with('success','créé avec succès');
    }

    public function edit($id)
    {

        $item = Role::findOrFail($id);


        return view('roles.edit',compact('item'));




    }



    public function show($id)
    {
        return view('roles.show');
    }


    public function update(Request $request, $id)
    {

        $item = Role::findOrFail($id);

        $request->validate([
                            'name' => 'required',
                            'slug' => 'required',
                    ]);

        $requestData = $request->all();






        $item->update($requestData);

        return redirect()->route('roles.index')->with('success','Mis à jour avec succés');
    }

    public function destroy($id)
    {
        $item=Role::findOrFail($id);
        $item->delete();
        return redirect()->route('roles.index')->with('success','Supprimé avec succès');
    }
}

 ?>
