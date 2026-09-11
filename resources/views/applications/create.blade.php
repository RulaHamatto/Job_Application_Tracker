<x-app-layout>

    {{-- Header --}}
    <x-slot name="header">

        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Application
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Add a new job application to your tracker
            </p>
        </div>

    </x-slot>


    {{-- Main Content --}}
    <div class="py-6 sm:py-8">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg border border-gray-200">

                <div class="p-5 sm:p-6">

                    <form
                        method="POST"
                        action="{{ route('applications.store') }}"
                        class="space-y-6"
                    >

                        @csrf


                        {{-- Company --}}
                        <div>

                            <label
                                for="company_id"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Company
                            </label>

                            <select
                                id="company_id"
                                name="company_id"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                                <option value="">
                                    Select Company
                                </option>

                                @foreach ($companies as $company)

                                    <option
                                        value="{{ $company->id }}"
                                        {{ old('company_id') == $company->id ? 'selected' : '' }}
                                    >
                                        {{ $company->name }}
                                    </option>

                                @endforeach

                            </select>

                            @error('company_id')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Job Title --}}
                        <div>

                            <label
                                for="job_title"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Job Title
                            </label>

                            <input
                                type="text"
                                id="job_title"
                                name="job_title"
                                value="{{ old('job_title') }}"
                                required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="e.g. Junior Full Stack Developer"
                            >

                            @error('job_title')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Job Type + Location --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            {{-- Job Type --}}
                            <div>

                                <label
                                    for="job_type"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Job Type
                                </label>

                                <select
                                    id="job_type"
                                    name="job_type"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >

                                    <option value="">
                                        Select Type
                                    </option>

                                    <option value="Full-time" {{ old('job_type') == 'Full-time' ? 'selected' : '' }}>
                                        Full-time
                                    </option>

                                    <option value="Part-time" {{ old('job_type') == 'Part-time' ? 'selected' : '' }}>
                                        Part-time
                                    </option>

                                    <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>
                                        Internship
                                    </option>

                                    <option value="Freelance" {{ old('job_type') == 'Freelance' ? 'selected' : '' }}>
                                        Freelance
                                    </option>

                                </select>

                                @error('job_type')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Location --}}
                            <div>

                                <label
                                    for="location"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Location
                                </label>

                                <input
                                    type="text"
                                    id="location"
                                    name="location"
                                    value="{{ old('location') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    placeholder="e.g. Amman"
                                >

                                @error('location')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Date + Status --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            {{-- Application Date --}}
                            <div>

                                <label
                                    for="application_date"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Application Date
                                </label>

                                <input
                                    type="date"
                                    id="application_date"
                                    name="application_date"
                                    value="{{ old('application_date', date('Y-m-d')) }}"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >

                                @error('application_date')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            {{-- Status --}}
                            <div>

                                <label
                                    for="status"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Status
                                </label>

                                <select
                                    id="status"
                                    name="status"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                >

                                    <option value="Applied" {{ old('status', 'Applied') == 'Applied' ? 'selected' : '' }}>
                                        Applied
                                    </option>

                                    <option value="Interview" {{ old('status') == 'Interview' ? 'selected' : '' }}>
                                        Interview
                                    </option>

                                    <option value="Rejected" {{ old('status') == 'Rejected' ? 'selected' : '' }}>
                                        Rejected
                                    </option>

                                    <option value="Offer" {{ old('status') == 'Offer' ? 'selected' : '' }}>
                                        Offer
                                    </option>

                                </select>

                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>

                        </div>


                        {{-- Salary --}}
                        <div>

                            <label
                                for="salary"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Salary
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                id="salary"
                                name="salary"
                                value="{{ old('salary') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="e.g. 500"
                            >

                            @error('salary')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Job URL --}}
                        <div>

                            <label
                                for="job_url"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Job URL
                            </label>

                            <input
                                type="url"
                                id="job_url"
                                name="job_url"
                                value="{{ old('job_url') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="https://example.com/job"
                            >

                            @error('job_url')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Description --}}
                        <div>

                            <label
                                for="description"
                                class="block text-sm font-medium text-gray-700"
                            >
                                Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Add any useful details about this application..."
                            >{{ old('description') }}</textarea>

                            @error('description')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Buttons --}}
                        <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 pt-4 border-t border-gray-200">

                            <a
                                href="{{ route('applications.index') }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-gray-100 text-gray-700 rounded-md font-semibold text-sm hover:bg-gray-200 transition"
                            >
                                Cancel
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-md font-semibold text-sm hover:bg-blue-700 transition"
                            >
                                Save Application
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>