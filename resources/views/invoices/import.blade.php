<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Invoices') }}
        </h2>
    </x-slot>      

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">                                     
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg relative">
                @if (session('imported'))
                    <div x-data="{ showAlert: true }" x-show="showAlert" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 absolute top-0 right-0" role="alert">
                        <p class="font-bold">Mensaje</p>
                        <p>{{ session('imported') }}</p>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="showAlert = false">
                            <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                @endif                
                
                <form action="{{ route('invoices.importStore') }}" method="POST" enctype="multipart/form-data" class="p-8">
                    @csrf
                    <div>
                        <x-validation-errors class="mb-4" :errors="$errors" />
                        <p class="text-2xl font-semibold mb-4">Seleccione el archivo a importar</p>
                        <input type="file" name="file" accept=".xlsx, .xls, .csv">
                    </div>
                    <x-button class="uppercase mt-4">Importar</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>