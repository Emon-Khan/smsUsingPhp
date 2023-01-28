<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Students Management System</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      </br>
      <a class="btn btn-primary pull-right" href="admin/login.php">Login</a>
      </br>
      </br>
      <h1 class="text-center">Welcome to Students Management System</h1>
      </br>
      <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        <form action="" method="POST">
          <table class="table table-bordered">
            <tr>
              <td colspan="2" class="text-center"><label>Student Inforamtion</label></td>
            </tr>
            <tr>
              <td><label for="choose">Choose Class</label></td>
              <td>
                <select class="form-control" id="choose" name="choose">
                  <option value="">Select</option>
                  <option value="">1st</option>
                  <option value="">2nd</option>
                  <option value="">3rd</option>
                  <option value="">4th</option>
                  <option value="">5th</option>
                </select>
              </td>
            </tr>
            <tr>
              <td><label for="roll">Roll</label></td>
              <td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}"/></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center"><input class="btn btn-default text-center" type="submit" value="Show Info" name="show_info"/></td>
            </tr>
          </table>
        </form>
        </div>
      </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>