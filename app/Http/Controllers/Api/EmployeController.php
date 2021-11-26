<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Experience;

class EmployeController extends Controller
{
    public function getAllEmployes() {
        $employes = Employe::get()->toJson(JSON_PRETTY_PRINT);
        return response($employes, 200);
    }

    
    public function CreateEmploye(Request $request) {
      
        $employe = new Employe;
        $employe->nom = $request->nom;
        $employe->prenom = $request->prenom;
        $employe->age = $request->age;
        $employe->poste = $request->poste;
        $employe->save();

        $experience->titre = $request->titre;
        $experience->description = $request->description;
        $experience->employe_id = $employe->id;
        $experience->save();

        
  
        return response()->json([
          "message" => "Employé crée"
        ], 201);
    }
    public function updateEmploye(Request $request, $id) {
        if (Employe::where('id', $id)->exists()) {
          $employe = Employe::find($id);
  
          $employe->nom = is_null($request->nom) ? $employe->nom : $employe->nom;
          $employe->prenom = is_null($request->prenom) ? $employe->prenom : $employe->prenom;
          $employe->age = is_null($request->age) ? $employe->age : $employe->age;
          $employe->poste = is_null($request->poste) ? $employe->poste : $employe->poste;
          $employe->save();
  
          return response()->json([
            "message" => "Employé updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "Employé pas trouvé"
          ], 404);
        }
    }
    public function deleteEmploye ($id) {
        if(Employe::where('id', $id)->exists()) {
          $employe = Employe::find($id);
          $employe->delete();
  
          return response()->json([
            "message" => "Employe supprimé"
          ], 202);
        } else {
          return response()->json([
            "message" => "Employé pas trouvé"
          ], 404);
        }
    }
}
