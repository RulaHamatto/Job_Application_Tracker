<x-app-layout>

    <x-slot name="header">

        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Note
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Update your application note.
            </p>
        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">

                <form method="POST"
                      action="{{ route('notes.update', $note) }}">

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


                    <div class="space-y-6">


                        {{-- Application --}}
                        <div>

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
                                        {{ old('application_id', $note->application_id) == $application->id ? 'selected' : '' }}>

                                        {{ $application->job_title }}
                                        -
                                        {{ $application->company->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Content --}}
                        <div>

                            <label for="content"
                                   class="block text-sm font-semibold text-gray-700 mb-2">
                                Note *
                            </label>

                            <textarea id="content"
                                      name="content"
                                      rows="8"
                                      required
                                      class="w-full border-gray-300 rounded-lg focus:border-blue-500 focus:ring-blue-500">{{ old('content', $note->content) }}</textarea>

                        </div>


                    </div>


                    {{-- Buttons --}}
                    <div class="flex flex-wrap gap-3 mt-8 pt-6 border-t border-gray-200">

                        <button type="submit"
                                style="background-color: #2563eb; color: white;"
                                class="inline-flex items-center justify-center px-6 py-2.5 font-semibold rounded-lg hover:opacity-90">

                            Update Note

                        </button>


                        <a href="{{ route('notes.show', $note) }}"
                           class="inline-flex items-center justify-center px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold rounded-lg">

                            Cancel

                        </a>

                    </div>


                </form>

            </div>

        </div>

    </div>

</x-app-layout>