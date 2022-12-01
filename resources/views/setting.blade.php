<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <style>
    .mt{
      margin-top: 10px;
    }
  </style>
  </head>
  <body>
    <div class="container mt">

      @include('alert')
        <!-- Content here -->
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <form class="row g-3" method="post" action="{{url('setting/store')}}">
                  @csrf
                    <div class="col-md-6">
                        <label for="waktu" class="form-label">Waktu</label>
                        <select class="form-select form-select-sm" name="waktu" aria-label=".form-select-sm example" required>
                          <option selected>Open this select menu</option>
                          <option value="siang">siang</option>
                          <option value="malam">malam</option>
                        </select>
                      </div>

                    <div class="col-md-6">
                        <label for="kode" class="form-label">kode</label>
                        <input type="number" minlength="1" maxlength="5" class="form-control form-control-sm" name="kode" id="kode" required>
                    </div>

                    <div class="col-md-4">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control form-control-sm" name="tanggal" id="tanggal" required>
                    </div>

                      <div class="col-md-4">
                        <label for="time" class="form-label">time</label>
                        <input type="time" class="form-control form-control-sm" name="time" id="time" required>
                      </div>

                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Status</label>
                        <select class="form-select form-select-sm" name="status" aria-label=".form-select-sm example" required>
                          <option selected>Open this select menu</option>
                          <option value="active">active</option>
                          <option value="notactive">notactive</option>
                        </select>
                      </div>

                      <div class="col-md-12">
                        <a href="{{url('/')}}" class="btn btn-secondary btn-sm">back home</a>
                        <button type="submit" class="btn btn-primary btn-sm">submit</button>
                      </div>
                </form>

            </div>

            <div class="col-sm-12" style="margin-top:20px">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">waktu</th>
                          <th scope="col">tanggal</th>
                          <th scope="col">time</th>
                          <th scope="col">kode</th>
                          <th scope="col">status</th>
                          <th scope="col">action</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        @foreach($setting as $key)
                        <tr>
                          <td>{{$key->waktu}}</td>
                          <td>{{$key->tanggal}}</td>
                          <td>{{$key->time}}</td>
                          <td>{{$key->kode}}</td>
                          <td>{{$key->status}}</td>
                          <td>
                            <a href="" class="btn btn-sm btn-warning">edit</a>
                            <a href="{{url('setting/destroy/'.$key->id)}}" class="btn btn-sm btn-danger">delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
              </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>