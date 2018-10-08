<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Data\Repositories\Users as UsersRepository;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class Users extends Controller
{
    public function addAdmin($username)
    {
        $success = app(UsersRepository::class)->addAdmin($username);

        return view('admin.messages.index')->with(
            'message',
            $success
                ? 'Usuário agora é administrador'
                : "O usuário '{$username}' não existe"
        );
    }

    public function removeAdmin($username)
    {
        $success = app(UsersRepository::class)->removeAdmin($username);

        return view('admin.messages.index')->with(
            'message',
            $success
                ? 'Usuário não é mais administrador'
                : "O usuário '{$username}' não existe"
        );
    }

    public function notAnAdministrator()
    {
        return view('admin.messages.index')->with(
            'message',
            'Você não tem permissão para entrar nessa página'
        );
    }

    public function index()
    {
        return view('admin.users.index')->with(
            'users',
            app(UsersRepository::class)->all()
        );
    }

    public function backup()
    {
        Artisan::call('backup:clean');
        Artisan::call('backup:run', ['--only-db' => '--only-db']);

        $lastBackup = collect(Storage::disk('local')->allFiles())->reject(function ($name){
            return substr( $name, 0, 13 ) !== "Parla/backup_";
        })->last();

        return Storage::download($lastBackup);
    }
}
