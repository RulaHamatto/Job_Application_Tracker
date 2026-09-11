<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterviewController extends Controller
{
    /**
     * Display a listing of the interviews.
     */
    public function index()
    {
        $interviews = Interview::whereHas('application', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->with('application.company')
        ->latest('date')
        ->get();

        return view('interviews.index', compact('interviews'));
    }


    /**
     * Show the form for creating a new interview.
     */
    public function create()
    {
        $applications = Auth::user()->applications;

        return view('interviews.create', compact('applications'));
    }


    /**
     * Store a newly created interview.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'application_id' => ['required', 'exists:applications,id'],
            'date' => ['required', 'date'],
            'time' => ['nullable'],
            'type' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        // التأكد أن الـ Application تابع للمستخدم الحالي
        $application = Auth::user()
            ->applications()
            ->findOrFail($validated['application_id']);

        $validated['application_id'] = $application->id;

        Interview::create($validated);

        return redirect()
            ->route('interviews.index')
            ->with('success', 'Interview added successfully.');
    }


    /**
     * Display the specified interview.
     */
    public function show(Interview $interview)
    {
        // التأكد أن المقابلة مرتبطة بطلب تابع للمستخدم الحالي
        abort_unless(
            $interview->application->user_id === Auth::id(),
            403
        );

        $interview->load('application.company');

        return view('interviews.show', compact('interview'));
    }


    /**
     * Show the form for editing the specified interview.
     */
    public function edit(Interview $interview)
    {
        // التأكد أن المقابلة تخص المستخدم الحالي
        abort_unless(
            $interview->application->user_id === Auth::id(),
            403
        );

        $applications = Auth::user()->applications;

        return view('interviews.edit', compact(
            'interview',
            'applications'
        ));
    }


    /**
     * Update the specified interview.
     */
    public function update(Request $request, Interview $interview)
    {
        // التأكد أن المقابلة تخص المستخدم الحالي
        abort_unless(
            $interview->application->user_id === Auth::id(),
            403
        );

        $validated = $request->validate([
            'application_id' => ['required', 'exists:applications,id'],
            'date' => ['required', 'date'],
            'time' => ['nullable'],
            'type' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        // التأكد أن الـ Application الجديد تابع للمستخدم الحالي
        $application = Auth::user()
            ->applications()
            ->findOrFail($validated['application_id']);

        $validated['application_id'] = $application->id;

        $interview->update($validated);

        return redirect()
            ->route('interviews.show', $interview)
            ->with('success', 'Interview updated successfully.');
    }


    /**
     * Remove the specified interview.
     */
    public function destroy(Interview $interview)
    {
        // التأكد أن المقابلة تخص المستخدم الحالي
        abort_unless(
            $interview->application->user_id === Auth::id(),
            403
        );

        $interview->delete();

        return redirect()
            ->route('interviews.index')
            ->with('success', 'Interview deleted successfully.');
    }
}