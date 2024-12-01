<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role; // Importa el modelo Role
use Spatie\Permission\Traits\HasRoles; // Importa el trait HasRoles
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Facade;

class RegisterController extends Controller
{
    /*
        |--------------------------------------------------------------------------
        | Register Controller
        |--------------------------------------------------------------------------
        |
        | This controller handles the registration of new users as well as their
        | validation and creation. By default this controller uses a trait to
        | provide this functionality without requiring any additional code.
        |
        */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&#-_]/',
            ],
        ], [
            'password.regex' => 'La contraseña debe contener al menos una letra minúscula, una mayúscula, un número y un símbolo.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Crea el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Verifica cuántos usuarios hay en la base de datos
        $userCount = User::count();

        // Asigna el rol basado en el conteo de usuarios
        if ($userCount === 1) {
            // Si es el primer usuario, asigna el rol de admin y no lo guarda en la tabla paciente
            $user->assignRole('admin');
        } else {
            // Si hay más usuarios, asigna el rol de paciente y guarda los datos en la tabla paciente
            $user->assignRole('paciente');

            // Crea un registro en la tabla paciente
            Paciente::create([
                'id_user' => $user->id, // Relación entre el usuario y el paciente
                'nombre' => $data['name'],
                'paterno' => $data['paterno'],
                'materno' => $data['materno'],
                'genero' => $data['genero'],
                'edad' => $data['edad'],
            ]);
        }
        // Crear el usuario en el servidor de correo
        $this->createMailUser($user['name'], $data['password']);
        return $user;
    }

    //crear usuario en servidor de correo
    protected function createMailUser($username, $password)
    {
        $mailServer = 'correo.nutria.bo'; // Dirección IP o dominio del servidor de correo
        $mailUser = 'root'; // Usuario con permisos sudo para ejecutar comandos
        $keyFile = '/var/www/.ssh/nutria'; // Ruta a tu clave privada SSH
        $knownHostsFile = '/var/www/.ssh/known_hosts'; // Ruta al archivo known_hosts de apache

        // Comando para crear el usuario en el servidor de correo
        $command = "ssh -o UserKnownHostsFile=$knownHostsFile -i $keyFile $mailUser@$mailServer 'sudo useradd --create-home --shell /bin/bash $username && echo \"$username:$password\" | sudo chpasswd' 2>&1";

        // Ejecutar el comando y capturar la salida
        exec($command, $output, $exitCode);

        // Verificar el resultado
        if ($exitCode !== 0) {
            // Error al ejecutar el comando
            $errorMessage = implode("\n", $output);
            \Log::error("Failed to create mail user $username on $mailServer. Error: $errorMessage");
        } else {
            // Éxito al crear el usuario
            \Log::info("Mail user $username created successfully on $mailServer.");}}
        }