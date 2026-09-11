<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Note Details
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- رسالة النجاح --}}
            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif


            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="mb-6">

                    <h3 class="text-2xl font-bold text-gray-900">
                        {{ $note->application->job_title }}
                    </h3>

                    <p class="text-gray-600 mt-2">
                        Company:
                        <span class="font-semibold">
                            {{ $note->application->company->name }}
                        </span>
                    </p>

                </div>


                <div class="border-t border-gray-200 pt-6">

                    <h4 class="font-semibold text-gray-800 mb-3">
                        Note
                    </h4>

                    <div class="bg-gray-50 rounded-lg p-5">

                        <p class="text-gray-700 whitespace-pre-line">
                            {{ $note->content }}
                        </p>

                    </div>

                </div>


                <div class="mt-6 text-sm text-gray-500">

                    <p>
                        Created:
                        {{ $note->created_at->format('Y-m-d H:i') }}
                    </p>

                    @if($note->updated_at != $note->created_at)

                        <p>
                            Updated:
                            {{ $note->updated_at->format('Y-m-d H:i') }}
                        </p>

                    @endif

                </div>


                <div class="mt-6 flex gap-3">

                    <a
                        href="{{ route('notes.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-lg"
                    >
                        Back
                    </a>

                    <a
                        href="{{ route('notes.edit', $note) }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-lg"
                    >
                        Edit
                    </a>

                    <form
                        action="{{ route('notes.destroy', $note) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this note?');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded-lg"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>