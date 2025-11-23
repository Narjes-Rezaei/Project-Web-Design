<?php

namespace Database\Seeders;

use App\Models\Admin\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            'Tehran',
            'Alborz',
            'Azarbayjan-e Sharqi',
            'Azarbayjan-e Gharbi',
            'Ardabil',
            'Esfahan',
            'Ilam',
            'Bushehr',
            'Chaharmahal va Bakhtiari',
            'Khorasan-e Jonubi',
            'Khorasan-e Shomali',
            'Khorasan-e Razavi',
            'Kerman',
            'Kermanshah',
            'Khuzestan',
            'Kohgiluyeh va Boyer-Ahmad',
            'Kurdestan',
            'Lorestan',
            'Markazi',
            'Mazandaran',
            'Qazvin',
            'Qom',
            'Semnan',
            'Sistan va Baluchestan',
            'Yazd',
            'Hormozgan',
            'Golestan',
            'Gilan',
            'Hamadan',
            'Zanjan'
        ];

        foreach($provinces as $province){
            Province::create([
                'name' => $province
            ]);
        }
    }
}
