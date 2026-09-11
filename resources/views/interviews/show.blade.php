<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Interview Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- Job Title -->
                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    {{ $interview->application->job_title }}
                </h3>


                <!-- Company -->
                <div class="mb-4">
                    <strong>Company:</strong>

                    {{ $interview->application->company->name }}
                </div>


                <!-- Date -->
                <div class="mb-4">
                    <strong>Interview Date:</strong>

                    {{ $interview->date }}
                </div>


                <!-- Time -->
                <div class="mb-4">
                    <strong>Interview Time:</strong>

                    {{ $interview->time ?? 'Not specified' }}
                </div>


                <!-- Type -->
                <div class="mb-4">
                    <strong>Interview Type:</strong>

                    {{ $interview->type ?? 'Not specified' }}
                </div>


                <!-- Location -->
                <div class="mb-4">
                    <strong>Location:</strong>

                    {{ $interview->location ?? 'Not specified' }}
                </div>


                <!-- Status -->
                <div class="mb-4">
                    <strong>Status:</strong>

                    {{ $interview->status }}
                </div>


                <!-- Notes -->
                <div class="mb-6">
                    <strong>Notes:</strong>

                    <p class="mt-2 text-gray-700">
                        {{ $interview->notes ?? 'No notes available.' }}
                    </p>
                </div>


                <!-- Buttons -->
                <div>

                    <!-- Back -->
                    <a
                        href="{{ route('interviews.index') }}"
                        class="bg-gray-500 text-white px-5 py-2 rounded-md"
                    >
                        Back
                    </a>


                    <!-- Edit -->
                    <a
                        href="{{ route('interviews.edit', $interview) }}"
                        class="bg-blue-600 text-white px-5 py-2 rounded-md ml-2"
                    >
                        Edit
                    </a>


                    <!-- Delete -->
                    <form
                        action="{{ route('interviews.destroy', $interview) }}"
                        method="POST"
                        class="inline"
                    >

                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="bg-red-600 text-white px-5 py-2 rounded-md ml-2"
                            onclick="return confirm('Are you sure you want to delete this interview?')"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>