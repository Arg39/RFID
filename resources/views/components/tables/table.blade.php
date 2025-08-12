@props(['headers' => [], 'rows' => []])

<div class="w-full overflow-x-auto bg-white rounded-lg shadow">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200']) }}>
        <thead class="bg-gray-100">
            <tr>
                @foreach ($headers as $header)
                    <th
                        class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider whitespace-nowrap">
                        {{ $header }}
                    </th>
                @endforeach
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
            @forelse($rows as $row)
                <tr class="hover:bg-gray-50">
                    @foreach ($row as $cell)
                        <td class="px-4 py-2 whitespace-nowrap">{!! $cell !!}</td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td colspan="{{ count($headers) }}" class="px-4 py-4 text-center text-gray-500">
                        Tidak ada data.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    /* Responsive table for mobile */
    @media (max-width: 640px) {
        .overflow-x-auto table {
            display: block;
            width: 100%;
            overflow-x: auto;
            white-space: nowrap;
        }

        .overflow-x-auto thead {
            display: none;
        }

        .overflow-x-auto tbody tr {
            display: block;
            margin-bottom: 1rem;
            border-bottom: 2px solid #f3f4f6;
        }

        .overflow-x-auto tbody td {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border: none;
            position: relative;
            min-width: 150px;
        }

        .overflow-x-auto tbody td::before {
            content: attr(data-label);
            font-weight: bold;
            width: 120px;
            flex-shrink: 0;
            color: #374151;
            margin-right: 1rem;
            display: inline-block;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add data-label attributes for mobile responsiveness
        const table = document.querySelector('table#{{ $attributes->get('id') }}');
        if (table) {
            const headers = Array.from(table.querySelectorAll('thead th')).map(th => th.textContent.trim());
            table.querySelectorAll('tbody tr').forEach(tr => {
                tr.querySelectorAll('td').forEach((td, i) => {
                    td.setAttribute('data-label', headers[i] || '');
                });
            });
        }
    });
</script>
