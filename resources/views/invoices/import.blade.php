<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Import Invoices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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