<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('dashboard.clients.index' ,compact('clients'));
    
    }// end of index

    public function create()
    {
        return view('dashboard.clients.create');

    }// end of create

    public function store(ClientRequest $request)
    {   
        Client::create($request->all());
        return redirect()-> route('dashboard.clients.index');

    }// end of store

    public function edit(Client $client)
    {
        //
    }// end of edit

    public function update(Request $request, Client $client)
    {
        //
    }// end of update

    public function destroy(Client $client)
    {
       $client->delete();
       return redirect()->route('dashboard.clients.index');
    }// end of destroy
}// end of controller
