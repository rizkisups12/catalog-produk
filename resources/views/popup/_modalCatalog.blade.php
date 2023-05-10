<div class="modal-header">
    <span style="font-size:15px; text-align:center; font-weight: bold;">Item</span>
    <button type="button" class="close btn-md" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    @if(!empty($data))
        {!! Form::model($data, ['class'=>'form-horizontal','id'=>'form_id1']) !!}
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="row" style="padding-top:10px;">
                    <div class="col-md-4">
                        <label class="col-form-label text-md-right" for="">Part No Baan:</label>
                    </div>
                    <div class="col-md-8">
                        {!! Form::text('part_no_child', null, ['class' => 'form-control', 'id'=>'part_no', 'readonly' => 'readonly'])!!}
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-md-4">
                        <label class="col-form-label text-md-right" for="">Part No Customer:</label>
                    </div>
                    <div class="col-md-8">
                        {!! Form::text('part_no_cust', null, ['class' => 'form-control', 'id'=>'part_no_cust', 'readonly' => 'readonly'])!!}
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-md-4">
                        <label class="col-form-label text-md-right" for="">Part Name :</label>
                    </div>
                    <div class="col-md-8">
                        {!! Form::text('part_name', null, ['class' => 'form-control', 'id'=>'part_name', 'readonly' => 'readonly'])!!}
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-md-4">
                        <label class="col-form-label text-md-right" for="">Qty :</label>
                    </div>
                    <div class="col-md-8">
                        {!! Form::number('qpu', null, ['class' => 'form-control', 'id'=>'qty', 'readonly' => 'readonly'])!!}
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-md-4">
                        <label class="col-form-label text-md-right" for="">Punch :</label>
                    </div>
                    <div class="col-md-8">
                        {!! Form::text('punch', null, ['class' => 'form-control', 'id'=>'punch', 'readonly' => 'readonly'])!!}
                    </div>
                </div>
                <div class="row" style="padding-top:10px;">
                    <div class="col-md-4">
                        <label class="col-form-label text-md-right" for="">Marking :</label>
                    </div>
                    <div class="col-md-8">
                        {!! Form::text('marking', null, ['class' => 'form-control', 'id'=>'marking', 'readonly' => 'readonly'])!!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if(!empty($image_codes))
                <img src="{{$image_codes}}" alt="File Not Found" id="foto" style='width: 70%;'>
                @else
                <div><img src='{{ asset('images/no_picture.png') }}' style='width: 100px; height: 100px;'></div>
                @endif
            </div>
        </div>
        {!! Form::close() !!}
    @else
    <div class="row">
        <div class="col-md-12">
            <center>
                <i class="fa fa-exclamation-triangle" style="font-size:60px;color:orange"></i><br>
                <b>MAAF ITEM YANG DICARI TIDAK DITEMUKAN / BELUM TERDAFTAR</b>
            </center>
        </div>
    </div>
    @endif
</div>
<div class="modal-footer">
</div>