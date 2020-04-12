<?php
ob_start();
define('API_KEY','1078473840:AAE5pxLHRmB-evouucp6k7NreIamlMZi2qY');
$admin = "858917637";
$kanalimz ="@idenqiwi"; //kanal useri
   function del($nomi){
   array_map('unlink', glob("$nomi"));
   }

   function ty($ch){ 
   return bot('sendChatAction', [
   'chat_id' => $ch,
   'action' => 'typing',
   ]);
   }


function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


  
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$data = $update->callback_query->data; 
$qid = $update->callback_query->id; 
$callcid = $update->callback_query->message->chat->id; 
$cid2 = $update->callback_query->message->chat->id; 
$mid2 = $update->callback_query->message->message_id;
$clid = $update->callback_query->from->id; 
$callmid = $update->callback_query->message->message_id; 
$gid = $update->callback_query->message->chat->id;
$reply = $message->reply_to_message->text;
if (!file_exists($folder.'/test.fd3')) {
  mkdir($folder);
  file_put_contents($folder.'/test.fd3', 'by ');
}

if (!file_exists($folder2.'/test.fd3')) {
  mkdir($folder2);
  file_put_contents($folder2.'/test.fd3', 'by ');
}

if (file_exists($filee)) {
  $step = file_get_contents($filee);
}


$tx = $message->text;
$name = $message->chat->first_name;
$user = $message->from->username;
$kun1 = date('z', strtotime('5 hour'));

