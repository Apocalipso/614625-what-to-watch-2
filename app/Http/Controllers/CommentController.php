<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CommentController extends Controller
{
    public function index()
    {
        return 'спиисок отзывов к фильму';
    }

    public function store()
    {
        return 'добавление отзыва к фильму';
    }

    public function update()
    {
        return 'редактирование отзыва к фильму';
    }

    public function destroy()
    {
        return 'удаление отзыва к фильму';
    }
}
