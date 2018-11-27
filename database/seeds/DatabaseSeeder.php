<?php

use App\Category;
use App\Client;
use App\Dish;
use App\Gallery;
use App\Image;
use App\Occasion;
use App\Payment;
use App\Reservation;
use App\Table;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    	$faker = Faker::create();

        Category::truncate();
        Client::truncate();
        Dish::truncate();
        Gallery::truncate();
        Image::truncate();
        Occasion::truncate();
        Payment::truncate();
        Table::truncate();
        Reservation::truncate();
       	Tag::truncate();
       	User::truncate();
       	DB::table('dish_reservation')->truncate();
       	DB::table('gallery_image')->truncate();


        $cantidadCategorias = 30;
        $cantidadClientes = 100;
        $cantidadComidas = 120;
        $cantidadGalerias = 150;
        $cantidadImagenes = 600;
        $cantidadOcasiones = 40;
        $cantidadPagos = 200;
        $cantidadReservaciones = 200;
        $cantidadMesas = 30;
        $cantiidadEtiquetas = 20;
        $cantidadUsuarios = 5;

        factory(User::class, $cantidadUsuarios)->create();
        factory(Category::class, $cantidadCategorias)->create();
        factory(Client::class, $cantidadClientes)->create();
        factory(Table::class, $cantidadMesas)->create();
        factory(Image::class, $cantidadImagenes)->create();
        factory(Occasion::class, $cantidadOcasiones)->create();
        factory(Payment::class, $cantidadPagos)->create();
        factory(Dish::class, $cantidadComidas)->create();
        factory(Reservation::class, $cantidadReservaciones)->create();
        factory(Gallery::class, $cantidadGalerias)->create();
        factory(Tag::class, $cantiidadEtiquetas)->create();

        $comidas = Dish::all();
        Reservation::all()->each(function ($reservation) use ($comidas){
            $reservation->dishes()->attach(
                $categorias->random(rand(1,3))->pluck('id')
            );
        });

    }
}
