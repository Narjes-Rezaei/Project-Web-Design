<?php

namespace Database\Seeders;

use App\Models\Admin\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Ali',
                'family' => 'Ahmadi',
                'birth_date' => 1985,
                'team_id' => 1,
                'gender_id' => 1,
                'province_id' => 1,
                'email' => 'ali.ahmadi@example.com',
                'phone' => '09120000001'
            ],
            [
                'name' => 'Sara',
                'family' => 'Mohammadi',
                'birth_date' => 1990,
                'team_id' => 2,
                'gender_id' => 2,
                'province_id' => 2,
                'email' => 'sara.mohammadi@example.com',
                'phone' => '09120000002'
            ],
            [
                'name' => 'Reza',
                'family' => 'Karimi',
                'birth_date' => 1988,
                'team_id' => 1,
                'gender_id' => 1,
                'province_id' => 3,
                'email' => 'reza.karimi@example.com',
                'phone' => '09120000003'
            ],
            [
                'name' => 'Neda',
                'family' => 'Hosseini',
                'birth_date' => 1992,
                'team_id' => 2,
                'gender_id' => 2,
                'province_id' => 4,
                'email' => 'neda.hosseini@example.com',
                'phone' => '09120000004'
            ],
            [
                'name' => 'Mahdi',
                'family' => 'Rahimi',
                'birth_date' => 1987,
                'team_id' => 3,
                'gender_id' => 1,
                'province_id' => 5,
                'email' => 'mahdi.rahimi@example.com',
                'phone' => '09120000005'
            ],
            [
                'name' => 'Fatemeh',
                'family' => 'Ebrahimi',
                'birth_date' => 1991,
                'team_id' => 4,
                'gender_id' => 2,
                'province_id' => 6,
                'email' => 'fatemeh.ebrahimi@example.com',
                'phone' => '09120000006'
            ],
            [
                'name' => 'Hassan',
                'family' => 'Jafari',
                'birth_date' => 1986,
                'team_id' => 3,
                'gender_id' => 1,
                'province_id' => 7,
                'email' => 'hassan.jafari@example.com',
                'phone' => '09120000007'
            ],
            [
                'name' => 'Leila',
                'family' => 'Nazari',
                'birth_date' => 1989,
                'team_id' => 4,
                'gender_id' => 2,
                'province_id' => 8,
                'email' => 'leila.nazari@example.com',
                'phone' => '09120000008'
            ],
            [
                'name' => 'Mehdi',
                'family' => 'Sadeghi',
                'birth_date' => 1993,
                'team_id' => 5,
                'gender_id' => 1,
                'province_id' => 9,
                'email' => 'mehdi.sadeghi@example.com',
                'phone' => '09120000009'
            ],
            [
                'name' => 'Mohammad',
                'family' => 'Rezaei',
                'birth_date' => 1995,
                'team_id' => 5,
                'gender_id' => 1,
                'province_id' => 10,
                'email' => 'mohammad.rezaei@example.com',
                'phone' => '09120000010'
            ],
        ];

        foreach ($members as $member) {
            Member::create([
                'name' => $member['name'],
                'family' => $member['family'],
                'birth_date' => now(),
                'team_id' => $member['team_id'],
                'gender_id' => $member['gender_id'],
                'province_id' => $member['province_id'],
                'email' => $member['email'],
                'phone' => $member['phone'],
            ]);
        }
    }
}
