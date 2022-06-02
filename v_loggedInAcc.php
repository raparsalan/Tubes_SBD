<div class="dropdown text-end align-self-center pr-5">
   <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa-regular fa-user" width="40" height="40"></i>
    </a>
    <ul class="dropdown-menu text-small dropdown-menu-end" aria-labelledby="dropdownUser1">
        <li><h5 class="dropdown-text text-center"><?= $_SESSION['user_name']?></h5></li>
        <li><p class="dropdown-header text-center"><?= ($_SESSION['user_authority'] == 1) ? 'Admin' : 'Mahasiswa';?> </p></li>
        <li><hr class="dropdown-divider"></li>
        <li><div class="dropdown-text text-center"><a class="btn btn-danger" href="logout.php">Log out</a></div></li>
    </ul>
</div>