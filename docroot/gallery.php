<html lang="en">

<head>
    <?php include "head.php"?>
</head>

<body id="body" class="b-element">
    <!-- Preloader -->
    <div id="preloader" class="smooth-loader-wrapper">
        <div class="smooth-loader">
            <div class="loader1">
                <div class="loader-target">
                    <div class="loader-target-main"></div>
                    <div class="loader-target-inner"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include "nav.php";?>
    <div class="main-wrapper">
        <section class="">
            <div class="bg-image-holder bredcrumb bg-primary">
                <!-- style="background-image: url('img/promo-1.jpg');" -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Gallery </h2>
                            <hr class="hr_narrow  hr_color">
                        </div>
                    </div>
                </div>
                <!-- container ends -->
            </div>
        </section>
        <section class="bg-sand hero-block home-about">
          <style>
            .btn.btn-primary.active {
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
          </style>
            <div class="container">
                <ul class="nav" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="btn btn-primary active" id="night-tab" data-toggle="tab" href="#night" role="tab" aria-controls="night" aria-selected="true">Night League</a>
                  </li>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <li class="nav-item">
                    <a class="btn btn-primary" id="youth-tab" data-toggle="tab" href="#youth" role="tab" aria-controls="youth" aria-selected="false">Youth League</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="night" role="tabpanel" aria-labelledby="night-tab">
                    <div class="row">
                      <?
                        foreach(glob("img/gallery/night/*") as $image){
                          echo '
                          <div class="col-md-3">
                            <a href="'.$image.'" target="_blank">
                              <img src="'.$image.'" class="rounded" style="margin-bottom: 10px;" width="250px">
                            </a>
                          </div>
                          ';
                        }
                      ?>
                    </div>
                  </div>
                  <div class="tab-pane" id="youth" role="tabpanel" aria-labelledby="youth-tab">
                    <div class="row">
                      <?
                        foreach(glob("img/gallery/youth/*") as $image){
                          echo '
                          <div class="col-md-3">
                            <a href="'.$image.'" target="_blank">
                              <img src="'.$image.'" class="rounded" style="margin-bottom: 10px;" width="250px">
                            </a>
                          </div>
                          ';
                        }
                      ?>
                  </div>
                  </div>
                </div>

                <script>
                  $(function () {
                    $('#myTab li:first-child a').tab('show')
                  })
                </script>
          <center>
            <a href="http://cpanel.anklebreaker.ca/cpsess6218831714/frontend/paper_lantern/filemanager/index.html" target="_blank">
              <i class="fa fa-cogs"></i>
            </a>
          </center>
          </div>
        </div>
        </section>

        <!-- FOOTER -->
        <?php include "foot-nav.php";?>

    </div>

    <?php include "js-compile.php";?>

</body>

</html>
