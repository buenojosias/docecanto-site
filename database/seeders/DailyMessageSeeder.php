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
            [ 'day' => 1, 'month' => 9, 'message' => 'Você é incrível exatamente do jeito que é.' ],
            [ 'day' => 2, 'month' => 9, 'message' => 'Acredite em si mesmo, pois você é capaz de coisas incríveis.' ],
            [ 'day' => 3, 'month' => 9, 'message' => 'Cada dia é uma nova oportunidade para aprender algo novo.' ],
            [ 'day' => 4, 'month' => 9, 'message' => 'Seja gentil com os outros e espalhe amor pelo mundo.' ],
            [ 'day' => 5, 'month' => 9, 'message' => 'Não tenha medo de cometer erros, pois é assim que aprendemos.' ],
            [ 'day' => 6, 'month' => 9, 'message' => 'Sorria, pois seu sorriso ilumina o dia de alguém.' ],
            [ 'day' => 7, 'month' => 9, 'message' => 'Você é único e especial, e isso é algo maravilhoso.' ],
            [ 'day' => 8, 'month' => 9, 'message' => 'Sonhe grande e siga seus sonhos com determinação.' ],
            [ 'day' => 9, 'month' => 9, 'message' => 'A vida é cheia de surpresas emocionantes. Esteja aberto a elas.' ],
            [ 'day' => 10, 'month' => 9, 'message' => 'Não deixe ninguém dizer que você não pode fazer algo. Você pode!' ],
            [ 'day' => 11, 'month' => 9, 'message' => 'Sempre faça o seu melhor, e isso será o suficiente.' ],
            [ 'day' => 12, 'month' => 9, 'message' => 'Seja grato pelas pequenas coisas da vida.' ],
            [ 'day' => 13, 'month' => 9, 'message' => 'O mundo é cheio de beleza. Preste atenção aos detalhes.' ],
            [ 'day' => 14, 'month' => 9, 'message' => 'A amizade é um tesouro. Cuide dos seus amigos.' ],
            [ 'day' => 15, 'month' => 9, 'message' => 'Você é mais forte do que imagina.' ],
            [ 'day' => 16, 'month' => 9, 'message' => 'A persistência leva ao sucesso. Continue tentando.' ],
            [ 'day' => 17, 'month' => 9, 'message' => 'Cuide bem de seu corpo e mente. Eles são preciosos.' ],
            [ 'day' => 18, 'month' => 9, 'message' => 'Não se compare aos outros. Você é único.' ],
            [ 'day' => 19, 'month' => 9, 'message' => 'O amor e o apoio da sua família são inabaláveis.' ],
            [ 'day' => 20, 'month' => 9, 'message' => 'Use seu poder para fazer o bem no mundo.' ],
            [ 'day' => 21, 'month' => 9, 'message' => 'A imaginação é uma ferramenta poderosa. Explore-a.' ],
            [ 'day' => 22, 'month' => 9, 'message' => 'Esteja disposto a aprender com os outros.' ],
            [ 'day' => 23, 'month' => 9, 'message' => 'O tempo voa, então aproveite cada momento.' ],
            [ 'day' => 24, 'month' => 9, 'message' => 'Seja corajoso e enfrente seus medos.' ],
            [ 'day' => 25, 'month' => 9, 'message' => 'Comemore suas realizações, não importa o quão pequenas pareçam.' ],
            [ 'day' => 26, 'month' => 9, 'message' => 'O mundo está cheio de coisas boas para descobrir.' ],
            [ 'day' => 27, 'month' => 9, 'message' => 'Nunca deixe de acreditar em si mesmo.' ],
            [ 'day' => 28, 'month' => 9, 'message' => 'A vida é uma aventura emocionante. Aproveite-a ao máximo.' ],
            [ 'day' => 29, 'month' => 9, 'message' => 'Lembre-se de que você é amado e apoiado.' ],
            [ 'day' => 30, 'month' => 9, 'message' => 'Você é o autor da sua própria história. Faça-a incrível!' ],
            [ 'day' => 31, 'month' => 8, 'message' => 'O amor e a compaixão são a base para uma vida plena. Cultive esses sentimentos em seu coração.' ],

            [ 'day' => 1, 'month' => 10, 'message' => 'Deus te ama exatamente como você é.' ],
            [ 'day' => 2, 'month' => 10, 'message' => 'Ore sempre, pois Deus está sempre ouvindo.' ],
            [ 'day' => 3, 'month' => 10, 'message' => 'Tenha fé, e você moverá montanhas.' ],
            [ 'day' => 4, 'month' => 10, 'message' => 'Seja uma luz brilhante no mundo, como Jesus nos ensinou.' ],
            [ 'day' => 5, 'month' => 10, 'message' => 'Deus tem um plano maravilhoso para a sua vida.' ],
            [ 'day' => 6, 'month' => 10, 'message' => 'Confie em Deus, pois Ele é o seu refúgio seguro.' ],
            [ 'day' => 7, 'month' => 10, 'message' => 'Siga os mandamentos de Deus para uma vida feliz.' ],
            [ 'day' => 8, 'month' => 10, 'message' => 'Deus te fez especial à Sua imagem e semelhança.' ],
            [ 'day' => 9, 'month' => 10, 'message' => 'Deus nunca te abandonará, mesmo nos momentos difíceis.' ],
            [ 'day' => 10, 'month' => 10, 'message' => 'Seja grato a Deus por todas as bênçãos que você tem.' ],
            [ 'day' => 11, 'month' => 10, 'message' => 'Jesus é o seu melhor amigo e guia.' ],
            [ 'day' => 12, 'month' => 10, 'message' => 'Deus sempre caminha ao seu lado, mesmo quando você não O vê.' ],
            [ 'day' => 13, 'month' => 10, 'message' => 'Ore antes de tomar decisões importantes, e Deus te guiará.' ],
            [ 'day' => 14, 'month' => 10, 'message' => 'Ame o próximo como a si mesmo, como Jesus ensinou.' ],
            [ 'day' => 15, 'month' => 10, 'message' => 'Seja um instrumento do amor de Deus no mundo.' ],
            [ 'day' => 16, 'month' => 10, 'message' => 'Deus é a fonte da verdadeira paz e alegria.' ],
            [ 'day' => 17, 'month' => 10, 'message' => 'Tenha paciência, pois Deus tem um tempo para tudo.' ],
            [ 'day' => 18, 'month' => 10, 'message' => 'Deus te fortalecerá nas adversidades.' ],
            [ 'day' => 19, 'month' => 10, 'message' => 'Seu coração é um lugar onde Deus pode habitar.' ],
            [ 'day' => 20, 'month' => 10, 'message' => 'Confie no plano divino de Deus, mesmo que não o compreenda completamente.' ],
            [ 'day' => 21, 'month' => 10, 'message' => 'Agradeça a Deus todos os dias pela dádiva da vida.' ],
            [ 'day' => 22, 'month' => 10, 'message' => 'Deus te deu talentos únicos para compartilhar com o mundo.' ],
            [ 'day' => 23, 'month' => 10, 'message' => 'Lembre-se de orar pelos que precisam de ajuda e amor.' ],
            [ 'day' => 24, 'month' => 10, 'message' => 'Deus te abençoa com Sua graça todos os dias.' ],
            [ 'day' => 25, 'month' => 10, 'message' => 'Seja compassivo, como Jesus mostrou em Sua vida.' ],
            [ 'day' => 26, 'month' => 10, 'message' => 'Deus te dá força para superar desafios.' ],
            [ 'day' => 27, 'month' => 10, 'message' => 'Acredite que Deus tem um propósito para você.' ],
            [ 'day' => 28, 'month' => 10, 'message' => 'Deus te protege com Seu amor e cuidado constante.' ],
            [ 'day' => 29, 'month' => 10, 'message' => 'Siga os ensinamentos de Jesus para encontrar o caminho certo.' ],
            [ 'day' => 30, 'month' => 10, 'message' => 'Deus te guiará em todas as áreas da sua vida.' ],
            [ 'day' => 31, 'month' => 10, 'message' => 'Lembre-se de que você é uma criação divina, e seu valor é infinito aos olhos de Deus.' ],
        ];

        DailyMessage::insert($messages);
    }
}
