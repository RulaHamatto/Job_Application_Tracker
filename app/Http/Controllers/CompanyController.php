<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * عرض جميع الشركات الخاصة بالمستخدم الحالي
     */
    public function index()
    {
        $companies = Auth::user()
            ->companies()
            ->withCount('applications')
            ->latest()
            ->get();

        return view('companies.index', compact('companies'));
    }


    /**
     * صفحة إضافة شركة جديدة
     */
    public function create()
    {
        return view('companies.create');
    }


    /**
     * حفظ شركة جديدة
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
        ]);

        $validated['user_id'] = Auth::id();

        Company::create($validated);

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company added successfully.');
    }


    /**
     * عرض شركة واحدة
     */
    public function show(Company $company)
    {
        abort_unless(
            $company->user_id === Auth::id(),
            403
        );

        $company->load('applications');

        return view('companies.show', compact('company'));
    }


    /**
     * صفحة تعديل الشركة
     */
    public function edit(Company $company)
    {
        abort_unless(
            $company->user_id === Auth::id(),
            403
        );

        return view('companies.edit', compact('company'));
    }


    /**
     * تحديث الشركة
     */
    public function update(Request $request, Company $company)
    {
        abort_unless(
            $company->user_id === Auth::id(),
            403
        );

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
        ]);

        $company->update($validated);

        return redirect()
            ->route('companies.show', $company)
            ->with('success', 'Company updated successfully.');
    }


    /**
     * حذف الشركة
     */
    public function destroy(Company $company)
    {
        abort_unless(
            $company->user_id === Auth::id(),
            403
        );

        $company->delete();

        return redirect()
            ->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}