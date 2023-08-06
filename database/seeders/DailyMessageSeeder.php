<?php

namespace Database\Seeders;

use App\Models\DailyMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DailyMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messages = [
            [ 'day' => 1, 'month' => 8, 'message' => 'Acredite em si mesmo, pois você é capaz de alcançar grandes conquistas.' ],
            [ 'day' => 2, 'month' => 8, 'message' => 'As dificuldades são oportunidades disfarçadas. Supere-as e cresça ainda mais forte.' ],
            [ 'day' => 3, 'month' => 8, 'message' => 'O sucesso é a soma de pequenos esforços repetidos dia após dia.' ],
            [ 'day' => 4, 'month' => 8, 'message' => 'Não espere por condições ideais, crie suas próprias oportunidades.' ],
            [ 'day' => 5, 'month' => 8, 'message' => 'Seja a mudança que você deseja ver no mundo.' ],
            [ 'day' => 6, 'month' => 8, 'message' => 'O fracasso é apenas um degrau para o triunfo. Não desista.' ],
            [ 'day' => 7, 'month' => 8, 'message' => 'A jornada mais gratificante começa com um único passo corajoso.' ],
            [ 'day' => 8, 'month' => 8, 'message' => 'A força de vontade é o combustível que nos leva aos nossos sonhos.' ],
            [ 'day' => 9, 'month' => 8, 'message' => 'Você é único e tem talentos excepcionais a oferecer ao mundo.' ],
            [ 'day' => 10, 'month' => 8, 'message' => 'Seja grato pelo que tem, mas não tenha medo de almejar o que pode conquistar.' ],
            [ 'day' => 11, 'month' => 8, 'message' => 'Você é capaz de coisas incríveis, acredite em si mesmo!' ],
            [ 'day' => 12, 'month' => 8, 'message' => 'Não tenha medo de errar, é assim que aprendemos e crescemos.' ],
            [ 'day' => 13, 'month' => 8, 'message' => 'Seja sempre verdadeiro(a) consigo mesmo(a) e com os outros.' ],
            [ 'day' => 14, 'month' => 8, 'message' => 'Nunca desista, pois a persistência é o caminho para o sucesso.' ],
            [ 'day' => 15, 'month' => 8, 'message' => 'Você é único(a) e especial, e o mundo precisa do seu brilho.' ],
            [ 'day' => 16, 'month' => 8, 'message' => 'A imaginação é o poder que torna seus sonhos realidade.' ],
            [ 'day' => 17, 'month' => 8, 'message' => 'Não se compare aos outros, cada um tem seu ritmo e talentos.' ],
            [ 'day' => 18, 'month' => 8, 'message' => 'As pequenas conquistas também são motivo de orgulho!' ],
            [ 'day' => 19, 'month' => 8, 'message' => 'Com gentileza e respeito, podemos fazer a diferença no mundo.' ],
            [ 'day' => 20, 'month' => 8, 'message' => 'Você tem o poder de escolher tornar cada dia incrível!' ],
            [ 'day' => 21, 'month' => 8, 'message' => 'Acredite na jornada, pois cada passo é uma oportunidade de crescer e aprender.' ],
            [ 'day' => 22, 'month' => 8, 'message' => 'A felicidade é contagiosa. Espalhe-a por onde passar e veja o mundo sorrir de volta.' ],
            [ 'day' => 23, 'month' => 8, 'message' => 'Lembre-se de que você é capaz de superar desafios, pois dentro de você reside uma força inquebrável.' ],
            [ 'day' => 24, 'month' => 8, 'message' => 'Abra as janelas do coração e permita que os raios de esperança iluminem o seu dia.' ],
            [ 'day' => 25, 'month' => 8, 'message' => 'Cultive a paciência, pois as melhores coisas da vida florescem com o tempo.' ],
            [ 'day' => 26, 'month' => 8, 'message' => 'A sua determinação é a chave que abre portas para um futuro brilhante.' ],
            [ 'day' => 27, 'month' => 8, 'message' => 'Encontre beleza na diversidade, pois é aí que a verdadeira riqueza da humanidade reside.' ],
            [ 'day' => 28, 'month' => 8, 'message' => 'Liberte-se das amarras do passado; o presente é a tela em branco para um futuro promissor.' ],
            [ 'day' => 29, 'month' => 8, 'message' => 'Nunca subestime o poder de um ato gentil. Um simples gesto pode mudar o dia de alguém.' ],
            [ 'day' => 30, 'month' => 8, 'message' => 'Com otimismo, enxergamos oportunidades onde outros veem apenas desafios.' ],
            [ 'day' => 31, 'month' => 8, 'message' => 'O amor e a compaixão são a base para uma vida plena. Cultive esses sentimentos em seu coração.' ],
        ];

        DailyMessage::insert($messages);
    }
}
