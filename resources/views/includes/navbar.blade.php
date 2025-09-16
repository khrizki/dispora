<div class="navbar-collapse collapse">
    <ul class="navbar-nav navbar-align">

        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle fullscreen" title="Fullscreen">
                <i class="align-middle fa fa-expand "></i>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                <div class="position-relative">
                    <i class="align-middle" data-feather="bell"></i>
                    {{-- <span class="indicator">{{$_notifItem->count()}}</span> --}}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                {{-- <div class="dropdown-menu-header">
					{{$_notifItem->count()}} New Notifications
            </div>
            <div class="list-group">
                @foreach ($_notifItem as $item)
                <a href="#" class="list-group-item">
                    <div class="row g-0 align-items-center">
                        <div class="col-2">
                            <i class="text-success" data-feather="bell"></i>
                        </div>
                        <div class="col-10">
                            <div class="text-dark">Usulan Jabatan {{substr($item->jabatan->nama ?? '-', 0, 50)}}...
                            </div>
                            <div class="text-muted small mt-1">{{$item->pegawai->nama ?? '-'}} diusulkan oleh
                                {{$item->user->pegawai->nama ?? '-'}}
                            </div>
                            <div class="text-muted small mt-1">{{date('d F Y', strtotime($item->tanggal_usulan))}}
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="dropdown-menu-footer">
                <a href="#" class="text-muted">Show all notifications</a>
            </div> --}}
</div>
</li>

<li class="nav-item dropdown">

    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        <i class="align-middle me-1" data-feather="user"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-end">
        <a class="dropdown-item" href="#">Profile</a>

        <a class="dropdown-item" href="#" onclick="event.preventDefault();
				document.getElementById('logout-form').submit();">Logout

            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                @csrf
            </form>
        </a>
    </div>
</li>
</ul>
</div>