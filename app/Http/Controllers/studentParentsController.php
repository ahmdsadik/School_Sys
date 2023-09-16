<?php

namespace App\Http\Controllers;

use App\Models\StudentParent;
use Illuminate\Http\Request;

class studentParentsController extends Controller
{
    public function index()
    {
        return view('parents.index', [
            'parents'=> StudentParent::with(['fatherReligion','fatherNationality','fatherBloodType'])->get()
        ]);
    }

    public function create()
    {
        return view('parents.add_parent');
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
