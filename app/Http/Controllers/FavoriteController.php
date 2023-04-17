<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return 'фильмы добавленные пользователем';
    }

    public function store()
    {
       return 'добавление фильма в избранное';
    }

    public function destroy()
    {
        return 'Удаление фильма из избранного';
    }
}
