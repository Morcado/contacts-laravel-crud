<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// include facade 
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $contacts = \App\Contact::all();
        // dd($contacts); //depurar

        // Busca los contactos con el uusuario
        // $contacts = \App\User::find(Auth::id()) -> contacts; // es un metodo de usuario

        // Busca los contactos con el usuario en auth
        $contacts = Auth::user() -> contacts;
        return view('contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->first_name);
        $contact = new \App\Contact;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->user_id = Auth::id();
        $contact->save();
        // redirigir con get despues del post
        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = \App\Contact::find($id); /* Nos regresa un contacto */
        return view('contacts.edit', ['contact' => $contact]);
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = \App\Contact::find($id);
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->save();
        return redirect('/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /* Hacer un dialogo de confirmacion aqui */
        $contact = \App\Contact::find($id);
        /* Buscar que el contacto exista */
        $contact->delete();
        return redirect('/contacts');
    }
}
