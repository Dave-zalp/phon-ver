<!-- Code by Brave Coder | https://youtube.com/BraveCoder -->


<?php

if (isset($_POST['search'])) {
  $number = $_POST['number'];
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.apilayer.com/number_verification/validate?number=$number",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: text/plain",
      "apikey: 5Xbp9HHp3kJAiHYqnS3qcQwXdhlr15eF"
    ),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET"
  ));
  
  $response = curl_exec($curl);
  
  curl_close($curl);
  
  $json = json_decode($response, true);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css" />
  <title>IP Lookup</title>
</head>

<body>
  <div class="search">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mx-auto">
          <div class="txt text-center">
            <h1>Search</h1>
            <p>Search any Phone Number</p>
          </div>
          <form class="form" action="" method="post">
            <input type="text" class="input me-2" name="number" placeholder="Enter a Phone Number" required />
            <button type="submit" name="search" class="btn">
              Search <i class="far fa-paper-plane ms-1"></i>
            </button>
          </form>
        </div>
      </div>
      <?php if (isset($_POST['search'])) { ?>
        <div class="row mt-3">
          <div class="col-md-4 mx-auto">
            <table class="item table table-bordered h-100 p-4 first">
              <tbody>
                <tr>
                  <td>Valid:</td>
                  <td><?php if ($json['valid'] == 1) {
                        echo "TRUE";
                      } else {
                        echo "FALSE";
                      } ?></td>
                </tr>
                <tr>
                  <td>Number:</td>
                  <td><?php echo $json['number']; ?></td>
                </tr>
                <tr>
                  <td>Local Format:</td>
                  <td><?php echo $json['local_format']; ?></td>
                </tr>
                <tr>
                  <td>Int. Format:</td>
                  <td><?php echo $json['international_format']; ?></td>
                </tr>
                <tr>
                  <td>Country Prefix:</td>
                  <td><?php echo $json['country_prefix']; ?></td>
                </tr>
                <tr>
                  <td>Country Code:</td>
                  <td><?php echo $json['country_code']; ?></td>
                </tr>
                <tr>
                  <td>Country:</td>
                  <td><?php echo $json['country_name']; ?></td>
                </tr>
                <tr>
                  <td>Location:</td>
                  <td><?php echo $json['location']; ?></td>
                </tr>
                <tr>
                  <td>Carrier:</td>
                  <td><?php echo $json['carrier']; ?></td>
                </tr>
                <tr>
                  <td>Line Type:</td>
                  <td><?php echo $json['line_type']; ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
