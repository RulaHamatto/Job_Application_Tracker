<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Interview
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Update interview information.
            </p>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">

                <form method="POST"
                      action="{{ route('interviews.update', $interview) }}">

                    @csrf

                    @method('PUT')


                    {{-- Validation Errors --}}
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


                        {{-- Application --}}
                        <div class="md:col-span-2">

                            <label for="application_id"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Application *
                            </label>

                            <select id="application_id"
                                    name="application_id"
                                    required
                                    class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                                @foreach($applications as $application)

                                    <option value="{{ $application->id }}"
                                        {{ old('application_id', $interview->application_id) == $application->id ? 'selected' : '' }}>

                                        {{ $application->job_title }}
                                        -
                                        {{ $application->company->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Date --}}
                        <div>

                            <label for="date"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Interview Date *
                            </label>

                            <input type="date"
                                   id="date"
                                   name="date"
                                   value="{{ old('date', $interview->date) }}"
                                   required
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Time --}}
                        <div>

                            <label for="time"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Interview Time
                            </label>

                            <input type="time"
                                   id="time"
                                   name="time"
                                   value="{{ old('time', $interview->time) }}"
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Type --}}
                        <div>

                            <label for="type"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Interview Type
                            </label>

                            <select id="type"
                                    name="type"
                                    class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                                <option value="">
                                    Select Type
                                </option>

                                <option value="Online"
                                    {{ old('type', $interview->type) == 'Online' ? 'selected' : '' }}>
                                    Online
                                </option>

                                <option value="In-person"
                                    {{ old('type', $interview->type) == 'In-person' ? 'selected' : '' }}>
                                    In-person
                                </option>

                                <option value="Phone"
                                    {{ old('type', $interview->type) == 'Phone' ? 'selected' : '' }}>
                                    Phone
                                </option>

                            </select>

                        </div>


                        {{-- Status --}}
                        <div>

                            <label for="status"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Status *
                            </label>

                            <select id="status"
                                    name="status"
                                    required
                                    class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                                <option value="Scheduled"
                                    {{ old('status', $interview->status) == 'Scheduled' ? 'selected' : '' }}>
                                    Scheduled
                                </option>

                                <option value="Completed"
                                    {{ old('status', $interview->status) == 'Completed' ? 'selected' : '' }}>
                                    Completed
                                </option>

                                <option value="Cancelled"
                                    {{ old('status', $interview->status) == 'Cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>

                            </select>

                        </div>


                        {{-- Location --}}
                        <div class="md:col-span-2">

                            <label for="location"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Location
                            </label>

                            <input type="text"
                                   id="location"
                                   name="location"
                                   value="{{ old('location', $interview->location) }}"
                                   class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">

                        </div>


                        {{-- Notes --}}
                        <div class="md:col-span-2">

                            <label for="notes"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Notes
                            </label>

                            <textarea id="notes"
                                      name="notes"
                                      rows="5"
                                      class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">{{ old('notes', $interview->notes) }}</textarea>

                        </div>


                    </div>


                    {{-- Buttons --}}
                    <div class="flex flex-wrap gap-3 mt-8 pt-6 border-t border-gray-200">

                        <button type="submit"
                                style="background-color: #2563eb; color: white;"
                                class="inline-flex items-center justify-center px-6 py-2.5 font-semibold rounded-lg hover:opacity-90">

                            Update Interview

                        </button>


                        <a href="{{ route('interviews.show', $interview) }}"
                           class="inline-flex items-center justify-center px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg">

                            Cancel

                        </a>

                    </div>


                </form>

            </div>

        </div>

    </div>

</x-app-layout>