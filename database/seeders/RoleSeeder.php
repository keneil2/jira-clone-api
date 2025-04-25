<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            "Admin",
            "Project Admin",
            "Dev",
            "Workspace Manager",
            "Reporter",
            "Viewer",
            "QA/Tester"
        ];

        foreach($roles as $role){
            $slug=strtolower(str_replace(" ",".",$role));
          Role::create([
            "name" =>$role,
            "slug"=>$slug
        ]);  
        }
        
    }
}
