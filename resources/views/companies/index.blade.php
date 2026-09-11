<x-app-layout>

    <x-slot name="header">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Companies
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Manage your companies.
                </p>

            </div>


            {{-- Add Company --}}
            <a href="{{ route('companies.create') }}"
               style="background-color: #2563eb; color: white;"
               class="inline-flex items-center justify-center px-4 py-2 font-semibold rounded-lg hover:opacity-90">

                + Add Company

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



            {{-- Companies --}}
            @if($companies->count())


                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                    @foreach($companies as $company)


                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">


                            {{-- Company Name --}}
                            <h3 class="text-xl font-bold text-gray-900 mb-4">

                                {{ $company->name }}

                            </h3>



                            {{-- Industry --}}
                            @if($company->industry)

                                <p class="text-sm text-gray-600 mb-2">

                                    <span class="font-semibold">
                                        Industry:
                                    </span>

                                    {{ $company->industry }}

                                </p>

                            @endif



                            {{-- Location --}}
                            @if($company->location)

                                <p class="text-sm text-gray-600 mb-2">

                                    <span class="font-semibold">
                                        Location:
                                    </span>

                                    {{ $company->location }}

                                </p>

                            @endif



                            {{-- Website --}}
                            @if($company->website)

                                <p class="text-sm text-gray-600 mb-2">

                                    <span class="font-semibold">
                                        Website:
                                    </span>

                                    <a href="{{ $company->website }}"
                                       target="_blank"
                                       style="color: #2563eb;"
                                       class="hover:underline">

                                        Visit Website

                                    </a>

                                </p>

                            @endif



                            {{-- Applications Count --}}
                            <p class="text-sm text-gray-500 mt-4 mb-5">

                                Applications:

                                <span class="font-semibold text-gray-800">

                                    {{ $company->applications_count }}

                                </span>

                            </p>



                            {{-- ACTION BUTTONS --}}
                            <div class="flex flex-wrap gap-3">


                                {{-- VIEW --}}
                                <a href="{{ route('companies.show', $company) }}"
                                   style="background-color: #2563eb; color: white;"
                                   class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                                    View

                                </a>



                                {{-- EDIT --}}
                                <a href="{{ route('companies.edit', $company) }}"
                                   style="background-color: #eab308; color: white;"
                                   class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                                    Edit

                                </a>



                                {{-- DELETE --}}
                                <form action="{{ route('companies.destroy', $company) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this company?');">

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
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-10 text-center">


                    <h3 class="text-xl font-semibold text-gray-800 mb-2">

                        No companies yet

                    </h3>


                    <p class="text-gray-500 mb-6">

                        Start by adding your first company.

                    </p>


                    {{-- Add First Company --}}
                    <a href="{{ route('companies.create') }}"
                       style="background-color: #2563eb; color: white;"
                       class="inline-flex items-center justify-center px-5 py-2 font-semibold rounded-lg hover:opacity-90">

                        + Add Your First Company

                    </a>


                </div>


            @endif


        </div>

    </div>


</x-app-layout>