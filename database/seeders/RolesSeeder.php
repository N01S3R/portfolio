<?php

namespace Database\Seeders;

use App\Models\Role as ModelsRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'User',
            'Vip',

        ];
        foreach ($roles as $role) {
            Role::create([
                'name'       => $role,
                'guard_name' => 'web'
            ]);
        }
        DB::table('roles')->where('name', '=', 'Admin')->update([
            'colors' => '#FF0000',
        ]);
        DB::table('roles')->where('name', '=', 'User')->update([
            'colors' => '#0000FF',
        ]);
        DB::table('roles')->where('name', '=', 'Vip')->update([
            'colors' => '#008000',
        ]);
    }
}
