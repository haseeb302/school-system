<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth', 'super-admin']);
    }

    public function index()
    {

    }

    public function edit($id)
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function delete($id)
    {

    }
}
