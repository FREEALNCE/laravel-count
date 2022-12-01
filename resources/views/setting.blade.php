<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <!-- Content here -->
        <div class="row" style="margin-top: 20px">
            <div class="col-sm-12">
                <form class="row g-3">

                    <div class="col-md-6">
                        <label for="waktu" class="form-label">Waktu</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected>Open this select menu</option>
                          <option value="siang">siang</option>
                          <option value="malam">malam</option>
                        </select>
                      </div>

                    <div class="col-md-6">
                        <label for="voucher" class="form-label">voucher</label>
                        <input type="text" class="form-control form-control-sm" id="voucher">
                    </div>

                    <div class="col-md-4">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input type="date" class="form-control form-control-sm" id="tanggal">
                    </div>

                      <div class="col-md-4">
                        <label for="time" class="form-label">time</label>
                        <input type="time" class="form-control form-control-sm" id="time">
                      </div>

                      <div class="col-md-4">
                        <label for="inputPassword4" class="form-label">Status</label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                          <option selected>Open this select menu</option>
                          <option value="active">active</option>
                          <option value="notactive">notactive</option>
                        </select>
                      </div>

                      <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-sm">confirm</button>
                        <a href="{{url('/')}}" class="btn btn-secondary btn-sm">home</a>
                      </div>
                </form>

            </div>

            <div class="col-sm-12" style="margin-top"></div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                      </thead>
                      <tbody class="table-group-divider">
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                      </tbody>
                </table>
              </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>