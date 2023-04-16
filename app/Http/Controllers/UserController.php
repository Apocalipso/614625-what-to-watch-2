<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        return 'show' . $id;
    }

    public function update($id)
    {
        return 'update' . $id;
    }
}
