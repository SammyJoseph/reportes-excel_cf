<div class="bg-gray-100">
    {{-- @dump($filters) --}} {{-- Ver los filtros que se están enviando con livewire --}}

    {{-- Filtros --}}
    <div class="bg-white rounded p-8 shadow mb-6 relative">
        @if (session()->has('exported'))
            <div x-data="{ showAlert: true }" x-show="showAlert" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 absolute top-0 right-0" role="alert">
                <p class="font-bold">Mensaje</p>
                <p>{{ session('exported') }}</p>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3" @click="showAlert = false">
                    <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif        
        <h3 class="text-2xl font-semibold mb-4">Generar reportes</h3>
        <div class="flex space-x-24 mb-8">
            <div class="">
                <p class="text-sm mb-1 text-gray-500">Serie</p>
                <select wire:model="filters.serie" name="serie" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-24">
                    <option value="">Todas</option>
                    <option value="F001">F001</option>
                    <option value="B001">B001</option>
                </select>
            </div>
            <div class="flex space-x-4">
                <div>
                    <p class="text-sm mb-1 text-gray-500">Desde el N°</p>                    
                    <x-input wire:model="filters.fromNumber" type="text" class="w-20" />
                </div>
                <div>
                    <p class="text-sm mb-1 text-gray-500">Hasta el N°</p>                 
                    <x-input wire:model="filters.toNumber" type="text" class="w-20" />
                </div>
            </div>
            <div class="flex space-x-4">
                <div>
                    <p class="text-sm mb-1 text-gray-500">Desde la fecha</p>
                    <x-input wire:model="filters.fromDate" type="date" class="w-36" />
                </div>
                <div>
                    <p class="text-sm mb-1 text-gray-500">Hasta la fecha</p>
                    <x-input wire:model="filters.toDate" type="date" class="w-36" />
                </div>
            </div>
        </div>
        
        <x-button wire:click="generateReport" class="uppercase mr-4" wire:loading.attr="disabled">GENERAR REPORTE</x-button>
        <x-secondary-button wire:click="clearFilters" class="uppercase">LIMPIAR FILTROS</x-secondary-button>
    </div>

    {{-- Tabla --}}
    <div class="bg-white flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center text-sm font-light">
                        <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 dark:bg-neutral-900">
                            <tr class="text-right uppercase">
                                <th scope="col" class=" px-6 py-4">ID</th>
                                <th scope="col" class=" px-6 py-4">Serie</th>
                                <th scope="col" class=" px-6 py-4">Correlativo</th>
                                <th scope="col" class=" px-6 py-4">Base</th>
                                <th scope="col" class=" px-6 py-4">IGV</th>
                                <th scope="col" class=" px-6 py-4">Total</th>
                                <th scope="col" class=" px-6 py-4">Fecha & Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr class="border-b dark:border-neutral-500 text-right">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $invoice->id }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $invoice->serie }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $invoice->correlative }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">S/.{{ $invoice->base }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">S/.{{ $invoice->igv }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">S/.{{ $invoice->total }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $invoice->date->format('d-m-Y / H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Paginación --}}
    <div class="bg-white p-4">
        {{ $invoices->links() }}
    </div>
</div>
