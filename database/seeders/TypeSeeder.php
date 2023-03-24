<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Sviluppo',
            'Costruzione',
            'Ricerca e sviluppo',
            'Marketing',
            'Formazione',
        ];

        foreach ($types as $type) {

            Type::create([

                'name' => $type,

            ]);

        }
    }
}
