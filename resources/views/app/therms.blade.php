<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coral Doce Canto - Termos de uso</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/landing-cd3773bd.css') }}">
    <script src="{{ asset('build/assets/landing-6870bb4e.js') }}" defer></script>
    {{-- @vite(['resources/css/landing.css', 'resources/js/landing.js']) --}}
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center px-1 py-4 bg-gray-100">

        <div class="policy">
            <div class="text-center mb-4">
                <a href="/" href="_blank">
                    <x-application-logo class="w-12 h-12 fill-current text-gray-500" />
                </a>
            </div>

            <h1>TERMO DE USO</h1>
            <p><small>Data de vigência: 6 de agosto de 2023.</small></p>

            <h2>INTRODUÇÃO</h2>
            <p>Bem-vindo ao Coral Doce Canto! Ao acessar e utilizar o nosso aplicativo de apoio ao coral, você concorda com
            os seguintes Termos de Uso. Caso não concorde com estes termos, por favor, não utilize o aplicativo.</p>

            <h2>USO DO APLICATIVO</h2>
            <h3>2.1 Acesso restrito:</h3>
            <p>O acesso ao aplicativo é restrito e requer um login e senha que são gerados externamente pelo administrador
            do coral. O aplicativo é de uso exclusivo dos integrantes do coral e o administrador se reserva o direito de
            conceder ou revogar o acesso ao aplicativo conforme necessário. Em caso de desligamento do integrante, sua
            conta será excluída pelo administrador.</p>

            <h3>2.2 Uso adequado:</h3>
            <p>Ao utilizar o aplicativo, você concorda em respeitar todas as leis e regulamentações aplicáveis e a não
            utilizar o aplicativo de forma indevida ou para fins ilegais.</p>

            <h3>2.3 Conteúdo do aplicativo:</h3>
            <p>O aplicativo oferece letras e áudios de músicas, a agenda do coral e informações sobre os aniversariantes do
            mês. O conteúdo disponibilizado é de propriedade do Coral Doce Canto ou de seus licenciantes e está
            protegido por leis de direitos autorais e outras leis de propriedade intelectual.</p>

            <h3>2.4 Restrições de uso:</h3>
            <p>Você concorda em não copiar, reproduzir, distribuir ou criar obras derivadas do conteúdo do aplicativo sem a
            devida autorização da coordenação do Coral Doce Canto ou de seus licenciantes.</p>

            <h2>RESPONSABILIDADES DO USUÁRIO</h2>
            <h3>3.1 Veracidade das informações:</h3>
            <p>Ao utilizar o aplicativo, você declara que todas as informações fornecidas são verdadeiras, precisas e
            atualizadas.</p>

            <h3>3.2 Comportamento adequado:</h3>
            <p>Você concorda em não realizar nenhuma ação que possa prejudicar a segurança ou o desempenho do aplicativo,
            incluindo a introdução de vírus, malware ou qualquer código malicioso.</p>

            <p class="mt-6 text-center text-sm">Josias Pereira Bueno (Coordenador)<br>
                6 de agosto de 2023.</p>
        </div>
    </div>
</body>

</html>
