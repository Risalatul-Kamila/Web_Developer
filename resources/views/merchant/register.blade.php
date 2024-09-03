<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Merchant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 500px;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"], textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .link-container {
            text-align: center;
            margin-top: 15px;
        }

        .link-container a {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
        }

        .link-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div>
        <h1>Registrasi Merchant</h1>
        <form action="{{ route('merchant.register') }}" method="POST">
            @csrf
            <label for="nama_perusahaan">Nama Perusahaan:</label>
            <input type="text" id="nama_perusahaan" name="nama_perusahaan" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat">

            <label for="kontak">Kontak:</label>
            <input type="text" id="kontak" name="kontak">

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"></textarea>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrasi</button>
        </form>
        <div class="link-container">
            <p>Sudah punya akun? <a href="{{ route('merchant.login.form') }}">Login di sini</a></p>
        </div>
    </div>
</body>
</html>
