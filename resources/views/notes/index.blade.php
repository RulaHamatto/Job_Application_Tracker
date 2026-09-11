<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Notes
            </h2>

            <a href="{{ route('notes.create') }}"
               class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-lg">
                + Add Note
            </a>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            {{-- Success Message --}}
            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">

                    {{ session('success') }}

                </div>

            @endif



            @if($notes->count())


                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                    @foreach($notes as $note)


                        <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-6">


                            {{-- Job Title --}}
                            <h3 class="text-lg font-bold text-gray-900 mb-2">

                                {{ $note->application->job_title }}

                            </h3>


                            {{-- Company --}}
                            <p class="text-sm text-gray-600 mb-4">

                                Company:

                                <span class="font-semibold text-gray-800">

                                    {{ $note->application->company->name }}

                                </span>

                            </p>



                            {{-- Note Content --}}
                            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-4">

                                <p class="text-gray-700 whitespace-pre-line">

                                    {{ Str::limit($note->content, 150) }}

                                </p>

                            </div>



                            {{-- Date --}}
                            <p class="text-sm text-gray-500 mb-5">

                                Created:

                                {{ $note->created_at->format('Y-m-d H:i') }}

                            </p>



                            {{-- ACTION BUTTONS --}}
                            <div class="flex flex-wrap gap-3">


                                {{-- VIEW --}}
                                <a href="{{ route('notes.show', $note) }}"
                                   style="background-color: #2563eb; color: white;"
                                   class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                                    View

                                </a>



                                {{-- EDIT --}}
                                <a href="{{ route('notes.edit', $note) }}"
                                   style="background-color: #eab308; color: white;"
                                   class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                                    Edit

                                </a>



                                {{-- DELETE --}}
                                <form action="{{ route('notes.destroy', $note) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this note?');">

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


                    @endforeach


                </div>


            @else


                {{-- Empty State --}}
                <div class="bg-white shadow-sm border border-gray-200 rounded-xl p-8 text-center">


                    <h3 class="text-lg font-semibold text-gray-800 mb-2">

                        No notes yet

                    </h3>


                    <p class="text-gray-600 mb-5">

                        You have not added any notes yet.

                    </p>


                    <a href="{{ route('notes.create') }}"
                       style="background-color: #2563eb; color: white;"
                       class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                        Add Your First Note

                    </a>


                </div>


            @endif


        </div>

    </div>


</x-app-layout>