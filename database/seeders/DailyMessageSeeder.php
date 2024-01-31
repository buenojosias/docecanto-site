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
            [ 'day' => 1, 'month' => 1, 'message' => 'Lembre-se sempre: você é amado exatamente como é.' ],
            [ 'day' => 2, 'month' => 1, 'message' => 'Sorria! Cada dia é uma nova chance de ser feliz.' ],
            [ 'day' => 3, 'month' => 1, 'message' => 'Nunca se esqueça de agradecer pelas pequenas coisas.' ],
            [ 'day' => 4, 'month' => 1, 'message' => 'Confie em Deus, Ele tem planos maravilhosos para você.' ],
            [ 'day' => 5, 'month' => 1, 'message' => 'Seja gentil, como Jesus nos ensinou.' ],
            [ 'day' => 6, 'month' => 1, 'message' => 'Acredite em si mesmo, você é mais forte do que imagina.' ],
            [ 'day' => 7, 'month' => 1, 'message' => 'O amor de Deus é como um abraço que nos envolve sempre.' ],
            [ 'day' => 8, 'month' => 1, 'message' => 'Espalhe bondade por onde passar, como raios de luz.' ],
            [ 'day' => 9, 'month' => 1, 'message' => 'Ore sempre, Deus está sempre ouvindo.' ],
            [ 'day' => 10, 'month' => 1, 'message' => 'Não desista, Deus está ao seu lado em cada passo.' ],
            [ 'day' => 11, 'month' => 1, 'message' => 'Seja paciente, tudo acontece no tempo certo de Deus.' ],
            [ 'day' => 12, 'month' => 1, 'message' => 'Encontre alegria nas coisas simples da vida.' ],
            [ 'day' => 13, 'month' => 1, 'message' => 'Com fé, você pode superar qualquer desafio.' ],
            [ 'day' => 14, 'month' => 1, 'message' => 'Deus nos dá forças quando nos sentimos fracos.' ],
            [ 'day' => 15, 'month' => 1, 'message' => 'Cultive a gratidão em seu coração todos os dias.' ],
            [ 'day' => 16, 'month' => 1, 'message' => 'Você é especial e único aos olhos de Deus.' ],
            [ 'day' => 17, 'month' => 1, 'message' => 'Deixe sua luz brilhar, como uma estrela no céu.' ],
            [ 'day' => 18, 'month' => 1, 'message' => 'Tenha coragem, Deus está com você em todas as batalhas.' ],
            [ 'day' => 19, 'month' => 1, 'message' => 'Valorize suas amizades, elas são presentes de Deus.' ],
            [ 'day' => 20, 'month' => 1, 'message' => 'Nunca duvide do poder do amor de Deus por você.' ],
            [ 'day' => 21, 'month' => 1, 'message' => 'Faça o bem sem olhar a quem, como Jesus nos ensinou.' ],
            [ 'day' => 22, 'month' => 1, 'message' => 'Seja humilde e gentil, como Jesus foi.' ],
            [ 'day' => 23, 'month' => 1, 'message' => 'Lembre-se de sempre dar o seu melhor em tudo o que fizer.' ],
            [ 'day' => 24, 'month' => 1, 'message' => 'Mantenha a esperança viva em seu coração, pois Deus nunca falha.' ],
            [ 'day' => 25, 'month' => 1, 'message' => 'Deus sempre escuta suas orações, mesmo quando parece que não há resposta.' ],
            [ 'day' => 26, 'month' => 1, 'message' => 'O amor de Deus é como um escudo que nos protege.' ],
            [ 'day' => 27, 'month' => 1, 'message' => 'Encontre conforto na fé nos momentos difíceis.' ],
            [ 'day' => 28, 'month' => 1, 'message' => 'Seja grato pela vida e por todas as suas bênçãos.' ],
            [ 'day' => 29, 'month' => 1, 'message' => 'Acredite no poder da oração, pois Deus sempre responde.' ],
            [ 'day' => 30, 'month' => 1, 'message' => 'Deus tem um propósito para sua vida, confie nele.' ],
            [ 'day' => 31, 'month' => 1, 'message' => 'Você é amado além da medida, nunca se esqueça disso.' ],

            [ 'day' => 1, 'month' => 2, 'message' => 'Lembre-se sempre: você é amado exatamente como é, com todas as suas imperfeições. Deus nos ama incondicionalmente!' ],
            [ 'day' => 2, 'month' => 2, 'message' => 'Assim como as estrelas no céu, você também é uma luz especial neste mundo. Deixe seu brilho iluminar os corações ao seu redor!' ],
            [ 'day' => 3, 'month' => 2, 'message' => 'Não importa quão difícil seja o dia, sempre há uma razão para sorrir. Deus está ao seu lado, guiando seus passos.' ],
            [ 'day' => 4, 'month' => 2, 'message' => 'Cada novo amanhecer é um presente precioso de Deus. Aproveite cada momento e faça dele algo especial!' ],
            [ 'day' => 5, 'month' => 2, 'message' => 'Mesmo nos dias nublados, lembre-se de que o sol está sempre brilhando por trás das nuvens. Da mesma forma, a esperança nunca desaparece.' ],
            [ 'day' => 6, 'month' => 2, 'message' => 'Não se preocupe com o que o futuro reserva. Confie em Deus e siga em frente com fé e coragem!' ],
            [ 'day' => 7, 'month' => 2, 'message' => 'Seja gentil e compassivo com todos ao seu redor. O amor de Deus se manifesta em nossas ações amorosas.' ],
            [ 'day' => 8, 'month' => 2, 'message' => 'Cada desafio que você enfrenta é uma oportunidade para crescer e aprender. Confie em Deus para lhe dar forças!' ],
            [ 'day' => 9, 'month' => 2, 'message' => 'Nunca duvide do seu valor. Você é uma obra-prima criada por Deus, com um propósito único neste mundo.' ],
            [ 'day' => 10, 'month' => 2, 'message' => 'Quando sentir medo, lembre-se de que Deus está sempre presente para acalmar seu coração e guiar seu caminho.' ],
            [ 'day' => 11, 'month' => 2, 'message' => 'Cultive a gratidão em seu coração. Deus nos abençoa com tantas bênçãos todos os dias!' ],
            [ 'day' => 12, 'month' => 2, 'message' => 'Não se compare aos outros. Deus fez você único e especial, com seus próprios talentos e habilidades.' ],
            [ 'day' => 13, 'month' => 2, 'message' => 'Permita que a fé seja sua âncora nos tempos difíceis. Deus nunca nos dá mais do que podemos suportar.' ],
            [ 'day' => 14, 'month' => 2, 'message' => 'Seja paciente e confiante. Deus tem um plano perfeito para sua vida, mesmo que às vezes não possamos entendê-lo.' ],
            [ 'day' => 15, 'month' => 2, 'message' => 'Espalhe amor e bondade por onde quer que vá. Essas são as maiores expressões do amor de Deus em nossas vidas.' ],
            [ 'day' => 16, 'month' => 2, 'message' => 'Nunca subestime o poder de uma oração. Deus sempre ouve e responde às nossas súplicas com amor.' ],
            [ 'day' => 17, 'month' => 2, 'message' => 'Abra seu coração para a beleza da vida ao seu redor. Deus nos presenteia com maravilhas todos os dias!'],
            [ 'day' => 18, 'month' => 2, 'message' => 'Agradeça a Deus por suas bênçãos, grandes e pequenas. Cada uma delas é um lembrete do Seu amor por nós.' ],
            [ 'day' => 19, 'month' => 2, 'message' => 'Seja paciente consigo mesmo. Deus está sempre ao seu lado, ajudando-o a crescer e a se tornar a melhor versão de si mesmo.' ],
            [ 'day' => 20, 'month' => 2, 'message' => 'Confie nos planos de Deus para você. Ele conhece o caminho que leva à felicidade e à realização verdadeira.' ],
            [ 'day' => 21, 'month' => 2, 'message' => 'Lembre-se de que você é um filho amado de Deus, com um propósito único e especial neste mundo.' ],
            [ 'day' => 22, 'month' => 2, 'message' => 'Permita que a luz de Deus brilhe através de você, iluminando o mundo com amor e compaixão.' ],
            [ 'day' => 23, 'month' => 2, 'message' => 'Mesmo nos momentos mais sombrios, lembre-se de que Deus está sempre presente, envolvendo-o em Seu amor inabalável.' ],
            [ 'day' => 24, 'month' => 2, 'message' => 'Cultive a fé como uma semente preciosa em seu coração. Com o tempo, ela crescerá e florescerá, fortalecendo sua alma.' ],
            [ 'day' => 25, 'month' => 2, 'message' => 'Nunca perca a esperança, pois Deus está sempre trabalhando nos bastidores, preparando um futuro cheio de promessas para você.' ],
            [ 'day' => 26, 'month' => 2, 'message' => 'Abençoe cada desafio como uma oportunidade de crescimento e superação. Deus nunca nos dá mais do que podemos suportar.' ],
            [ 'day' => 27, 'month' => 2, 'message' => 'Seja um canal do amor de Deus para aqueles ao seu redor, espalhando alegria, compaixão e gentileza onde quer que vá.' ],
            [ 'day' => 28, 'month' => 2, 'message' => 'Confie na sabedoria e no amor de Deus para guiar seus passos. Ele conhece o melhor caminho para sua vida.' ],
            [ 'day' => 29, 'month' => 2, 'message' => 'Agradeça a Deus por cada dia de vida e por todas as bênçãos que Ele derrama sobre você. Sua bondade é infinita!' ],
        ];

        DailyMessage::insert($messages);
    }
}
