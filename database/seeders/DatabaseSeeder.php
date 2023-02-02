<?php

namespace Database\Seeders;

use App\Models\Estado;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        /*
        Se insertan los siguientes datos de manera automatica con 
        el comando php artisan db:seed

        pero primero se debe limpiar la base de daros con php artisan refresh

        PARA HACERLO TODO A LA VEZ PODEMOS HACERLO ASI:
        php artisan migrate:refresh --seed        
        */

        //************************************* */
      /*
        $super = new User();

        $super->id = 1;
        $super->name = "Carlos Ramirez";
        $super->email = "cars2614@gmail.com";        
        $super->password = "$2y$10$yVAFM7.IH2SHG2rvcOjUXO1AR1zi0XhjUWeq6fiZJguY6sf7xZt7e";
        $super->created_at = "2023-02-02 01:13:24";
        $super->updated_at = "2023-02-02 01:13:24";

        $super->save();
        */
        


        //************************************* */
        $estado = new Estado();

        $estado->estado = "Recibido";
        $estado->save();

        //************************************* */
        $estado2 = new Estado();

        $estado2->estado = "Realizado";
        $estado2->save();
                        

        //************************************* */
        $estado3 = new Estado();

        $estado3->estado = "Entregado";
        $estado3->save();
                        

        //************************************* */
        $estado4 = new Estado();

        $estado4->estado = "Devuelto";
        $estado4->save();
                        

        //************************************* */
        $estado5 = new Estado();

        $estado5->estado = "Garantia";
        $estado5->save();
                        

        
                        


    }
}