<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index">CS LEARN</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>Hi <?php echo $_SESSION['username']; ?></strong>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Hi <?php echo $_SESSION['username']; ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <li><a href="">Users Online: <span class="usersonline"></span></a></li>
            <!-- <li><a href=''>Users Online: <?php //echo $_SESSION['users_online']; ?> </a></li> -->




            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Posts<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="posts">View All Posts</a>
                            </li>
                            <li>
                                <a href="posts?source=view_all_posts2">View All Posts2</a>
                            </li>
                            <li>
                                <a href="posts?source=add_post">Add Posts</a>
                            </li>



                        </ul>
                    </li>

                    
                    <li>
                        <a href="categories"><i class="fa fa-fw fa-bar-chart-o"></i>Categories</a>
                    </li>
                    <li>
                        <a href="comments.php"><i class="fa fa-fw fa-table"></i>Comments</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-fw fa-arrows-v"></i>Admin<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo1" class="collapse">
                            <li>
                                <a href="users">View All Admin</a>
                            </li>
                            <li>
                                <a href="users?source=add_user">Add Admin</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="profile"><i class="fa fa-fw fa-table"></i>Profile</a>
                    </li>
                    </ul>
            </div>
            
            <!-- /.navbar-collapse -->
        </nav>
