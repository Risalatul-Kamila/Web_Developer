<!DOCTYPE html>
<html>
<head>
    <title>Detail Pesanan</title>
</head>
<body>
    <h1>Detail Pesanan #{{ $order->id }}</h1>

    <p>Customer: {{ $order->customer_name }}</p>
    <p>Alamat Pengiriman: {{ $order->delivery_address }}</p>

    <h2>Item Pesanan</h2>
    <ul>
        @foreach ($order->items as $item)
            <li>{{ $item->menu->nama_menu }} - {{ $item->quantity }} x {{ $item->price }}</li>
        @endforeach
    </ul>

    <p>Total: {{ $order->total }}</p>
</body>
</html>
