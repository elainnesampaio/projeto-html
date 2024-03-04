<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{

    public function index(){
        return view('index');
    }


    public function showFormCoslesterol(){
        return view('MedirColesterol');
    }

    public function showFormGlicose(){
        return view('MedirGlicose');
    }

    public function showFormPressao(){
        return view('MedirPressao');
    }

    public function showFormSuporte(){
        return view('Suporte');
    }

    public function showFormDuvidas(){
        return view('Duvidas');
    }

    public function showFormDHstorico(){
        return view('Historico');
    }




    // enviar email-----------------------------------------------------------------------------
    public function enviaContato(){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    //$dpto = $_POST['dpto'];
 
    $msg = "<strong>Nome: </strong>" . $nome . "<br />";
    $msg .= "<strong>E-mail: </strong>" . $email . "<br />";
    //$msg .= "<strong>Departamento: </strong>" . $dpto . "<br />";
    $msg .= "<strong>Mensagem: </strong>" . $mensagem . "<br />";
 
    $mensagem = $msg;
    $remetente = $email;
    $destinatario = "matheus.bataim@gmail.com";
    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "From:" . $email . "\r\n";
    $headers .= "Return-Path: matheus.bataim@gmail.com\r\n";
   
    if(!mail($destinatario,$mensagem,$headers)){
        print "falha no envio da mensagem";
    } else {
       echo "<script>window.location.href='/index'</script>";
    }

    return view('index');
    }






}
