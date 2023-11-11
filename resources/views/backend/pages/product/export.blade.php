<table>
    <thead>
    <tr>
        <th>Ürün Adı</th>
        <th>Kategori Adı</th>
        <th>Fiyat</th>
        <th>Boyut</th>
        <th>Renk</th>
    </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->size }}</td>
            <td>{{ $product->color }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
