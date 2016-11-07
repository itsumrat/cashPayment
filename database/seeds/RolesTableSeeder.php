<?php



use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Role;

class RolesTableSeeder extends Seeder{

    public function run()
    {


        DB::table('roles')->truncate();

        Role::create([
            'id'            => 1,
            'name'          => 'Root',
            'description'   => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'
        ]);

        Role::create([
            'id'            => 2,
            'name'          => 'Administrator',
            'description'   => 'Full access to create, edit, and update companies, and orders.'
        ]);

        Role::create([
            'id'            => 3,
            'name'          => 'Reseller',
            'description'   => ''
        ]);

        Role::create([
            'id'            => 4,
            'name'          => 'Agent',
            'description'   => 'A standard user that can have a licence assigned to them. No administrative features.'
        ]);
    }

}
