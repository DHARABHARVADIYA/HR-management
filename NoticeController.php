<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::paginate(10);
        return view('notices.index', compact('notices'));
    }

    public function create()
    {
        return view('notices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'notice_type' => 'required|string|max:255',
            'notice_description' => 'required|string',
            'notice_date' => 'required|date',
            'notice_attachment' => 'nullable|file|mimes:pdf,jpg,png,docx|max:2048',
        ]);

        $notice = new Notice();
        $notice->notice_type = $request->notice_type;
        $notice->notice_description = $request->notice_description;
        $notice->notice_date = $request->notice_date;
        $notice->notice_by = Auth::id();

        if ($request->hasFile('notice_attachment')) {
            $notice->notice_attachment = $request->file('notice_attachment')->store('notices');
        }

        $notice->save();

        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice)
    {
        return view('notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice)
    {
        $request->validate([
            'notice_type' => 'required|string|max:255',
            'notice_description' => 'required|string',
            'notice_date' => 'required|date',
            'notice_attachment' => 'nullable|file|mimes:pdf,jpg,png,docx|max:2048',
        ]);

        $notice->notice_type = $request->notice_type;
        $notice->notice_description = $request->notice_description;
        $notice->notice_date = $request->notice_date;

        if ($request->hasFile('notice_attachment')) {
            // Delete old attachment if exists
            if ($notice->notice_attachment) {
                Storage::delete($notice->notice_attachment);
            }

            $notice->notice_attachment = $request->file('notice_attachment')->store('notices');
        }

        $notice->save();

        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice)
    {
        // Delete attachment if exists
        if ($notice->notice_attachment) {
            Storage::delete($notice->notice_attachment);
        }

        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
