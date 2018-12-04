<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Smart-Shop</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="../web/index.php" class="simple-text">
                    Smart-Shop
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="qlsp.php">
                        <i class="pe-7s-user"></i>
                        <p>Quản lí sản phẩm</p>
                    </a>
                </li>
                <li>
                    <a href="qlkh.php">
                        <i class="pe-7s-note2"></i>
                        <p>Quản Lí Khách Hàng</p>
                    </a>
                </li>
                <li>
                    <a href="typography.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.php">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.php">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.php">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.php">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">sản phẩm</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               <p>Account</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Dropdown
										<b class="caret"></b>
									</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<!-- <li class="separator hidden-lg hidden-md"></li> -->
                    </ul>
                </div>
            </div>
        </nav>

  
    <!-- Left Panel -->

    <!-- Right Panel -->

   
   <?php 
      require '../dao/sanpham.php';

      if (isset($_POST['submit'])) {
        $tensp = $_POST['name'];
        $dongia = $_POST['dongia'];
        $giamgia = $_POST['giamgia'];
        $hinh ='../view/assets/upload/'. $_FILES['images']['name'];
          $ngaynhap = $_POST['date'];
          $luotxem = $_POST['view'];
          $mota = $_POST['detail'];
          sanpham_insert($tensp, $dongia, $giamgia, $hinh, $ngaynhap, $luotxem,$mota);
      }
      if (isset($_GET['del'])) {
        $id = $_GET['id'];
        sanpham_delete($id);
      }
      ?>
   <div class="col-lg-12" >
                    <div class="card">
                      <div class="card-header">
                        <strong>Quản Lý </strong> sản phẩm
                      </div>
                      <div class="card-body card-block">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên sản phẩm</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" placeholder="Tên sản phẩm" class="form-control"><small class="form-text text-muted">Nhập tên sản phẩm</small></div>
                          </div>


                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Đơn Giá</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="dongia" placeholder="Đơn Giá" class="form-control"><small class="form-text text-muted">Nhập Đơn Giá</small></div>
                          </div>


                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Giảm Giá</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="giamgia" placeholder="Giảm Giá" class="form-control"><small class="form-text text-muted">Giảm Giá </small></div>
                          </div>


                          <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">Hình</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="images" class="form-control-file"></div>
                          </div>

                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Ngày nhập</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="text-input" name="date" placeholder="Ngày nhập" class="form-control"><small class="form-text text-muted">Ngày Nhập </small></div>
                          </div>


                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Lượt Xem</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="view" placeholder="Lượt Xem" class="form-control"><small class="form-text text-muted">Lượt xem </small></div>
                          </div>

                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Mô tả</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="detail" placeholder="Mô tả" class="form-control"><small class="form-text text-muted">Mô tả </small></div>
                          </div>

                          </div>
                          
                          <div class="card-footer">
                        <button name="submit" type="submit" class="btn btn-primary btn-sm">
                          <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                          <i class="fa fa-ban"></i> Reset
                        </button>
                      </div>
                      
                        </form>
                      </div>
                    </div>
        
                <div class="col-lg-12 ">
                    <div class="card " style="margin-top:5rem; float: center;">
                        <div class="card-header">
                            <strong class="card-title">Bảng quản lý sản phẩm</strong>
                        </div>
                        <div class="card-body">
                            <table class="table">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">STT</th>
                                 
                                  <th scope="col">Tên sản phẩm</th>
                                  <th scope="col">Đơn Giá</th>
                                  <th scope="col">Giảm giá</th>
                                  <th scope="col">Hình</th>
                                  <th scope="col"> Ngày nhập</th>
                                  <th scope="col">Sửa</th>
                                  <th scope="col">Xóa</th>
                                </tr>
                              </thead>
                              <tbody>
                              <?php
                              $dskh = sanpham_select_all();
                                 $i=0;
                                 foreach ($dskh as $dskh) {
                                   $i+=1;
                                  
                                   extract($dskh);
                                   $xoa = "<a href='?qlkh&id=$maSP&del=1'>Xóa</a>";
                                   $new_path = "./view/assets/upload/".$hinh;
                                   if(is_file($new_path)){
                                     $new_path="<img src='$new_path' width=150>";
                                   }else{
                                     $new_path="no data";
                                   }

                                   echo ' <tr>
                                   <th scope="row">'.$i.'</th>
                                   <td>'.$tensp.'</td>
                                   <td>'.$dongia.'</td>
                                   <td>'.$giamgia.'</td>
                                   <td><img style="width:100px" src='.$hinh.' ></td>
                                   <td>'.$ngaynhap.'</td>
                                   <td><a href="">Sửa</a></td>
                                   <td>'.$xoa.'</td>
                                 </tr>';
                                 }
                              


                              ?>
                               
                               
                              </tbody>
                            </table>
                  
    
            </div><!-- .animated -->
        </div><!-- .content -->




    <!-- Right Panel -->



        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
