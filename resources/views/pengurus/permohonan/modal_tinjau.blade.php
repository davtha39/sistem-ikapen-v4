<div id="modalTinjau" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{-- route('permohonan.update') --}}" method="POST">
          @csrf
          <div class="modal-header">
            <h4 class="modal-title">Tinjau Permohonan</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <ul class="list-group">
              <li class="list-group-item">
                <div class="form-group">
                  <label class="col-form-label">Nama Pemohon</label>
                  <h6>{{$row->users->name}}</h6>
                </div>
              </li>
              <li class="list-group-item">
                <div class="form-group">
                  <label class="col-form-label">Jenis Permohonan</label>
                  <h6>{{$row->jenis_permohonan}}</h6>
                </div>
              </li>
              <li class="list-group item">
                <div class="form-group">
                  <label class="col-form-label">Beri Catatan (Opsional)</label>
                  <textarea input class="form-control" name="catatan" rows="3"></textarea>
                </div>
              </li>
            </ul>
          </div>
          <div class="modal-footer">
            <div class="btn-group">
              <input type="submit" class="btn btn-success" name="Setujui" value="Setujui">
              <input type="submit" class="btn btn-danger" name="Tolak" value="Tolak">
            </div>
          </div>
        </form>
      </div>
    </div>
</div>
  