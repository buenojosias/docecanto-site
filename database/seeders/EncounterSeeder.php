<?php

namespace Database\Seeders;

use App\Models\Encounter;
use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class EncounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $encouters = [
            [ 'date' => '2023-06-20', 'description' => 'Mussum Ipsum, cacilds vidis litro abertis. Si num tem leite então bota uma pinga aí cumpadi!Quem manda na minha terra sou euzis!Todo mundo vê os porris que eu tomo, mas ninguém vê os tombis que eu levo!Vehicula non. Ut sed ex eros. Vivamus sit amet nibh non tellus tristique interdum.'],
            [ 'date' => '2023-06-27', 'description' => 'Si u mundo tá muito paradis? Toma um mé que o mundo vai girarzis!Viva Forevis aptent taciti sociosqu ad litora torquent.Pra lá , depois divoltis porris, paradis.Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.'],
            [ 'date' => '2023-07-04', 'description' => 'Sapien in monti palavris qui num significa nadis i pareci latim.Mauris nec dolor in eros commodo tempor. Aenean aliquam molestie leo, vitae iaculis nisl.Pra lá , depois divoltis porris, paradis.Leite de capivaris, leite de mula manquis sem cabeça.'],
            [ 'date' => '2023-07-11', 'description' => 'Mais vale um bebadis conhecidiss, que um alcoolatra anonimis.Quem num gosta di mé, boa gentis num é.A ordem dos tratores não altera o pão duris.Delegadis gente finis, bibendum egestas augue arcu ut est.'],
            [ 'date' => '2023-07-18', 'description' => 'Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.Suco de cevadiss deixa as pessoas mais interessantis.Nullam volutpat risus nec leo commodo, ut interdum diam laoreet. Sed non consequat odio.Si num tem leite então bota uma pinga aí cumpadi!'],
            [ 'date' => '2023-07-25', 'description' => 'Admodum accumsan disputationi eu sit. Vide electram sadipscing et per.Vehicula non. Ut sed ex eros. Vivamus sit amet nibh non tellus tristique interdum.Nec orci ornare consequat. Praesent lacinia ultrices consectetur. Sed non ipsum felis.Todo mundo vê os porris que eu tomo, mas ninguém vê os tombis que eu levo!'],
        ];
        // Encounter::query()->insert($encouters);

        $members = Member::query()->where('status', 'Ativo')->get();
        $encounters = Encounter::query()->whereDate('date', '<', date('Y-m-d'))->get();

        foreach ($encounters as $encounter) {
            foreach($members as $member) {
                $encounter->members()->syncWithoutDetaching([
                    $member->id => ['attendance' => Arr::random(['P', 'P', 'P', 'P', 'F', 'J'])]
                ]);
            }
        }
    }
}
