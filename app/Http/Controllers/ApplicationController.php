<?php

namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $applications = Auth::user()->applications()->with('company')->get();
    return view('applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
$companies = Auth::user()->companies;

    return view('applications.create', compact('companies'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'company_id' => ['required', 'exists:companies,id'],
        'job_title' => ['required', 'string', 'max:255'],
        'job_type' => ['nullable', 'string', 'max:255'],
        'location' => ['nullable', 'string', 'max:255'],
        'application_date' => ['required', 'date'],
        'status' => ['required', 'string', 'max:255'],
        'salary' => ['nullable', 'numeric'],
        'job_url' => ['nullable', 'url'],
        'description' => ['nullable', 'string'],
    ]);

$validated['user_id'] = Auth::id();
    Application::create($validated);

    return redirect()
        ->route('applications.index')
        ->with('success', 'Application added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
{
    abort_unless($application->user_id === Auth::id(), 403); //يمنع مستخدم من مشاهدة طلب مستخدم آخر.

    $application->load('company'); //يجلب بيانات الشركة المرتبطة بالطلب.

    return view('applications.show', compact('application'));
}
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
{
    abort_unless($application->user_id === Auth::id(), 403);

$companies = Auth::user()->companies;

    return view('applications.edit', compact('application', 'companies'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Application $application)
{
    abort_unless($application->user_id === Auth::id(), 403);

    $validated = $request->validate([
        'company_id' => ['required', 'exists:companies,id'],
        'job_title' => ['required', 'string', 'max:255'],
        'job_type' => ['nullable', 'string', 'max:255'],
        'location' => ['nullable', 'string', 'max:255'],
        'application_date' => ['required', 'date'],
        'status' => ['required', 'string', 'max:255'],
        'salary' => ['nullable', 'numeric'],
        'job_url' => ['nullable', 'url'],
        'description' => ['nullable', 'string'],
    ]);

    $application->update($validated);

    return redirect()
        ->route('applications.show', $application)
        ->with('success', 'Application updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
{
    abort_unless($application->user_id === Auth::id(), 403); //     * يعني: تأكدي أن الطلب الذي نحاول حذفه تابع للمستخدم الحالي.

    $application->delete(); //يحذف الطلب من قاعدة البيانات.

    return redirect() //يرجعنا إلى قائمة الطلبات.
        ->route('applications.index')
        ->with('success', 'Application deleted successfully.');
}
}
