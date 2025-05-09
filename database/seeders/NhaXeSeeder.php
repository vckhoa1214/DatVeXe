<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NhaXeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Hà My',
                'description' => 'Tuyến đường Hà Nội đi Điện Biên nổi bật với nhiều loại hình vận tải hàng hóa và phục vụ đi lại của người dân với những loại phương tiện đa dạng, dịch vụ hấp dẫn. Nổi bật nhất phải kể đến xe giường nằm- loại xe được yêu thích nhất hiện nay nhờ những dịch vụ uy tín, giá cả phải chăng. Điển hình nhất là cái tên Hà My- nhà xe uy tín và chất lượng tuyệt vời hàng đầu hiện nay.\nHà My chắc hẳn là cái tên không còn xa lạ với những ai thường xuyên di chuyển từ Điện Biên đi Hà Nội, đây là nhà xe nổi tiếng nhờ những dịch vụ hấp dẫn và lộ trình di chuyển phong phú, đa dạng\nHà My mang đến dòng xe giường nằm 41 chỗ thiết kế tinh tế, hiện đại, được trang bị những tính năng hữu ích dành cho một chuyến đi đường dài. Điều này được khẳng định rõ ràng bởi những phản hồi của hành khách về chất lượng nhà xe những năm gần đây.\nXe với thiết kế giường nằm 41 chỗ, được chia thành hai tầng với 3 dãy rộng rãi, luồng xe được thiết kế với không gian vừa phải giúp hành khách có thể thoải mái di chuyển. Trên xe có hệ thống điều hòa hai chiều đảm bảo không gian được thông thoáng, vệ sinh trên xe luôn đảm bảo sạch sẽ giúp hành khách có những trải nghiệm tuyệt vời nhất.\nNhà xe Hà My đánh giá cao những đóng góp và phản hồi của hành khách vì vậy dịch vụ và chất lượng luôn được ưu tiên hàng đầu. Đội ngũ nhân viên của Hà My là những người dày dặn kinh nghiệm, năng động, nhiệt huyết, tận tâm với khách hàng, lái xe dày dặn kinh nghiệm với những kỹ năng chuyên môn nghiệp vụ, giúp mỗi chuyến đi của hành khách được êm ái, an toàn.',
                'phoneNo' => json_encode(["0978 556 578", "0967 138 168", "0984 935 777"]),
                'address' => json_encode([
                    "26 Kim Đồng, Phường 2, Đông Hà, Quảng Trị",
                    "Số 05 Mai Thúc Loan , Thị xã Cửa Lò , Tỉnh Nghệ An",
                    "Số 20 đường Phạm Hùng – Mỹ Đình – Từ Liêm – Hà Nội"
                ]),
                'policy' => 'Yêu cầu đeo khẩu trang khi lên xe\nCó mặt tại văn phòng/quầy vé/bến xe trước 30 phút để làm thủ tục lên xe\nĐổi vé giấy trước khi lên xe\nXuất trình SMS/Email đặt vé trước khi lên xe\nKhông mang đồ ăn, thức ăn có mùi lên xe\nKhông hút thuốc, uống rượu, sử dụng chất kích thích trên xe\nKhông mang các vật dễ cháy nổ lên xeKhông vứt rác trên xe\nKhông làm ồn, gây mất trật tự trên xe\nKhông mang giày, dép trên xe\nTổng trọng lượng hành lý không vượt quá 20 kg\nTrẻ em dưới 3 tuổi hoặc dưới 120 cm được miễn phí vé nếu ngồi cùng ghế/giường với bố mẹ\nĐộng vật cảnh phải đảm bảo có sức khỏe tốt, thân thiện với con người, đã được tiêm phòng đầy đủ, không có mùi khó chịu, không gây ảnh hưởng đến hành khách và tài sản của họ\nThú cưng cần phải được đeo rọ mõm, nhốt trong lồng, túi, balo phi hành gia để đảm bảo cho việc vận chuyển an toàn, phòng tránh việc thú cưng chạy ra ngoài\nHãng xe chỉ chấp nhận vận chuyển động vật như là một hành lý ký gửi; không cho phép mang lên xe cùng hành khách\nNhiệt độ thời tiết trong quá trình vận chuyển đôi khi ảnh hưởng đến sức khỏe của động vật cảnh, nhà xe không chịu trách nhiệm về sức khỏe động vật trong suốt chuyến đi',
                'mainRoute' => json_encode(["Quảng Trị", "Nghệ An", "Hà Nội"]),
                'imageCarCom' => '/images/nhaxe/nxHaMy.png',
                'imageJours' => json_encode([
                    "/images/chuyenxe/ha-my-1.jpg",
                    "/images/chuyenxe/ha-my-2.jpg",
                    "/images/chuyenxe/ha-my-3.jpg"
                ]),
                'managerId' => 7,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'name' => 'Minh Phương',
                'description' => 'Tuyến đường Hà Nội – Nghệ An - Quảng Trị luôn là quãng đường phục vụ nhu cầu, đặc biệt là du lịch phổ biến. Và hôm nay, Bus Ticket xin giới thiệu đến các bạn nhà xe Minh Phương, cái tên uy tín hàng đầu hoạt động trên tuyến đường này. Hãy cùng chúng tôi tìm hiểu qua về các thông tin mà nhà xe này hoạt động.\nMinh Phương là một trong những cái tên nổi bật về dịch vụ xe khách, đặc biệt là vận chuyển hàng hóa bằng xe khách. Nhà xe này được đánh giá rất tốt về thang điểm dịch vụ, dựa trên những trải nghiệm thực tế từ chính khách hàng.\nPhục vụ nhiều tuyến xe trong ngày, thuận lợi cho việc di chuyển của nhiều hành khách.Chi phí vé xe và dịch vụ vận chuyển hàng hóa luôn ở mức bình ổn.Thời gian vận chuyển đúng giờ, tiết kiệm nhiều thời gian hơn so với các đơn vị khác.',
                'phoneNo' => json_encode(["0902 843 799", "088 6060 605", "0981 787 785"]),
                'address' => json_encode([
                    "50 Hoàng Diệu, Phường 2, Đông Hà, Quảng Trị",
                    "Số 15 Xuân Thu , Thị xã Cửa Lò , Tỉnh Nghệ An",
                    "Số 25 đường Phạm Hùng – Mỹ Đình – Từ Liêm – Hà Nội"
                ]),
                'policy' => 'Yêu cầu đeo khẩu trang khi lên xe\nCó mặt tại văn phòng/quầy vé/bến xe trước 30 phút để làm thủ tục lên xe\nĐổi vé giấy trước khi lên xe\nXuất trình SMS/Email đặt vé trước khi lên xe\nKhông mang đồ ăn, thức ăn có mùi lên xe\nKhông hút thuốc, uống rượu, sử dụng chất kích thích trên xe\nKhông mang các vật dễ cháy nổ lên xeKhông vứt rác trên xe\nKhông làm ồn, gây mất trật tự trên xe\nKhông mang giày, dép trên xe\nTổng trọng lượng hành lý không vượt quá 20 kg\nTrẻ em dưới 3 tuổi hoặc dưới 120 cm được miễn phí vé nếu ngồi cùng ghế/giường với bố mẹ\nĐộng vật cảnh phải đảm bảo có sức khỏe tốt, thân thiện với con người, đã được tiêm phòng đầy đủ, không có mùi khó chịu, không gây ảnh hưởng đến hành khách và tài sản của họ\nThú cưng cần phải được đeo rọ mõm, nhốt trong lồng, túi, balo phi hành gia để đảm bảo cho việc vận chuyển an toàn, phòng tránh việc thú cưng chạy ra ngoài\nHãng xe chỉ chấp nhận vận chuyển động vật như là một hành lý ký gửi; không cho phép mang lên xe cùng hành khách\nNhiệt độ thời tiết trong quá trình vận chuyển đôi khi ảnh hưởng đến sức khỏe của động vật cảnh, nhà xe không chịu trách nhiệm về sức khỏe động vật trong suốt chuyến đi',
                'mainRoute' => json_encode(["Quảng Trị", "Nghệ An", "Hà Nội"]),
                'imageCarCom' => '/images/nhaxe/nxMinhPhuong.png',
                'imageJours' => json_encode([
                    "/images/chuyenxe/minh-phuong-1.jpg",
                    "/images/chuyenxe/minh-phuong-2.jpg",
                    "/images/chuyenxe/minh-phuong-3.jpg"
                ]),
                'managerId' => 8,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'name' => 'Phát Thủy',
                'description' => 'Bạn muốn đặt vé từ TPHCM đi Lâm Đồng? Quảng Ngãi? Bạn muốn đặt vé từ Điện Biên đi Hà Nội? Nhưng bạn không biết nên lựa chọn nhà xe khách nào? Bus Ticket sẽ gửi đến bạn thông tin nhà xe Phát Thủy chạy tuyến Điện Biên đi Hà Nội và Sơn La để bạn tham khảo cho dự định của bạn nhé\nNhà xe Phát Thủy là nhà xe chuyên phục vụ tuyến Điện Biên – Hà Nội – Hà Nam và tuyến Điện Biên Sơn La. Các điểm ích lợi khi lựa chọn nhà xe bao gồm: Gối ôm, đèn đọc sách cá nhân, dây đai an toàn, nước khoáng đóng chai, chăn mềm, gối nằm, tủ lạnh mini, sạc điện thoại, điều hòa, khăn lạnh, wifi, búa phá kính phòng trường hợp khẩn cấp,…\nNhà xe Phát Thủy còn ăn điểm của khách hàng ở thái độ phục vụ của nhà xe. Nhân viên hỗ trợ khách hàng rất nhiệt tình từ lúc quý khách bắt đầu tham khảo thông tin đặt vé cho đến khi khách hàng xuống xe. Đội ngũ lái xe đường dài đầy kinh nghiệm, nhân viên phụ xe lịch sự, nhiệt tình.',
                'phoneNo' => json_encode(["0912 040 545", "0961 619 333", "1900 272 708"]),
                'address' => json_encode([
                    "26 Lê Thánh Tông, Nghĩa Chánh Nam, Quảng Ngãi",
                    "13/21 Trần Quang Diệu , Huyện Đức Trọng, Tỉnh Lâm Đồng",
                    "272 Trần Quốc Tuấn, Phạm Ngũ Lão, Quận 1, TP.HCM"
                ]),
                'policy' => 'Yêu cầu đeo khẩu trang khi lên xe\nCó mặt tại văn phòng/quầy vé/bến xe trước 30 phút để làm thủ tục lên xe\nĐổi vé giấy trước khi lên xe\nXuất trình SMS/Email đặt vé trước khi lên xe\nKhông mang đồ ăn, thức ăn có mùi lên xe\nKhông hút thuốc, uống rượu, sử dụng chất kích thích trên xe\nKhông mang các vật dễ cháy nổ lên xeKhông vứt rác trên xe\nKhông làm ồn, gây mất trật tự trên xe\nKhông mang giày, dép trên xe\nTổng trọng lượng hành lý không vượt quá 20 kg\nTrẻ em dưới 3 tuổi hoặc dưới 120 cm được miễn phí vé nếu ngồi cùng ghế/giường với bố mẹ\nĐộng vật cảnh phải đảm bảo có sức khỏe tốt, thân thiện với con người, đã được tiêm phòng đầy đủ, không có mùi khó chịu, không gây ảnh hưởng đến hành khách và tài sản của họ\nThú cưng cần phải được đeo rọ mõm, nhốt trong lồng, túi, balo phi hành gia để đảm bảo cho việc vận chuyển an toàn, phòng tránh việc thú cưng chạy ra ngoài\nHãng xe chỉ chấp nhận vận chuyển động vật như là một hành lý ký gửi; không cho phép mang lên xe cùng hành khách\nNhiệt độ thời tiết trong quá trình vận chuyển đôi khi ảnh hưởng đến sức khỏe của động vật cảnh, nhà xe không chịu trách nhiệm về sức khỏe động vật trong suốt chuyến đi',
                'mainRoute' => json_encode(["Quảng Ngãi", "Lâm Đồng", "Sài Gòn"]),
                'imageCarCom' => '/images/nhaxe/nxPhatThuy.png',
                'imageJours' => json_encode([
                    "/images/chuyenxe/phat-thuy-1.jpg",
                    "/images/chuyenxe/phat-thuy-2.jpg",
                    "/images/chuyenxe/phat-thuy-3.jpg"
                ]),
                'managerId' => 9,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'name' => 'Hoàng Anh',
                'description' => "Tuyến Quảng Ngãi – Lâm Đồng là một tuyến đường vô cùng hấp dẫn trong thị trường vận tải tỉnh Quảng Ngãi...",
                'phoneNo' => json_encode(["0911 555 911", "0263 3659 659", "0964 161 888"]),
                'address' => json_encode([
                    "26 Lê Thánh Tôn, Nghĩa Chánh Nam, Quảng Ngãi",
                    "13/21 Phi Nôm , Huyện Đức Trọng, Tỉnh Lâm Đồng",
                    "272 Đề Thám, Phạm Ngũ Lão, Quận 1, TP.HCM"
                ]),
                'policy' => "Yêu cầu đeo khẩu trang khi lên xe\nCó mặt tại văn phòng/quầy vé/bến xe trước 30 phút để làm thủ tục lên xe...",
                'mainRoute' => json_encode(["Quảng Ngãi", "Lâm Đồng", "Sài Gòn"]),
                'imageCarCom' => '/images/nhaxe/nxHoangAnh.png',
                'imageJours' => json_encode([
                    "/images/chuyenxe/hoang-anh-1.jpg",
                    "/images/chuyenxe/hoang-anh-2.jpg",
                    "/images/chuyenxe/hoang-anh-3.jpg"
                ]),
                'managerId' => 10,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ],
            [
                'name' => 'Tiến Đạt',
                'description' => "Thành phố Đông Hà – Quảng Trị là một trong những điểm đến thu hút khách du lịch...",
                'phoneNo' => json_encode(["0905 789 633", "0905 789 633", "0943 727 766"]),
                'address' => json_encode([
                    "450 Cao Thắng nối dài, P. 12 - Quận 10",
                    "91B, Nguyễn Văn Linh P. Hưng Lợi - Ninh Kiều - Cần Thơ",
                    "Số 426 Lý Thường Kiệt, Phường 6, tỉnh Cà Mau"
                ]),
                'policy' => "Yêu cầu đeo khẩu trang khi lên xe\nCó mặt tại văn phòng/quầy vé/bến xe trước 30 phút để làm thủ tục lên xe...",
                'mainRoute' => json_encode(["Sài Gòn", "Cần Thơ", "Cà Mau"]),
                'imageCarCom' => '/images/nhaxe/nxTienDatThanh.png',
                'imageJours' => json_encode([
                    "/images/chuyenxe/tien-dat-1.jpg",
                    "/images/chuyenxe/tien-dat-2.jpg",
                    "/images/chuyenxe/tien-dat-3.jpg"
                ]),
                'managerId' => 11,
                'createdAt' => Carbon::now(),
                'updatedAt' => Carbon::now()
            ]
        ];

        DB::table('NhaXes')->insert($items);
    }
}
