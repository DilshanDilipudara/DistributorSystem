<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/transaction-pool.css">
    <title>Quick</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand text-primary font-weight-bold" href="#" style="font-size: 40px !important;">Transaction pool</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- <p class="navbar-brand text-primary font-weight-bold text-right">login</p> -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

        <form class="form-inline my-2 my-lg-0 ">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
  </nav>
  <section>
    <p style="font-size: 35px !important;" class="text-center text-info">Page Access : Sales REF,Manager</p>
  </section>
  <section>
    <div class="text3">
      <div class="text2">
        <div class="text1">
          <div class="row">
            <div class="col-md-12 col-lg-10">
              <div class="form-group row">
                  <div class="form-check col-sm-12 col-xl-4 pt-2 text-right">
                    <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                    <label class="form-check-label" for="autoSizingCheck2">
                      All orders
                    </label>
                  </div>
                  <label for="inputPassword" class="col-sm-12 col-xl-1 col-form-label text-right">From</label>
                  <div class="col-sm-12 col-xl-3">
                    <input type="date" class="form-control" id="inputPassword" placeholder="94711466859">
                  </div>
                  <label for="inputPassword" class="col-sm-12 col-xl-1 col-form-label mt-sm-2 mt-xl-0 text-right">To</label>
                  <div class="col-sm-12 col-xl-3">
                    <input type="date" class="form-control" id="inputPassword" placeholder="94711466859">
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <ul class="container nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Orders" role="tab" aria-controls="home" aria-selected="true">All Orders</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#collected" role="tab" aria-controls="profile" aria-selected="false">Money to be collected</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Completed" role="tab" aria-controls="contact" aria-selected="false">Completed</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#next_7_days" role="tab" aria-controls="contact" aria-selected="false">Collect in next 7 days</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Deliver_Pending" role="tab" aria-controls="contact" aria-selected="false">Deliver Pending</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="Orders" role="tabpanel" aria-labelledby="home-tab">
        <section style="overflow-x: auto !important;" class="mt-4">
          <div style="width: 1800px;margin-left: auto;margin-right: auto;">
            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Invoice number</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Money collecting due date</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Total Amount</th>
                  <th scope="col">Pending amount</th>
                  <th scope="col">Item count</th>
                  <th scope="col">Status</th>
                  <th scope="col">Comment</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                  <td>@mdo</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </div>

      <div class="tab-pane fade" id="collected" role="tabpanel" aria-labelledby="profile-tab">
        ...
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
      <div class="tab-pane fade" id="Completed" role="tabpanel" aria-labelledby="contact-tab">...</div>
      <div class="tab-pane fade" id="next_7_days" role="tabpanel" aria-labelledby="contact-tab">...</div>
      <div class="tab-pane fade" id="Deliver_Pending" role="tabpanel" aria-labelledby="contact-tab">...</div>

    </div>
  </section>

  <section class="container mt-4">
    <div>
      <form class="text-center">
        <div class="form-group row">
          <label for="inputEmail1" class="col-sm-2 col-form-label font-weight-bolder">Total Amount</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail1">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail2" class="col-sm-2 col-form-label font-weight-bolder">Total Pending</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="inputEmail2">
          </div>
        </div>
      </form>
  </section>
<script src="js/index.js"></script>
<!-- <script async>(function(w, d) { w.CollectId = "5eece54b36abf135dba4e56e"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>     -->
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<!--    Bootstrap : https://getbootstrap.com/-->
<!--    AnimateCSS :https://daneden.github.io/animate.css/-->
<!--    WowJS : https://github.com/graingert/wow-->
<!--    Fonts : https://fonts.google.com/specimen/Pla...-->
<!--    Source Code : http://bit.ly/e-combycodegrid-->
