<div class="box-body">
    <div class="col-md-12">
        @if(!empty($data->no_doc))
        <div class="row">    
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('no_doc', 'No Laporan Sortir') !!}
                    {!! Form::text('no_doc', null, ['class'=>'form-control', 'id' => 'no_doc', 'readonly' => 'readonly', 'placeholder' => 'No Laporan Sortir']) !!}
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-1"></div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('kd_supplier', 'Nama PT') !!}
                    <select class="form-control select2" name="kd_supplier" id="kd_supplier" style="width:100%;" required>
                        <option value="" selected>Pilih Supplier</option>       
                        <option {{ !empty($data->kd_supplier) == 'SUP001' ? 'selected' : '' }} value="SUP001">SUPPLIER 1</option>
                        <option {{ !empty($data->kd_supplier) == 'SUP002' ? 'selected' : '' }} value="SUP002">SUPPLIER 2</option>
                        <option {{ !empty($data->kd_supplier) == 'SUP003' ? 'selected' : '' }} value="SUP003">SUPPLIER 3</option>             
                    </select>
                </div>
                <div class="col-md-3">
                    {!! Form::label('nm_picsupp', 'Nama PIC Supplier') !!}
                    {!! Form::text('nm_picsupp', null, ['class'=>'form-control', 'id' => 'nm_picsupp',  'placeholder' => 'Nama PIC Supplier']) !!}
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('nm_picstore', 'Nama PIC Toko') !!}
                    <select class="form-control select2" name="nm_picstore" id="nm_picstore" style="width:100%;" required>
                        <option value="" selected>Pilih PIC IGP</option>    
                        <option {{ !empty($data->nm_picstore) == 'ari' ? 'selected' : '' }} value="ari">Ari</option>
                        <option {{ !empty($data->nm_picstore) == 'milzam' ? 'selected' : '' }} value="milzam">Milzam</option>
                        <option {{ !empty($data->nm_picstore) == 'faqih' ? 'selected' : '' }} value="faqih">Faqih</option>     
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('no_barang', 'No Barang') !!}
                    <div class="input-group">
                        {!! Form::text('no_barang', null, ['class'=>'form-control', 'id' => 'no_barang',  'placeholder' => 'No Barang', 'onchange' => 'validasiPartNoSupplier()']) !!}
                        <span class="input-group-btn">
                            <button id="btnpopuppartno" type="button" class="btn btn-info" data-toggle="modal" data-target="#modelPartnoSupp" >
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="col-md-3">
                    {!! Form::label('nm_barang', 'Nama Barang') !!}
                    {!! Form::text('nm_barang', null, ['class'=>'form-control', 'id' => 'nm_barang',  'placeholder' => 'Part Name']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::label('model', 'Model') !!}
                    {!! Form::text('model', null, ['class'=>'form-control', 'id' => 'model',  'placeholder' => 'Model']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('tanggal_sortir', 'Tanggal Sortir') !!}
                    @if(!empty($data->tanggal_sortir))
                    {!! Form::date('tanggal_sortir', $data->tanggal_sortir, ['class'=>'form-control', 'id' => 'tanggal_sortir', 'required']) !!}
                    @else
                    {!! Form::date('tanggal_sortir', \Carbon\Carbon::now(), ['class'=>'form-control', 'id' => 'tanggal_sortir', 'required']) !!}
                    @endif
                </div>
                <div class="col-md-2">
                    {!! Form::label('waktu_sortir', 'Waktu Sortir') !!}
                    {!! Form::time('waktu_sortir',  null, ['class'=>'form-control', 'id'=>'waktu_sortir', 'name'=>'waktu_sortir']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('problem', 'Problem') !!}
                    {!! Form::text('problem', null, ['class'=>'form-control', 'id' => 'problem',  'placeholder' => 'Problem']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('foto_problem', 'Foto Barang Problem') !!}
                    {!! Form::file('foto_problem', ['class'=>'form-control', 'id' => 'foto_problem', 'onchange'=>'fotoURL1(this)', 'accept' => '.jpg,.jpeg,.png']) !!}
                    @if (!empty($img_prob))
                    <div class="col-md-8" style="min-height: 200px; max-height: 200px;">
                        {!! Form::hidden('img_prob', $data->foto_problem, ['class'=>'form-control', 'id' => 'img_prob']) !!}
                        <img src="{{ $img_prob }}" id="foto_img" class="img-responsive" style="max-height: 150px;">
                    </div>
                    @else
                    <div class="col-md-8" style="min-height: 200px; max-height: 200px;">
                        <img src="{{ asset('no_picture.png') }}" id="foto_img" class="img-responsive" style="max-height: 150px;">
                    </div>
                    @endif
                </div>
                <div class="col-md-3">
                    {!! Form::label('foto_activity', 'Foto Activity Sortir') !!}
                    {!! Form::file('foto_activity', ['class'=>'form-control', 'id' => 'foto', 'onchange'=>'actURL1(this)', 'accept' => '.jpg,.jpeg,.png']) !!}
                    @if (!empty($img_activity))
                    <div class="col-md-8" style="min-height: 200px; max-height: 200px;">
                        {!! Form::hidden('img_activity', $data->foto_activity, ['class'=>'form-control', 'id' => 'img_activity']) !!}
                        <img src="{{ $img_activity }}" id="act_img" class="img-responsive" style="max-height: 150px;">
                    </div>
                    @else
                    <div class="col-md-8" style="min-height: 200px; max-height: 200px;">
                        <img src="{{ asset('no_picture.png') }}" id="act_img" class="img-responsive" style="max-height: 150px;">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Qty</legend>
                    <div class="form-group">
                        <div class="col-md-4">
                            {!! Form::label('qty_ok', 'Qty OK') !!}
                            {!! Form::number('qty_ok', empty($data->qty_ok) ? 0 : $data->qty_ok, ['class'=>'form-control', 'id' => 'qty_ok', 'min' => 0]) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('qty_ng', 'Qty NG') !!}
                            {!! Form::number('qty_ng', empty($data->qty_ng) ? 0 : $data->qty_ng, ['class'=>'form-control', 'id' => 'qty_ng', 'min' => 0]) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('qty_total', 'Total') !!}
                            @if(empty($qty_total))
                            {!! Form::number('qty_total', empty($data->qty_total) ? 0 : $data->qty_total, ['class'=>'form-control', 'id' => 'qty_total', 'readonly'=>'true']) !!}
                            @else
                            {!! Form::number('qty_total', $qty_total, ['class'=>'form-control', 'id' => 'qty_total', 'readonly'=>'true']) !!}
                            @endif
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('qty_mp', 'Jumlah M/P Sortir') !!}
                    {!! Form::number('qty_mp', null, ['class'=>'form-control', 'id' => 'qty_mp']) !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {{ Form::label('consumable', 'Consumable') }}
                    {{ Form::textarea('consumable', null, ['class' => 'form-control', 'rows' => 3, 'onkeydown' => 'handleInput(event)']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    {!! Form::label('ket', 'Keterangan') !!}
                    {!! Form::text('ket', null, ['class'=>'form-control', 'id' => 'ket']) !!}
                </div>
            </div>
        </div>
        <div class="row" style="margin-top:10px; margin-bottom:10px;">
            <div class="form-group">
                <div class="col-md-12">
                    @if(empty($data))
                    <button type="button" class="btn btn-primary" id="btn-submit">SAVE</button>
                    @else
                    <button type="button" class="btn btn-primary" id="btn-update">UPDATE</button>
                    <button type="button" class="btn btn-danger" id="btn-delete">DELETE</button>
                    @endif
                    <a class="btn btn-default" href="{{route('catalog.index')}}">CANCEL</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.3/js/foundation/foundation.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>  
    function fotoURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			var id = input.id;
			reader.onload = function (e) {
				$('#foto_img').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

    $('#btn-submit').on('click', function() {
        var formData = new FormData(document.getElementById("form_id"));
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Anda tidak akan dapat mengembalikan tindakan ini!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batalkan'
        }).then((result) => {
            $.ajax({
                type: 'POST',
                url: "{{route('catalog.store') }}",
                data: formData,
                dataType: 'json',
                // data: $('#form_id').serialize(),
                contentType: false,
                processData: false,
                success: function( _response ){
                    if(_response.indctr == '1'){
                        Swal.fire('Sukses', 'Berhasil Disimpan!','success');
                        var urlRedirect = "{{route('catalog.index')}}";
                        window.location.href = urlRedirect;
                    } else if(_response.indctr == '0'){
                        Swal.fire(
                        'Terjadi kesalahan saat menyimpan ',
                        +_response.msg,
                        'info'
                        )
                    }
                },
                error: function(xhr, textStatus, errorThrown){
                    Swal.fire(
                    'Terjadi kesalahan',
                    'Error: '+xhr.status+'<br>'+errorThrown+'<br> Status: '+xhr.responseText,
                    'info'
                    )
                }   
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                }
            })
        })
    });

    $('#btn-update').on('click', function() {
        var formData = new FormData(document.getElementById("form_id"));
        var msg = "Anda yakin ingin mengubah?";
        var teks="";
        var no_doc = document.getElementById("no_doc").value;
        var url = '{{ route('catalog.update', 'param') }}';
            url = url.replace('param', window.btoa(no_doc));
        Swal.fire({
            title: msg,
            text: teks,
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes!',
            cancelButtonText: '<i class="fa fa-thumbs-down"></i> No!',
            allowOutsideClick: true,
            allowEscapeKey: true,
            allowEnterKey: true,
            reverseButtons: false,
            focusCancel: true,
        }).then(function () {
            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                dataType: 'json',
                // data: $('#form_id').serialize(),
                contentType: false,
                processData: false,
                success: function( _response ){
                    if(_response.indctr == '1'){
                        Swal.fire('Sukses', 'Berhasil Disimpan!','success');
                        var urlRedirect = "{{route('catalog.index')}}";
                        window.location.href = urlRedirect;
                    } else if(_response.indctr == '0'){
                        Swal.fire('Terjadi kesalahan saat menyimpan '+_response.msg, 'info')
                    }
                },
                error: function(xhr, textStatus, errorThrown){
                    Swal.fire(
                    'Terjadi kesalahan',
                    'Error: '+xhr.status+'<br>'+errorThrown+'<br> Status: '+xhr.responseText,
                    'info'
                    )
                }   
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                }
            })
        });
    });
</script>