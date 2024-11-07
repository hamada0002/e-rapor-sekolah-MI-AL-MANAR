<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function dashboard()
    {
        $announcements = Announcement::all();
        return view('dashboard', compact('announcements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('dashboard')->with('success', 'Announcement created successfully.');
    }
    public function destroy(Announcement $announcement)
    {
    // Menghapus pengumuman
    $announcement->delete();

    // Redirect kembali ke dashboard dengan pesan sukses
    return redirect()->route('dashboard')->with('success', 'Announcement deleted successfully.');
    }
}
