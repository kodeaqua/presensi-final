@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        <section>
            <div class="row" id="table-responsive">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Kelas</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah pengguna</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('manage-users.store') }}">
                                                @csrf
                                                <div class="row d-flex align-items-end">
                                                    <div class="">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="SchoolClass">Kelas</label>
                                                            <input type="text"
                                                                class="form-control @error('SchoolClass') is-invalid @enderror"
                                                                name="SchoolClass" id="SchoolClass" aria-describedby="SchoolClass"
                                                                value="{{ old('SchoolClass') }}" required autocomplete="SchoolClass"
                                                                autofocus placeholder="Contoh: X" />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="level">Tingkatan</label>
                                                            <input type="text"
                                                                class="form-control @error('level') is-invalid @enderror"
                                                                name="level" id="level" aria-describedby="level"
                                                                value="{{ old('level') }}" required autocomplete="level"
                                                                autofocus placeholder="Contoh: 11" />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="year">Angkatan</label>
                                                            <input type="text"
                                                                class="form-control @error('year') is-invalid @enderror"
                                                                name="year" id="year" aria-describedby="year"
                                                                value="{{ old('year') }}" required autocomplete="year"
                                                                autofocus placeholder="Contoh: 2019" />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="name">Nama jurusan</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="name" aria-describedby="name"
                                                                value="{{ old('name') }}" required autocomplete="name"
                                                                autofocus placeholder="Contoh: Matematika" />
                                                        </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 collapse" id="tambahItem">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kelas Baru</h4>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        @error('name')
                            <div class="card-title">
                                <div class="alert alert-danger text-center" role="alert">
                                    {{ $message }}
                                </div>
                            </div>
                        @enderror
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col" class="text-nowrap">No</th>
                                        <th scope="col" class="text-nowrap">Kelas</th>
                                        <th scope="col" class="text-nowrap">Tingkatan</th>
                                        <th scope="col" class="text-nowrap">Tahun</th>
                                        <th scope="col" class="text-nowrap">Jurusan</th>
                                        <th scope="col" class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection