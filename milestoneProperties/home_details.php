<?php include 'navbar.php';    ?>
<?php include_once 'functions.php'; ?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <title>Home Details</title>
        <style>
           .breadcrumb{
                background: none;
                text-align: left;
            }
            .navbar-brand{
            font-family: 'Crimson Text', serif;
            }
            body{padding-top:0%;}
            .top-container{
                margin-top: 80px;
/*                background-color:#e5e5e5;*/
                border-radius: 10px; 
                
            }
            .transbox{
                background:rgba(0, 0, 0, .07);
                border-radius: 10px; 
                box-shadow: 1px 7px 36px -5px;
            }
        </style>
    </head>
    <body>
        <?php run_scripts_body()?>
        
        <div class="container top-container transbox">
            <div class ="row">
                <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing" style="overflow:hidden;">
                        <div class="media">
                            <a class="pull-left" href="#" target="_parent">';
                            
                            $img_name = $row["image1"];
                            $img_path = 'http://sfsuswe.com/~f14g02/assets/images/' . $img_name;
                            echo '<img class="img-responsive" src=" ' . $img_path . '" ' . '" /></a>

                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller">
                                <a href="#" target="_parent"></a>

                                <h3 class="media-heading">
                                  <a href="#" target="_parent">$' . number_format($row["price"]) . '</a><small class="pull-right"><i>' . $row["address"] . '</i></small></h3>
                                     <p><small class="pull-right">' . $row["city"] . ", " . $row["us_state"]. ", " . $row["zip_code"] . '</small></p>

                                <br>
                                <ul class="list-inline mrg-0 btm-mrg-10 clr-535353 pull-right">
                                    <li>' . $row["sq_ft"] . ' SqFt</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bedrooms"] . ' Beds</li>

                                    <li style="list-style: none">|</li>

                                    <li>' . $row["num_bathrooms"] . ' Baths</li>
                                </ul>
                                <br><br>
                                <p class="hidden-xs">' . substr($row["description"], 0, 120) . '...</p>
                                    <div class="btn-toolbar">
                                    <button type="button" class="btn btn-success btn-sm pull-right">Details</button>
                                    <button type="button" class="btn btn-default btn-sm pull-right">
                                <span class="glyphicon glyphicon-star" aria-hidden="true"></span> Star
                                    </button>
                                    </div>
                                    <br>
                                    <span class="fnt-smaller fnt-lighter fnt-arial">Milestone Properties&copy</span>
                            </div>
                        </div>
                    </div>
                </div><br>
            </div>
          
            
        <div class="container top-container transbox">
            <div class="row">
            <div class="container text-center">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-2">
                    <a href="#">Request More Info</a><br>
                </div>
            </div>
           <div class="input-group input-group-sm col-sm-offset-4 col-sm-4">
           </div>
       <br></div>
          
    </body>
</html>