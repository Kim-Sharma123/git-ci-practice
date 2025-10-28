<div style="max-width: 800px; margin:auto; text-align: center;">
    <h2>Products Table</h2>

    <table border="1" cellpadding="10" cellspacing="0" style="width:100%;">
        <thead>
            <tr>
                <th style="cursor:pointer;" wire:click="sortBy('name')">
                    Name
                    @if($sortField === 'name')
                        {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                    @endif
                </th>
                <th style="cursor:pointer;" wire:click="sortBy('price')">
                    Price
                    @if($sortField === 'price')
                        {{ $sortDirection === 'asc' ? '↑' : '↓' }}
                    @endif
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:10px;">
        {{ $products->links() }}
    </div>
</div>
