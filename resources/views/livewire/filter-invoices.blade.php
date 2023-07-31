<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
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

    <div class="m-4">
        {{ $invoices->links() }}
    </div>
</div>
