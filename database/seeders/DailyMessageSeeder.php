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
            [ 'day' => 1, 'month' => 3, 'message' => 'Deus te ama do jeitinho que você é! Acredite em você mesmo(a).' ],
            [ 'day' => 2, 'month' => 3, 'message' => 'Com a força de Deus, você pode conquistar qualquer coisa.' ],
            [ 'day' => 3, 'month' => 3, 'message' => 'Ore, tenha fé e nunca desista dos seus sonhos.' ],
            [ 'day' => 4, 'month' => 3, 'message' => 'Deus te deu talentos incríveis. Use-os para fazer o bem e brilhar!' ],
            [ 'day' => 5, 'month' => 3, 'message' => 'Seja grato(a) pelas pequenas coisas. A felicidade está nos detalhes.' ],
            [ 'day' => 6, 'month' => 3, 'message' => 'Acredite na sua luz interior. Você é capaz de grandes feitos!' ],
            [ 'day' => 7, 'month' => 3, 'message' => 'Deus está sempre com você, nos momentos bons e nos ruins.' ],
            [ 'day' => 8, 'month' => 3, 'message' => 'Confie em Deus e siga seu coração. Você encontrará o caminho certo.' ],
            [ 'day' => 9, 'month' => 3, 'message' => 'A cada dia, Deus te dá a oportunidade de ser feliz. Aproveite!' ],
            [ 'day' => 10, 'month' => 3, 'message' => 'Seja forte e corajoso(a). Deus te dará a força que você precisa.' ],
            [ 'day' => 11, 'month' => 3, 'message' => 'Você é único(a) e especial. Não se compare com ninguém.' ],
            [ 'day' => 12, 'month' => 3, 'message' => 'Ame a si mesmo antes de tudo. Só assim você poderá amar os outros.' ],
            [ 'day' => 13, 'month' => 3, 'message' => 'Seja gentil consigo mesmo(a). Todos cometemos erros.' ],
            [ 'day' => 14, 'month' => 3, 'message' => 'Perdoe-se e aprenda com seus erros.' ],
            [ 'day' => 15, 'month' => 3, 'message' => 'Cuide do seu corpo e da sua mente. Você é um templo de Deus.' ],
            [ 'day' => 16, 'month' => 3, 'message' => 'Seja positivo(a) e otimista. A vida é cheia de possibilidades!' ],
            [ 'day' => 17, 'month' => 3, 'message' => 'Acredite no seu potencial. Você pode alcançar grandes sonhos!' ],
            [ 'day' => 18, 'month' => 3, 'message' => 'Tenha pensamentos positivos. Eles atraem coisas boas para sua vida.' ],
            [ 'day' => 19, 'month' => 3, 'message' => 'Seja grato(a) por tudo que você tem. A gratidão abre portas para a felicidade.' ],
            [ 'day' => 20, 'month' => 3, 'message' => 'Sorria! A felicidade é contagiante.' ],
            [ 'day' => 21, 'month' => 3, 'message' => 'Não tenha medo de errar. Os erros te ensinam a crescer.' ],
            [ 'day' => 22, 'month' => 3, 'message' => 'Levante a cabeça e siga em frente. Os obstáculos te fazem mais forte.' ],
            [ 'day' => 23, 'month' => 3, 'message' => 'Acredite em você mesmo(a) e na sua capacidade de superar desafios.' ],
            [ 'day' => 24, 'month' => 3, 'message' => 'Deus está sempre com você, te guiando e protegendo.' ],
            [ 'day' => 25, 'month' => 3, 'message' => 'Tenha fé e esperança. Os dias melhores virão.' ],
            [ 'day' => 26, 'month' => 3, 'message' => 'Nunca desista dos seus sonhos. Lute por aquilo que você quer.' ],
            [ 'day' => 27, 'month' => 3, 'message' => 'Seja perseverante. A persistência leva ao sucesso.' ],
            [ 'day' => 28, 'month' => 3, 'message' => 'Tenha coragem para enfrentar seus medos. Você é mais forte do que imagina.' ],
            [ 'day' => 29, 'month' => 3, 'message' => 'Seja resiliente. Aprenda a lidar com as dificuldades da vida.' ],
            [ 'day' => 30, 'month' => 3, 'message' => 'Busque ajuda quando precisar. Você não está sozinho(a).' ],
            [ 'day' => 31, 'month' => 3, 'message' => 'Você é amado(a) por Deus e por todas as pessoas que te rodeiam.' ],

            [ 'day' => 1, 'month' => 4, 'message' => 'Deus te deu a vida para que você seja feliz. Aproveite cada momento!' ],
            [ 'day' => 2, 'month' => 4, 'message' => 'A fé em Deus te dará a força que você precisa para superar qualquer obstáculo.' ],
            [ 'day' => 3, 'month' => 4, 'message' => 'Ore e peça a Deus que te guie e te proteja em todos os momentos.' ],
            [ 'day' => 4, 'month' => 4, 'message' => 'Agradeça a Deus por tudo que você tem, mesmo pelas coisas pequenas.' ],
            [ 'day' => 5, 'month' => 4, 'message' => 'Leia a Bíblia e aprenda sobre o amor de Deus por você.' ],
            [ 'day' => 6, 'month' => 4, 'message' => 'Participe de atividades religiosas e faça novos amigos que te amem e te apoiem.' ],
            [ 'day' => 7, 'month' => 4, 'message' => 'Seja um exemplo de fé e amor para as pessoas que te rodeiam.' ],
            [ 'day' => 8, 'month' => 4, 'message' => 'Mostre ao mundo a luz de Deus que existe dentro de você.' ],
            [ 'day' => 9, 'month' => 4, 'message' => 'Faça a diferença no mundo com suas boas ações.' ],
            [ 'day' => 10, 'month' => 4, 'message' => 'Você é uma obra-prima de Deus. Ame e valorize a si mesmo.' ],
            [ 'day' => 11, 'month' => 4, 'message' => 'Seja gentil consigo mesmo(a). Todos nós cometemos erros, mas isso não significa que somos menos importantes.' ],
            [ 'day' => 12, 'month' => 4, 'message' => 'Perdoe-se pelas suas falhas e aprenda com elas.' ],
            [ 'day' => 13, 'month' => 4, 'message' => 'Aceite-se como você é, com seus pontos fortes e fracos.' ],
            [ 'day' => 14, 'month' => 4, 'message' => 'Cuide do seu corpo e da sua mente. Você é um templo de Deus.' ],
            [ 'day' => 15, 'month' => 4, 'message' => 'Alimente-se de pensamentos positivos e construtivos.' ],
            [ 'day' => 16, 'month' => 4, 'message' => 'Acredite em você mesmo(a) e no seu potencial.' ],
            [ 'day' => 17, 'month' => 4, 'message' => 'Seja otimista e tenha esperança no futuro.!'],
            [ 'day' => 18, 'month' => 4, 'message' => 'Sorria para a vida e para as pessoas que você ama.' ],
            [ 'day' => 19, 'month' => 4, 'message' => 'Seja feliz! A felicidade é um presente de Deus.' ],
            [ 'day' => 20, 'month' => 4, 'message' => 'Os desafios da vida te fazem mais forte e mais resiliente.' ],
            [ 'day' => 21, 'month' => 4, 'message' => 'Não tenha medo de errar. Os erros te ensinam a crescer.' ],
            [ 'day' => 22, 'month' => 4, 'message' => 'Levante a cabeça e siga em frente. Os obstáculos te aproximam dos seus sonhos.' ],
            [ 'day' => 23, 'month' => 4, 'message' => 'Acredite em você mesmo e na sua capacidade de superar qualquer desafio.' ],
            [ 'day' => 24, 'month' => 4, 'message' => 'Deus está sempre com você, te guiando e te protegendo.' ],
            [ 'day' => 25, 'month' => 4, 'message' => 'Tenha fé e esperança. Os dias melhores virão.' ],
            [ 'day' => 26, 'month' => 4, 'message' => 'Nunca desista dos seus sonhos. Lute por aquilo que você quer.' ],
            [ 'day' => 27, 'month' => 4, 'message' => 'Seja perseverante. A persistência leva ao sucesso.' ],
            [ 'day' => 28, 'month' => 4, 'message' => 'Tenha coragem para enfrentar seus medos. Você é mais forte do que imagina.' ],
            [ 'day' => 29, 'month' => 4, 'message' => 'Seja resiliente. Aprenda a lidar com as dificuldades da vida.' ],
            [ 'day' => 30, 'month' => 4, 'message' => 'Deus te deu a luz da fé para iluminar seu caminho. Siga em frente com confiança!' ],
        ];

        DailyMessage::insert($messages);
    }
}


