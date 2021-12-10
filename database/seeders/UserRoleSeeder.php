<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name"=>"admin",
            "email"=>"admin@admin.com",
            "password"=>bcrypt("admin!123")
        ]);

        $invitado = User::create([
            "name"=>"invitado",
            "email"=>"invitado@invitado.com",
            "password"=>bcrypt("invitado!123")
        ]);


        $accesoPublicoRole = Role::create([
           "name"=> "AccesoPublico"
        ]);
        $accesoUsuarioRole = Role::create([
            "name"=> "AccesoUsuario"
        ]);

        // Accesso publico
        $lecturaListaTorneo = Permission::create(['name'=>'mostrar torneos']);
        $lecturaTorneo = Permission::create(['name'=>'mostrar torneo']);
        $lecturaPartidas = Permission::create(['name'=>'mostrar partidas']);

        //Accesso Usuario
        $registrarseTorneo = Permission::create(['name'=>'registrarse torneo']);
        $ingresoPartidas = Permission::create(['name'=>'ingreso partida']);
        $crearTorneo = Permission::create(['name'=>'crear Torneo']);
        $lecturaTorneoCreado = Permission::create(['name'=>'mostrar torneo creado']);
        $editarTorneo = Permission::create(['name'=>'editar Torneo']);
        $reportrarPartidas = Permission::create(['name'=>'reportar partidas']);
        $lecturaListaUsuarios = Permission::create(['name'=>'mostrar usuarios']);
        $iniciarTorneo = Permission::create(['name'=>'iniciar torneo']);


        $lecturaListaTorneo->assignRole($accesoPublicoRole);
        $lecturaTorneo->assignRole($accesoPublicoRole);
        $lecturaPartidas->assignRole($accesoPublicoRole);

        $registrarseTorneo->assignRole($accesoUsuarioRole);
        $ingresoPartidas->assignRole($accesoUsuarioRole);
        $crearTorneo->assignRole($accesoUsuarioRole);
        $lecturaTorneoCreado->assignRole($accesoUsuarioRole);
        $editarTorneo->assignRole($accesoUsuarioRole);
        $reportrarPartidas->assignRole($accesoUsuarioRole);
        $lecturaListaUsuarios->assignRole($accesoUsuarioRole);
        $iniciarTorneo->assignRole($accesoUsuarioRole);

        $lecturaListaTorneo->assignRole($accesoUsuarioRole);
        $lecturaTorneo->assignRole($accesoUsuarioRole);
        $lecturaPartidas->assignRole($accesoUsuarioRole);

        $admin->assignRole('AccesoUsuario');
        $invitado->assignRole('AccesoPublico');

    }
}
