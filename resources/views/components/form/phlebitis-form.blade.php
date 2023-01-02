<div class="card">
    <div class="card-header">
        <h4>Phlebitis</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="jenis_pemasangan">Jenis Pemasangan <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis_pemasangan" value="kateter v perifer"
                                class="selectgroup-input" @checked(old('jenis_pemasangan')==="kateter v perifer" )>
                            <span class="selectgroup-button">Kateter V Perifer</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis_pemasangan" value="umbilikal" class="selectgroup-input"
                                @checked(old('jenis_pemasangan')==="umbilikal" )>
                            <span class="selectgroup-button">Umbilikal</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis_pemasangan" value="double lumen" class="selectgroup-input"
                                @checked(old('jenis_pemasangan')==="double lumen" )>
                            <span class="selectgroup-button">Double Lumen</span>
                        </label>
                    </div>
                    @error('jenis_pemasangan')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="tujuan_pemasangan">Tujuan Pemasangan <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="tujuan_pemasangan" value="pemberian obat"
                                class="selectgroup-input" @checked(old('tujuan_pemasangan')==="pemberian obat" )>
                            <span class="selectgroup-button">Pemberian Obat</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="tujuan_pemasangan" value="transfusi" class="selectgroup-input"
                                @checked(old('tujuan_pemasangan')==="transfusi" )>
                            <span class="selectgroup-button">Transfusi</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="tujuan_pemasangan" value="nutrisi parenteral"
                                class="selectgroup-input" @checked(old('tujuan_pemasangan')==="nutrisi parenteral" )>
                            <span class="selectgroup-button">Nutrisi Parenteral</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="tujuan_pemasangan" value="terapi cairan" class="selectgroup-input"
                                @checked(old('tujuan_pemasangan')==="terapi cairan" )>
                            <span class="selectgroup-button">Terapi Cairan</span>
                        </label>
                    </div>
                    @error('tujuan_pemasangan')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                style="height: 80px;"></textarea>
            @error('keterangan')
            <strong class="invalid-feedback">
                {{ $message }}
            </strong>
            @enderror
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="lokasi">Lokasi <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="lokasi" value="tangan kanan" class="selectgroup-input"
                                @checked(old('lokasi')==="tangan kanan" )>
                            <span class="selectgroup-button">Tangan Kanan</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="lokasi" value="tangan kiri" class="selectgroup-input"
                                @checked(old('lokasi')==="tangan kiri" )>
                            <span class="selectgroup-button">Tangan Kiri</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="lokasi" value="kaki kanan" class="selectgroup-input"
                                @checked(old('lokasi')==="kaki kanan" )>
                            <span class="selectgroup-button">Kaki Kanan</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="lokasi" value="kaki kiri" class="selectgroup-input"
                                @checked(old('lokasi')==="kaki kiri" )>
                            <span class="selectgroup-button">Kaki Kiri</span>
                        </label>
                    </div>
                    @error('lokasi')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="lakukan_pengecekan_tempat_pemasangan">Lakukan Pengecekan Tempat Pemasangan <strong
                            class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="lakukan_pengecekan_tempat_pemasangan" value="1"
                                class="selectgroup-input" @checked(old('lakukan_pengecekan_tempat_pemasangan')==="1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="lakukan_pengecekan_tempat_pemasangan" value="0"
                                class="selectgroup-input" @checked(old('lakukan_pengecekan_tempat_pemasangan')==="0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('lakukan_pengecekan_tempat_pemasangan')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan">Lakukan Kebersihan Tangan
                        Sebelum dan Sesudah Pemasangan <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan"
                                value="1" class="selectgroup-input"
                                @checked(old('lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan')==="1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan"
                                value="0" class="selectgroup-input"
                                @checked(old('lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan')==="0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('lakukan_kebersihan_tangan_sebelum_dan_sesudah_pemasangan')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="melepas_pemasangan_apabila_ada_keluhan_atau_peradangan">Melepas Pemasangan Apabila ada
                        Keluhan atau Peradangan <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="melepas_pemasangan_apabila_ada_keluhan_atau_peradangan" value="1"
                                class="selectgroup-input"
                                @checked(old('melepas_pemasangan_apabila_ada_keluhan_atau_peradangan')==="1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="melepas_pemasangan_apabila_ada_keluhan_atau_peradangan" value="0"
                                class="selectgroup-input"
                                @checked(old('melepas_pemasangan_apabila_ada_keluhan_atau_peradangan')==="0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('melepas_pemasangan_apabila_ada_keluhan_atau_peradangan')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="drayssing">Lakukan Pengecekan Balutan Pemasangan (Drayssing) <strong
                            class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="drayssing" value="1" class="selectgroup-input"
                                @checked(old('drayssing')==="1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="drayssing" value="0" class="selectgroup-input"
                                @checked(old('drayssing')==="0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('drayssing')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="melepas_pemasangan_apabila_lebih_dari_72_jam">Melepas Pemasangan Apabila Lebih dari 72
                        Jam <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="melepas_pemasangan_apabila_lebih_dari_72_jam" value="1"
                                class="selectgroup-input"
                                @checked(old('melepas_pemasangan_apabila_lebih_dari_72_jam')==="1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="melepas_pemasangan_apabila_lebih_dari_72_jam" value="0"
                                class="selectgroup-input"
                                @checked(old('melepas_pemasangan_apabila_lebih_dari_72_jam')==="0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('melepas_pemasangan_apabila_lebih_dari_72_jam')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="tanggal_pasang">Tanggal Pasang <string class="text-danger">*</string></label>
                    <input type="date" class="form-control @error('tanggal_pasang') is-invalid @enderror"
                        id="tanggal_pasang" name="tanggal_pasang">
                    @error('tanggal_pasang')
                    <strong class="invalid-feedback">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="tanggal_lepas">Tanggal Lepas <string class="text-danger">*</string></label>
                    <input type="date" class="form-control @error('tanggal_lepas') is-invalid @enderror"
                        id="tanggal_lepas" name="tanggal_lepas">
                    @error('tanggal_lepas')
                    <strong class="invalid-feedback">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary mr-1">Simpan</button>
        <a href="{{ route('surveilans.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</div>