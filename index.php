<?php
require_once("conn.php");

function __($input){
    return htmlspecialchars($input, ENT_QUOTES);
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Style Sheet-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/73dea4f361.js" crossorigin="anonymous"></script>

    <title>Cars In Stock Checker</title>
  </head>

  <body>

    <div class="container">
        <h3>Cars</h3>
        <hr>

        <div class="row">
            <div class="col-12">
                <form class="input-group" id="search-form">

                <!--below adds year selector-->
                 <div class="input-group-prepend">
                    <select class="custom-select" id="year-select">
                        <option select value="0">Year</option>
                        <?php
                        //for (i=*; i<*; i++)
                        //foreach )array as single)
                        //while (while this statment is true)
                        for($i = 1956; $i <= intval(date("Y")); $i++ ){
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                 </div>

                    <input type="search" name="search" id="search-nickname" placeholder="Enter Car Nickname" class="form-control">

                    <input type="search" name="search" id="search-model" placeholder="Enter Car Make or Model" class="form-control">

                    <div class="input-group-append">
                        <button class="btn btn-primary form-control" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
            <table class="table">
                <thead>
                    <th>Make</th>
                    <th>Model</th>
                    <th>year</th>
                    <th>Nickname</th>
                </thead>
                <tbody id="search-results">
                  
                </tbody>
            </table>
    </div>

    <!-- Modal -->
<div class="modal fade" id="deleteCarAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        Are you sure you want to delete this car???
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" data-action="confirm-delete">Delete</button>
      </div>
    </div>
  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--Custom JS-->
    <script src="assets/js/scripts.js"></script>
  </body>
</html>