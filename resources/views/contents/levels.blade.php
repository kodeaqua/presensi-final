@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        <section>
            <div class="row" id="table-responsive">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar tingkatan</h4>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah
                            </button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah tingkat</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('manage-levels.store') }}">
                                                @csrf
                                                <div class="row d-flex align-items-end">
                                                    <div class="">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="level">Tingkatan</label>
                                                            <input type="text"
                                                                class="form-control @error('level') is-invalid @enderror"
                                                                name="level" id="level" aria-describedby="level"
                                                                value="{{ old('level') }}" required autocomplete="level"
                                                                autofocus placeholder="Contoh: 11" />
                                                        </div>
                                                    </div>
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
                                    <h4 class="card-title">Tingkat baru</h4>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                        @error('level')
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
                                        <th scope="col" class="text-nowrap">Tingkatan</th>
                                        <th scope="col" class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($levels as $level)
                                        <tr>
                                            <td class="text-nowrap text-center">{{ $i }}</td>
                                            <td class="text-nowrap text-center">{{ $level->level }}</td>
                                            <td class="d-flex justify-content-center">

                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modal{{ $level->id }}">
                                                    Ubah
                                                </button>
                                                <div class="modal fade" id="modal{{ $level->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah
                                                                    tingkat</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('manage-levels.update', $level->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row d-flex align-items-end">
                                                                        <div class="">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="level">Tingkatan</label>
                                                                                <input type="text"
                                                                                    class="form-control @error('level') is-invalid @enderror"
                                                                                    name="level" id="level"
                                                                                    aria-describedby="level"
                                                                                    value="{{ old('level') }}"
                                                                                    autocomplete="level" autofocus required
                                                                                    placeholder="{{ $level->level }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                </form>
                                                                <form onsubmit="return confirm('Apakah Anda yakin?');"
                                                                    action="{{ route('manage-levels.destroy', $level->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Hapus</button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        </div>
                        </td>
                        </tr>
                        @php
                            $i = $i + 1;
                        @endphp
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
