<?php

use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;
 
class RolesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('roles')->delete();
	DB::table('role_user')->delete();
	DB::table('permissions')->delete();
	DB::table('permission_role')->delete();

	$roles = [
	    ['id' => 1, 'name' => 'administrator', 'slug' => 'admin', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
	    ['id' => 2, 'name' => 'user', 'slug' => 'user', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
	    ['id' => 3, 'name' => 'visiteur', 'slug' => 'visiteur', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
	    ['id' => 4, 'name' => 'pending', 'slug' => 'pending', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
	    ['id' => 5, 'name' => 'ban', 'slug' => 'banned', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime]
	];
	DB::table('roles')->insert($roles);

	foreach(User::all() as $user) {
	    if($user->id == 1) {
		$user->assignRole(1);
	    } else {
		if($user->id < 25)
		    $user->assignRole(2);
		else
		    $user->assignRole(4);
	    }
	}

	$permissions = [
	    ['id' => 1, 'name' => 'panel', 'slug' => 'access.admin', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
	    ['id' => 2, 'name' => 'search', 'slug' => 'view.search', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime],
	    ['id' => 3, 'name' => 'self', 'slug' => 'self', 'description' => null, 'created_at' => new DateTime, 'updated_at' => new DateTime]
	];
	DB::table('permissions')->insert($permissions);

	foreach(Role::all() as $role) {
	    if($role->id == 1) // dans la table roles, la colonne id.
		$role->syncPermissions([1,2,3]);
	    else if ($role->id == 4)
		$role->syncPermissions([3]);
	    else if ($role->id == 5)
		$role->syncPermissions([]);
	    else
		$role->syncPermissions([2,3]);
	}
    }
 
}
