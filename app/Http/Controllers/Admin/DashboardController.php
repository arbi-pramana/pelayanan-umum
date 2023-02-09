<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Show page dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pageDashboard()
    {
        $data['konsumsi'] ='';
        $data['kendaraan'] ='';
        $data['ruangan'] ='';
        $data['spj'] ='';

        return view('admin::dashboard.dashboard');
    }
}
