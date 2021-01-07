<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller {
    public function index() {
        return view('admin.index');
    }

    public function show() {
        $data = User::where('role_id', '2')->latest()->get();
        return response()->json($data);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|string|email|max:255',
            'phone'    => 'required',
            'password' => 'required',
        ]);
        $data             = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return response()->json($data);
    }

    public function getStudentById($id) {
        $studentData = User::findOrFail($id);
        return response()->json($studentData);
    }

    public function update(Request $request, $id) {
        $updateStudent = User::findOrFail($id);
        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|string|email|max:255' . $id,
            'phone'    => 'required',
            'password' => 'required',
        ]);
        $data             = $request->all();
        $data['password'] = bcrypt($request->password);
        $updateStudent->update($data);

        return response()->json($updateStudent);
    }

    public function delete($id) {
        $deleteStudent = User::findOrFail($id)->delete();
        return response()->json($deleteStudent);

    }

}
