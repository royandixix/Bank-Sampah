 <?php $__env->startSection('title', 'Setoran Sampah'); ?> <?php $__env->startSection('content'); ?><div class="d-flex gap-2 mb-3">
    <form class="d-flex gap-2 flex-grow-1"><input class="form-control" name="search" value="<?php echo e(request('search')); ?>"
            placeholder="Kode / nama nasabah"><select class="form-select" name="status">
            <option value="">Semua status</option>
            <?php $__currentLoopData = ['pending', 'weighed', 'completed', 'cancelled']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(request('status') === $s): echo 'selected'; endif; ?>><?php echo e($s); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
        <button class="btn btn-outline-secondary">Filter</button>
    </form>
    <?php if(in_array(auth()->user()->role, ['admin', 'petugas'])): ?>
        <a class="btn btn-success" href="<?php echo e(route('deposits.create')); ?>">+ Setoran</a>
    <?php endif; ?>
</div>
<div class="card">
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Nasabah</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><a href="<?php echo e(route('deposits.show', $d)); ?>"><?php echo e($d->code); ?></a></td>
                        <td><?php echo e($d->deposit_date->format('d/m/Y')); ?></td>
                        <td><?php echo e($d->customer->name); ?></td>
                        <td><?php echo e($d->total_weight); ?> kg</td>
                        <td>Rp <?php echo e(number_format($d->total_amount, 0, ',', '.')); ?></td>
                        <td><span class="badge bg-secondary"><?php echo e($d->status); ?></span></td>
                </tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr>
                        <td colspan="6" class="text-center">Data kosong</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="mt-3"><?php echo e($deposits->links()); ?></div><?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/mac/Downloads/bank-sampah-laravel/resources/views/deposits/index.blade.php ENDPATH**/ ?>