@extends('templates.main')
@section('content')
    		<div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Data Table</h6>
                <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kota</th>
                        <th>Provinsi</th>
                        <th>Pulau</th>
                        <th>Luar Negri</th>
                        <th>Latitude</th>
                        <th>Logtitude</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
					</div>	
@endsection

@push('scripts')
     <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){
      // DataTable
      $('#dataTableExample').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('data.city')}}",
         columns: [
            { data: 'id' },
            { data: 'city' },
            { data: 'provinces' },
            { data: 'island' },
            { data: 'latitude' },
            { data: 'latitude' },
            { data: 'overseas' },
            { data: 'action' },
         ]
      });
    });
    </script>
@endpush
			