<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <div>
                <h2 class="font-semibold text-xl text-gray-800">
                    Application Details
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    View application information.
                </p>
            </div>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif


            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 mb-6">

                    <div>

                        <h1 class="text-2xl font-bold text-gray-900">
                            {{ $application->job_title }}
                        </h1>

                        <p class="text-gray-600 mt-1">
                            {{ $application->company->name }}
                        </p>

                    </div>


                    @php
                        $statusClass = match($application->status) {
                            'Applied' => 'bg-blue-100 text-blue-700',
                            'Interview' => 'bg-yellow-100 text-yellow-700',
                            'Rejected' => 'bg-red-100 text-red-700',
                            'Offer' => 'bg-green-100 text-green-700',
                            default => 'bg-gray-100 text-gray-700',
                        };
                    @endphp

                    <span class="inline-flex w-fit px-3 py-1 rounded-full text-sm font-semibold {{ $statusClass }}">
                        {{ $application->status }}
                    </span>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t pt-6">

                    <div>
                        <p class="text-sm text-gray-500">Job Type</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $application->job_type ?: 'Not specified' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">Location</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $application->location ?: 'Not specified' }}
                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">Application Date</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $application->application_date }}
                        </p>
                    </div>


                    <div>
                        <p class="text-sm text-gray-500">Salary</p>
                        <p class="font-semibold text-gray-800 mt-1">
                            {{ $application->salary ?: 'Not specified' }}
                        </p>
                    </div>

                </div>


                @if($application->job_url)

                    <div class="mt-6 border-t pt-6">

                        <p class="text-sm text-gray-500 mb-2">
                            Job URL
                        </p>

                        <a href="{{ $application->job_url }}"
                           target="_blank"
                           style="color: #2563eb;"
                           class="font-semibold hover:underline break-all">
                            {{ $application->job_url }}
                        </a>

                    </div>

                @endif


                @if($application->description)

                    <div class="mt-6 border-t pt-6">

                        <p class="text-sm text-gray-500 mb-2">
                            Description
                        </p>

                        <div class="bg-gray-50 border rounded-lg p-4 text-gray-700 whitespace-pre-line">
                            {{ $application->description }}
                        </div>

                    </div>

                @endif


                <div class="flex flex-wrap gap-3 mt-8 pt-6 border-t">

                    <a href="{{ route('applications.index') }}"
                       class="inline-flex items-center justify-center px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg">
                        Back
                    </a>


                    <a href="{{ route('applications.edit', $application) }}"
                       style="background-color: #eab308; color: white;"
                       class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">
                        Edit
                    </a>


                    <form action="{{ route('applications.destroy', $application) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this application?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                style="background-color: #dc2626; color: white;"
                                class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>