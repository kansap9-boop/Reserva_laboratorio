<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Laboratorio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear Laboratorios Base
        Laboratorio::firstOrCreate(['codigo' => 'LAB-01'], ['nombre' => 'Redes y Sistemas', 'capacidad' => 30]);
        Laboratorio::firstOrCreate(['codigo' => 'LAB-02'], ['nombre' => 'Desarrollo de Software', 'capacidad' => 30]);
        Laboratorio::firstOrCreate(['codigo' => 'LAB-03'], ['nombre' => 'Inteligencia Artificial', 'capacidad' => 20]);

        // 2. Crear Usuarios de Prueba para cada Rol
        $usuarios = [
            ['name' => 'Admin Sistema', 'email' => 'admin@uns.edu.pe', 'role' => 'admin'],
            ['name' => 'Docente Prueba', 'email' => 'docente@uns.edu.pe', 'role' => 'profesor'],
            ['name' => 'Supervisor Laboratorios', 'email' => 'supervisor@uns.edu.pe', 'role' => 'supervisor'],
            ['name' => 'Delegado de Clase', 'email' => 'delegado@uns.edu.pe', 'role' => 'delegado'],
            ['name' => 'Alumno Regular', 'email' => 'alumno@uns.edu.pe', 'role' => 'alumno'],
        ];

        foreach ($usuarios as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => bcrypt('password123'),
                    'role' => $userData['role']
                ]
            );
        }
    }
}