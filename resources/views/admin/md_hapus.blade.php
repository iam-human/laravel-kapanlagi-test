<div class="modal fade" id="modalHapus{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modalc" role="document">
        <div class="modal-content bg-secondary">

            <div class="modal-header">
                <h6 class="modal-title pt-1 text-danger"><i class="fas fa-trash-alt pr-3"></i>Hapus Data</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0">
                <form action="{{url('/admin/'.$row->id)}}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <div class="row">
                    <div class="col-12 text-center pb-3">
                    <h4 class="heading mt-4">Yakin Data ini akan dihapus ? {{$row->nama}}</h4>
                    <h1 class="text-danger"></h1>
                    </div>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="submit" name="hapus" class="btnhapus btn btn-danger">Hapus</button>
                <button type="button" class="text-danger btn btn-link ml-auto" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->