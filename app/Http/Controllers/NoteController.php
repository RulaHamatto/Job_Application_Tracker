<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * عرض جميع الملاحظات الخاصة بالمستخدم الحالي
     */
    public function index()
    {
        $notes = Note::whereHas('application', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->with('application.company')
        ->latest()
        ->get();

        return view('notes.index', compact('notes'));
    }

    /**
     * صفحة إضافة ملاحظة جديدة
     */
    public function create()
    {
        $applications = Auth::user()->applications()
            ->with('company')
            ->latest()
            ->get();

        return view('notes.create', compact('applications'));
    }

    /**
     * حفظ الملاحظة الجديدة
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'application_id' => ['required', 'exists:applications,id'],
            'content' => ['required', 'string'],
        ]);

        // التأكد أن الطلب الوظيفي يعود للمستخدم الحالي
        $application = Auth::user()
            ->applications()
            ->findOrFail($validated['application_id']);

        $validated['application_id'] = $application->id;

        Note::create($validated);

        return redirect()
            ->route('notes.index')
            ->with('success', 'Note added successfully.');
    }

    /**
     * عرض ملاحظة واحدة
     */
    public function show(Note $note)
    {
        // التأكد أن الملاحظة مرتبطة بطلب يخص المستخدم الحالي
        abort_unless(
            $note->application->user_id === Auth::id(),
            403
        );

        $note->load('application.company');

        return view('notes.show', compact('note'));
    }

    /**
     * صفحة تعديل الملاحظة
     */
    public function edit(Note $note)
    {
        // التأكد أن الملاحظة تخص المستخدم الحالي
        abort_unless(
            $note->application->user_id === Auth::id(),
            403
        );

        $applications = Auth::user()->applications()
            ->with('company')
            ->latest()
            ->get();

        return view('notes.edit', compact(
            'note',
            'applications'
        ));
    }

    /**
     * تحديث الملاحظة
     */
    public function update(Request $request, Note $note)
    {
        // التأكد أن الملاحظة تخص المستخدم الحالي
        abort_unless(
            $note->application->user_id === Auth::id(),
            403
        );

        $validated = $request->validate([
            'application_id' => ['required', 'exists:applications,id'],
            'content' => ['required', 'string'],
        ]);

        // التأكد أن الـ Application الجديد يعود للمستخدم الحالي
        $application = Auth::user()
            ->applications()
            ->findOrFail($validated['application_id']);

        $validated['application_id'] = $application->id;

        $note->update($validated);

        return redirect()
            ->route('notes.show', $note)
            ->with('success', 'Note updated successfully.');
    }

    /**
     * حذف الملاحظة
     */
    public function destroy(Note $note)
    {
        // التأكد أن الملاحظة تخص المستخدم الحالي
        abort_unless(
            $note->application->user_id === Auth::id(),
            403
        );

        $note->delete();

        return redirect()
            ->route('notes.index')
            ->with('success', 'Note deleted successfully.');
    }
}