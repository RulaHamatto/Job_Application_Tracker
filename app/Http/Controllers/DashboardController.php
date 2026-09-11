<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // جميع طلبات التوظيف الخاصة بالمستخدم
        $applications = $user->applications();

        // إجمالي طلبات التوظيف
        $totalApplications = $applications->count();

        // الطلبات حسب الحالة
        $applied = $applications
            ->where('status', 'Applied')
            ->count();

        $interviews = $applications
            ->where('status', 'Interview')
            ->count();

        $rejected = $applications
            ->where('status', 'Rejected')
            ->count();

        $offers = $applications
            ->where('status', 'Offer')
            ->count();

        // عدد الشركات
        $totalCompanies = $user->companies()->count();

        // عدد المقابلات
        $totalInterviews = $user->applications()
            ->whereHas('interviews')
            ->count();

        // آخر 5 طلبات توظيف
        $recentApplications = $user->applications()
            ->with('company')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalApplications',
            'applied',
            'interviews',
            'rejected',
            'offers',
            'totalCompanies',
            'totalInterviews',
            'recentApplications'
        ));
    }
}