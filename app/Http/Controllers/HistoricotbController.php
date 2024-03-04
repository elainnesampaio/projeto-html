<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\redirect;
use Illuminate\Http\Request;
use App\Models\pressaoarterialtb;
use App\Models\colesteroltb;
use App\Models\glicosetb;

class HistoricotbController extends Controller
{
    

    
//---------------------------------Store Histórico
    public function storePressao(Request $request){
        $pressao= $request->validate([
            'iduser'=>'integer|required',
            'sistolica'=>'string',
            'diastolica'=>'string'
        ]);
        pressaoarterialtb::create($pressao);
        return redirect::route('dashboard');
    }
    public function storeColesterol(Request $request){
        $colesterol= $request->validate([
            'iduser'=>'integer|required',
            'colesterol_HDL'=>'string',
            'colesterol_LDL'=>'string',
        ]);
        colesteroltb::create($colesterol);
        return redirect::route('dashboard');
    }
    
    public function storeGlicose(Request $request){
        $glicose= $request->validate([
            'iduser'=>'integer|required',
            'glicemia'=>'string',
           
        ]);
        glicosetb::create($glicose);
        return redirect::route('dashboard');
    }
    

    //-----------------------------------Show historico 
    public function showPressao(Request $request){
       $dadospressao= pressaoarterialtb::query();
       $dadospressao->when($request->iduser,function($query,$id){
        $query->where('iduser', 'like' , '%'.$id.'%');
       });

       $dadospressao = $dadospressao->get();

       return view('dashboard', ['pressaoarterialtb' => $dadospressao]);
    }

    public function showColesterol(Request $request){
        $dadoscolesterol= colesteroltb::query();
        $dadoscolesterol->when($request->iduser,function($query,$id){
         $query->where('iduser', 'like' , '%'.$id.'%');
        });
 
        $dadoscolesterol = $dadoscolesterol->get();

        return view('dashboard', ['colesteroltb' => $dadoscolesterol]);
     }

    public function showGlicose(Request $request){
        $dadosglicose= glicosetb::query();
        $dadosglicose->when($request->iduser,function($query,$id){
         $query->where('iduser', 'like' , '%'.$id.'%');
        });
 
        $dadosglicose = $dadosglicose->get();

        return view('dashboard', ['glicosetb' => $dadosglicose]);
    }


    
    
    
    public function destroy(historicotb $NomeFK){
        $NomeFK->delete();
        return redirect::route('historicotodos');
        
    }


    public function update(historico $id, Request $request){
        $historico = $request->validate([
            'iduser'=>'integer|required',
            'nome'=>'string|required',
            'colesterol_HDL'=>'string',
            'colesterol_LDL'=>'string',
            'glicemia'=>'string',
            'pressao'=>'string'
        ]);

        $id->fill($historico);
        $id->save();
        return redirect::route('historicotodos');
    }


    public function show(historico $nome){
        return view('historicotodos', ['historicotb'=> $nome]);
    }
}