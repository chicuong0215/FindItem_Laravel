<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\QuanTriVien;

class AddQuanTriVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<6;$i++){
            echo "Add Quản Trị Viên {$i}";
            QuanTriVien::create([
                "ten_dang_nhap"=>"admin_{$i}",
                "mat_khau"=>Hash::make("12345{$i}"),
                "ho_ten"=>"Quản Trị Viên {$i}"
            ]);
        }
        echo "Done..";
    }
}
