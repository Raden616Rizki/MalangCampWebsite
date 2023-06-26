
    <h1>Keranjang Belanja</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>harga</th>
                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $productId => $quantity)
                @if(isset($products[$productId]))
                    <tr>
                        <td>{{ $products[$productId]->nama_item }}</td>
                        <td>{{ $quantity }}</td>
                        <td>{{ $products[$productId]->harga }}</td>
                        <!-- Tampilkan detail produk lainnya -->
                    </tr>
                @endif
            @endforeach
            
            
            </tbody>
        </table>

        <!-- Tambahkan tombol untuk menghapus atau mengupdate produk di keranjang -->

       
    @else
        <p>Keranjang belanja kosong.</p>
    @endif

