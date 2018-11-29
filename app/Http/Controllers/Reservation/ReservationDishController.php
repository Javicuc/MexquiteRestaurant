<?php

namespace App\Http\Controllers\Reservation;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationDishController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reservation $reservation)
    {
        $reservacion = Reservation::findorfail($reservation->id);

        $dish = Dish::findorfail($request->dishes);
        $cantidad = $request->quantity;

        DB::transaction(function() use ($dish, $reservacion, $cantidad) {
            DB::table('dish_reservation')->insert(array( 
                    'dish_id' => $dish->id,
                    'reservation_id' => $reservacion->id,
                    'quantity' => $cantidad,
                    'price' => $dish->price * $cantidad,
                    )
                );
        }, 5);

        return redirect()->route('reservations.show', $reservacion);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation, Dish $dish)
    {
        $reservation->dishes()->detach([$dish->id]);
        return redirect()->route('reservations.show', $reservation->id);
    }
}
