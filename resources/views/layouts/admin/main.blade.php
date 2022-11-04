<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> {{ $title }} </title>
  <meta name="viewport"
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="This is an example dashboard created using build-in elements and components." />
  <meta name="msapplication-tap-highlight" content="no" />

  <link href="../../css/main.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"
    rel="stylesheet" />

</head>

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    {{-- Navbar --}}
    <div class="app-header header-shadow">
      <div class="app-header__logo">
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="app-header__content">
        <div class="app-header-left">
          <div class="search-wrapper">
            <div class="input-holder">
              <input type="text" class="search-input" placeholder="Type to search" />
              <button class="search-icon">
                <span></span>
              </button>
            </div>
            <button class="close"></button>
          </div>
        </div>
        <div class="app-header-right">
          <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="btn-group">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                      <i class="fa-solid fa-user-large ml-2 opacity-8"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                      <h6 tabindex="-1" class="dropdown-header">
                        <div class="widget-heading">
                          Ahmad Rosyihuddin
                        </div>
                      </h6>
                      <button type="button" tabindex="0" class="dropdown-item">
                        User Account
                      </button>
                      <button type="button" tabindex="0" class="dropdown-item">
                        Settings
                      </button>
                      <div tabindex="-1" class="dropdown-divider"></div>
                      <form action="{{ Route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" tabindex="0" class="dropdown-item" href="">
                          Logout
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- END Navbar --}}

    <div class="app-main"> {{-- Container --}}
      {{-- Side Bar --}}
      <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
          <div class="logo-src"></div>
          <div class="header__pane ml-auto">
            <div>
              <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="app-header__mobile-menu">
          <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
        <div class="app-header__menu">
          <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
              <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
              </span>
            </button>
          </span>
        </div>
        <div class="scrollbar-sidebar">
          <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
              <li class="app-sidebar__heading">Dashboard</li>
              <li>
                <a href="{{ Route('admin.home') }}" class="mm-active">
                  <i class="metismenu-icon pe-7s-rocket"></i>
                  Dashboard
                </a>
              </li>
              <li class="app-sidebar__heading">
                Kelola
              </li>
              <li>
                <a href="#">
                  <i class="metismenu-icon pe-7s-diamond"></i>
                  Menu
                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                  <li>
                    <a href="{{ Route('admin.ViewMenu') }}">
                      <i class="metismenu-icon"></i>
                      Kelola Menu
                    </a>
                  </li>
                  <li>
                    <a href="{{ Route('admin.ViewToping') }}">
                      <i class="metismenu-icon"></i>
                      Kelola Toping
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#">
                  <i class="metismenu-icon pe-7s-diamond"></i>
                  Pesanan
                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul>
                  <li>
                    <a href="{{ Route('admin.OrderMasuk') }}">
                      <i class="metismenu-icon"></i>
                      Pesanan Siap Di Ambil
                    </a>
                  </li>
                  <li>
                    <a href="{{ Route('admin.RiwayatOrder') }}">
                      <i class="metismenu-icon"> </i>Pesanan Selesai
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      {{-- END Sidebar --}}
      <div class="app-main__outer">
        <div class="app-main__inner">
          <div class="app-page-title">
            <div class="page-title-wrapper">
              <div class="page-title-heading">
                <div class="page-title-icon">
                  <i class="fa-solid fa-gauge icon-gradient bg-mean-fruit"></i>
                </div>
                <div>{{ $judul }}</div>
              </div>
              @if ($judul == 'Menu')
                <div class="page-title-actions">
                  <a href="{{ Route('admin.TambahMenu') }}" aria-haspopup="true" aria-expanded="false"
                    class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa-solid fa-circle-plus fa-w-20"></i>
                    </span>Tambah</a>
                </div>
              @elseif($judul == 'Detail Orders')
                <div class="page-title-actions">
                  <a href="{{ Route($back) }}" aria-haspopup="true" aria-expanded="false"
                    class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa-solid fa-arrow-left fa-w-20"></i>
                    </span>Home</a>
                </div>
              @elseif ($judul == 'Toping')
                <div class="page-title-actions">
                  <a href="{{ Route('admin.TambahToping') }}" aria-haspopup="true" aria-expanded="false"
                    class="btn-shadow btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7"><i class="fa-solid fa-circle-plus fa-w-20"></i>
                    </span>Tambah
                  </a>
                </div>
              @elseif ($judul == 'Dashboard')
                <div class="page-title-actions">
                  <form class="form-inline " action="/admin/updatebatasorder/1" method="POST">
                    @csrf
                    <div class="input-field search" style="margin-top: 2%">
                      <input class="form-control" type="text" placeholder="Set Batas Order"
                        aria-label="Set Batas Order" name="batas_order">
                      <button type="submit" class="btn btn-outline-primary"><i
                          class="fa-solid fa-square-check fa-2xl"></i></button>
                    </div>
                  </form>
                </div>
              @endif
            </div>
          </div>
          @yield('container')
        </div>
        <div class="row">
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="../../js/main.js"></script>
</body>

</html>
