@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Form Register</h2>
        <form id="registerForm" action="{{ route('register.store') }}" method="POST" onsubmit="return validateForm()">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username (Email)</label>
                <input type="email" class="form-control" id="username" name="username" required>
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required minlength="8">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                @error('nama_lengkap')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
                @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
                @error('gaji_pokok')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="potongan" class="form-label">Potongan</label>
                <input type="number" class="form-control" id="potongan" name="potongan" required>
                @error('potongan')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <script>
        function validateForm() {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            let namaLengkap = document.getElementById('nama_lengkap').value;
            let alamat = document.getElementById('alamat').value;
            let gajiPokok = document.getElementById('gaji_pokok').value;
            let potongan = document.getElementById('potongan').value;

            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(username)) {
                alert("Username harus dalam format email yang valid.");
                return false;
            }
            if (password.length < 8) {
                alert("Password harus minimal 8 karakter.");
                return false;
            }
            if (password === username) {
                alert("Password tidak boleh sama dengan email/username.");
                return false;
            }
            if (!namaLengkap || !alamat || !gajiPokok || !potongan) {
                alert("Semua data harus terisi.");
                return false;
            }
            return confirm("Apakah Anda yakin data sudah benar?");
        }
    </script>
@endsection
