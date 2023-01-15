@php
  $list = \App\Models\Notification::where('status',false); 
@endphp
<style>
  .notification-list{
    display: flex;
  }
</style>
<ul class="nav navbar-nav navbar-right">
  <!-- Call Search -->
  <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
   {{-- notif --}}
    @if (Auth::user()->role == 'superadmin')
    <li class="dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
          <i class="material-icons">notifications</i>
          <span class="label-count" style="background-color:white;color:red">{{$list->get()->count()}}</span>
      </a>
      <ul class="dropdown-menu">
          <li class="header">NOTIFICATIONS</li>
          <li class="body">
              <ul class="menu">
                @foreach ($list->latest()->get() as $item)
                  @if ($item->pemesanan_ruangan_id)
                  <li>
                    <a href="{{ route('admin::pemesanan-ruangan.detail', ['id'=>$item->pemesanan_ruangan_id]) }}" class="notification-list">
                        <div class="icon-circle bg-light-green" style="background-color: #F675A8 !important;">
                            <i class="material-icons">meeting_room</i>
                        </div>
                        <div class="menu-info">
                            <h4>{{$item->ruangan['no_pemesanan_ruangan']}}</h4>
                            <p>
                                Pemesanan Ruangan
                            </p>
                        </div>
                    </a>
                </li>
                  @endif
                  @if ($item->permohonan_konsumsi_id)
                  <li>
                    <a href="{{ route('admin::permohonan-konsumsi.detail', ['id'=>$item->permohonan_konsumsi_id]) }}" class="notification-list">
                        <div class="icon-circle bg-light-blue">
                            <i class="material-icons">fastfood</i>
                        </div>
                        <div class="menu-info">
                            <h4>{{$item->konsumsi['pemohon']}} - {{$item->konsumsi['kegiatan']}}</h4>
                            <p>
                               Permohonan Konsumsi
                            </p>
                        </div>
                    </a>
                    </li>
                  @endif
  
                  @if ($item->permohonan_pemakaian_kendaraan_id)
                  <li>
                    <a href="{{ route('admin::permohonan-pemakaian-kendaraan.detail', ['id'=>$item->permohonan_pemakaian_kendaraan_id]) }}" class="notification-list">
                        <div class="icon-circle bg-light-green">
                            <i class="material-icons">directions_car</i>
                        </div>
                        <div class="menu-info">
                            <h4>{{$item->kendaraan['pemohon']}} - {{$item->kendaraan['tujuan']}}</h4>
                            <p>
                                 Permohonan Pemakaian Kendaraan
                            </p>
                        </div>
                    </a>
                </li>
                  @endif
               
                @endforeach
                  
              </ul>
          </li>
          <li class="footer">
              <a href="#">Notifications</a>
          </li>
      </ul>
  </li>
    @endif
    @if (Auth::user()->role == 'adminruang')
    <li class="dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
          <i class="material-icons">notifications</i>
          <span class="label-count" style="background-color:white;color:red">{{$list
          ->where('pemesanan_ruangan_id','!=',NULL)
          ->orWhere('permohonan_konsumsi_id','!=',NULL)
          ->count()}}</span>
      </a>
      <ul class="dropdown-menu">
          <li class="header">NOTIFICATIONS</li>
          <li class="body">
              <ul class="menu">
                @foreach ($list->latest()->get() as $item)
                  @if ($item->pemesanan_ruangan_id)
                  <li>
                    <a href="{{ route('admin::pemesanan-ruangan.detail', ['id'=>$item->pemesanan_ruangan_id]) }}" class="notification-list">
                        <div class="icon-circle bg-light-green" style="background-color: #F675A8 !important;">
                            <i class="material-icons">meeting_room</i>
                        </div>
                        <div class="menu-info">
                            <h4>{{$item->ruangan['no_pemesanan_ruangan']}}</h4>
                            <p>
                                Pemesanan Ruangan
                            </p>
                        </div>
                    </a>
                </li>
                  @endif
                  @if ($item->permohonan_konsumsi_id)
                  <li>
                    <a href="{{ route('admin::permohonan-konsumsi.detail', ['id'=>$item->permohonan_konsumsi_id]) }}" class="notification-list">
                        <div class="icon-circle bg-light-blue">
                            <i class="material-icons">fastfood</i>
                        </div>
                        <div class="menu-info">
                            <h4>{{$item->konsumsi['pemohon']}} - {{$item->konsumsi['kegiatan']}}</h4>
                            <p>
                               Permohonan Konsumsi
                            </p>
                        </div>
                    </a>
                    </li>
                  @endif
                @endforeach
                  
              </ul>
          </li>
          <li class="footer">
              <a href="#">Notifications</a>
          </li>
      </ul>
  </li>
    @endif
    @if (Auth::user()->role == 'adminkendaraan')
    <li class="dropdown">
      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
          <i class="material-icons">notifications</i>
          <span class="label-count" style="background-color:white;color:red">{{$list->where('permohonan_pemakaian_kendaraan_id','!=',NULL)->count()}}</span>
      </a>
      <ul class="dropdown-menu">
          <li class="header">NOTIFICATIONS</li>
          <li class="body">
              <ul class="menu">
                @foreach ($list->latest()->get() as $item)
                  @if ($item->permohonan_pemakaian_kendaraan_id)
                  <li>
                    <a href="{{ route('admin::permohonan-pemakaian-kendaraan.detail', ['id'=>$item->permohonan_pemakaian_kendaraan_id]) }}" class="notification-list">
                        <div class="icon-circle bg-light-green">
                            <i class="material-icons">directions_car</i>
                        </div>
                        <div class="menu-info">
                            <h4>{{$item->kendaraan['pemohon']}} - {{$item->kendaraan['tujuan']}}</h4>
                            <p>
                                 Permohonan Pemakaian Kendaraan
                            </p>
                        </div>
                    </a>
                </li>
                  @endif
               
                @endforeach
                  
              </ul>
          </li>
          <li class="footer">
              <a href="#">Notifications</a>
          </li>
      </ul>
  </li>
    @endif
   
