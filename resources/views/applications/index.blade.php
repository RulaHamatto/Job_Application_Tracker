<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Applications
            </h2>

            <a href="{{ route('applications.create') }}"
               class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">
                + Add Application
            </a>
        </div>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-100 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="p-6">

                    @if ($applications->count() > 0)

                        <div class="overflow-x-auto">

                            <table class="min-w-full divide-y divide-gray-200">

                                <thead class="bg-gray-50">

                                    <tr>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Job Title
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Company
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Location
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Application Date
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status
                                        </th>

                                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Actions
                                        </th>

                                    </tr>

                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach ($applications as $application)

                                        <tr class="hover:bg-gray-50">

                                            {{-- Job Title --}}
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="text-sm font-semibold text-gray-900">
                                                    {{ $application->job_title }}
                                                </div>

                                                @if ($application->job_type)
                                                    <div class="text-sm text-gray-500">
                                                        {{ $application->job_type }}
                                                    </div>
                                                @endif

                                            </td>

                                            {{-- Company --}}
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="text-sm text-gray-900">
                                                    {{ $application->company->name ?? 'No Company' }}
                                                </div>

                                            </td>

                                            {{-- Location --}}
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="text-sm text-gray-500">
                                                    {{ $application->location ?? '-' }}
                                                </div>

                                            </td>

                                            {{-- Date --}}
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="text-sm text-gray-500">
                                                    {{ $application->application_date }}
                                                </div>

                                            </td>

                                            {{-- Status --}}
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                @if ($application->status === 'Applied')

                                                    <span class="inline-flex rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">
                                                        Applied
                                                    </span>

                                                @elseif ($application->status === 'Interview')

                                                    <span class="inline-flex rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                                        Interview
                                                    </span>

                                                @elseif ($application->status === 'Offer')

                                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                                        Offer
                                                    </span>

                                                @elseif ($application->status === 'Rejected')

                                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">
                                                        Rejected
                                                    </span>

                                                @else

                                                    <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-800">
                                                        {{ $application->status }}
                                                    </span>

                                                @endif

                                            </td>

                                            {{-- Actions --}}
                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="flex items-center justify-center gap-2">

                                                    {{-- View --}}
                                                    <a href="{{ route('applications.show', $application) }}"
                                                       class="inline-flex items-center justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-700">

                                                         View

                                                    </a>

                                                    {{-- Edit --}}
                                                    <a href="{{ route('applications.edit', $application) }}"
                                                       class="inline-flex items-center justify-center rounded-md bg-yellow-400 px-3 py-2 text-sm font-semibold text-gray-900 hover:bg-yellow-500">

                                                         Edit

                                                    </a>

                                                    {{-- Delete --}}
                                                    <form action="{{ route('applications.destroy', $application) }}"
                                                          method="POST"
                                                          class="inline">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                                onclick="return confirm('Are you sure you want to delete this application?')"
                                                                class="inline-flex items-center justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white hover:bg-red-700">

                                                             Delete

                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        {{-- No Applications --}}
                        <div class="py-12 text-center">

                            <div class="text-gray-500 text-lg mb-4">
                                No applications found.
                            </div>

                            <a href="{{ route('applications.create') }}"
                               class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700">

                                + Add Your First Application

                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>