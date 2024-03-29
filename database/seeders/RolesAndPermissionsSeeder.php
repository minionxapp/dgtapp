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
        // $userbiasa = User::where('user_id','=','user')->first();
        // $userbiasa->assignRole('user');
        // $user = User::find(1);
        // $user->assignRole('admin');
        // $roles = $user->getRoleNames();
        // $permission = Permission::create(['name' => 'test.role']);
        $role = Role::where('name', '=', 'admin')->first();
        // $role->givePermissionTo(Permission::create(['name' => 'setup']));
        // $model ='users';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // $model ='tabels';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='roles';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='permissions';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='rolepermissions';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='userroles';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='divisis';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='departemens';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $model ='params';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // $model ='tasks';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        // $role->givePermissionTo(Permission::create(['name' => 'task']));
        // // $model ='';
        // // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // $model ='cobas';
        // $role->givePermissionTo(Permission::create(['name' => $model.'']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //   //make seeder
        //   $model ='seqs';
        //   $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        //   $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        //   $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        //   $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));


        // //make seeder
        // $model ='files';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // $model ='projects';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // $model ='jajals';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // $model ='lsp_skemas';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // $model ='lsp_sertifikats';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //make seeder
        // $model ='pegawais';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // //make seeder
        // $model ='training_notes';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        //make seeder
        // $model ='training_plans';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //make seeder
        // $model ='vm_perusahaans';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        // //make seeder
        // $model ='training_licenses';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //  //make seeder
        //  $model ='training_plan_pesertas';
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //make seeder
        // $model ='mentor_surtugs';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //make seeder
        // $model ='mentor_mentors';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //  //make seeder
        //  $model ='mentor_mentes';
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        //make seeder
        // $model ='mentor_events';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));
        //make seeder
        //  $model ='mentor_event_members';
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        //  $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //make seeder
        // $model ='training_costs';
        // $role->givePermissionTo(Permission::create(['name' => $model.'.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model.'.delete']));

        //make seeder
        // $model = 'training_intrainers';
        // $role->givePermissionTo(Permission::create(['name' => $model . '.index']));
        // $role->givePermissionTo(Permission::create(['name' => $model . '.create']));
        // $role->givePermissionTo(Permission::create(['name' => $model . '.edit']));
        // $role->givePermissionTo(Permission::create(['name' => $model . '.delete']));
    }
}
