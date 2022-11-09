<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Factuur ID</b></td>
        <td><b>Company name</b></td>
        <td><b>Created atr</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          {{$show->id}}
        </td>
        <td>
          {{$show->company_name}}
        </td>
        <td>
          {{$show->created_at}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>