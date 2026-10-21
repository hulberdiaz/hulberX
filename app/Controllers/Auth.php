<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('autenticado') === true) {
            return redirect()->to(site_url('dashboard'));
        }

        return view('auth/login');
    }

    public function validar()
    {
        $usuario = (string) $this->request->getPost('usuario');
        $password = (string) $this->request->getPost('password');

        $usuarioCorrecto = 'admin';
        $passwordCorrecto = '123';

        if (
            hash_equals($usuarioCorrecto, $usuario) &&
            hash_equals($passwordCorrecto, $password)
        ) {
            session()->regenerate();
            session()->set([
                'autenticado' => true,
                'usuario' => $usuario,
            ]);

            return redirect()->to(site_url('dashboard'));
        }

        session()->setFlashdata('error', 'Usuario o contraseña incorrectos.');

        return redirect()->to(site_url('login'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(site_url('login'));
    }
}
