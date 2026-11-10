<?php

namespace App\Controllers;

use App\Models\AlumnoModel;

class Home extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function dashboard()
    {
        if (session()->get('autenticado') !== true) {
            return redirect()->to(site_url('login'));
        }

        return view('dashboard', [
            'totalAlumnos' => (new AlumnoModel())->countAllResults(),
        ]);
    }
}
