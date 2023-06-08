<!-- Modal idcard-->
<div class="modal fade bd-example-modal-lg" id="modalIdCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header no-print">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-idcard" style="
        background-image: url('{{asset('asset/kartu2.png')}}') !important;
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        border-radius: 40px;
        width: 800px;
        height: 500px;
        ">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-4">
                <img src="{{asset('asset/logo-ikapen.png')}}" width="85px" height="85px" class="brand-image img-circle elevation-3">
              </div>
  
            </div>
            <br><br>
            <div class="row">
              <div class="col-3">          
                <img src="/foto_anggota/{{$anggota->foto}}" width="150px" height="200px">
              </div>
              <div class="col-9">                
                <h2>
                  <b>{{$anggota->nama_anggota}}</b>
                </h2>
                <h4>
                  <tr>
                    <th width="200px">No Pensiun</th>
                    <th>: {{$anggota->no_pensiun}}</th>
                  </tr>
                </h4>
                <div class="col-4">
                  <h4>No Pensiun</h4>
                  <br>Jenis Kelamin
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item borderless"></li>
                  <li class="list-group-item borderless">{{$anggota->gender}}</li>
                  <li class="list-group-item borderless">{{$anggota->gender}}</li>

                </ul>
                
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer no-print">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="btnPrint"type="button" class="btn btn-default" onclick="window.print()">Print</button>
        </div>
      </div>
    </div>
</div>