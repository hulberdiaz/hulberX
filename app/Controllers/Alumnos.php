<?php

namespace App\Controllers;

use App\Models\AlumnoModel;

class Alumnos extends BaseController
{
    private function requiereSesion()
    {
        if (session()->get('autenticado') !== true) {
            return redirect()->to(site_url('login'))
                ->with('error', 'Debes iniciar sesión para administrar los registros.');
        }

        return null;
    }

    public function index()
    {
        if ($respuesta = $this->requiereSesion()) {
            return $respuesta;
        }

        return view('Alumnos/index', [
            'alumnos' => (new AlumnoModel())->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function nuevo()
    {
        if ($respuesta = $this->requiereSesion()) {
            return $respuesta;
        }

        return view('Alumnos/form', [
            'alumno' => null,
            'accion' => 'alumnos/crear',
        ]);
    }

    public function crear()
    {
        if ($respuesta = $this->requiereSesion()) {
            return $respuesta;
        }

        $validacion = $this->validarAlumno();
        if ($validacion !== true) {
            return redirect()->back()->withInput()->with('errores', $validacion);
        }

        (new AlumnoModel())->insert($this->datosAlumno());

        return redirect()->to(site_url('alumnos'))
            ->with('mensaje', 'Alumno registrado correctamente.');
    }

    public function editar(int $id)
    {
        if ($respuesta = $this->requiereSesion()) {
            return $respuesta;
        }

        $model = new AlumnoModel();
        $alumno = $model->find($id);
        if (!$alumno) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Alumno no encontrado.');
        }

        return view('Alumnos/form', [
            'alumno' => $alumno,
            'accion' => 'alumnos/actualizar/' . $id,
        ]);
    }

    public function actualizar(int $id)
    {
        if ($respuesta = $this->requiereSesion()) {
            return $respuesta;
        }

        $model = new AlumnoModel();
        if (!$model->find($id)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Alumno no encontrado.');
        }

        $validacion = $this->validarAlumno();
        if ($validacion !== true) {
            return redirect()->back()->withInput()->with('errores', $validacion);
        }

        $model->update($id, $this->datosAlumno());

        return redirect()->to(site_url('alumnos'))
            ->with('mensaje', 'Datos actualizados correctamente.');
    }

    public function eliminar(int $id)
    {
        if ($respuesta = $this->requiereSesion()) {
            return $respuesta;
        }

        (new AlumnoModel())->delete($id);

        return redirect()->to(site_url('alumnos'))->with('mensaje', 'Registro eliminado.');
    }

    private function validarAlumno()
    {
        $reglas = [
            'dni' => 'required|exact_length[8]|numeric',
            'nombres' => 'required|min_length[2]|max_length[100]',
            'apellido_paterno' => 'required|min_length[2]|max_length[60]',
            'apellido_materno' => 'required|min_length[2]|max_length[60]',
            'correo' => 'required|valid_email|max_length[120]',
            'semestre' => 'required|max_length[30]',
        ];

        $mensajes = [
            'dni' => [
                'exact_length' => 'El DNI debe tener 8 dígitos.',
                'numeric' => 'El DNI solo debe contener números.',
            ],
            'correo' => ['valid_email' => 'Ingresa un correo válido.'],
        ];

        return $this->validate($reglas, $mensajes) ? true : $this->validator->getErrors();
    }

    private function datosAlumno(): array
    {
        return [
            'dni' => trim((string) $this->request->getPost('dni')),
            'nombres' => trim((string) $this->request->getPost('nombres')),
            'apellido_paterno' => trim((string) $this->request->getPost('apellido_paterno')),
            'apellido_materno' => trim((string) $this->request->getPost('apellido_materno')),
            'correo' => trim((string) $this->request->getPost('correo')),
            'semestre' => trim((string) $this->request->getPost('semestre')),
        ];
    }
}
