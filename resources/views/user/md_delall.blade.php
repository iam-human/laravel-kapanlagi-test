<div class="modal fade" id="modalDelall" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modalc" role="document">
        <div class="modal-content bg-secondary">

            <div class="modal-header">
                <h6 class="modal-title pt-1 text-danger" id="modalDelall"><i class="fas fa-trash-alt pr-3"></i>Hapus Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body pt-0">

                <div class="py-3 text-center">
                    <i class="fas fa-exclamation-triangle fa-3x text-danger"></i>
                    <h4 class="heading mt-4">Yakin Data-data ini akan dihapus ?</h4>
                    <?php $data = Session::get('data'); ?>
                    @if (isset($data))
                        @foreach ($data as $row)
                        <b style="font-size: 25px;" class="text-danger">{{$row->nama}}<br></b>
                        @endforeach                        
                    @else
                        <b style="font-size: 25px;" class="text-danger">Session Berakhir</b>
                    @endif
                    <b style="font-size: 25px;" class="text-danger"></b>
                </div>

            </div>

            <div class="modal-footer">
                @if (isset($data))
                <a href="{{url('del/registrant')}}" class="btn btn-danger">Ok, Hapus</a>
                <a href="{{url('registrant')}}" class="btn btn-link text-danger ml-auto">Cancel</a>
                @else
                <a href="{{url('registrant')}}" class="btn btn-danger">Ok</a>
                @endif
            </div>

        </div>
    </div>
</div>