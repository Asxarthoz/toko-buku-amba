<!DOCTYPE html>
<html>
<head>
    <title>Toko Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .judul {
            text-align: center;
        }
    </style>
</head>
<body class="p-4">

<div class="container">
    <h1 class="judul">Manajemen Toko Buku Amba</h1>
    <img src="{{ asset('gambar/ambapict.png') }}" width="250" style="position: relative; left: 540px;>

    <h1>Daftar Buku</h1>

    <form method="GET" class="my-3">
        <input type="text" name="search" class="form-control" placeholder="Cari buku..." value="{{ $search }}">
    </form>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">+ Tambah Buku</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>

        @foreach ($books as $book)
        <tr>
            <td>{{ $book->judul }}</td>
            <td>{{ $book->penulis }}</td>
            <td>Rp {{ number_format($book->harga) }}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus buku?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $books->links() }}
</div>

</body>
</html>
