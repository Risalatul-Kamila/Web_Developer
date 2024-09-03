<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil Merchant</title>
</head>
<body>
    <h1>Edit Profil Merchant</h1>

    <form action="{{ route('merchant.update-profile') }}" method="POST">
        @csrf
        <label for="nama_perusahaan">Nama Perusahaan:</label>
        <input type="text" id="nama_perusahaan" name="nama_perusahaan" value="{{ $merchant->nama_perusahaan }}" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="{{ $merchant->alamat }}"><br>

        <label for="kontak">Kontak:</label>
        <input type="text" id="kontak" name="kontak" value="{{ $merchant->kontak }}"><br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi">{{ $merchant->deskripsi }}</textarea><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
