<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    @if($message=Session::get('success'))
      <div class="alert alert-success">
           {{$message}}
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger">>
            <ul>
                @foreach($errors->all() as $error)
                 <li>
                    {{$error}}
                 </li>
                 @endforeach
            </ul>
      </div>
      @endif
  <form method="post" action="/uploads" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label  class="form-label">Form Upload</label>
    <input type="file" name="file" class="form-control" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>