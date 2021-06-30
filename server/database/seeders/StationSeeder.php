<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            [
            'name' => 'Bến xe Đà Nẵng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 121 Tôn Đức Thắng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 721 Điện Biên Phủ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 559 Điện Biên Phủ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 407 Điện Biên Phủ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 39 Hà Huy Tập',
            'status' => '1'
            ],
            [
            'name' => 'Trước 935 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 714 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 617 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 8 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Trước 40 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Trước 144 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Trước 162 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Trước 155 Lê Duẩn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 68 Chi Lăng',
            'status' => '1'
            ],
            [
            'name' => 'Trước Sở Y Tế, Hùng Vương',
            'status' => '1'
            ],
            [
            'name' => 'Trước Công viên Hùng Vương',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện SN 151 Trần Phú',
            'status' => '1'
            ],
            [
            'name' => 'Trước 270 Trần Phú (Tường rào UBND quận Hải Châu)',
            'status' => '1'
            ],
            [
            'name' => 'Trước 308 Trưng Nữ Vương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 230 Trưng Nữ Vương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 60 Núi Thành',
            'status' => '1'
            ],
            [
            'name' => 'Cầu Trần Thị Lý',
            'status' => '1'
            ],
            [
            'name' => 'Trước 38 Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện Trường Đại học Kinh tế',
            'status' => '1'
            ],
            [
            'name' => 'Trước 240 Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 310A Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 370 Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 40 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 160 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 256 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 376 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 470A Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 542 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 618 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 509 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 415 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 307 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện UBND quận Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 380 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 270 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 51 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 50 Lê Văn Hiến',
            'status' => '1'
            ],
            [
            'name' => 'Trước 175 Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 133 Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Trước Trường Trung cấp nghề số 5',
            'status' => '1'
            ],
            [
            'name' => 'Trước Trường Đại học Kinh tế',
            'status' => '1'
            ],
            [
            'name' => 'Trước 29 Ngũ Hành Sơn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 2 Duy Tân',
            'status' => '1'
            ],
            [
            'name' => 'Trước 21 Núi Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 125 Trưng Nữ Vương',
            'status' => '1'
            ],
            [
            'name' => 'Bảo tàng điêu khắc Chăm',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 256 Bạch Đằng',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện số nhà 122 Bạch Đằng (cổng chợ Hàn)',
            'status' => '1'
            ],
            [
            'name' => 'Trước Siêu Thị Điện Máy Vương Quốc Hương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 192 Hùng Vương',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 88 Chi Lăng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 166 Lê Duẩn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 79 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 36 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 617 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 735 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 921 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 60 Hà Huy Tập',
            'status' => '1'
            ],
            [
            'name' => 'Ngã tư Hà Huy Tập - Điện Biên Phủ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 416 Điện Biên Phủ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 570 Điện Biên Phủ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 734 Điện Biên Phủ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 122 Tôn Đức Thắng',
            'status' => '1'
            ],
            [
            'name' => 'Trạm Biến Áp P. Xuân Hà Nguyễn Đức Trung',
            'status' => '1'
            ],
            [
            'name' => 'Trước 38 Ngô Gia Tự',
            'status' => '1'
            ],
            [
            'name' => 'Trước 522 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Trước 310-312 Hoàng Diệu',
            'status' => '1'
            ],
            [
            'name' => 'Trước 233 Trưng Nữ Vương',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 161 Núi Thành (Tường rào QK5)',
            'status' => '1'
            ],
            [
            'name' => 'Trước 382 Núi Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 584 Núi Thành',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện Metro, Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 52 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 180 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 290 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 496 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Km19+070 QL.14B (phía Tây cầu vượt Hòa Cầm)',
            'status' => '1'
            ],
            [
            'name' => 'Km21+250 QL.14B (Đối diện Trường Quân sự QK5)',
            'status' => '1'
            ],
            [
            'name' => 'QL.14B (cũ) (gần ngã 3 QL14B (cũ) - ĐT604)',
            'status' => '1'
            ],
            [
            'name' => 'Khu vực đường vào Gò Cà',
            'status' => '1'
            ],
            [
            'name' => 'QL.14B (cũ) (Đối diện Trường TH Lâm Quang Thự)',
            'status' => '1'
            ],
            [
            'name' => 'Km21+250 QL.14B (Tường rào Trường Quân sự QK5)',
            'status' => '1'
            ],
            [
            'name' => 'Trước 9-11 Trường Sơn, Km19+070 QL.14B',
            'status' => '1'
            ],
            [
            'name' => 'Trước 419 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 307 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 151 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước Bệnh Viện Tâm Trí',
            'status' => '1'
            ],
            [
            'name' => 'Trước Metro, Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 569 Núi Thành',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 376-378 Núi Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 149 Núi Thành (Trường THCS Tây Sơn)',
            'status' => '1'
            ],
            [
            'name' => 'Trước 315 Hoàng Diệu',
            'status' => '1'
            ],
            [
            'name' => 'Trước 199 Hoàng Diệu (UBND phường Nam Dương)',
            'status' => '1'
            ],
            [
            'name' => 'Trước 417-419 Ông Ích Khiêm',
            'status' => '1'
            ],
            [
            'name' => 'Chợ Cồn Hùng Vương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 29 Ngô Gia Tự',
            'status' => '1'
            ],
            [
            'name' => 'Trước 716 Trần Cao Vân',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện Trạm Biến Áp P. Xuân Hà Nguyễn Đức Trung',
            'status' => '1'
            ],
            [
            'name' => 'Bãi đỗ xe Đà Nẵng - Tam Kỳ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 29 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước 159 đường 3 tháng 2',
            'status' => '1'
            ],
            [
            'name' => 'Trước 49 đường 3 tháng 2',
            'status' => '1'
            ],
            [
            'name' => 'Trước 20 Đống Đa',
            'status' => '1'
            ],
            [
            'name' => 'Trước 106 Đống Đa',
            'status' => '1'
            ],
            [
            'name' => 'Trước 240 Đống Đa',
            'status' => '1'
            ],
            [
            'name' => 'Trước 8 Nguyễn Thị Minh Khai',
            'status' => '1'
            ],
            [
            'name' => 'Trước 156 Nguyễn Thị Minh Khai',
            'status' => '1'
            ],
            [
            'name' => 'Trước 106 Phan Châu Trinh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 174 Phan Châu Trinh',
            'status' => '1'
            ],
            [
            'name' => 'Trước Chùa Phước Ninh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 155 Nguyễn Văn Linh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 248 Nguyễn Văn Linh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 220 Nguyễn Tri Phương',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 79 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 38 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 128 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 300 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước Viettrolimex',
            'status' => '1'
            ],
            [
            'name' => 'Trước 676 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 176-178 Cách Mạng Tháng 8',
            'status' => '1'
            ],
            [
            'name' => 'Trước 58 Ông Ích Đường',
            'status' => '1'
            ],
            [
            'name' => 'Trước 164-166 Ông Ích Đường',
            'status' => '1'
            ],
            [
            'name' => 'Trước 50 Phạm Hùng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 182 Phạm Hùng',
            'status' => '1'
            ],
            [
            'name' => 'Trước Lô 2 Cẩm Lệ',
            'status' => '1'
            ],
            [
            'name' => 'Trạm CSGT cửa ô Hòa Phước',
            'status' => '1'
            ],
            [
            'name' => 'Trước Nghĩa trang liệt sĩ Hòa Phước',
            'status' => '1'
            ],
            [
            'name' => 'Trước Trường tiểu học Nguyễn Văn Linh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 121 Phạm Hùng',
            'status' => '1'
            ],
            [
            'name' => 'Trước Bãi đỗ xe công ty Mai Linh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 297 Ông Ích Đường',
            'status' => '1'
            ],
            [
            'name' => 'Trước 171 Ông Ích Đường',
            'status' => '1'
            ],
            [
            'name' => 'Trước công ty Nissan Đà Nẵng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 513-515 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 325-327 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Tường rào trường Lý Công Uẩn',
            'status' => '1'
            ],
            [
            'name' => 'Trước 113 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 93 Nguyễn Hữu Thọ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 11-13 Nguyễn Tri Phương',
            'status' => '1'
            ],
            [
            'name' => 'Trước Bệnh viện Hoàn Mỹ',
            'status' => '1'
            ],
            [
            'name' => 'Trước 131 Hoàng Diệu',
            'status' => '1'
            ],
            [
            'name' => 'Trước 239 Nguyễn Chí Thanh',
            'status' => '1'
            ],
            [
            'name' => 'Siêu Thị Điện máy Quốc Hương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 163-165 Đống Đa',
            'status' => '1'
            ],
            [
            'name' => 'Trước 75 Đống Đa',
            'status' => '1'
            ],
            [
            'name' => 'Trước 09 Đống Đa',
            'status' => '1'
            ],
            [
            'name' => 'Trước 24 đường 3 tháng 2',
            'status' => '1'
            ],
            [
            'name' => 'Trước 192 đường 3 tháng 2',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện SN 45 Nguyễn Tất Thành',
            'status' => '1'
            ],
            [
            'name' => 'Trước Chợ Cồn đường Hùng Vương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 331 Hùng Vương',
            'status' => '1'
            ],
            [
            'name' => 'Trước Hồ Thạc Gián đường Hàm Nghi',
            'status' => '1'
            ],
            [
            'name' => 'Trước Khu Chung cư, Lê Đình Lý',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 155 Lê Đình Lý',
            'status' => '1'
            ],
            [
            'name' => 'Trước Cây Xăng Nguyễn Tri Phương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 335 Nguyễn Tri Phương',
            'status' => '1'
            ],
            [
            'name' => 'Trước Bảo Tàng Quân Khu 5',
            'status' => '1'
            ],
            [
            'name' => 'Trước Trường Chinh giao đường sắt Km 799+530',
            'status' => '1'
            ],
            [
            'name' => 'Trước Trước Trường Chinh giao đường sắt Km 800+125',
            'status' => '1'
            ],
            [
            'name' => 'Trước Km 935 Quốc lộ 1A (Vỉa hè trái)',
            'status' => '1'
            ],
            [
            'name' => 'Trước Trạm xăng Hòa Hiệp',
            'status' => '1'
            ],
            [
            'name' => 'Trước Công ty thép Pomina',
            'status' => '1'
            ],
            [
            'name' => 'Trước Km 935 Quốc lộ 1A (Vỉa hè phải)',
            'status' => '1'
            ],
            [
            'name' => 'Trước TT Giáo dục thường xuyên Quận Cẩm Lệ',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện Trường Chinh giao đường sắt Km 799+530',
            'status' => '1'
            ],
            [
            'name' => 'Trước 28 Duy Tân (bên cạnh quán Trần)',
            'status' => '1'
            ],
            [
            'name' => 'Trước 518 Nguyễn Tri Phương',
            'status' => '1'
            ],
            [
            'name' => 'Trước 273 Nguyễn Tri Phương',
            'status' => '1'
            ],
            [
            'name' => 'Trước Hồ Vĩnh Trung, đường Hàm Nghi',
            'status' => '1'
            ],
            [
            'name' => 'Ngã ba Trường Sa - Nguyễn Phan Vinh',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 04 Nguyễn Phan Vinh',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 35 đường Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 118 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 314 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 442 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 570 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 692 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước Trường tiểu học Tiểu La, 862 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 735 Ngô Quyền, Trường mầm non ABC',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 757 Ngô Quyền, TTTM Vincom',
            'status' => '1'
            ],
            [
            'name' => 'Trước 926 Ngô Quyền, Công ty điện lực Sơn Trà',
            'status' => '1'
            ],
            [
            'name' => 'Phía Đông cầu Rồng, hướng lên cầu',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện Đài Truyền Hình Đà Nẵng',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 122 Bạch Đằng',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện Bưu điện Bạch Đằng, gần cầu Sông Hàn',
            'status' => '1'
            ],
            [
            'name' => 'Trước Sân tennis Bạch Đằng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 12 Lý Tự Trọng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 144 Trường Chinh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 794 Trường Chinh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 1016 Trường Chinh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 683-685 Trường Chinh',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 794 Trường Chinh',
            'status' => '1'
            ],
            [
            'name' => 'Đối diện 314 Trường Chinh',
            'status' => '1'
            ],
            [
            'name' => 'Trước 147 Lý Tự Trọng',
            'status' => '1'
            ],
            [
            'name' => 'Trước Đường dẫn phía Đông cầu Rồng',
            'status' => '1'
            ],
            [
            'name' => 'Trước 851 Ngô Quyền, Công ty điện lực Sơn Trà',
            'status' => '1'
            ],
            [
            'name' => 'Trước 739 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 575 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 463 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 369 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 331-333 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 253 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước 111 Ngô Quyền',
            'status' => '1'
            ],
            [
            'name' => 'Trước Ngô Quyền (Công ty Huy Đăng)',
            'status' => '1'
            ],
            [
            'name' => 'Trước 03 Nguyễn Phan Vinh (Giáo xứ Sơn Trà)',
            'status' => '1'
            ]
        ];
        foreach ($stations as $station) {
            DB::table('stations')->insert([
                'name' => $station['name'],
                'status' => $station['status']
            ]);
        }
    }
}
