<?php

namespace Database\Seeders;

use App\Models\Estado;
use App\Models\Empleado;
use App\Models\Clientes;
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

    $super = new User();

    $super->id = 1;
    $super->name = "Dayana Sabogal";
    $super->email = "sabogalgomez17@gmail.com";
    $super->password = '$2y$10$jBnqXIk3VZAC/NXGmYp9D./qJwh.ZkrmXPwIOn/uSTmT9Y0zjiO9.';
   

    $super->save();



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

    $estado4->estado = "Garantia";
    $estado4->save();


    //************************************* */

    $empleado = new Empleado();

   
    $empleado->telefono_empleado = "3186654840";
    $empleado->nombre_empleado = "Dayana Sabogal";
    $empleado->direccion_empleado = "Arkacentro";

    $empleado->save();

    //************************************* */

    $cliente = new Clientes();

   
    $cliente->telefono_cliente = "3186654840";
    $cliente->nombre_cliente = "Carlos Ramirez";
    $cliente->direccion_cliente = "Milenium 1 ";

    $cliente->save();


    //************************************* */



    //************************************* */
  }
}
