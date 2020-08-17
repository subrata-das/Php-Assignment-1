
<section class="section-header">
    <div class="container">
        <nav class="navbar navbar-inverse">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="javascript:void(0)" class="navbar-brand ">Php Assignment</a>
            </div>
            <!-- Collection of nav links, forms, and other content for toggling -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if($header_flag){ ?>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="newticket.php">Add Ticket</a></li>
                    <?php } ?>
                    <!-- <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Messages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Inbox</a></li>
                            <li><a href="#">Drafts</a></li>
                            <li><a href="#">Sent Items</a></li>
                            <li class="divider"></li>
                            <li class="active"><a href="#">Trash</a></li>
                        </ul>
                    </li> -->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if($header_flag){ ?>
                        <li><a href="./APIs/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php } else {  ?>
                        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li><a href="signin.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</section>