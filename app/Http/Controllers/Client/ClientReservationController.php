<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        $cliente = Client::findorfail($client->id);
        return view('Cliente.createReservacion', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Client $client)
    {
        $cliente = Client::findorfail($client->id);
        $current_time = Carbon::now();
        
        $reglas = [
            'date' =>  ['required', 'date_format:Y-m-d', "after_or_equal:$current_time"],
            'hour' =>  ['required', 'date_format:H:i', "after_or_equal:$current_time"],
            'clients_quantity' => 'required|min:1',
            'table_id' => 'required',
            'payment_id' => 'required',
        ];   

        $this->validate($request, $reglas);

        $data = $request->all();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Reservation $reservation)
    {
        $client->reservations()->find($reservation->id)->delete();
        return redirect()->route('clients.show', $client->id);
    }
}
