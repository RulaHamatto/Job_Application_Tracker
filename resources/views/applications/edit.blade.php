<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Application
        </h2>

    </x-slot>


    <div class="py-8">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">

                <form method="POST"
                      action="{{ route('applications.update', $application) }}">

                    @csrf
                    @method('PUT')


                    @if($errors->any())

                        <div class="mb-6 bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded-lg">

                            <ul class="list-disc list-inside">

                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        {{-- Company --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Company *
                            </label>

                            <select name="company_id"
                                    required
                                    class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                                @foreach($companies as $company)

                                    <option value="{{ $company->id }}"
                                        {{ old('company_id', $application->company_id) == $company->id ? 'selected' : '' }}>

                                        {{ $company->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Job Title --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Job Title *
                            </label>

                            <input type="text"
                                   name="job_title"
                                   value="{{ old('job_title', $application->job_title) }}"
                                   required
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Job Type --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Job Type
                            </label>

                            <input type="text"
                                   name="job_type"
                                   value="{{ old('job_type', $application->job_type) }}"
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Location --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Location
                            </label>

                            <input type="text"
                                   name="location"
                                   value="{{ old('location', $application->location) }}"
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Date --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Application Date *
                            </label>

                            <input type="date"
                                   name="application_date"
                                   value="{{ old('application_date', $application->application_date) }}"
                                   required
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Status --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Status *
                            </label>

                            <select name="status"
                                    required
                                    class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                                @foreach(['Applied', 'Interview', 'Rejected', 'Offer'] as $status)

                                    <option value="{{ $status }}"
                                        {{ old('status', $application->status) == $status ? 'selected' : '' }}>

                                        {{ $status }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Salary --}}
                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Salary
                            </label>

                            <input type="number"
                                   step="0.01"
                                   name="salary"
                                   value="{{ old('salary', $application->salary) }}"
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Job URL --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Job URL
                            </label>

                            <input type="url"
                                   name="job_url"
                                   value="{{ old('job_url', $application->job_url) }}"
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Description --}}
                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Description
                            </label>

                            <textarea name="description"
                                      rows="5"
                                      class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">{{ old('description', $application->description) }}</textarea>

                        </div>

                    </div>


                    <div class="flex flex-wrap gap-3 mt-8 pt-6 border-t">

                        <button type="submit"
                                style="background-color: #2563eb; color: white;"
                                class="inline-flex items-center justify-center px-6 py-2.5 font-semibold rounded-lg hover:opacity-90">
                            Update Application
                        </button>


                        <a href="{{ route('applications.show', $application) }}"
                           class="inline-flex items-center justify-center px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>