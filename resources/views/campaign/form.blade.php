<x-modal size="modal-xl" data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah
    </x-slot>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" class="form-control">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="categories">Kategori</label>
                <select name="categories" id="categories" class="select2 form-control">
                    <option disabled selected>Pilih salah satu</option>
                    @foreach ($category as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="short_description">Deskripsi Singkat</label>
        <textarea name="short_description" id="short_description" rows="3" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="body">Konten</label>
        <textarea name="body" id="body" rows="3" class="summernote form-control"></textarea>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="publish_date">Tanggal Publish</label>
                <div class="input-group datetimepicker" id="publish_date" data-target-input="nearest">
                    <input type="text" name="publish_date" class="form-control datetimepicker-input" data-target="#publish_date" />
                    <div class="input-group-append" data-target="#publish_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="custom-select">
                    <option disabled selected>Pilih salah satu</option>
                    <option value="publish">Publish</option>
                    <option value="archived">Diarsipkan</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="goal">Goal</label>
                <input type="number" name="goal" id="goal" class="form-control">
            </div>
        </div> 
        <div class="col-lg-6">
            <div class="form-group">
                <label for="end_date">Tanggal Selesai</label>
                <div class="input-group datetimepicker" id="end_date" data-target-input="nearest">
                    <input type="text" name="end_date" class="form-control datetimepicker-input" data-target="#end_date" />
                    <div class="input-group-append" data-target="#end_date" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>       
    </div>
        
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="note">Tulis ajakan singkat untuk mengajak orang berdonasi</label>
                <textarea name="note" id="note" class="form-control"></textarea>
            </div>
        </div>         
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="receiver">Penerima</label>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="receiver" class="custom-control-input" id="saya">
                    <label class="custom-control-label font-weight-normal" for="saya">Saya Sendiri</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="receiver" class="custom-control-input" id="keluarga">
                    <label class="custom-control-label font-weight-normal" for="keluarga">keluarga / Kerabat</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="receiver" class="custom-control-input" id="organisasi">
                    <label class="custom-control-label font-weight-normal" for="organisasi">Organisasi Lembaga</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="receiver" class="custom-control-input" id="lainnya">
                    <label class="custom-control-label font-weight-normal" for="lainnya">Lainnya</label>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="path_image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="path_image" class="custom-file-input" id="path_image"
                        onchange="preview('.preview-path_image', this.files[0])">
                    <label class="custom-file-label" for="path_image">Choose file</label>
                </div>
            </div>
            {{-- image preview --}}
            <img src="" class="img-thumbnail preview-path_image" style="display: none">
        </div>
    </div>          

    <x-slot name="footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary">Simpan</button>
    </x-slot>
</x-modal>