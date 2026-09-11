<x-app-layout>

    <x-slot name="header">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">

            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Interviews
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Manage your upcoming and past interviews.
                </p>

            </div>


            <a href="{{ route('interviews.create') }}"
               style="background-color: #2563eb; color: white;"
               class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg hover:opacity-90">

                + Add Interview

            </a>

        </div>

    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @if(session('success'))

                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>

            @endif


            @if($interviews->count())


                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                    @foreach($interviews as $interview)

                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">


                            <h3 class="text-xl font-bold text-gray-900 mb-2">

                                {{ $interview->application->job_title }}

                            </h3>


                            <p class="text-sm text-gray-600 mb-4">

                                Company:

                                <span class="font-semibold text-gray-800">
                                    {{ $interview->application->company->name }}
                                </span>

                            </p>


                            <div class="space-y-2 mb-5">

                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold">Date:</span>
                                    {{ $interview->date }}
                                </p>


                                @if($interview->time)

                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold">Time:</span>
                                        {{ $interview->time }}
                                    </p>

                                @endif


                                @if($interview->type)

                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold">Type:</span>
                                        {{ $interview->type }}
                                    </p>

                                @endif


                            </div>


                            <span class="inline-flex px-3 py-1 rounded-full text-xs font-semibold
                                {{ $interview->status === 'Scheduled'
                                    ? 'bg-blue-100 text-blue-700'
                                    : ($interview->status === 'Completed'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700') }}">

                                {{ $interview->status }}

                            </span>


                            <div class="flex flex-wrap gap-3 mt-5">


                                <a href="{{ route('interviews.show', $interview) }}"
                                   style="background-color: #2563eb; color: white;"
                                   class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                                    View

                                </a>


                                <a href="{{ route('interviews.edit', $interview) }}"
                                   style="background-color: #eab308; color: white;"
                                   class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                                    Edit

                                </a>


                                <form action="{{ route('interviews.destroy', $interview) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this interview?');">

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


                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-10 text-center">

                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        No interviews yet
                    </h3>

                    <p class="text-gray-500 mb-6">
                        Start by adding your first interview.
                    </p>

                    <a href="{{ route('interviews.create') }}"
                       style="background-color: #2563eb; color: white;"
                       class="inline-flex items-center justify-center px-5 py-2.5 font-semibold rounded-lg hover:opacity-90">

                        + Add Your First Interview

                    </a>

                </div>

            @endif


        </div>

    </div>

</x-app-layout>