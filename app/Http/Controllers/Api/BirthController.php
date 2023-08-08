<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BirthController extends Controller
{
    public function __invoke($period)
    {
        $births = Member::query()
            ->select(['name', 'birth'])
            ->where('status', 'Ativo')
            ->when($period === 'week', function ($query) {
                $query
                    ->whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(birth) AND DAYOFYEAR(curdate()) + 4 >=  dayofyear(birth)')
                    ->orWhereRaw('DAYOFYEAR(curdate()) >= DAYOFYEAR(birth) AND DAYOFYEAR(curdate()) - 3 <=  dayofyear(birth)')
                    ->orderByRaw('DAYOFYEAR(birth)');
            })
            ->when($period === 'month', function ($query) {
                $query
                    ->whereMonth('birth', date('m'));
            })
            ->orderByRaw('DAY(birth)')
            ->get();

        foreach ($births as $birth) {
            $birth->short_name = strstr($birth->name, ' ', true);
            if (Carbon::parse($birth->birth)->format('m-d') == Carbon::parse(now())->format('m-d')) {
                $birth->nearby = 'Hoje';
            } else if (Carbon::parse($birth->birth)->format('m-d') == Carbon::parse(now()->addDay())->format('m-d')) {
                $birth->nearby = 'Amanhã';
            }
        }

        return response()->json($births);
    }
}
