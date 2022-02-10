<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand font_style" href="./HomePage.php?type=ALL">Book Mania</a>
        <form class="form-dark" method="GET" action="./HomePage.php">
            <input type="text" placeholder="Search" class="form-control dark font_style" id="search" name="search">
        </form>
        <div class="" id="Books">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font_style" href="#" role="button" data-bs-toggle="dropdown">Book Type</a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-start">
                        <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=ALL">All Books</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=Fiction">Fiction</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=NonFiction">Non Fiction</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="./HomePage.php?type=Manga">Manga</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?Php if(!isset($_SESSION['userid'])) {?>
        <div class="ms-auto" id="LINKS">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link font_style nav-link" aria-current="page" href="../PHP/Login.php">Login / Sign Up</a>
                </li>
            </ul>
        </div>
        <?Php 
            }
            else {
        ?>
        <div class="ms-auto" id="USER">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle font_style" href="#" role="button" data-bs-toggle="dropdown">
                        <?Php echo $usr_name?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end">
                        <li><a class="dropdown-item nav-link font_style" href="./Logout.php">Logout</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="">Cart</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="">Orders</a></li>
                        <li><a class="dropdown-item nav-link font_style" href="">Profile</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <?Php } ?>
    </div>
</nav>