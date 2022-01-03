<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'username' => 'Arif',
                'password' => password_hash('rahman', PASSWORD_BCRYPT),
                'name' => 'Arif Rahman',
                'created_at' => Time::now()
            ]
        ];
        $this->db->table('users')->insertBatch($data);
    }
}
