<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* PERMISSOES DE SERVIDOR */
        Permission::firstOrCreate([
            'name' => 'Visualizar Servidor',
            'permission' => 'users.index',
            'group' => 'Servidor' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Servidor',
            'permission' => 'users.create',
            'group' => 'Servidor' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Servidor',
            'permission' => 'users.edit',
            'group' => 'Servidor' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Servidor',
            'permission' => 'users.delete',
            'group' => 'Servidor' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Habiltar/Desabilitar Servidor',
            'permission' => 'users.enable',
            'group' => 'Servidor' ,
        ]);

        /* PERMISSOES DE PERFIL */

        Permission::firstOrCreate([
            'name' => 'Visualizar Perfil',
            'permission' => 'profile.index',
            'group' => 'Perfil' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Perfil',
            'permission' => 'profile.create',
            'group' => 'Perfil' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Perfil',
            'permission' => 'profile.edit',
            'group' => 'Perfil' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Perfil',
            'permission' => 'profile.delete',
            'group' => 'Perfil' ,
        ]);

        /* PERMISSOES DE POSTO DE ATENDIMENTO */
            Permission::firstOrCreate([
                'name' => 'Visualizar Posto de Atendimento',
                'permission' => 'station.index',
                'group' => 'Posto de Atendimento' ,
            ]);

            Permission::firstOrCreate([
                'name' => 'Cadastrar Posto de Atendimento',
                'permission' => 'station.create',
                'group' => 'Posto de Atendimento' ,
            ]);

            Permission::firstOrCreate([
                'name' => 'Editar Posto de Atendimento',
                'permission' => 'station.edit',
                'group' => 'Posto de Atendimento' ,
            ]);

            Permission::firstOrCreate([
                'name' => 'Excluir Posto de Atendimento',
                'permission' => 'station.delete',
                'group' => 'Posto de Atendimento' ,
            ]);

            Permission::firstOrCreate([
                'name' => 'Habiltar/Desabilitar Posto de Atendimento',
                'permission' => 'station.enable',
                'group' => 'Posto de Atendimento' ,
            ]);

        /* PERMISSOES DE Caracteristicas */
        Permission::firstOrCreate([
            'name' => 'Visualizar Características',
            'permission' => 'feature.index',
            'group' => 'Características' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Características',
            'permission' => 'feature.create',
            'group' => 'Características' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Características',
            'permission' => 'feature.edit',
            'group' => 'Características' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Características',
            'permission' => 'feature.delete',
            'group' => 'Características' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Habiltar/Desabilitar Características',
            'permission' => 'feature.enable',
            'group' => 'Características' ,
        ]);


        /* PERMISSOES DE Caracteristicas */
        Permission::firstOrCreate([
            'name' => 'Visualizar Cartório',
            'permission' => 'registry.index',
            'group' => 'Cartório' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Cartório',
            'permission' => 'registry.create',
            'group' => 'Cartório' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Cartório',
            'permission' => 'registry.edit',
            'group' => 'Cartório' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Cartório',
            'permission' => 'registry.delete',
            'group' => 'Cartório' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Habiltar/Desabilitar Cartório',
            'permission' => 'registry.enable',
            'group' => 'Cartório' ,
        ]);


        /* PERMISSOES DE Suspensao */
            Permission::firstOrCreate([
            'name' => 'Visualizar Suspensão de Certidão',
            'permission' => 'suspension.index',
            'group' => 'Suspensão de Certidão' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Suspensão de Certidão',
            'permission' => 'suspension.create',
            'group' => 'Suspensão de Certidão' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Suspensão de Certidão',
            'permission' => 'suspension.edit',
            'group' => 'Suspensão de Certidão' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Suspensão de Certidão',
            'permission' => 'suspension.delete',
            'group' => 'Suspensão de Certidão' ,
        ]);


         /* PERMISSOES DE BLoqueio */
         Permission::firstOrCreate([
            'name' => 'Visualizar Bloqueio ',
            'permission' => 'blocked.index',
            'group' => 'Bloqueio ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Bloqueio ',
            'permission' => 'blocked.create',
            'group' => 'Bloqueio ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Bloqueio ',
            'permission' => 'blocked.edit',
            'group' => 'Bloqueio ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Bloqueio ',
            'permission' => 'blocked.delete',
            'group' => 'Bloqueio ' ,
        ]);

        /* PERMISSOES DE Transferencia */
            Permission::firstOrCreate([
            'name' => 'Visualizar Transferencia ',
            'permission' => 'transfer.index',
            'group' => 'Transferencia ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Transferencia ',
            'permission' => 'transfer.create',
            'group' => 'Transferencia ' ,
        ]);


        /* PERMISSOES DE Interdicao */
        Permission::firstOrCreate([
            'name' => 'Visualizar Interdição ',
            'permission' => 'interdiction.index',
            'group' => 'Interdição ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Interdição ',
            'permission' => 'interdiction.create',
            'group' => 'Interdição ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Interdição ',
            'permission' => 'interdiction.edit',
            'group' => 'Interdição ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Interdição ',
            'permission' => 'interdiction.delete',
            'group' => 'Interdição ' ,
        ]);

           /* PERMISSOES DE Cidadao */
           Permission::firstOrCreate([
            'name' => 'Visualizar Cidadão ',
            'permission' => 'citizen.index',
            'group' => 'Cidadão ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Cidadão ',
            'permission' => 'citizen.create',
            'group' => 'Cidadão ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Cidadão ',
            'permission' => 'citizen.edit',
            'group' => 'Cidadão ' ,
        ]);


        /* PERMISSOES DE Generos */
        Permission::firstOrCreate([
            'name' => 'Visualizar Gênero ',
            'permission' => 'genre.index',
            'group' => 'Gênero ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Gênero ',
            'permission' => 'genre.create',
            'group' => 'Gênero ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Gênero ',
            'permission' => 'genre.edit',
            'group' => 'Gênero ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Gênero ',
            'permission' => 'genre.delete',
            'group' => 'Gênero ' ,
        ]);


    /* PERMISSOES DE Generos */
        Permission::firstOrCreate([
            'name' => 'Visualizar Localidades ',
            'permission' => 'locale.index',
            'group' => 'Localidades ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Cadastrar Localidades ',
            'permission' => 'locale.create',
            'group' => 'Localidades ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Localidades ',
            'permission' => 'locale.edit',
            'group' => 'Localidades ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Excluir Localidades ',
            'permission' => 'locale.delete',
            'group' => 'Localidades ' ,
        ]);


         /* PERMISSOES Processos */
         Permission::firstOrCreate([
            'name' => 'Visualizar Processos ',
            'permission' => 'process.index',
            'group' => 'Processos ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Editar Processos ',
            'permission' => 'process.edit',
            'group' => 'Processos ' ,
        ]);

        Permission::firstOrCreate([
            'name' => 'Monitorar Processos ',
            'permission' => 'monitor.view',
            'group' => 'Processos ' ,
        ]);





    }
}
