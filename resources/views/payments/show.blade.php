<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.css')
<title>Detail Data Siswa</title>
</head>

<body>
@include('layouts.sidebar')
  <div class="main-content">
    
@include('layouts.topbar')
  
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-5 d-flex align-items-center" style="min-height: 500px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h5 class="display-3 text-white">Form Data Pembayaran</h5>
            <p class="text-white mt-0 mb-5">Cetaklah data pembayaran, untuk bukti pembayaran dan disimpan oleh siswa!</p>
          </div>
        </div>
      </div>
    </div>
      <!-- Card stars -->
    <div class="container-fluid mt--9">
      <div class="row">
        <div class="col-xl-8 order-xl-2 mb-7 mb-xl-8"> 
            <div class="card" style="background-color:rgba(255,255,255,0.6)">
                <div class="card-body">
                        <div class="text-dark text-center mt-2 mb-3"><h3>Daftar Pembayaran</h3><hr></div>
                @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
                @endif
                    <table id="table-datatables">
                      <thead>
                        <tr>
                          <th>Data diri</th>
                          <th>:</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>   
                            <td>1. Nama</td>
                            <td>:</td>
                            <td>{{ $payment->nama }}</td>
                          </tr>
                          <tr>
                            <td>2. Email</td>
                            <td>:</td>
                            <td>{{ $payment->email }}</td>
                          </tr>
                          <tr>
                            <td>3. NIS</td>
                            <td>:</td>
                            <td>{{ $payment->nis }}</td>
                          </tr>
                          <tr>
                            <td>4. Alamat</td>
                            <td>:</td>
                            <td>{{ $payment->alamat }}</td>
                          </tr>
                          <tr>
                            <td>5. Kelas</td>
                            <td>:</td>
                            <td>{{ $payment->kelas }}</td>
                          </tr>
                          <tr>
                            <td>6. Jenjang</td>
                            <td>:</td>
                            <td>{{ $payment->jenjang }}</td>
                          </tr>
                          <tr>
                            <td>7. Biaya Pendaftaran</td>
                            <td>:</td>
                            <td>Rp {{ number_format($payment->biaya_daftar,0) }}</td>
                          </tr>
                          <tr>
                            <td>8. Saldo</td>
                            <td>:</td>
                            <td>Rp {{ number_format($payment->saldo,0) }}</td>
                          </tr>
                      </tbody>
                    </table>
                      <div class="table-responsive">
                          <table id="table-datatables2" class="table table-bordered table-striped table-hover table-condensed tfix">
                              <thead class="thead bg-dark text-light"align="center" >
                                <tr>
                                    <td>#</td>
                                    <td>NIS</td>
                                    <td>Biaya</td>
                                    <td>Angsuran</td>
                                    <td>Saldo</td>
                                    <td>Tanggal</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($detail as $data)
                                <tr>
                                    <td></td>
                                    <td>{{ $data->nis }}</td>
                                    <td>Rp {{ number_format($data->biaya,0) }}</td>
                                    <td>Rp {{ number_format($data->angsuran,0) }}</td>
                                    <td>Rp {{ number_format($data->saldo,0) }}</td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                  <td></td>
                                  <td>Total Angsuran</td>
                                  <td></td>
                                  <td></td>
                                  <td>Rp {{ number_format($total,0) }}</td>
                                  <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  <ul class="list-group">
                    </ul> 
                  <a href="{{ $payment->id }}/edit" class="btn btn-success">Bayar Angsuran</a>
                  <a href="{{ url('payments') }}" class="card-link text-primary"><i class="fa fa-angle-left"></i>Kembali</a>
                </div>
          </div>
      </div>
    </div>
  </div>
  @include('layouts.footer')
@include('layouts.javascript')
<script type="text/javascript">
  
      $(document).ready(function () {
          $('#table-datatables2').DataTable({
              dom: 'Brti',
              buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
          });
      });
</script>
</body>
</html>