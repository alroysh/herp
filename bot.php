			<?php
		/*
		copyright @ medantechno.com
		2017
		*/
		date_default_timezone_set('Asia/Singapore');
		require_once('./line_class.php');
		$channelAccessToken = 'foHivR9RW1cwM7LwHhSBOPTAjGa8o8kbmomtLhC906UPPWoB1gIsMhCXh7oE9bGA4HcnU1iGygo06OflcHmU827yGqF3qGQtwPReKwcx+QTOKHKqRFcCDFysPvqeHESKUm4Ey4gPabfHkJeT5FzOdQdB04t89/1O/w1cDnyilFU='; //sesuaikan 
		$channelSecret = 'c1ab49d4f21251d9632f634a25605d24';//sesuaikan
		$client = new LINEBotTiny($channelAccessToken, $channelSecret);
		//var_dump($client->parseEvents());
		//$_SESSION['userId']=$client->parseEvents()[0]['source']['userId'];
		/*
		{
		  "replyToken": "nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
		  "type": "message",
		  "timestamp": 1462629479859,
		  "source": {
			"type": "user",
			"userId": "U206d25c2ea6bd87c17655609a1c37cb8"
		  },
		  "message": {
			"id": "325708",
			"type": "text",
			"text": "Hello, world"
		  }
		}
		*/
		$userId 	= $client->parseEvents()[0]['source']['userId'];
		$replyToken = $client->parseEvents()[0]['replyToken'];
		$timestamp	= $client->parseEvents()[0]['timestamp'];
		$message 	= $client->parseEvents()[0]['message'];
		$messageid 	= $client->parseEvents()[0]['message']['id'];
		$profil = $client->profil($userId);
		$pesan_datang = $message['text'];
		$wita= date_default_timezone_set['Asia/Singapore'];
		$jam = date("H.i.s ");
		//pesan bergambar
		if($message['type']=='text')
		{
			if($pesan_datang=='Halo')
			{
				
				
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Halo '.$profil->displayName.''
											)
									)
								);
						
			}
			else
					if($pesan_datang=='sticker')
			{
				
				
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'sticker',					
												'packageId'=> '1',
												'stickerId'=> '1'
											)
									)
								);
						
			}
			else
			if($pesan_datang=='2')
			{
				$get_sub = array();
				$aa =   array(
								'type' => 'image',									
								'originalContentUrl' => 'https://medantechno.com/line/images/bolt/1000.jpg',
								'previewImageUrl' => 'https://medantechno.com/line/images/bolt/240.jpg'	
								
							);
				array_push($get_sub,$aa);	
				$get_sub[] = array(
											'type' => 'text',									
											'text' => 'Halo '.$profil->displayName.', Anda memilih menu 2, harusnya gambar muncul.'
										);
				
				$balas = array(
							'replyToken' 	=> $replyToken,														
							'messages' 		=> $get_sub
						 );	
				/*
				$alt = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Anda memilih menu 2, harusnya gambar muncul.'
											)
									)
								);
				*/
				//$client->replyMessage($alt);
			}
			else
			if($pesan_datang=='3')
			{
				
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Fungsi PHP base64_encode medantechno.com :'. base64_encode("medantechno.com")
											)
									)
								);
						
			}
			else
			if($pesan_datang=='Jam')
			{
				
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Wita : '. date('H.i.s')
											)
									)
								);
						
			}
			else
			if($pesan_datang=='6')
			{
				
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'location',					
												'title' => 'Lokasi Saya.. Klik Detail',					
												'address' => 'Medan',					
												'latitude' => '3.521892',					
												'longitude' => '98.623596' 
											)
									)
								);
						
			}
			else
			if($pesan_datang=='7')
			{
				
				$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Testing PUSH pesan ke anda'
											)
									)
								);
								
				$push = array(
									'to' => $userId,									
									'messages' => array(
										array(
												'type' => 'text',					
												'text' => 'Pesan ini dari medantechno.com'
											)
									)
								);
								

								
			}
		}else if($message['type']=='sticker')
		{	
			$balas = array(
									'replyToken' => $replyToken,														
									'messages' => array(
										array(
												'type' => 'text',									
												'text' => 'Terimakasih stikernya... '										
											
											)
									)
								);
								
		}
		 // 將收到的資料整理至變數
	$receive = json_decode(file_get_contents("php://input"));
	
	// 讀取收到的訊息內容
	$text = $receive->events[0]->message->text;
	
	// 讀取訊息來源的類型 	[user, group, room]
	$type = $receive->events[0]->source->type;
	
	// 由於新版的Messaging Api可以讓Bot帳號加入多人聊天和群組當中
	// 所以在這裡先判斷訊息的來源
	if ($type == "room")
	{
		// 多人聊天 讀取房間id
		$from = $receive->events[0]->source->roomId;
	} 
	else if ($type == "group")
	{
		// 群組 讀取群組id
		$from = $receive->events[0]->source->groupId;
	}
	else
	{
		// 一對一聊天 讀取使用者id
		$from = $receive->events[0]->source->userId;
	}
	
	// 讀取訊息的型態 [Text, Image, Video, Audio, Location, Sticker]
	$content_type = $receive->events[0]->message->type;
	
	// 準備Post回Line伺服器的資料 
	$header = ["Content-Type: application/json", "Authorization: Bearer {" . $channel_access_token . "}"];
	
	// 回覆訊息
	reply($content_type, $text);
		$result =  json_encode($balas);
		//$result = ob_get_clean();
		file_put_contents('./balasan.json',$result);
		$client->replyMessage($balas);
