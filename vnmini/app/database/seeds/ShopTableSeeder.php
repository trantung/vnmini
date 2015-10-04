<?php

class ShopTableSeeder extends Seeder {

	public function run()
	{
		Shop::create(['user_id' => 1,
					'name' => 'shop',
					'description'=>'Xuất phát từ niềm yêu thích với các sản phẩm mini, Vnmini.net ra đời với mục đích chia sẻ với các bạn có cùng sở thích. 
 Ngoài ra Vnmini.net cũng là 1 shop nhỏ cung cấp các sản phẩm mini và trang sức phong thủy như nước hoa mini, bể cá
 phong thủy mini và nhiều đồ trang sức từ đá quý phong thủy khác,.. chúng tôi mong muốn thế giới mini của mình đến với 
  các bạn cũng như đón nhận những sự tương tác của mọi người. 
  Hãy chia sẻ niềm vui về thế giới mini với chúng tôi, ý kiến của các bạn là sự ủng hộ ý nghĩa cho Vnmini.net !
Cam kết về chất lượng sản phẩm cung cấp: Vnmini.net cung cấp sản phẩm chất lượng chính hãng hoặc tự sản xuất .Đá quý sản xuất từ phôi tự nhiên dạng thô hoặc nhập khẩu từ Ấn Độ, Nam Phi, Brazil,.., cam kết hoàn tiền 100% và bồi thường gấp đôi nếu bán hàng sai sự thật quảng cáo !',
					'image_url'=>'img/shops/shop_stone.jpg',
					'lat' => 21.00296184,
					'long' => 105.85202157,
					'address' => 'Ha Noi',
					'contact' => 'Anh Hùng',
					'tel' => '0949998587',
					'mobile' => '0949998587',
			]);
	}

}