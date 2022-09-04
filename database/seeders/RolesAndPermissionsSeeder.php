<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $user = User::find(1);
        $user->assignRole('admin');
        $user->assignRole('user');
        $roles = $user->getRoleNames();
        dd($roles);
        $permission = Permission::create(['name' => 'test.role']);
        $role = Role:: where('name','=','admin')->first();
        $role->givePermissionTo(Permission::create(['name' => 'setup']));
        $role->givePermissionTo('permision2');
        $model ='users';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        $model ='tabels';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $model ='roles';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $model ='permissions';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $model ='rolepermissions';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $model ='userroles';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $model ='divisis';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $model ='departemens';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $model ='params';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        $model ='tasks';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        $role->givePermissionTo(Permission::create(['name' => 'task']));
        // $model ='';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        
        $model ='cobas';
        $role->givePermissionTo(Permission::create(['name' => $model.'']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

          //make seeder
          $model ='seqs';
          $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
          $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
          $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
          $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
           
        
        //make seeder
        $model ='files';
        $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

       
    }
}
