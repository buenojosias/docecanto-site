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
            [ 'day' => 1, 'month' => 5, 'message' => 'Deus criou você com um propósito único e especial.' ],
            [ 'day' => 2, 'month' => 5, 'message' => 'Seja paciente, pois Deus está trabalhando em coisas maravilhosas para você.' ],
            [ 'day' => 3, 'month' => 5, 'message' => 'Agradeça a Deus por cada novo dia de vida que Ele lhe dá.' ],
            [ 'day' => 4, 'month' => 5, 'message' => 'Tenha fé, mesmo nos tempos difíceis, pois Deus nunca abandona seus filhos.' ],
            [ 'day' => 5, 'month' => 5, 'message' => 'Siga os passos de Jesus e encontre paz em seu coração.' ],
            [ 'day' => 6, 'month' => 5, 'message' => 'Não se preocupe com o amanhã, confie em Deus para guiar seu caminho.' ],
            [ 'day' => 7, 'month' => 5, 'message' => 'Encontre força na Palavra de Deus, ela é uma fonte de inspiração e conforto.' ],
            [ 'day' => 8, 'month' => 5, 'message' => 'Deus está sempre presente, mesmo nos momentos de solidão.' ],
            [ 'day' => 9, 'month' => 5, 'message' => 'Confie em Deus e Ele abrirá portas que você nem imaginava existir.' ],
            [ 'day' => 10, 'month' => 5, 'message' => 'Seja grato por cada experiência, pois tudo contribui para o seu crescimento.' ],
            [ 'day' => 11, 'month' => 5, 'message' => 'Ame o próximo como a si mesmo, como Jesus nos ensinou.' ],
            [ 'day' => 12, 'month' => 5, 'message' => 'Saiba que você é precioso aos olhos de Deus, mais do que pode imaginar.' ],
            [ 'day' => 13, 'month' => 5, 'message' => 'A vida é um presente de Deus, aproveite cada momento com gratidão.' ],
            [ 'day' => 14, 'month' => 5, 'message' => 'Deus conhece seus sonhos e desejos, confie que Ele os realizará no tempo certo.' ],
            [ 'day' => 15, 'month' => 5, 'message' => 'Encontre conforto na oração, pois é uma conversa com Deus que acalma a alma.' ],
            [ 'day' => 16, 'month' => 5, 'message' => 'Cultive a fé como uma semente que cresce a cada dia em seu coração.' ],
            [ 'day' => 17, 'month' => 5, 'message' => 'Confie em Deus para lhe dar coragem nos momentos de medo.' ],
            [ 'day' => 18, 'month' => 5, 'message' => 'Seja uma luz no mundo, refletindo o amor e a bondade de Deus.' ],
            [ 'day' => 19, 'month' => 5, 'message' => 'Nunca se esqueça de agradecer a Deus pelas pequenas coisas que tornam a vida especial.' ],
            [ 'day' => 20, 'month' => 5, 'message' => 'Saiba que você não está sozinho, Deus está sempre ao seu lado, mesmo nos momentos mais sombrios.' ],
            [ 'day' => 21, 'month' => 5, 'message' => 'Espalhe alegria e esperança onde quer que vá, como mensageiro do amor de Deus.' ],
            [ 'day' => 22, 'month' => 5, 'message' => 'Lembre-se de que cada desafio é uma oportunidade para crescer e aprender com a ajuda de Deus.' ],
            [ 'day' => 23, 'month' => 5, 'message' => 'Tenha fé nas promessas de Deus, pois Ele nunca falha em cumprir o que promete.' ],
            [ 'day' => 24, 'month' => 5, 'message' => 'Confie em Deus para lhe dar sabedoria nas decisões que tomar na vida.' ],
            [ 'day' => 25, 'month' => 5, 'message' => 'Deus é o seu refúgio seguro em tempos de tempestade, sempre pronto para acolher você em Seus braços.' ],
            [ 'day' => 26, 'month' => 5, 'message' => 'Cultive a paciência e a perseverança, sabendo que Deus tem um plano perfeito para sua vida.' ],
            [ 'day' => 27, 'month' => 5, 'message' => 'Agradeça a Deus por sua família e amigos, pois são presentes preciosos em sua jornada.' ],
            [ 'day' => 28, 'month' => 5, 'message' => 'Seja grato pela dádiva da natureza, um testemunho do amor e da criatividade de Deus.' ],
            [ 'day' => 29, 'month' => 5, 'message' => 'Confie em Deus para lhe dar força para enfrentar os desafios e superar os obstáculos que encontrar.' ],
            [ 'day' => 30, 'month' => 5, 'message' => 'Lembre-se de que Deus sempre ouve suas orações, mesmo quando as respostas não são imediatas.' ],
            [ 'day' => 31, 'month' => 5, 'message' => 'Nunca perca a esperança, pois Deus tem um futuro cheio de esperança e prosperidade reservado para você.' ],

            [ 'day' => 1, 'month' => 6, 'message' => 'Deus está sempre disponível para ouvir suas preocupações e alegrias.' ],
            [ 'day' => 2, 'month' => 6, 'message' => 'Seja uma luz brilhante no mundo, irradiando amor e compaixão.' ],
            [ 'day' => 3, 'month' => 6, 'message' => 'Agradeça a Deus por suas habilidades e talentos únicos.' ],
            [ 'day' => 4, 'month' => 6, 'message' => 'Confie em Deus para lhe dar coragem nos momentos de incerteza.' ],
            [ 'day' => 5, 'month' => 6, 'message' => 'Deus é o melhor amigo que você sempre pode contar.' ],
            [ 'day' => 6, 'month' => 6, 'message' => 'Cultive um coração cheio de perdão, como Deus nos perdoa.' ],
            [ 'day' => 7, 'month' => 6, 'message' => 'A fé pode mover montanhas - confie no poder do seu relacionamento com Deus.' ],
            [ 'day' => 8, 'month' => 6, 'message' => 'Deus é o artista que pintou o céu e criou todas as maravilhas da natureza.' ],
            [ 'day' => 9, 'month' => 6, 'message' => 'Não se preocupe com o que o futuro reserva, Deus já está lá.' ],
            [ 'day' => 10, 'month' => 6, 'message' => 'Seja paciente e confie no timing perfeito de Deus.' ],
            [ 'day' => 11, 'month' => 6, 'message' => 'Aprecie a beleza simples da vida, um presente de Deus para nós.' ],
            [ 'day' => 12, 'month' => 6, 'message' => 'Confie em Deus para lhe dar força nos momentos de fraqueza.' ],
            [ 'day' => 13, 'month' => 6, 'message' => 'Nunca se esqueça do amor incondicional de Deus por você.' ],
            [ 'day' => 14, 'month' => 6, 'message' => 'Deus nunca desiste de nós, mesmo quando nós desistimos de nós mesmos.' ],
            [ 'day' => 15, 'month' => 6, 'message' => 'Mantenha seus olhos fixos em Deus e Ele guiará seus passos.' ],
            [ 'day' => 16, 'month' => 6, 'message' => 'Encontre conforto na presença amorosa de Deus, Ele está sempre ao seu lado.' ],
            [ 'day' => 17, 'month' => 6, 'message' => 'A oração é a chave que abre as portas do céu.'],
            [ 'day' => 18, 'month' => 6, 'message' => 'Espalhe sementes de bondade por onde passar, como um jardineiro do amor de Deus.' ],
            [ 'day' => 19, 'month' => 6, 'message' => 'Confie em Deus para lhe dar paz no meio da tempestade.' ],
            [ 'day' => 20, 'month' => 6, 'message' => 'Saiba que você é amado além da medida, um filho precioso de Deus.' ],
            [ 'day' => 21, 'month' => 6, 'message' => 'Deus nunca nos dá mais do que podemos suportar, Ele está sempre conosco nos momentos difíceis.' ],
            [ 'day' => 22, 'month' => 6, 'message' => 'Cultive a humildade e a gratidão, reconhecendo que tudo o que temos vem de Deus.' ],
            [ 'day' => 23, 'month' => 6, 'message' => 'Seja um instrumento do amor de Deus neste mundo, fazendo a diferença na vida dos outros.' ],
            [ 'day' => 24, 'month' => 6, 'message' => 'Confie em Deus para lhe dar direção quando estiver perdido.' ],
            [ 'day' => 25, 'month' => 6, 'message' => 'Lembre-se de que Deus tem um plano perfeito para sua vida, mesmo quando as coisas não saem como planejado.' ],
            [ 'day' => 26, 'month' => 6, 'message' => 'A fé é como uma semente - regue-a com oração e ela florescerá.' ],
            [ 'day' => 27, 'month' => 6, 'message' => 'Deus nos chama a ser luzes brilhantes em um mundo cheio de escuridão.' ],
            [ 'day' => 28, 'month' => 6, 'message' => 'Confie em Deus para lhe dar força para enfrentar os desafios da vida.' ],
            [ 'day' => 29, 'month' => 6, 'message' => 'Saiba que você é amado exatamente como é, sem reservas ou condições, por Deus.' ],
            [ 'day' => 30, 'month' => 6, 'message' => 'A alegria do Senhor é a nossa força - encontre alegria em Sua presença e em Seu amor eterno.' ],

            [ 'day' => 1, 'month' => 7, 'message' => 'Deus é seu maior fã - Ele torce por você em cada passo do caminho.' ],
            [ 'day' => 2, 'month' => 7, 'message' => 'Confie em Deus para transformar suas lágrimas em sorrisos.' ],
            [ 'day' => 3, 'month' => 7, 'message' => 'Seja grato pelo presente da vida que Deus lhe deu.' ],
            [ 'day' => 4, 'month' => 7, 'message' => 'Deus nunca nos deixa sozinhos, Ele sempre está ao nosso lado.' ],
            [ 'day' => 5, 'month' => 7, 'message' => 'Aprenda a ver o mundo com os olhos cheios de gratidão, como presente de Deus.' ],
            [ 'day' => 6, 'month' => 7, 'message' => 'Encontre conforto na paz que só Deus pode oferecer.' ],
            [ 'day' => 7, 'month' => 7, 'message' => 'Deus lhe deu dons especiais - use-os para fazer o bem no mundo.' ],
            [ 'day' => 8, 'month' => 7, 'message' => 'Seja um reflexo do amor de Deus em todas as suas ações.' ],
            [ 'day' => 9, 'month' => 7, 'message' => 'Confie em Deus para lhe dar coragem para enfrentar seus medos.' ],
            [ 'day' => 10, 'month' => 7, 'message' => 'Nunca duvide do plano perfeito que Deus tem para sua vida.' ],
            [ 'day' => 11, 'month' => 7, 'message' => 'Deus é o maior amigo que você poderia ter - confie Nele em todos os momentos.' ],
            [ 'day' => 12, 'month' => 7, 'message' => 'Acredite que Deus está sempre trabalhando em seu favor, mesmo quando não parece.' ],
            [ 'day' => 13, 'month' => 7, 'message' => 'Cultive a esperança, sabendo que Deus sempre tem algo bom reservado para você.' ],
            [ 'day' => 14, 'month' => 7, 'message' => 'Não se esqueça de que Deus o ama mais do que você jamais poderia imaginar.' ],
            [ 'day' => 15, 'month' => 7, 'message' => 'A oração é a conexão direta com o coração de Deus - nunca subestime seu poder.' ],
            [ 'day' => 16, 'month' => 7, 'message' => 'Confie em Deus para lhe dar força para superar qualquer desafio.' ],
            [ 'day' => 17, 'month' => 7, 'message' => 'Saiba que Deus é sua rocha firme em tempos de incerteza.' ],
            [ 'day' => 18, 'month' => 7, 'message' => 'Lembre-se de que você é um filho amado de Deus, com um propósito único neste mundo.' ],
            [ 'day' => 19, 'month' => 7, 'message' => 'Encontre alegria na presença de Deus, pois Ele está sempre perto.' ],
            [ 'day' => 20, 'month' => 7, 'message' => 'Seja gentil, como Deus é gentil conosco todos os dias.' ],
            [ 'day' => 21, 'month' => 7, 'message' => 'Confie em Deus para lhe dar sabedoria para tomar as melhores decisões.' ],
            [ 'day' => 22, 'month' => 7, 'message' => 'Deus nos ama tanto que enviou Seu filho para nos salvar - que amor incrível!' ],
            [ 'day' => 23, 'month' => 7, 'message' => 'A fé é como uma semente - plante-a no solo do seu coração e veja-a crescer.' ],
            [ 'day' => 24, 'month' => 7, 'message' => 'Agradeça a Deus por cada nova oportunidade de recomeçar.' ],
            [ 'day' => 25, 'month' => 7, 'message' => 'Confie em Deus para enxugar suas lágrimas e trazer alegria ao seu coração.' ],
            [ 'day' => 26, 'month' => 7, 'message' => 'Deus é o arquiteto perfeito do universo - confie Nele para construir sua vida.' ],
            [ 'day' => 27, 'month' => 7, 'message' => 'Saiba que você é valioso aos olhos de Deus, mais do que pode imaginar.' ],
            [ 'day' => 28, 'month' => 7, 'message' => 'Encontre conforto na promessa de Deus de que Ele nunca nos abandonará.' ],
            [ 'day' => 29, 'month' => 7, 'message' => 'A vida é uma jornada com Deus ao nosso lado - que aventura maravilhosa!' ],
            [ 'day' => 30, 'month' => 7, 'message' => 'Confie em Deus para lhe dar paz além do entendimento, mesmo nos momentos mais difíceis.' ],
            [ 'day' => 31, 'month' => 7, 'message' => 'Nunca duvide do amor incondicional de Deus por você - Ele o ama mais do que você jamais saberá.' ],
        ];

        DailyMessage::insert($messages);
    }
}
