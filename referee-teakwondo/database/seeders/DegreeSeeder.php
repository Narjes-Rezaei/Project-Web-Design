<?php

namespace Database\Seeders;

use App\Models\Admin\Degree;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $degrees = [
            ['IRS',1],
            ['IR1',2],
            ['IR2',3],
            ['IR3',4],
            ['S',5],
            ['1',6],
            ['2',7],
            ['3',8],
        ];

        foreach ($degrees as $degree) {
            Degree::create([
                'name' => $degree[0],
                'level' => $degree[1]
            ]);
        }
    }
}
