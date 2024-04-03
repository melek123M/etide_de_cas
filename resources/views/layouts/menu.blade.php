<!-- need to remove -->
<!-- <li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li> -->

<li class="nav-item">
    <a href="/pieces" class="nav-link {{ Request::is('pieces*') ? 'active' : '' }}">
        <p>Pieces</p>
    </a>
</li>

<li class="nav-item">
    <a href="/salles" class="nav-link {{ Request::is('salles*') ? 'active' : '' }}">
        <p>Salles</p>
    </a>
</li>
<li class="nav-item">
    <a href="/spectacles" class="nav-link {{ Request::is('spectacles*') ? 'active' : '' }}">
        <p>Spectacle</p>
    </a>
</li>