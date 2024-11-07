<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:teachers,email',
            'no_hp' => 'required',
            'position' => 'required',
        ]);

        $teacher = Teacher::create($request->all());

        // Jika posisi adalah wali kelas, update informasi wali kelas di tabel siswa
        if (str_contains($request->position, 'Wali Kelas')) {
            $class = substr($request->position, 11); // Ambil kelas setelah kata 'Wali Kelas '
            Student::where('class', $class)->update(['wali_kelas' => $teacher->name]);
        }

        return redirect()->route('teachers.index')->with('success', 'Data Guru Berhasil Dibuat.');
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:teachers,email,' . $teacher->id,
            'no_hp' => 'required',
            'position' => 'required',
        ]);

        $teacher->update($request->all());

        // Jika posisi diubah menjadi wali kelas, update informasi wali kelas di tabel siswa
        if (str_contains($request->position, 'Wali Kelas')) {
            $class = substr($request->position, 11);
            Student::where('class', $class)->update(['wali_kelas' => $teacher->name]);
        }

        return redirect()->route('teachers.index')->with('success', 'Data Guru Berhasil Diperbarui.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Data Guru Berhasil Dihapus.');
    }
}
