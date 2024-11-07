<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Grade;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    public function index(Request $request)
{
    $teacher = null;

    // Filter students by class if the 'class' parameter is present
    if ($request->has('class')) {
        $students = Student::where('class', $request->get('class'))->with('grades')->get();
        $class = $request->get('class');

        // Ambil data wali kelas berdasarkan kelas
        $teacher = Teacher::where('position', 'LIKE', '%Wali Kelas ' . $class . '%')->first();
    } else {
        $students = Student::with('grades')->get();
        $class = null;
    }


    if ($request->has('sort')) {
        if ($request->get('sort') == 'name') {
            $students = $students->sortBy('name');
        } elseif ($request->get('sort') == 'ranking') {
            $students = $students->sortBy(function ($student) {
                return $student->grades->ranking ?? PHP_INT_MAX; // Sort by ranking, default to a high value if null
            });
        }
    }

    return view('students.index', compact('students', 'class', 'teacher'));
}

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function showClass($class)
    {
        $students = Student::where('class', $class)->get();
        $teacher = Teacher::where('position', 'LIKE', '%Wali Kelas ' . $class . '%')->first();
        return view('students.index', compact('students', 'class', 'teacher'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'class' => 'required|string',
            'nis' => 'required|string|unique:students,nis',
        ]);

        $student = Student::create($request->all());
        return redirect()->route('students.class', ['class' => $student->class])
            ->with('success', 'Data murid berhasil ditambahkan.');

        // Redirect ke halaman kelas yang sesuai
        return redirect()->route('students.class', ['class' => $student->class])
            ->with('success', 'Data murid berhasil ditambahkan.');

            if ($request->has('class')) {
                $students = Student::where('class', $request->get('class'))->with('grades')->get();
                $class = $request->get('class');
            } else {
                $students = Student::with('grades')->get();
                $class = null;
            }
        
            // Sort the students based on the 'sort' parameter
            if ($request->has('sort')) {
                if ($request->get('sort') == 'name') {
                    $students = $students->sortBy('name');
                } elseif ($request->get('sort') == 'ranking') {
                    $students = $students->sortBy(function ($student) {
                        return $student->grades->ranking ?? PHP_INT_MAX; // Sort by ranking, default to a high value if ranking is null
                    });
                }
            }
        
            return view('students.index', compact('students', 'class'));
    }

    public function inputNilai(Student $student)
    {
        return view('students.input-nilai', compact('student'));
    }

    public function storeNilai(Request $request, Student $student)
{
    $request->validate([
        'alquran_hadist' => 'required|integer|min:0|max:100',
        'akidah_akhlak' => 'required|integer|min:0|max:100',
        'fikih' => 'required|integer|min:0|max:100',
        'sejarah_kebudayaan_islam' => 'required|integer|min:0|max:100',
        'pkn' => 'required|integer|min:0|max:100',
        'bahasa_indonesia' => 'required|integer|min:0|max:100',
        'bahasa_inggris' => 'required|integer|min:0|max:100',
        'bahasa_sunda' => 'required|integer|min:0|max:100',
        'bahasa_arab' => 'required|integer|min:0|max:100',
        'matematika' => 'required|integer|min:0|max:100',
        'ipa' => 'required|integer|min:0|max:100',
        'ips' => 'required|integer|min:0|max:100',
        'sbk' => 'required|integer|min:0|max:100',
        'pjok' => 'required|integer|min:0|max:100',
        'izin' => 'nullable|integer|min:0',
        'sakit' => 'nullable|integer|min:0',
        'tanpa_keterangan' => 'nullable|integer|min:0',
        'catatan_guru' => 'nullable|string',
    ]);

    // Update or create the grades
    $student->grades()->updateOrCreate(
        ['student_id' => $student->id],
        $request->only([
            'alquran_hadist', 'akidah_akhlak', 'fikih', 'sejarah_kebudayaan_islam',
            'pkn', 'bahasa_indonesia', 'bahasa_inggris', 'bahasa_sunda', 'bahasa_arab',
            'matematika', 'ipa', 'ips', 'sbk', 'pjok', 'izin', 'sakit', 'tanpa_keterangan', 'catatan_guru'
        ])
    );

    // Recalculate total and update rankings
    $student->grades->calculateTotal();
    $this->updateRankings();

    return redirect()->route('students.index')->with('success', 'Nilai murid berhasil diinput.');
}

    protected function updateRankings()
    {
        $students = Student::with('grades')->get();

        // Urutkan siswa berdasarkan total nilai secara menurun
        $students = $students->sortByDesc(function ($student) {
            return $student->grades->total;
        });

        // Update ranking berdasarkan urutan
        $rank = 1;
        foreach ($students as $student) {
            $student->grades->update(['ranking' => $rank++]);
        }
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Data murid berhasil dihapus.');
    }

    public function downloadPdf(Student $student)
    {
    // Ambil data murid dan nilai
    $grades = $student->grades;
    
    // Buat tampilan untuk PDF
    $pdf = PDF::loadView('students.erapor', compact('student', 'grades'));
    
    // Download PDF dengan nama file "e-rapor-nama_siswa.pdf"
    return $pdf->download('e-rapor-' . $student->name . '.pdf');
    }
}
