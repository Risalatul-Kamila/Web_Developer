<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
</head>
<body>
    <h1>Tambah Menu Baru</h1>

    <form action="{{ route('menu.store') }}" method="POST">
        @csrf
        <label for="nama_menu">Nama Menu:</label>
        <input type="text" id="nama_menu" name="nama_menu" required><br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi"></textarea><br>

        <label for="url_foto">URL Foto:</label>
        <input type="text" id="url_foto" name="url_foto"><br>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" step="0.01" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
