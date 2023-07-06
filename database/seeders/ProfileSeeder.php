<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [ 'question' => 'Como conheceu o coral?', 'datatype' => 'string' ],
            [ 'question' => 'Escola/colégio em que estuda', 'datatype' => 'string' ],
            [ 'question' => 'Série escolar', 'datatype' => 'integer' ],
            [ 'question' => 'Turno escolar', 'datatype' => 'string' ],
            [ 'question' => 'Onde faz catequese?', 'datatype' => 'string' ],
            [ 'question' => 'Etapa da catequese', 'datatype' => 'string' ],
            [ 'question' => 'Horário da catequese', 'datatype' => 'time' ],
            [ 'question' => 'Já participou de outro coral?', 'datatype' => 'boolean' ],
            [ 'question' => 'Já fez apresentação musical solo?', 'datatype' => 'boolean' ],
            [ 'question' => 'Toca algum instrumento musical? Se sim, qual?', 'datatype' => 'string' ],
            [ 'question' => 'Estilos musicais preferidos', 'datatype' => 'string' ],
            [ 'question' => 'Cantores e bandas preferidos', 'datatype' => 'string' ],
            [ 'question' => 'Músicas favoritas', 'datatype' => 'string' ],
        ];

        Profile::insert($questions);

        // foreach (Profile::all() as $question) {
        //     $question->members()->syncWithoutDetaching([rand(1, 6) => ['answer' => 'Lorem']]);
        //     $question->members()->syncWithoutDetaching([rand(1, 6) => ['answer' => 'Lorem']]);
        //     $question->members()->syncWithoutDetaching([rand(1, 6) => ['answer' => 'Lorem']]);
        // }
    }
}
