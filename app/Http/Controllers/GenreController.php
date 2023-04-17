<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return 'Получение списка жанров';
    }

    public function update($id)
    {
        return 'Редактирование жанра' . $id;
    }
}
