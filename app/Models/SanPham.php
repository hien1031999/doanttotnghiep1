<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class SanPham extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'san_pham';
    protected $appends = ['anh_sp'];
    protected $fillable = [
        'ma_sp',
        'hinh_anh'
    ];

    public function posts()
    {
        return $this->hasManyThrough(
            'App\ChiTietHoaDon',
            'App\ChiTietSanPham',
            'san_pham_id', // khóa ngoại của bảng trung gian
            'chi_tiet_hoa_don_id', // khóa ngoại của bảng mà chúng ta muốn gọi tới
            'id', //trường mà chúng ta muốn liên kết ở bảng đang sử dụng
            'id' // trường mà chúng ta muốn liên kết ở bảng trung gian.
        );
    }

    public function getAnhSpAttribute() {
        if (empty($this->hinh_anh)) {
            return null;
        }

        return request()->getSchemeAndHttpHost(). '/anh_sp/'. $this->hinh_anh;
    }

}
