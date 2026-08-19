<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User,WasteCategory,Waste,Deposit,DepositDetail,DepositStatusHistory,AccountLedger,Withdrawal,WithdrawalStatusHistory,Complaint,ComplaintStatusHistory,AppNotification};

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $admin=User::create(['name'=>'Administrator','email'=>'admin@banksampah.test','password'=>Hash::make('password'),'role'=>'admin','phone'=>'0811111111','address'=>'Kantor Bank Sampah','is_active'=>true]);
        $petugas=User::create(['name'=>'Petugas Satu','email'=>'petugas@banksampah.test','password'=>Hash::make('password'),'role'=>'petugas','phone'=>'0822222222','address'=>'Makassar','is_active'=>true]);
        $nasabah=User::create(['name'=>'Nasabah Demo','email'=>'nasabah@banksampah.test','password'=>Hash::make('password'),'role'=>'nasabah','phone'=>'0833333333','address'=>'Makassar','is_active'=>true]);
        $nasabah2=User::create(['name'=>'Siti Rahma','email'=>'siti@banksampah.test','password'=>Hash::make('password'),'role'=>'nasabah','phone'=>'0844444444','address'=>'Makassar','is_active'=>true]);

        $plastik=WasteCategory::create(['name'=>'Plastik','description'=>'Sampah berbahan plastik']);
        $kertas=WasteCategory::create(['name'=>'Kertas','description'=>'Kertas dan kardus']);
        $logam=WasteCategory::create(['name'=>'Logam','description'=>'Sampah logam yang dapat didaur ulang']);

        $botol=Waste::create(['waste_category_id'=>$plastik->id,'name'=>'Botol Plastik PET','price_per_kg'=>3500,'stock_kg'=>8,'is_active'=>true]);
        $kardus=Waste::create(['waste_category_id'=>$kertas->id,'name'=>'Kardus Bekas','price_per_kg'=>2500,'stock_kg'=>12,'is_active'=>true]);
        $kaleng=Waste::create(['waste_category_id'=>$logam->id,'name'=>'Kaleng Aluminium','price_per_kg'=>9000,'stock_kg'=>3,'is_active'=>true]);

        $d=Deposit::create(['code'=>'STR-DEMO-001','customer_id'=>$nasabah->id,'officer_id'=>$petugas->id,'deposit_date'=>now()->subDays(2)->toDateString(),'status'=>'completed','total_weight'=>5,'total_amount'=>21500,'notes'=>'Data contoh']);
        DepositDetail::create(['deposit_id'=>$d->id,'waste_id'=>$botol->id,'weight_kg'=>3,'price_per_kg'=>3500,'subtotal'=>10500]);
        DepositDetail::create(['deposit_id'=>$d->id,'waste_id'=>$kardus->id,'weight_kg'=>2,'price_per_kg'=>2500,'subtotal'=>5000]);
        DepositDetail::create(['deposit_id'=>$d->id,'waste_id'=>$kaleng->id,'weight_kg'=>0.6667,'price_per_kg'=>9000,'subtotal'=>6000]);
        DepositStatusHistory::create(['deposit_id'=>$d->id,'from_status'=>null,'to_status'=>'pending','changed_by'=>$petugas->id,'notes'=>'Setoran dibuat']);
        DepositStatusHistory::create(['deposit_id'=>$d->id,'from_status'=>'pending','to_status'=>'weighed','changed_by'=>$petugas->id,'notes'=>'Berat diverifikasi']);
        DepositStatusHistory::create(['deposit_id'=>$d->id,'from_status'=>'weighed','to_status'=>'completed','changed_by'=>$petugas->id,'notes'=>'Setoran selesai']);
        AccountLedger::create(['customer_id'=>$nasabah->id,'type'=>'credit','reference_type'=>'deposit','reference_id'=>$d->id,'amount'=>21500,'description'=>'Saldo dari STR-DEMO-001']);

        $w=Withdrawal::create(['code'=>'TRK-DEMO-001','customer_id'=>$nasabah->id,'amount'=>10000,'status'=>'pending','notes'=>'Contoh penarikan']);
        WithdrawalStatusHistory::create(['withdrawal_id'=>$w->id,'from_status'=>null,'to_status'=>'pending','changed_by'=>$nasabah->id,'notes'=>'Permintaan dibuat']);
        Complaint::create(['customer_id'=>$nasabah2->id,'subject'=>'Harga kardus','message'=>'Mohon informasi perubahan harga kardus terbaru.','status'=>'open']);

        AppNotification::create(['user_id'=>$nasabah->id,'title'=>'Selamat datang','message'=>'Akun demo siap digunakan. Saldo berasal dari setoran yang sudah selesai.','link'=>'/dashboard']);
        AppNotification::create(['user_id'=>$admin->id,'title'=>'Data demo siap','message'=>'Seeder berhasil membuat pengguna, sampah, transaksi, dan laporan contoh.','link'=>'/dashboard']);
    }
}
