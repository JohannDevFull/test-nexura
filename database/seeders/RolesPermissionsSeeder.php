<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=array();
        
        $roles_sup = Role::create(['name' => 'Super Admin']);

        $roles_dev = Role::create(['name' => 'Desarrollador']);
        $roles_ana = Role::create(['name' => 'Analista']);
        $roles_tst = Role::create(['name' => 'Tester']);
        $roles_dis = Role::create(['name' => 'Diseñador']);
        $roles_pmo = Role::create(['name' => 'Profesional PMO']);
        $roles_ser = Role::create(['name' => 'Profesional de servicios']);
        $roles_aad = Role::create(['name' => 'Auxiliar administrativo']);
        $roles_cor = Role::create(['name' => 'Codirector']);
        
        $permissions_user=[
            ['name' => 'create user'],
            ['name' => 'list users'],
            ['name' => 'show user'],
            ['name' => 'edit user'],
            ['name' => 'delete user']
        ];

        foreach ($permissions_user as $key )
        {

            $permissions[] = Permission::create($key);
           
        }

        $roles_sup->syncPermissions( $permissions );
        $roles_dev->syncPermissions( $permissions );
        $roles_ana->syncPermissions( $permissions );
        $roles_tst->syncPermissions( $permissions );
        $roles_dis->syncPermissions( $permissions );
        $roles_pmo->syncPermissions( $permissions );
        $roles_ser->syncPermissions( $permissions );
        $roles_aad->syncPermissions( $permissions );
        $roles_cor->syncPermissions( $permissions );
    }
}
