<?php

namespace Database\Seeders;

use App\Models\Home\Referee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RefereeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $referees = [
            [
                'referee_id' => 1,
                'name' => 'Ali',
                'family' => 'Ahmadi',
                'degree_id' => 1,
                'birth_year' => 1985,
                'gender_id' => 1,
                'province_id' => 1,
                'email' => 'ali.ahmadi@example.com',
                'phone' => '09120000001'
            ],
            [
                'referee_id' => 2,
                'name' => 'Sara',
                'family' => 'Mohammadi',
                'degree_id' => 2,
                'birth_year' => 1990,
                'gender_id' => 2,
                'province_id' => 2,
                'email' => 'sara.mohammadi@example.com',
                'phone' => '09120000002'
            ],
            [
                'referee_id' => 3,
                'name' => 'Reza',
                'family' => 'Karimi',
                'degree_id' => 3,
                'birth_year' => 1988,
                'gender_id' => 1,
                'province_id' => 3,
                'email' => 'reza.karimi@example.com',
                'phone' => '09120000003'
            ],
            [
                'referee_id' => 4,
                'name' => 'Neda',
                'family' => 'Hosseini',
                'degree_id' => 2,
                'birth_year' => 1992,
                'gender_id' => 2,
                'province_id' => 4,
                'email' => 'neda.hosseini@example.com',
                'phone' => '09120000004'
            ],
            [
                'referee_id' => 5,
                'name' => 'Mahdi',
                'family' => 'Rahimi',
                'degree_id' => 1,
                'birth_year' => 1987,
                'gender_id' => 1,
                'province_id' => 5,
                'email' => 'mahdi.rahimi@example.com',
                'phone' => '09120000005'
            ],
            [
                'referee_id' => 6,
                'name' => 'Fatemeh',
                'family' => 'Ebrahimi',
                'degree_id' => 3,
                'birth_year' => 1991,
                'gender_id' => 2,
                'province_id' => 6,
                'email' => 'fatemeh.ebrahimi@example.com',
                'phone' => '09120000006'
            ],
            [
                'referee_id' => 7,
                'name' => 'Hassan',
                'family' => 'Jafari',
                'degree_id' => 2,
                'birth_year' => 1986,
                'gender_id' => 1,
                'province_id' => 7,
                'email' => 'hassan.jafari@example.com',
                'phone' => '09120000007'
            ],
            [
                'referee_id' => 8,
                'name' => 'Leila',
                'family' => 'Nazari',
                'degree_id' => 1,
                'birth_year' => 1989,
                'gender_id' => 2,
                'province_id' => 8,
                'email' => 'leila.nazari@example.com',
                'phone' => '09120000008'
            ],
            [
                'referee_id' => 9,
                'name' => 'Mehdi',
                'family' => 'Sadeghi',
                'degree_id' => 2,
                'birth_year' => 1993,
                'gender_id' => 1,
                'province_id' => 9,
                'email' => 'mehdi.sadeghi@example.com',
                'phone' => '09120000009'
            ],
            [
                'referee_id' => 10,
                'name' => 'Narges',
                'family' => 'Shahriari',
                'degree_id' => 3,
                'birth_year' => 1995,
                'gender_id' => 2,
                'province_id' => 10,
                'email' => 'narges.shahriari@example.com',
                'phone' => '09120000010'
            ],
        ];

        for ($i = 0; $i < count($referees); $i++) {
            Referee::create([
                'referee_id' => $referees[$i]['referee_id'],
                'name' => $referees[$i]['name'],
                'family' => $referees[$i]['family'],
                'degree_id' => $referees[$i]['degree_id'],
                'birth_year' => $referees[$i]['birth_year'],
                'gender_id' => $referees[$i]['gender_id'],
                'province_id' => $referees[$i]['province_id'],
                'email' => $referees[$i]['email'],
                'phone' => $referees[$i]['phone'],
                'password' => bcrypt('12345678')
            ]);
        }
    }
}