$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"👥Biz Haqimizda"],['text'=>"✴Qoshimcha"]]
]
]);
if($tx == "/start"){
bot('sendMessage',[
"chat_id"=>$cid,
"text"=>"<b>$name Assalomu Alaykum biz bilan aloqa qilmoqchimisiz? Yoki savoliz bormi, Biz barchasiga javob beramiz.
Marxamat pastdagi tugmani bosing!
Jamoamiz @idenqiwi</b>",
"parse_mode"=>"html",
'reply_markup'=>$key
]);
}
if($tx == "✴Qoshimcha"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"Qo'shimcha va foydali bo'lim

Dasturchi👉 <a href = 'tg://user?id=$746250755'>mnematoff</a>

@idenqiwi - Dasturlashni Biz Bilan Birga O'rganing!",
"parse_mode"=>"html",
'reply_markup' => json_encode([
                'inline_keyboard'=>[
                   [['text'=>'🆕Yangiliklar','callback_data'=>'yan']],
[['text'=>'🔰Kanalimiz','url'=>'https://t.me/idenqiwi'],['text'=>'👤Admin','url'=>'https://t.me/mnematoff']], 
                 [['text'=>'📊Statistika','callback_data'=>'stat']
]
]
])
]);
}
$rpl = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
if($tx == "👥Biz Haqimizda"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"Biz Haqimizda O'z Fikringizni Bildiring

Dasturchi👉 <a href = 'tg://user?id=$858917637'>mnematoff</a>

@idenqiwi - Dasturlashni Biz Bilan Birga O'rganing!",
"parse_mode"=>"html",
'reply_markup' => json_encode([
                'inline_keyboard'=>[
                   [['text'=>'⭕Taklifim Bor','callback_data'=>'taklif']],
[['text'=>'❓Savolim Bor','callback_data'=>'savol'],['text'=>'⭐Ishimizni Baholash','callback_data'=>'baholash']], 
                 [['text'=>'➕Buyurtma Berish','callback_data'=>'buyurtma']
]
]
])
]);
}
$date = date('d-M Y',strtotime('5 hour'));
$time = date('H:i', strtotime('5 hour')); 
if($data == "taklif"){
	bot('sendmessage',[
	'chat_id'=>$callcid,
	'text'=>"Taklifingizni kiriting!",
	'reply_markup'=>$rpl,
		]);
		}
		if($reply=="Taklifingizni kiriting!"){
			bot('Sendmessage',[
			'chat_id'=>$admin,
			'text'=>"<b>Taklif keldi!</b>
      
🧒Yuboruvchi:$name

🔷Login:@$user

🔢Id raqami:<code>$cid</code>

🗒️Taklif:<i>$tx</i>

⌚Soat-<b>$time</b>                Bugun-<b>$date</b>",
'parse_mode'=>"html",
]);
sleep(2);
bot('Sendmessage',[
'chat_id'=>$cid,
'text'=>"*Yaxshi adminga xabar yetkazildi!*\nTaklifingiz adminlarga yoqsa 24 soat ichida siz bilan bog'lanishadi.",
'parse_mode'=>"markdown",
'reply_markup'=>$key,
]);
}
if($data == 'yan'){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>"🆕$line\n\⌚Soat : $time",
'show_alert'=>true
]);
    }
    if($data == "savol"){
	bot('sendmessage',[
	'chat_id'=>$callcid,
	'text'=>"Savolingizni kiriting!",
	'reply_markup'=>$rpl,
		]);
		}
		if($reply=="Savolingizni kiriting!"){
			bot('Sendmessage',[
			'chat_id'=>$admin,
			'text'=>"<b>Savol keldi!</b>
      
🧒Yuboruvchi:$name

🔷Login:@$user

🔢Id raqami:<code>$cid</code>

🗒️Savol: <i>$tx</i>

⌚Soat-<b>$time</b>                Bugun-<b>$date</b>",
'parse_mode'=>"html",
]);
sleep(2);
bot('Sendmessage',[
'chat_id'=>$cid,
'text'=>"*Yaxshi adminga xabar yetkazildi!*\nSavolingiz adminlarga yoqsa 24 soat ichida kanalda javobini yozib yuboradilar!",
'parse_mode'=>"markdown",
'reply_markup'=>$key,
]);
}
    if($data == "buyurtma"){
	bot('sendmessage',[
	'chat_id'=>$callcid,
	'text'=>"Buyurtmangizni Yozing!",
	'reply_markup'=>$rpl,
		]);
		}
		if($reply=="Buyurtmangizni Yozing!"){
			bot('Sendmessage',[
			'chat_id'=>$admin,
			'text'=>"<b>Buyurtma keldi!</b>
      
🧒Yuboruvchi:$name

🔷Login:@$user

🔢Id raqami:<code>$cid</code>

🗒️Buyurtma: <i>$tx</i>

⌚Soat-<b>$time</b>                Bugun-<b>$date</b>",
'parse_mode'=>"html",
]);
sleep(2);
bot('Sendmessage',[
'chat_id'=>$cid,
'text'=>"*Yaxshi adminga xabar yetkazildi!*\nBuyurtmangiz adminlarga yoqsa 24 soat ichida kanalga tashlab yuboradilar!",
'parse_mode'=>"markdown",
'reply_markup'=>$key,
]);
}
    if($data == "baholash"){
	bot('sendmessage',[
	'chat_id'=>$callcid,
	'text'=>"Bizning $kanalimz Ni Baholash Uchun /baho Buyrug'ini Bering!",
		]);
		}
		if($tx=="/baho"){
	bot('Sendmessage',[
'chat_id'=>$cid,
'text'=>"<b>Kanalimizni Baholang!</b>",
'parse_mode'=>"html",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
                        [['text'=>'⭐']],
                        [['text'=>'⭐⭐']],
                        [['text'=>'⭐⭐⭐']],
                        [['text'=>'⭐⭐⭐⭐']],
                        [['text'=>'⭐⭐⭐⭐⭐']]
]
]), 
]);
}
if($tx == "⭐"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>@idenqiwi Jamoamizga Qoygan Ballingiz Uchun Rahmat!</b>",
'parse_mode'=>"html",
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>" $name Kanalimizni Baholadi
Baholashi ⭐
Useri @$user",
]);
}
if($tx == "⭐⭐"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>@idenqiwi Jamoamizga Qoygan Ballingiz Uchun Rahmat!</b>",
'parse_mode'=>"html",
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>" $name Kanalimizni Baholadi
Baholashi ⭐⭐
Useri @$user",
]);
}
if($tx == "⭐⭐⭐"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>@idenqiwi Jamoamizga Qoygan Ballingiz Uchun Rahmat!</b>",
'parse_mode'=>"html",
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>" $name Kanalimizni Baholadi
Baholashi ⭐⭐⭐
Useri @$user",
]);
}
if($tx == "⭐⭐⭐⭐"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>@idenqiwi Jamoamizga Qoygan Ballingiz Uchun Rahmat!</b>",
'parse_mode'=>"html",
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>" $name Kanalimizni Baholadi
Baholashi ⭐⭐⭐⭐
Useri @$user",
]);
}
if($tx == "⭐⭐⭐⭐⭐"){
	bot('sendmessage',[
	'chat_id'=>$cid,
	'text'=>"<b>@idenqiwi Jamoamizga Qoygan Ballingiz Uchun Rahmat!</b>",
'parse_mode'=>"html",
]);
bot('sendmessage',[
'chat_id'=>$admin,
'text'=>" $name Kanalimizni Baholadi
Baholashi ⭐⭐⭐⭐⭐
Useri @$user",
]);
}
if($data == "stat"){
    $a=file_get_contents("coin.dat");
    $sum=file_get_contents("tolovlar.txt");
    $ab=substr_count($a,"\n");
    bot('sendmessage',[
        'chat_id'=>$cid2,
        'text'=>"👥Botimiz azolari $ab ta",
        ]);
}
?>