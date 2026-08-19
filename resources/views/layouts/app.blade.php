<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Bank Sampah') - Bank Sampah Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f7fb
        }

        .sidebar {
            min-height: 100vh;
            background: #173b2b;
            color: #fff
        }

        .sidebar a {
            color: #d8eee3;
            text-decoration: none;
            display: block;
            padding: .7rem .9rem;
            border-radius: .55rem
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #245f43;
            color: #fff
        }

        .brand {
            font-weight: 800
        }

        .card-stat {
            border: 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .06)
        }

        @media(max-width:767px) {
            .sidebar {
                min-height: auto
            }
        }
    </style>
</head>

<body>
    @if (auth()->check())
        <div class="container-fluid">
            <div class="row">
                <aside class="col-md-2 sidebar p-3">
                    <div class="brand fs-5 mb-3">♻ Bank Sampah</div>
                    <div class="small opacity-75 mb-3">{{ auth()->user()->name }}<br><span
                            class="badge bg-light text-dark">{{ ucfirst(auth()->user()->role) }}</span></div>
                    <a href="{{ route('dashboard') }}">Dashboard</a><a
                        href="{{ route('deposits.index') }}">Setoran</a><a
                        href="{{ route('withdrawals.index') }}">Penarikan</a><a
                        href="{{ route('complaints.index') }}">Pengaduan</a>
                    @if (in_array(auth()->user()->role, ['admin', 'petugas']))
                        <a href="{{ route('wastes.index') }}">Data Sampah</a><a
                            href="{{ route('reports.index') }}">Laporan</a>
                    @endif
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('categories.index') }}">Kategori</a><a
                            href="{{ route('users.index') }}">Pengguna</a>
                    @endif
                    <hr>
                    <form method="post" action="{{ route('logout') }}">@csrf<button
                            class="btn btn-outline-light btn-sm w-100">Keluar</button></form>
                </aside>
                <main class="col-md-10 p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="m-0">@yield('title')</h3><span
                            class="text-muted small">{{ now()->format('d/m/Y H:i') }} WITA</span>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif @if ($errors->any())
                            <div class="alert alert-danger"><b>Periksa input:</b>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                </main>
            </div>
        </div>
    @else
        @yield('content')
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>@stack('scripts')
</body>

</html>
