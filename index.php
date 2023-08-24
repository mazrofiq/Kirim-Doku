<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kirim Doku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <div class="mx-auto container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <form method="post" action="api.php">
            <h1>Kirim Doku</h1>
            <table class="table">

              <tr>
                <td>Agen Key</td>
                <td><input type="text" name="agentKey" value="A41418"></td>
              </tr>
              <tr>
                <td>Encryption Key</td>
                <td><input type="text" name="encryptionKey" value="627054fevj1sutvs"></td>
              </tr><input type="hidden" name="environment" value="true">
              <tr>
                <td>Payment channel</td>
                <td><select name="API" id = "pilih">
                    <option value="ping">PING</option>
                    <option value="cb">Check Balance</option>
                    <option value="cr">Check Rate</option>
                    <option value="inquiry">Remit</option>
                    <option value="ti">Transaction Info</option>
                    </select>
                </td>
              </tr>
              <tr>
                <td><button id="checkout-button" type="submit" class="btn btn-success" name="button">Kirim</button></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
