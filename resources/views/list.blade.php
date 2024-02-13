<!DOCTYPE html>
<html lang="en">
<head>
  <title>Url Shortener</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Url Shortener</h2>
  {{-- <p>The .table-striped class adds zebra-stripes to a table:</p>             --}}
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Original Url</th>
        <th>Short</th>
        <th>Visitor</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($list as $key=>$l)
            
       
      <tr>
        <td><a href="{{@$l->original_url}}" target="_blank">{{@$l->original_url}}</a></td>
        <td><a href="{{route('UrlSh',$l->shortened_url)}}" target="_blank" class="shortened-link">{{'https://'.@$l->shortened_url}}</a></td>
        <td>{{@$l->visitor??0}}</td>
      </tr>

      @endforeach
      
    </tbody>
  </table>
</div>



</body>
</html>
