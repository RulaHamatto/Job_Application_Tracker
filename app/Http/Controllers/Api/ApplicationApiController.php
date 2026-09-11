<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ApplicationApiController extends Controller
{
    /**
     * Get all applications for the logged-in user.
     */
    public function index()
    {
        // $applications = Auth::user()
        //     ->applications()
        //     ->with('company')
        //     ->latest()
        //     ->get();

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Applications retrieved successfully.',
        //     'data' => $applications
        // ], 200);
            $applications = Application::where('user_id', Auth::id())
        ->with('company')
        ->latest()
        ->get();

    return response()->json([
        'success' => true,
        'message' => 'Applications retrieved successfully.',
        'data' => $applications
    ], 200);
    }

    /**
     * Create a new application.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => [
                'required',
                Rule::exists('companies', 'id')
                    ->where(function ($query) {
                        $query->where('user_id', Auth::id());
                    }),
            ],

            'job_title' => [
                'required',
                'string',
                'max:255'
            ],

            'job_type' => [
                'nullable',
                'string',
                'max:255'
            ],

            'location' => [
                'nullable',
                'string',
                'max:255'
            ],

            'application_date' => [
                'required',
                'date'
            ],

            'status' => [
                'required',
                'string',
                'max:255'
            ],

            'salary' => [
                'nullable',
                'numeric'
            ],

            'job_url' => [
                'nullable',
                'url'
            ],

            'description' => [
                'nullable',
                'string'
            ],
        ]);

        $validated['user_id'] = Auth::id();

        $application = Application::create($validated);

        $application->load('company');

        return response()->json([
            'success' => true,
            'message' => 'Application created successfully.',
            'data' => $application
        ], 201);
    }

    /**
     * Get one application.
     */
    public function show(Application $application)
    {
        abort_unless(
            $application->user_id === Auth::id(),
            403
        );

        $application->load('company');

        return response()->json([
            'success' => true,
            'message' => 'Application retrieved successfully.',
            'data' => $application
        ], 200);
    }

    /**
     * Update an application.
     */
    public function update(
        Request $request,
        Application $application
    ) {
        abort_unless(
            $application->user_id === Auth::id(),
            403
        );

        $validated = $request->validate([
            'company_id' => [
                'required',
                Rule::exists('companies', 'id')
                    ->where(function ($query) {
                        $query->where('user_id', Auth::id());
                    }),
            ],

            'job_title' => [
                'required',
                'string',
                'max:255'
            ],

            'job_type' => [
                'nullable',
                'string',
                'max:255'
            ],

            'location' => [
                'nullable',
                'string',
                'max:255'
            ],

            'application_date' => [
                'required',
                'date'
            ],

            'status' => [
                'required',
                'string',
                'max:255'
            ],

            'salary' => [
                'nullable',
                'numeric'
            ],

            'job_url' => [
                'nullable',
                'url'
            ],

            'description' => [
                'nullable',
                'string'
            ],
        ]);

        $application->update($validated);

        $application->load('company');

        return response()->json([
            'success' => true,
            'message' => 'Application updated successfully.',
            'data' => $application
        ], 200);
    }

    /**
     * Delete an application.
     */
    public function destroy(Application $application)
    {
        abort_unless(
            $application->user_id === Auth::id(),
            403
        );

        $application->delete();

        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully.'
        ], 200);
    }
}