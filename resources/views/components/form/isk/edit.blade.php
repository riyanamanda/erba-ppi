<div class="card">
    <div class="card-header">
        <h4>Infeksi Saluran Kemih (ISK)</h4>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="jenis_pemasangan">Jenis Pemasangan <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis_pemasangan" value="spp" class="selectgroup-input"
                                @checked(old('jenis_pemasangan')==="spp" ||
                                $surveilans->surveilansable->jenis_pemasangan === "spp")>
                            <span class="selectgroup-button">SPP</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis_pemasangan" value="dauer" class="selectgroup-input"
                                @checked(old('jenis_pemasangan')==="dauer" ||
                                $surveilans->surveilansable->jenis_pemasangan === "dauer")>
                            <span class="selectgroup-button">Dauer</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis_pemasangan" value="intermiten" class="selectgroup-input"
                                @checked(old('jenis_pemasangan')==="intermiten" ||
                                $surveilans->surveilansable->jenis_pemasangan === "intermiten")>
                            <span class="selectgroup-button">Intermiten</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="jenis_pemasangan" value="kondom" class="selectgroup-input"
                                @checked(old('jenis_pemasangan')==="kondom" ||
                                $surveilans->surveilansable->jenis_pemasangan === "kondom")>
                            <span class="selectgroup-button">Kondom</span>
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
                    <label for="pemeriksaan">Pemeriksaan <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="pemeriksaan" value="urine" class="selectgroup-input"
                                @checked(old('pemeriksaan')==="urine" || $surveilans->surveilansable->pemeriksaan ===
                            "urine" )>
                            <span class="selectgroup-button">Urine</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="pemeriksaan" value="biakan urine" class="selectgroup-input"
                                @checked(old('pemeriksaan')==="biakan urine" || $surveilans->surveilansable->pemeriksaan
                            === "biakan urine" )>
                            <span class="selectgroup-button">Biakan Urine</span>
                        </label>
                    </div>
                    @error('pemeriksaan')
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
                    <label for="tanggal_pasang">Tanggal Pasang <strong class="text-danger">*</strong></label>
                    <input class="form-control @error('tanggal_pasang') is-invalid @enderror" type="date"
                        id="tanggal_pasang" name="tanggal_pasang"
                        value="{{ old('tanggal_pasang') ?? $surveilans->surveilansable->tanggal_pasang }}">
                    @error('tanggal_pasang')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan <strong class="text-danger">*</strong></label>
                    <input class="form-control @error('tanggal_pemeriksaan') is-invalid @enderror" type="date"
                        id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"
                        value="{{ old('tanggal_pemeriksaan') ?? $surveilans->surveilansable->tanggal_pemeriksaan }}">
                    @error('tanggal_pemeriksaan')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan <strong class="text-danger">*</strong></label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                style="height: 80px;">{{ old('keterangan') ?? $surveilans->surveilansable->keterangan }}</textarea>
            @error('keterangan')
            <strong class="text-danger" style="font-size: 11px;">
                {{ $message }}
            </strong>
            @enderror
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="pemasangan_dc_sesuai_indikasi">Pemasangan DC Sesuai Indikasi <strong
                            class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="pemasangan_dc_sesuai_indikasi" value="1" class="selectgroup-input"
                                @checked(old('pemasangan_dc_sesuai_indikasi')==="1" ||
                                $surveilans->surveilansable->pemasangan_dc_sesuai_indikasi == "1")>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="pemasangan_dc_sesuai_indikasi" value="0" class="selectgroup-input"
                                @checked(old('pemasangan_dc_sesuai_indikasi')==="0" ||
                                $surveilans->surveilansable->pemasangan_dc_sesuai_indikasi == "0")>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('pemasangan_dc_sesuai_indikasi')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="pemasangan_menggunakan_alat_steril">Pemasangan Menggunakan Alat
                        Steril<strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="pemasangan_menggunakan_alat_steril" value="1"
                                class="selectgroup-input" @checked(old('pemasangan_menggunakan_alat_steril')==="1" ||
                                $surveilans->surveilansable->pemasangan_menggunakan_alat_steril == "1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="pemasangan_menggunakan_alat_steril" value="0"
                                class="selectgroup-input" @checked(old('pemasangan_menggunakan_alat_steril')==="0" ||
                                $surveilans->surveilansable->pemasangan_menggunakan_alat_steril == "0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('pemasangan_menggunakan_alat_steril')
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
                    <label for="melakukan_hand_hyglene">Melakukan Hand Hyglene <strong
                            class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="melakukan_hand_hyglene" value="1" class="selectgroup-input"
                                @checked(old('melakukan_hand_hyglene')==="1" ||
                                $surveilans->surveilansable->melakukan_hand_hyglene == "1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="melakukan_hand_hyglene" value="0" class="selectgroup-input"
                                @checked(old('melakukan_hand_hyglene')==="0" ||
                                $surveilans->surveilansable->melakukan_hand_hyglene == "0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('melakukan_hand_hyglene')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="segera_dilepas_jika_tidak_indikasi">Segera Dilepas Jika Tidak
                        Indikasi<strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="segera_dilepas_jika_tidak_indikasi" value="1"
                                class="selectgroup-input" @checked(old('segera_dilepas_jika_tidak_indikasi')==="1" ||
                                $surveilans->surveilansable->segera_dilepas_jika_tidak_indikasi == "1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="segera_dilepas_jika_tidak_indikasi" value="0"
                                class="selectgroup-input" @checked(old('segera_dilepas_jika_tidak_indikasi')==="0" ||
                                $surveilans->surveilansable->segera_dilepas_jika_tidak_indikasi == "0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('segera_dilepas_jika_tidak_indikasi')
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
                    <label for="fiksasi_kateter_dengan_plester">Fiksasi Kateter dengan Plester <strong
                            class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="fiksasi_kateter_dengan_plester" value="1"
                                class="selectgroup-input" @checked(old('fiksasi_kateter_dengan_plester')==="1" ||
                                $surveilans->surveilansable->fiksasi_kateter_dengan_plester == "1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="fiksasi_kateter_dengan_plester" value="0"
                                class="selectgroup-input" @checked(old('fiksasi_kateter_dengan_plester')==="0" ||
                                $surveilans->surveilansable->fiksasi_kateter_dengan_plester == "0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('fiksasi_kateter_dengan_plester')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="pengisian_balon_sesuai_indikasi">Pengisian Balon Sesuai Indikasi
                        (30mL)<strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="pengisian_balon_sesuai_indikasi" value="1"
                                class="selectgroup-input" @checked(old('pengisian_balon_sesuai_indikasi')==="1" ||
                                $surveilans->surveilansable->pengisian_balon_sesuai_indikasi == "1")>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="pengisian_balon_sesuai_indikasi" value="0"
                                class="selectgroup-input" @checked(old('pengisian_balon_sesuai_indikasi')==="0" ||
                                $surveilans->surveilansable->pengisian_balon_sesuai_indikasi == "0")>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('pengisian_balon_sesuai_indikasi')
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
                    <label for="adp_tepat">ADP Tepat <strong class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="adp_tepat" value="1" class="selectgroup-input"
                                @checked(old('adp_tepat')==="1" || $surveilans->surveilansable->adp_tepat == "1" )>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="adp_tepat" value="0" class="selectgroup-input"
                                @checked(old('adp_tepat')==="0" || $surveilans->surveilansable->adp_tepat == "0" )>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('adp_tepat')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="urine_bag_menggantung">Urine Bag Menggantung<strong
                            class="text-danger">*</strong></label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="urine_bag_menggantung" value="1" class="selectgroup-input"
                                @checked(old('urine_bag_menggantung')==="1" ||
                                $surveilans->surveilansable->urine_bag_menggantung == "1")>
                            <span class="selectgroup-button">Ya</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="urine_bag_menggantung" value="0" class="selectgroup-input"
                                @checked(old('urine_bag_menggantung')==="0" ||
                                $surveilans->surveilansable->urine_bag_menggantung == "0")>
                            <span class="selectgroup-button">Tidak</span>
                        </label>
                    </div>
                    @error('urine_bag_menggantung')
                    <strong class="text-danger" style="font-size: 11px;">
                        {{ $message }}
                    </strong>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary mr-1">Perbaharui</button>
        <a href="{{ route('surveilans.index') }}" class="btn btn-outline-secondary">Kembali</a>
    </div>
</div>