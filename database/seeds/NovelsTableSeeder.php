<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NovelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('novels')->insert([
        	'novel_name' => 'VÌ CON GÁI TÔI CÓ THỂ ĐÁNH BẠI CẢ MA VƯƠNG',
        	'author_id' => 1,
        	'novel_translator' => 'Cường Neko & HanaBi',
        	'novel_description' => '<p>Dale Reki – một mạo hiểm giả nổi tiếng bởi những thành tựu mà cậu đạt được từ khi còn rất trẻ. Trong một lần thực hiện nhiệm vụ, cậu đã gặp Latina – một cô nhóc thuộc Quỷ Nhân tộc. Tuy nhiên, cô bé lại bị khuyết một bên sừng – đó là dấu hiệu tội phạm của Quỷ Nhân Tộc. Thương cảm cho số phận của cô nhóc, cậu đã quyết định trở thành một người “Bảo Hộ” cho em.</p>',
        	'novel_price' => 98000,
        	'novel_sale_off' => 5,
        	'novel_quantity' => 5,
        	'novel_publisher' => 'Phụ Nữ',
        	'novel_rank' => 4,
        	'novel_votes_number' => 2,
            'novel_rating_4' => 2,
        	'novel_size' => '13x18 cm',
        	'novel_pages' => 304,
        	'novel_language' => 'Tiếng Việt',
        	'novel_image_url' => 'uchi_no_musume_no_tame_naraba_ore_wa_moshikashitara_mao_mo_taoseru_kamo_shirenai.jpg',
            'novel_tags' => ',1,',
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('novels')->insert([
        	'novel_name' => 'VÌ CON GÁI TÔI CÓ THỂ ĐÁNH BẠI CẢ MA VƯƠNG II',
        	'author_id' => 1,
        	'novel_translator' => 'Cường Neko & HanaBi',
        	'novel_description' => '<p>Tiếp nối câu chuyện từ tập 1, Latina và Dale sẽ tiếp tục cuộc hành của mình bằng chuyến đi về Tislow – quê hương của Dale. Nơi đây cũng chính là nơi khởi đầu cho những bí mật ẩn sau cuộc gặp gỡ tựa như được định mệnh của hai người…<br>Thân thế của Latina thực sự là ai?</p><p>Tại sao cô bé lại có dấu ấn của một kẻ mang tội?</p><p>Và liệu… một Quỷ nhân như cô bé, có quyền được yêu thương một con người như Dale?</p>',
        	'novel_price' => 109000,
        	'novel_quantity' => 3,
        	'novel_publisher' => 'Phụ Nữ',
        	'novel_rank' => 3,
        	'novel_votes_number' => 1,
            'novel_rating_3' => 1,
        	'novel_size' => '13x18 cm',
        	'novel_pages' => 408,
        	'novel_language' => 'Tiếng Việt',
        	'novel_image_url' => 'uchi_no_musume_no_tame_naraba_ore_wa_moshikashitara_mao_mo_taoseru_kamo_shirenai_2.jpg',
            'novel_tags' => ',1,',
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('novels')->insert([
        	'novel_name' => 'KHU VƯỜN NGÔN TỪ',
        	'author_id' => 2,
        	'novel_description' => '<p>Khu vườn ngôn từ kể về một tình yêu còn xa xưa hơn cả tình yêu. Khái niệm tình yêu trong tiếng Nhật hiện đại là luyến hoặc ái, nhưng vào thời xưa nó được viết là cô bi, nghĩa là nỗi buồn một mình.<br>Shinkai Makoto đã cấu tứ Khu vườn ngôn từ theo ý nghĩa cổ điển này, miêu tả tình yêu theo khái niệm ban sơ của nó, tức là cô bi - nỗi buồn khi một mình thương nhớ một người.</p>',
        	'novel_price' => 95000,
        	'novel_sale_off' => 15,
        	'novel_quantity' => 2,
        	'novel_publisher' => 'IPM',
        	'novel_rank' => 5,
        	'novel_votes_number' => 2,
            'novel_rating_5' => 2,
        	'novel_size' => '14.5x20.5 cm',
        	'novel_pages' => 300,
        	'novel_language' => 'Tiếng Việt',
        	'novel_image_url' => 'word_garden.jpg',
            'novel_tags' => ',1,',
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('novels')->insert([
        	'novel_name' => '5 CENTIMET TRÊN GIÂY',
        	'author_id' => 2,
        	'novel_description' => '<p>5cm/s không chỉ là vận tốc của những cánh anh đào rơi, mà còn là vận tốc khi chúng ta lặng lẽ bước qua đời nhau, đánh mất bao cảm xúc thiết tha nhất của tình yêu.</p>',
        	'novel_price' => 50000,
        	'novel_quantity' => 1,
        	'novel_publisher' => 'Văn Học',
        	'novel_rank' => 2,
        	'novel_votes_number' => 3,
            'novel_rating_2' => 3,
        	'novel_size' => '13x18 cm',
        	'novel_pages' => 188,
        	'novel_language' => 'Tiếng Việt',
        	'novel_image_url' => '5cm_per_sec.jpg',
            'novel_tags' => ',1,',
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('novels')->insert([
        	'novel_name' => 'YOUR NAME',
        	'author_id' => 2,
            'novel_translator' => 'Thuý An',
        	'novel_description' => '<p>Mitsuha là nữ sinh trung học sống ở vùng quê hẻo lánh. Một ngày nọ, cô mơ thấy mình ở Tokyo trong một căn phòng xa lạ, biến thành con trai, gặp những người bạn chưa từng quen biết.</p><p>Trong khi đó ở một nơi khác, Taki, một nam sinh trung học người Tokyo lại mơ thấy mình biến thành con gái, sống ở vùng quê hẻo lánh.</p><p>Cuối cùng hai người họ nhận ra đang bị hoán đổi với nhau qua giấc mơ. Kể từ lúc hai con người xa lạ ấy gặp nhau, bánh xe số phận bắt đầu chuyển động. Đây là phiên bản tiểu thuyết của bộ phim hoạt hình Your Name., do chính đạo diễn Shinkai Makoto chấp bút.</p>',
        	'novel_price' => 75000,
        	'novel_sale_off' => 20,
        	'novel_quantity' => 7,
        	'novel_publisher' => 'Văn Học',
        	'novel_rank' => 5,
        	'novel_votes_number' => 5,
            'novel_rating_5' => 5,
        	'novel_size' => '13x18 cm',
        	'novel_pages' => 256,
        	'novel_language' => 'Tiếng Việt',
        	'novel_image_url' => 'your_name.jpg',
            'novel_tags' => ',1,',
        	'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('novels')->insert([
            'novel_name' => 'TIỆM SÁCH CŨ BIBLIA - TẬP 6 - SHIORIKO VÀ ĐỊNH MỆNH XOAY VÒNG',
            'author_id' => 3,
            'novel_translator' => ' Hải Hà',
            'novel_description' => '<p>Để tranh đoạt bản in đầu tiên Những năm cuối đời, Toshio từng ra tay hãm hại cô chủ tiệm xinh đẹp, gây thù chuốc oán với Biblia, nhưng lần này hắn lại xuất hiện với tư cách khác, tư cách người ủy thác. Và nhờ cậy một chuyện không thể tin nổi, là truy tìm một bản Những năm cuối đời còn quý giá và hiếm có khó tìm hơn bản in đầu tiên, vì trên đó có bút tích của Dazai Osamu.</p><p>Trong lúc theo cô chủ tiệm đi làm nhiệm vụ, thanh niên trông tiệm đã đào bới được một sự thật không sao tưởng nổi, có liên quan đến ông của họ vào bốn mươi bảy năm về trước. Quá khứ bắt đầu tái hiện một cách dị kì.</p><p>Những bí ẩn tuần hoàn rốt cuộc là ngẫu nhiên hay tất yếu? Và kẻ đứng đằng sau tất thảy lại là ai?</p>',
            'novel_price' => 95000,
            'novel_sale_off' => 40,
            'novel_quantity' => 6,
            'novel_publisher' => 'Hồng Đức',
            'novel_rank' => 1,
            'novel_votes_number' => 1,
            'novel_rating_1' => 1,
            'novel_size' => '13x18 cm',
            'novel_pages' => 350,
            'novel_language' => 'Tiếng Việt',
            'novel_image_url' => 'biblia_koshodou_no_jiken_techou_6.jpg',
            'novel_tags' => ',2,',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('novels')->insert([
            'novel_name' => 'TIỆM SÁCH CŨ BIBLIA - TẬP 7 - SHIORIKO VÀ SÂN KHẤU BẤT TẬN',
            'author_id' => 3,
            'novel_translator' => ' Ngọc Bích',
            'novel_description' => '<p>Bóng đen hắc ám đang loang dần đến tiệm sách cũ Biblia.</p><p>Nhà buôn đồ cổ xảo trá ghé tiệm vì một vụ giao dịch liên quan đến bản in Những năm cuối đời “Để tự dùng” của Dazai Osamu, ông ta rời đi sau khi để lại một cuốn sách cũ khác… Được dẫn dắt bởi mối ràng buộc diệu kì từ quá khứ, cuốn sách cũ của kịch tác gia William Shakespeare xuất hiện, kéo theo vô vàn bí ẩn. Thanh niên trông tiệm và cô chủ xinh đẹp từng bước rơi vào cái bẫy tinh vi ông ngoại cô giăng sẵn…</p><p>Cuốn sách cũ được truyền từ người này sang người khác…</p><p>Rồi sợi dây liên kết mạnh mẽ giữa các thành viên trong gia đình.</p><p>Thời khắc khép màn câu chuyện đã điểm.<p>',
            'novel_price' => 95000,
            'novel_sale_off' => 25,
            'novel_quantity' => 6,
            'novel_publisher' => 'Hồng Đức',
            'novel_size' => '13x18 cm',
            'novel_pages' => 400,
            'novel_language' => 'Tiếng Việt',
            'novel_image_url' => 'biblia_koshodou_no_jiken_techou_7.jpg',
            'novel_tags' => ',2,',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
