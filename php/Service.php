<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ServicePage</title>
     <link rel="stylesheet" type="text/css" href="../css/semantic.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/Service.css" rel="stylesheet">


 

</head>

<body>
     <div class="container-fluid">
        
        <div class="col-md-12 col-sm-12">
          <div class="navbar-header">
            <a class="navbar-brand top-title" href="/">April</a>
            <form id = "form" class="navbar-form navbar-left col-xs-5 form-inline" role="search"  action="/Search/" method = "POST" >
                <input type="text" id="search" name="search" class="form-control" placeholder="과목명">
                <button type="submit" id ="SearchButton" class="btn btn-info"  onclick="">Search <i class="glyphicon glyphicon-search"></i></button>
      
              <div class="form-group">

              </div>
             </form>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/MyPage">MY PAGE</a></li>
              <li><a href= "/About">ABOUT</a></li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">HELP<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/QnA">Q&A</a></li>
                  <li><a href="/Notice">공지사항</a></li>
                  <li><a href="/Judgement">신고</a></li>
                  <li><a href="/SubScript">개선요구사항</a></li>
                  <li><a href="/SiteMap">SITEMAP</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
     
      </div>






    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Service Page
                    </a>
                </li>
                <li>
                    <a href="#" class="foundation-competence">기초 역량</a>
                </li>
                <li>
                    <a href="#" class="foundation-study">기초 학문</a>
                </li>
                <li>
                    <a href="#">Service 3</a>
                </li>
                <li>
                    <a href="#">Service 4</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    
                  
                      <button type="button" class="btn btn-default sub-foundation-competence">
                        <span class="" aria-hidden="true">인문사회</span>
                      </button>
                      <button type="button" class="btn btn-default sub-foundation-competence">
                        <span class="" aria-hidden="true">이공학</span>
                      </button>
                      <button type="button" class="btn btn-default sub-foundation-competence">
                        <span class="" aria-hidden="true">ICT</span>
                      </button>
                      <button type="button" class="btn btn-default sub-foundation-competence">
                        <span class="" aria-hidden="true">ICT심화</span>
                      </button>

                       <button type="button" class="btn btn-default sub-foundation-study">
                        <span class="" aria-hidden="true">인문사회</span>
                      </button>
                      <button type="button" class="btn btn-default sub-foundation-study">
                        <span class="" aria-hidden="true">이공학</span>
                      </button>
                      <button type="button" class="btn btn-default sub-foundation-study">
                        <span class="" aria-hidden="true">융합</span>
                      </button>
                     

                        <div class="introduce">
                        <h1>ServicePage</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        
                        </div>
                        
                    </div>
                    <br><br><br>

                    <div class="col-lg-12">
                      <div class="col-lg-3">
                          <table class="ui celled structured table">
                            <thead>
                              <tr>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Type</th>
                                <th rowspan="2">Files</th>
                                <th colspan="3">Languages</th>
                              </tr>
                              <tr>
                                <th>Ruby</th>
                                <th>JavaScript</th>
                                <th>Python</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Alpha Team</td>
                                <td>Project 1</td>
                                <td class="right aligned">2</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td rowspan="3">Beta Team</td>
                                <td>Project 1</td>
                                <td class="right aligned">52</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Project 2</td>
                                <td class="right aligned">12</td>
                                <td></td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Project 3</td>
                                <td class="right aligned">21</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-lg-3">
                          <table class="ui celled structured table">
                            <thead>
                              <tr>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Type</th>
                                <th rowspan="2">Files</th>
                                <th colspan="3">Languages</th>
                              </tr>
                              <tr>
                                <th>Ruby</th>
                                <th>JavaScript</th>
                                <th>Python</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Alpha Team</td>
                                <td>Project 1</td>
                                <td class="right aligned">2</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td rowspan="3">Beta Team</td>
                                <td>Project 1</td>
                                <td class="right aligned">52</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Project 2</td>
                                <td class="right aligned">12</td>
                                <td></td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Project 3</td>
                                <td class="right aligned">21</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-lg-3">
                          <table class="ui celled structured table">
                            <thead>
                              <tr>
                                <th rowspan="2">Name</th>
                                <th rowspan="2">Type</th>
                                <th rowspan="2">Files</th>
                                <th colspan="3">Languages</th>
                              </tr>
                              <tr>
                                <th>Ruby</th>
                                <th>JavaScript</th>
                                <th>Python</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Alpha Team</td>
                                <td>Project 1</td>
                                <td class="right aligned">2</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td rowspan="3">Beta Team</td>
                                <td>Project 1</td>
                                <td class="right aligned">52</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Project 2</td>
                                <td class="right aligned">12</td>
                                <td></td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>Project 3</td>
                                <td class="right aligned">21</td>
                                <td class="center aligned">
                                  <i class="large green checkmark icon"></i>
                                </td>
                                <td></td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/Service.js"></script>
    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
