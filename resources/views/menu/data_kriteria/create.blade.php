<x-app-layout>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-journal-bookmark-fill"></i> Data Kriteria</h1>

        <a href="{{ route('data_kriteria', ['id_data_kegiatan' => $selectedKegiatanId]) }}"
            class="btn btn-secondary btn-icon-split">
            <span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
            <span class="text">Kembali</span>
        </a>
    </div>

    <div class="text-left">
        @if ($selectedKegiatanId)
        <div class="alert alert-info float-left" role="alert">
            Total Bobot Sementara: {{ $totalBobot }} / 100 point
        </div>
        @endif
    </div>
    <div class="text-right">
        @if ($selectedKegiatanId)
        @if ($totalBobot <= 100) <div class="alert alert-danger float-right" role="alert">
            Total bobot yang masih dapat digunakan: {{ 100 - $totalBobot }} point lagi
    </div>
    @endif
    @endif
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Kriteria</h6>
        </div>

        <form action="{{ route('data_kriteria.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Kode Kriteria</label>
                        <input autocomplete="off" type="text" name="kode_kriteria" required class="form-control"
                            placeholder="Contoh: C1,C2..." value="{{ old('kode_kriteria') }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama Kriteria</label>
                        <input autocomplete="off" type="text" name="keterangan" required class="form-control"
                            placeholder="Contoh: Pendidikan,Pengalaman..." value="{{ old('keterangan') }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Bobot Kriteria</label>
                        <input autocomplete="off" type="number" name="bobot" step="0.01" required class="form-control"
                            placeholder="Contoh: 10,25,..." value="{{ old('bobot') }}" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Jenis Kriteria</label>
                        <select name="jenis" class="form-control" required>
                            <option value="">--Pilih Jenis Kriteria--</option>
                            <option value="Benefit" {{ old('jenis')=='Benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="Cost" {{ old('jenis')=='Cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Data Kegiatan</label>
                        <select name="id_data_kegiatan" class="form-control" required>
                            <option value="">--Pilih Data Kegiatan--</option>
                            @foreach($data_kegiatan as $dk)
                            <option value="{{ $dk->id }}" {{ $dk->id == $selectedKegiatanId ? 'selected' : '' }}>{{
                                $dk->nama }} - {{ $dk->jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
</x-app-layout>