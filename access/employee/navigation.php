<!-- Bootstrap NavBar -->
<nav class="navbar navbar-expand-md navbar-light bg-light three">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img style="height: 70px; width:80px;" src="../../images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">

    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
  
            <li class="nav-item">
                <a class="nav-link" href="../session/logout"><i class="fas fa-sign-out-alt"></i></a>
            </li>
            <!-- This menu is hidden in bigger devices with d-sm-none. 
           The sidebar isn't proper for smaller screens imo, so this dropdown menu can keep all the useful sidebar itens exclusively for smaller screens  -->
            <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Main Menu </a>
                <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                    <a class="dropdown-item" href="home"><i class="fas fa-utensils"></i> Dine-in</a>
                    <a class="dropdown-item" href="take_out?t=Take-out"><i class="fas fa-shopping-bag"></i> Take-out</a>
                </div>
            </li><!-- Smaller devices menu END -->
        </ul>
    </div>
</nav><!-- NavBar END -->