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
                <form class="row g-3" method="post" action="{{url('setting/update_time')}}">
                  @csrf
                  <input type="hidden" value="{{$row->id}}" name="id">
                      <div class="col-md-12">
                        <label for="time" class="form-label">waktu</label>
                        <p style="background-color: yellow">{{$row->waktu}}</p>
                      </div>
                    
                      <div class="col-md-2">
                        <label for="time" class="form-label">time</label>
                        <input type="time" class="form-control form-control-sm" name="time" value="{{$row->time}}" id="time" required>
                      </div>

                      <div class="col-md-12">
                        <a href="{{url('/setting')}}" class="btn btn-secondary btn-sm">back setting</a>
                        <button type="submit" class="btn btn-primary btn-sm">submit</button>
                      </div>
                </form>

            </div>
        </div>
    </div>
  </body>
</html>