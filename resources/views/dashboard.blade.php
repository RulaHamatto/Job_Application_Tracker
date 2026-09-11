<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Track and manage your job applications
                </p>
            </div>

            <a
                href="{{ route('applications.create') }}"
                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-md font-semibold text-sm hover:bg-blue-700 transition"
            >
                + Add Application
            </a>
        </div>
    </x-slot>


    {{-- Main Content --}}
    <div class="py-6 sm:py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome Message --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-5 sm:p-6 mb-6">

                <h3 class="text-xl font-semibold text-gray-900">
                    Welcome, {{ Auth::user()->name }} 👋
                </h3>

                <p class="mt-2 text-gray-600">
                    Here is an overview of your job applications and progress.
                </p>

            </div>


            {{-- Statistics Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-6">

                {{-- Total Applications --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-5">

                    <p class="text-sm font-medium text-gray-500">
                        Total Applications
                    </p>

                    <p class="text-3xl font-bold text-gray-900 mt-2">
                        {{ $totalApplications }}
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        All job applications
                    </p>

                </div>


                {{-- Companies --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-5">

                    <p class="text-sm font-medium text-gray-500">
                        Companies
                    </p>

                    <p class="text-3xl font-bold text-gray-900 mt-2">
                        {{ $totalCompanies }}
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Companies you applied to
                    </p>

                </div>


                {{-- Interviews --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-5">

                    <p class="text-sm font-medium text-gray-500">
                        Interviews
                    </p>

                    <p class="text-3xl font-bold text-gray-900 mt-2">
                        {{ $totalInterviews }}
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Applications with interviews
                    </p>

                </div>


                {{-- Offers --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-5">

                    <p class="text-sm font-medium text-gray-500">
                        Offers
                    </p>

                    <p class="text-3xl font-bold text-gray-900 mt-2">
                        {{ $offers }}
                    </p>

                    <p class="text-sm text-gray-500 mt-2">
                        Job offers received
                    </p>

                </div>

            </div>


            {{-- Status Overview --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-5 sm:p-6 mb-6">

                <div class="mb-5">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Application Status
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Overview of your current application statuses
                    </p>
                </div>


                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                    {{-- Applied --}}
                    <div class="border border-gray-200 rounded-lg p-4">

                        <div class="flex items-center justify-between gap-4">

                            <div>
                                <p class="text-sm font-medium text-gray-500">
                                    Applied
                                </p>

                                <p class="text-2xl font-bold text-gray-900 mt-1">
                                    {{ $applied }}
                                </p>
                            </div>

                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <span class="text-blue-600 font-bold">
                                    A
                                </span>
                            </div>

                        </div>

                    </div>


                    {{-- Interview --}}
                    <div class="border border-gray-200 rounded-lg p-4">

                        <div class="flex items-center justify-between gap-4">

                            <div>
                                <p class="text-sm font-medium text-gray-500">
                                    Interview
                                </p>

                                <p class="text-2xl font-bold text-gray-900 mt-1">
                                    {{ $interviews }}
                                </p>
                            </div>

                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                <span class="text-yellow-600 font-bold">
                                    I
                                </span>
                            </div>

                        </div>

                    </div>


                    {{-- Rejected --}}
                    <div class="border border-gray-200 rounded-lg p-4">

                        <div class="flex items-center justify-between gap-4">

                            <div>
                                <p class="text-sm font-medium text-gray-500">
                                    Rejected
                                </p>

                                <p class="text-2xl font-bold text-gray-900 mt-1">
                                    {{ $rejected }}
                                </p>
                            </div>

                            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">
                                <span class="text-red-600 font-bold">
                                    R
                                </span>
                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Recent Applications --}}
            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">

                {{-- Section Header --}}
                <div class="p-5 sm:p-6 border-b border-gray-200">

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">
                                Recent Applications
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Your latest job applications
                            </p>
                        </div>

                        <a
                            href="{{ route('applications.index') }}"
                            class="inline-flex items-center justify-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md font-semibold text-sm hover:bg-gray-200 transition"
                        >
                            View All
                        </a>

                    </div>

                </div>


                {{-- Applications Table --}}
                @if ($recentApplications->count() > 0)

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-50">

                                <tr>

                                    <th
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap"
                                    >
                                        Job Title
                                    </th>

                                    <th
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap"
                                    >
                                        Company
                                    </th>

                                    <th
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap"
                                    >
                                        Status
                                    </th>

                                    <th
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap"
                                    >
                                        Date
                                    </th>

                                    <th
                                        class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap"
                                    >
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="bg-white divide-y divide-gray-200">

                                @foreach ($recentApplications as $application)

                                    <tr class="hover:bg-gray-50 transition">

                                        {{-- Job Title --}}
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">

                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $application->job_title }}
                                            </div>

                                            @if ($application->job_type)
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ $application->job_type }}
                                                </div>
                                            @endif

                                        </td>


                                        {{-- Company --}}
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">

                                            <div class="text-sm text-gray-900">
                                                {{ $application->company->name }}
                                            </div>

                                            @if ($application->location)
                                                <div class="text-xs text-gray-500 mt-1">
                                                    {{ $application->location }}
                                                </div>
                                            @endif

                                        </td>


                                        {{-- Status --}}
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">

                                            @if ($application->status === 'Applied')

                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    Applied
                                                </span>

                                            @elseif ($application->status === 'Interview')

                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    Interview
                                                </span>

                                            @elseif ($application->status === 'Rejected')

                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                    Rejected
                                                </span>

                                            @elseif ($application->status === 'Offer')

                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Offer
                                                </span>

                                            @else

                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                    {{ $application->status }}
                                                </span>

                                            @endif

                                        </td>


                                        {{-- Date --}}
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">

                                            <div class="text-sm text-gray-700">
                                                {{ $application->application_date }}
                                            </div>

                                        </td>


                                        {{-- Action --}}
                                        <td class="px-4 sm:px-6 py-4 whitespace-nowrap">

                                            <a
                                                href="{{ route('applications.show', $application) }}"
                                                class="inline-flex items-center justify-center px-3 py-2 bg-blue-600 text-white rounded-md text-sm font-semibold hover:bg-blue-700 transition"
                                            >
                                                View
                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    {{-- Empty State --}}
                    <div class="p-8 sm:p-12 text-center">

                        <div class="mx-auto w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center mb-4">

                            <span class="text-gray-500 text-xl">
                                +
                            </span>

                        </div>

                        <h3 class="text-lg font-semibold text-gray-900">
                            No applications yet
                        </h3>

                        <p class="text-sm text-gray-500 mt-2 max-w-md mx-auto">
                            Start tracking your job search by adding your first application.
                        </p>

                        <div class="mt-5">

                            <a
                                href="{{ route('applications.create') }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-md font-semibold text-sm hover:bg-blue-700 transition"
                            >
                                + Add Application
                            </a>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>