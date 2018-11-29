<?php

namespace App\Http\Controllers\Reservation;
use App\Dish;
use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservaciones = Reservation::orderBy('id', 'desc')->paginate(15);
        return view('Reservacion.indexReservaciones', compact('reservaciones'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $reservacion = Reservation::findorfail($reservation->id);
        $platillos = $reservacion->dishes()->paginate(4);
        $platillosList = Dish::where('status', Dish::PLATILLO_DISPONIBLE);
        return view('Reservacion.showReservacion', compact('reservacion','platillos','platillosList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $reservacion = Reservation::findorfail($reservation->id);
        $metodos = [Reservation::PROMOCION, Reservation::PROMOCION_EFECTIVO, 
        Reservation::EFECTIVO, Reservation::CUPON, Reservation::TARJETA, Reservation::INVITACION];
        return view('Reservacion.formReservacion', compact('reservacion','metodos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservacion = Reservation::findorfail($reservation->id);
        $reglas = [
            'payment' => 'in:' . Reservation::PROMOCION . ',' . Reservation::PROMOCION_EFECTIVO . ',' . Reservation::EFECTIVO . ',' . Reservation::TARJETA . ',' . Reservation::CUPON . ',' . Reservation::INVITACION, 
        ];

        if($request->has('payment')){
            $reservacion->payment = $request->payment;
        }   

        if($request->has('details')){
            $reservacion->details = $request->details;
        }

        if($request->has('occasion')){
            $reservacion->occasion = $request->occasion;
        }

        $reservacion->save();

        return redirect()->route('reservations.show', $reservacion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservacion = Reservation::findorfail($reservation->id);
        $reservacion->dishes()->detach();
        $reservacion->delete();
        return redirect()->route('reservations.index');
    }
}
