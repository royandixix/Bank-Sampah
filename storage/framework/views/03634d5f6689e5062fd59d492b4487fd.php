<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Bank Sampah'); ?> - Bank Sampah Laravel</title>
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
    <?php if(auth()->check()): ?>
        <div class="container-fluid">
            <div class="row">
                <aside class="col-md-2 sidebar p-3">
                    <div class="brand fs-5 mb-3">♻ Bank Sampah</div>
                    <div class="small opacity-75 mb-3"><?php echo e(auth()->user()->name); ?><br><span
                            class="badge bg-light text-dark"><?php echo e(ucfirst(auth()->user()->role)); ?></span></div>
                    <a href="<?php echo e(route('dashboard')); ?>">Dashboard</a><a
                        href="<?php echo e(route('deposits.index')); ?>">Setoran</a><a
                        href="<?php echo e(route('withdrawals.index')); ?>">Penarikan</a><a
                        href="<?php echo e(route('complaints.index')); ?>">Pengaduan</a>
                    <?php if(in_array(auth()->user()->role, ['admin', 'petugas'])): ?>
                        <a href="<?php echo e(route('wastes.index')); ?>">Data Sampah</a><a
                            href="<?php echo e(route('reports.index')); ?>">Laporan</a>
                    <?php endif; ?>
                    <?php if(auth()->user()->role === 'admin'): ?>
                        <a href="<?php echo e(route('categories.index')); ?>">Kategori</a><a
                            href="<?php echo e(route('users.index')); ?>">Pengguna</a>
                    <?php endif; ?>
                    <hr>
                    <form method="post" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?><button
                            class="btn btn-outline-light btn-sm w-100">Keluar</button></form>
                </aside>
                <main class="col-md-10 p-3 p-md-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="m-0"><?php echo $__env->yieldContent('title'); ?></h3><span
                            class="text-muted small"><?php echo e(now()->format('d/m/Y H:i')); ?> WITA</span>
                    </div>
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?> <?php if($errors->any()): ?>
                            <div class="alert alert-danger"><b>Periksa input:</b>
                                <ul class="mb-0">
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($e); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php echo $__env->yieldContent('content'); ?>
                </main>
            </div>
        </div>
    <?php else: ?>
        <?php echo $__env->yieldContent('content'); ?>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script><?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /Users/mac/Downloads/bank-sampah-laravel/resources/views/layouts/app.blade.php ENDPATH**/ ?>