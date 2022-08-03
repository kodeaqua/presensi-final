@extends('layouts.dashboard')

@section('content')
    <div class="content-body">
        <section>
            <div class="row" id="table-responsive">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar pengguna</h4>
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
                                                            <label class="form-label" for="nip">NIP</label>
                                                            <input type="text"
                                                                class="form-control @error('nip') is-invalid @enderror"
                                                                name="nip" id="nip" aria-describedby="nip"
                                                                value="{{ old('nip') }}" required autocomplete="nip"
                                                                autofocus placeholder="Contoh: 12345678" />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="name">Nama</label>
                                                            <input type="text"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                name="name" id="name" aria-describedby="name"
                                                                value="{{ old('name') }}" required autocomplete="name"
                                                                autofocus placeholder="Contoh: Budi, S. Kom." />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label class="form-label" for="email">Email</label>
                                                            <input type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email" id="email" aria-describedby="email"
                                                                value="{{ old('email') }}" required autocomplete="email"
                                                                autofocus placeholder="Contoh: guru@domain.com" />
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="password"
                                                                class="form-label">{{ __('Password') }}</label>
                                                            <input id="password" type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password" required autocomplete="new-password"
                                                                placeholder="********">
                                                        </div>

                                                        <div class="mb-1">
                                                            <label for="password-confirm"
                                                                class="form-label">{{ __('Confirm Password') }}</label>
                                                            <input id="password-confirm" type="password"
                                                                class="form-control" name="password_confirmation" required
                                                                autocomplete="new-password" placeholder="********">
                                                        </div>

                                                        <div class="mb-1">
                                                            <label for="is_admin"
                                                                class="form-label">{{ __('Administrator') }}</label>
                                                            <select name="is_admin" id="is_admin" class="form-select">
                                                                <option selected value="0">Tidak</option>
                                                                <option value="1">Ya</option>
                                                            </select>
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
                                    <h4 class="card-title">Mata pelajaran baru</h4>
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
                                        <th scope="col" class="text-nowrap">NIP</th>
                                        <th scope="col" class="text-nowrap">Nama</th>
                                        <th scope="col" class="text-nowrap">Email</th>
                                        <th scope="col" class="text-nowrap">Role</th>
                                        <th scope="col" class="text-nowrap">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="text-nowrap text-center">{{ $i }}</td>
                                            <td class="text-nowrap">{{ $user->nip }}</td>
                                            <td class="text-nowrap">{{ $user->name }}</td>
                                            <td class="text-nowrap">{{ $user->email }}</td>
                                            <td>
                                                @if ($user->is_admin == 1)
                                                    Admin, Guru
                                                @else
                                                    Guru
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center">

                                                <button type="button" class="btn btn-sm btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}">
                                                    Ubah
                                                </button>
                                                <div class="modal fade" id="modal{{ $user->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Ubah
                                                                    akun</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('manage-users.update', $user->id) }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="row d-flex align-items-end">
                                                                        <div class="">
                                                                            <div class="mb-1">
                                                                                <label class="form-label"
                                                                                    for="name">Nama mata
                                                                                    pelajaran</label>
                                                                                <input type="text"
                                                                                    class="form-control @error('name') is-invalid @enderror"
                                                                                    name="name" id="name"
                                                                                    aria-describedby="name"
                                                                                    value="{{ old('name') }}"
                                                                                    autocomplete="name" autofocus required
                                                                                    placeholder="{{ $user->name }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Simpan</button>
                                                                </form>
                                                                <form onsubmit="return confirm('Apakah Anda yakin?');"
                                                                    action="{{ route('manage-courses.destroy', $user->id) }}"
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
