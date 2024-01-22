@section('title')
Create Post - Belajar Livewire 3 di SantriKoding.com
@endsection

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
        <!-- flash message -->
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <!-- end flash message -->
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form wire:submit="store" enctype="multipart/form-data">
                        <p>
                            <b>Hi</b>, Silahkan isikan <b>nama, usia, pesan,</b> dan <b>gambar</b> (kalau ada) yang nantinya akan ditampilkan pada <b>kartu ucapan</b> yaa, Thank You!
                        </p>
                        <div class="form-group mb-4">
                            <label class="fw-bold">NAMA</label>
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror" wire:model="fullname" placeholder="Masukan Nama">

                            <!-- error message untuk fullname -->
                            @error('fullname')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold">UMUR</label>
                            <input type="number" class="form-control @error('age') is-invalid @enderror" wire:model="age" placeholder="Masukkan Umur">

                            <!-- error message untuk age -->
                            @error('age')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label class="fw-bold">PESAN</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" wire:model="message" rows="2" placeholder="Tuliskan Pesan"></textarea>

                            <!-- error message untuk message -->
                            @error('message')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mb-4">

                            <label class="fw-bold">GAMBAR ATAU FOTO</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" wire:model="image">

                            <!-- error message untuk title -->
                            @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-warning" type="submit">Buat Kartu Ucapan</button>
                            <button class="btn btn-outline-warning" type="button">Reset</button>
                          </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>