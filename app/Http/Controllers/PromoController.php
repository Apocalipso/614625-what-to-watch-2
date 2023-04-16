<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class PromoController extends Controller
{
    public function index()
    {
        return 'Получение промо-фильма';
    }

    public function store($id)
    {
        return 'добавление промо фильма' . $id;
    }

    public function destroy($id)
    {
        return 'удаление промо фильма' . $id;
    }
}
