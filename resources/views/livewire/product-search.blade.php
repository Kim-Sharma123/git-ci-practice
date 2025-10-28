<div style="text-align: center;">
    <h2>Product Search</h2>

    <input type="text" wire:model.live="search" placeholder="Search..." />


    <table border="1" style="margin:auto; margin-top:20px;">
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>
        @forelse($filteredProducts as $product)
            <tr>
                <td>{{ $product['name'] }}</td>
                <td>₹{{ number_format($product['price'], 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">No products found.</td>
            </tr>
        @endforelse
    </table>
</div>
