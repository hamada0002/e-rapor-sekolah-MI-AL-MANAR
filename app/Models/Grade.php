<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'alquran_hadist', 'akidah_akhlak', 'fikih', 'sejarah_kebudayaan_islam',
        'pkn', 'bahasa_indonesia', 'bahasa_inggris', 'bahasa_sunda', 'bahasa_arab',
        'matematika', 'ipa', 'ips', 'sbk', 'pjok', 'izin', 'tanpa_keterangan',
        'sakit', 'catatan_guru', 'total', 'ranking'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function calculateTotal()
    {
        // Menghitung total nilai dari semua mata pelajaran
        $this->total = $this->alquran_hadist + $this->akidah_akhlak + $this->fikih +
            $this->sejarah_kebudayaan_islam + $this->pkn + $this->bahasa_indonesia +
            $this->bahasa_inggris + $this->bahasa_sunda + $this->bahasa_arab +
            $this->matematika + $this->ipa + $this->ips + $this->sbk + $this->pjok;
        $this->save();
    }
}
