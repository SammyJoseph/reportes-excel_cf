<div class="bg-gray-100">
    {{-- @dump($filters) --}} {{-- Ver los filtros que se están enviando con livewire --}}

    {{-- Filtros --}}
    <div class="bg-white rounded p-8 shadow mb-6">
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
        
        <x-button>GENERAR REPORTE</x-button>
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
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $invoice->created_at->format('d-m-Y / H:i:s') }}</td>
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
