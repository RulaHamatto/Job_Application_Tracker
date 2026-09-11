<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Company Details
            </h2>

            <a href="{{ route('companies.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">

                Back to Companies

            </a>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">


            {{-- Success --}}
            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">

                    {{ session('success') }}

                </div>

            @endif


            {{-- Company Information --}}
            <div class="bg-white rounded-xl shadow-sm border p-6 mb-6">


                <div class="flex justify-between items-start mb-6">

                    <div>

                        <h1 class="text-3xl font-bold text-gray-900">
                            {{ $company->name }}
                        </h1>

                        <p class="text-gray-500 mt-1">
                            Company Information
                        </p>

                    </div>


                    <a href="{{ route('companies.edit', $company) }}"
                       class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">

                        Edit

                    </a>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                    {{-- Industry --}}
                    <div>

                        <p class="text-sm text-gray-500">
                            Industry
                        </p>

                        <p class="font-semibold text-gray-800 mt-1">

                            {{ $company->industry ?? 'Not specified' }}

                        </p>

                    </div>


                    {{-- Location --}}
                    <div>

                        <p class="text-sm text-gray-500">
                            Location
                        </p>

                        <p class="font-semibold text-gray-800 mt-1">

                            {{ $company->location ?? 'Not specified' }}

                        </p>

                    </div>


                    {{-- Website --}}
                    <div>

                        <p class="text-sm text-gray-500">
                            Website
                        </p>

                        @if($company->website)

                            <a href="{{ $company->website }}"
                               target="_blank"
                               class="text-blue-600 hover:text-blue-800 mt-1 inline-block break-all">

                                {{ $company->website }}

                            </a>

                        @else

                            <p class="font-semibold text-gray-800 mt-1">
                                Not specified
                            </p>

                        @endif

                    </div>


                    {{-- Applications Count --}}
                    <div>

                        <p class="text-sm text-gray-500">
                            Applications
                        </p>

                        <p class="font-semibold text-gray-800 mt-1">

                            {{ $company->applications->count() }}

                        </p>

                    </div>


                </div>

            </div>


            {{-- Applications --}}
            <div class="bg-white rounded-xl shadow-sm border">


                <div class="p-6 border-b">

                    <h2 class="text-xl font-bold text-gray-800">
                        Applications
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Applications submitted to this company.
                    </p>

                </div>


                @if($company->applications->count())


                    <div class="overflow-x-auto">

                        <table class="w-full">


                            <thead class="bg-gray-50">

                                <tr>

                                    <th class="text-left px-6 py-3 text-sm font-semibold text-gray-600">
                                        Job Title
                                    </th>

                                    <th class="text-left px-6 py-3 text-sm font-semibold text-gray-600">
                                        Status
                                    </th>

                                    <th class="text-left px-6 py-3 text-sm font-semibold text-gray-600">
                                        Date
                                    </th>

                                    <th class="text-left px-6 py-3 text-sm font-semibold text-gray-600">
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y">


                                @foreach($company->applications as $application)

                                    <tr class="hover:bg-gray-50">


                                        <td class="px-6 py-4 font-medium text-gray-800">

                                            {{ $application->job_title }}

                                        </td>


                                        <td class="px-6 py-4">

                                            <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-700">

                                                {{ $application->status }}

                                            </span>

                                        </td>


                                        <td class="px-6 py-4 text-gray-600">

                                            {{ $application->application_date }}

                                        </td>


                                        <td class="px-6 py-4">

                                            <a href="{{ route('applications.show', $application) }}"
                                               class="text-blue-600 hover:text-blue-800 font-medium">

                                                View

                                            </a>

                                        </td>


                                    </tr>

                                @endforeach


                            </tbody>

                        </table>

                    </div>


                @else


                    <div class="p-8 text-center">

                        <p class="text-gray-500 mb-4">

                            No applications for this company yet.

                        </p>

                        <a href="{{ route('applications.create') }}"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg">

                            Add Application

                        </a>

                    </div>


                @endif


            </div>


            {{-- Delete --}}
            <div class="mt-6">

                <form action="{{ route('companies.destroy', $company) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this company? All related applications will also be deleted.');">

                    @csrf

                    @method('DELETE')

                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg">

                        Delete Company

                    </button>

                </form>

            </div>


        </div>

    </div>

</x-app-layout>