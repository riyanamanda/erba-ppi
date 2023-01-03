<?php

namespace App\Http\Controllers;

use App\Models\RuangRawatInap;
use App\Models\Surveilans;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $ruangan = RuangRawatInap::all();
        $surveilans = Surveilans::get()->groupBy('surveilansable_type');

        return view('pages.home', compact('ruangan', 'surveilans'));
    }
}