<!-- #END# Notifications -->
  <!-- #END# Call Search -->
  <!-- Notifications -->
  {{-- <li class="dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
      <i class="material-icons">notifications</i>
      <span class="label-count">7</span>
    </a>
    <ul class="dropdown-menu">
      <li class="header">NOTIFICATIONS</li>
      <li class="body">
        <ul class="menu">
          <li>
            <a href="javascript:void(0);">
              <div class="icon-circle bg-light-green">
                <i class="material-icons">person_add</i>
              </div>
              <div class="menu-info">
                <h4>12 new members joined</h4>
                <p>
                  <i class="material-icons">access_time</i> 14 mins ago
                </p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <div class="icon-circle bg-cyan">
                <i class="material-icons">add_shopping_cart</i>
              </div>
              <div class="menu-info">
                <h4>4 sales made</h4>
                <p>
                  <i class="material-icons">access_time</i> 22 mins ago
                </p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <div class="icon-circle bg-red">
                <i class="material-icons">delete_forever</i>
              </div>
              <div class="menu-info">
                <h4><b>Nancy Doe</b> deleted account</h4>
                <p>
                  <i class="material-icons">access_time</i> 3 hours ago
                </p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <div class="icon-circle bg-orange">
                <i class="material-icons">mode_edit</i>
              </div>
              <div class="menu-info">
                <h4><b>Nancy</b> changed name</h4>
                <p>
                  <i class="material-icons">access_time</i> 2 hours ago
                </p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <div class="icon-circle bg-blue-grey">
                <i class="material-icons">comment</i>
              </div>
              <div class="menu-info">
                <h4><b>John</b> commented your post</h4>
                <p>
                  <i class="material-icons">access_time</i> 4 hours ago
                </p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <div class="icon-circle bg-light-green">
                <i class="material-icons">cached</i>
              </div>
              <div class="menu-info">
                <h4><b>John</b> updated status</h4>
                <p>
                  <i class="material-icons">access_time</i> 3 hours ago
                </p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <div class="icon-circle bg-purple">
                <i class="material-icons">settings</i>
              </div>
              <div class="menu-info">
                <h4>Settings updated</h4>
                <p>
                  <i class="material-icons">access_time</i> Yesterday
                </p>
              </div>
            </a>
          </li>
        </ul>
      </li>
      <li class="footer">
        <a href="javascript:void(0);">View All Notifications</a>
      </li>
    </ul>
  </li> --}}
  <!-- #END# Notifications -->
  <!-- Tasks -->
  {{-- <li class="dropdown">
    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
      <i class="material-icons">flag</i>
      <span class="label-count">9</span>
    </a>
    <ul class="dropdown-menu">
      <li class="header">TASKS</li>
      <li class="body">
        <ul class="menu tasks">
          <li>
            <a href="javascript:void(0);">
              <h4>
                Footer display issue
                <small>32%</small>
              </h4>
              <div class="progress">
                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <h4>
                Make new buttons
                <small>45%</small>
              </h4>
              <div class="progress">
                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <h4>
                Create new dashboard
                <small>54%</small>
              </h4>
              <div class="progress">
                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <h4>
                Solve transition issue
                <small>65%</small>
              </h4>
              <div class="progress">
                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                </div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);">
              <h4>
                Answer GitHub questions
                <small>92%</small>
              </h4>
              <div class="progress">
                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                </div>
              </div>
            </a>
          </li>
        </ul>
      </li>
      <li class="footer">
        <a href="javascript:void(0);">View All Tasks</a>
      </li>
    </ul>
  </li> --}}
  <!-- #END# Tasks -->
  {{-- <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li> --}}
</ul>