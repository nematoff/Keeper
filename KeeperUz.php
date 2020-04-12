<?php
$admin = '858917637';
$token = '1090137139:AAEGGXG6C0Z07G4OLOmTAcENa8js9eY4GHw';

function bot($method,$datas=[]){
global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
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
$texts = json_decode(file_get_contents('msgs.json'),true);
$data = $update->callback_query->data;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$gname = $message->chat->title;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$name = $message->from->first_name;
$repid = $message->reply_to_message->from->id;
$repname = $message->reply_to_message->from->first_name;
$newid = $message->new_chat_member->id;
$leftid = $message->left_chat_member->id;
$newname = $message->new_chat_member->first_name;
$leftname = $message->left_chat_member->first_name;
$username = $message->from->username;
$cmid = $update->callback_query->message->message_id;
$cusername = $message->chat->username;
$repmid = $message->reply_to_message->message_id; 
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$cqid = $update->callback_query->id;
$botim="@KeeperGrBot";
$link = $message->chat->invite_link;
$description = $message->chat->description;

$photo = $update->message->photo;
$gif = $update->message->animation;
$video = $update->message->video;
$music = $update->message->audio;
$voice = $update->message->voice;
$sticker = $update->message->sticker;
$document = $update->message->document;
$for = $message->forward_from;
$forc = $message->forward_from_chat;

$reply = $message->reply_to_message->text;



$tek = bot('getChatMember',[ 
'chat_id'=>$cid, 
'user_id'=>$uid,
]); 
$get = $tek->result->status; 

$us = bot('getChatMembersCount',[
'chat_id'=>$cid,
'user_id'=>$uid,
]);
$azo = $us->result;

$des = bot('getChat',[ 
'chat_id'=>$cid, 
'user_id'=>$uid,
]); 
$desc = $des->result->description; 

if($text=="/leave" && $uid==$admin){
  bot('sendmessage',[
   'chat_id'=>$cid,
   'text'=>"<b>Ho‘p xo‘jayin, guruhni tark etaman!</b>",
   'parse_mode'=>'html'
  ]);
  bot('leaveChat',[
    'chat_id'=>$cid
  ]);
}
if($type=="private"){
if(mb_stripos($text,"/start")!== false){
  $soat = date('H:i', strtotime('2 hour'));
  $sana = date('d.m.Y',strtotime('2 hour'));
  $text = "ℹ Botni guruhingizga admin qilsangiz, foydaluvchilarning guruhda REKLAMA tashlasa uni o'chiradi. Bu bot @KeeperGrKBot va @KeeperGrSBot ning yordamchisi hisoblanadi. @KeeperGrBot , @KeeperGrSBot va @KeeperGrBot ni guruhingizga admin qilsangiz Guruhingizni mukammal NAZORAT qiladi👨‍✈️";
   bot('sendmessage',[
       'reply_to_message_id'=>$mid,
       'chat_id'=>$cid,
       'user_id'=>$uid,
       'text'=>$text,
       'parse_mode'=>'html',
       'disable_web_page_preview'=>true,
       'reply_markup'=>json_encode([
        'inline_keyboard'=>[
             [['text'=>"➕Guruhga qo‘shish",'url'=>'t.me/KeeperGrBot?startgroup=new']],
             [['text'=>'📊Statistika','callback_data'=>"WER"],['text'=>"♨️Buyruqlar",'callback_data'=>"help"]],
       [['text'=>"💢Foydali buyruqlar",'callback_data'=>"foydali"],['text'=>'🤑Pul ishlash','callback_data'=>"pul"]],
        [['text'=>'1️⃣Yordamchi','url'=>'t.me/keepergrkbot'],['text'=>"2️⃣Yordamchi",'url'=>'t.me/keepergrsbot']],
       
]
])
]);
}
}
if($data=="help"){
  $text = "Botni guruhga qo'shing va admin qiling, bot sizga guruhni nazorat qilishingizda yordam beradi😎 

<b>👨‍💻Guruh adminlari uchun buyruqlar</b>

<code>/ro</code> - <b>3 soatga read only rejimiga tushirish</b>
<code>/unro</code> - <b>3 soatlik read only rejimidan chiqarish</b>
<code>/kick</code> - <b>Guruhdan chiqarib yuborish</b>
<code>/ban</code> - <b>Guruhdan chiqarib qaytib kirolmaydigan qilish</b>
<code>/unban</code> - <b>Guruhda bandan chiqarish</b>
<code>/pin</code> - <b>Xabarni pinga qistirish</b>
<code>/unpin</code> - <b>Xabarni pindan olish</b>

<b>ℹBot guruhlarda:</b>

🔵Reklamalarni tozalash
🔵Servis xabarlarni (kirgan/chiqqan) tozalash
🔵Guruhda so'kinganlarni 15 minut read only rejimiga tushirishni ham bot o'zi amalga oshiradi

<b>Bu komandalar faqat super guruhlarda ishlaydi❗</b>";
   bot('editMessageText',[
    'message_id'=>$cmid,
    'chat_id'=>$ccid,
    'user_id'=>$cuid,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
       [['text'=>"↩Orqaga qaytish",'callback_data'=>"start"]],
       
       ]
       ])
  ]);
}
if($data=="foydali"){
  $ftext = "<b>GURUHLARDA ISHLATILISHI MUMKIN BO'LGAN FOYDALI BUYRUQLAR BILAN TANISHING!</b>

<code>/soat</code> - <b>hozirgi soat</b>
<code>/sana</code> - <b>bugungi sana</b>
<code>/soat</code> - <b>aniq vaqt</b>
<code>/id</code> - <b>sizning ID raqamingiz</b>
<code>/gid</code> - <b>guruh ID raqami</b>
<code>/rasm</code> - <b>profilingiz rasmi</b>
<code>/qoida</code> - <b>guruh infosiga yozilgan qoidalar</b>
<code>/ob_havo</code> - <b>bugungi ob-havo ma'lumoti</b>
<code>/kurs</code> - <b>bugungi valyuta kursi ma'lumoti</b>
<code>/yangilik</code> - <b>bugunning eng so'ngi yangiligi</b>
<code>/ism Ismingiz</code> - <b>ismingiz ma'nosini bilib oling</b>
<code>/inline</code> - <b>inline rejimidagi buyruqlar</b>

<b>Bot inline rejimida kanallarda ham ma'lumot beroladi,</b> <code>/inline</code> <b>buyrug'ini bering kerakli menyuni tanlang va kanalingizga yuboring!</b>";
   bot('editMessageText',[
    'message_id'=>$cmid,
    'chat_id'=>$ccid,
    'user_id'=>$cuid,
    'text'=>$ftext,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
       [['text'=>"↩Orqaga qaytish",'callback_data'=>"start"]],
       
       ]
       ])
  ]);
}

if($data=="pul"){
$text = "*😎 Pul ishlashga tayyormisiz🤑!*

*Men sizlarga Telegramda pul topish bo'yicha N1 bo'lib kelayotgan botlarni va Instagramda postlarizga ♥️Like tashab beradigan botni taklif qilaman😎*

*Bu botlarda qancha pul topish faqat o'zilarga bog'liq.Shunday ekan hozirdan harakatni boshlang⚜*"; 
bot('editMessageText',[
    'message_id'=>$cmid,
    'chat_id'=>$ccid,
    'user_id'=>$cuid,
    'text'=>$text,
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
[['text'=>'Minimal 35000sum','url'=>'https://telegram.me/PolloUzbot?start=745969959'],['text'=>'Minimal 15$','url'=>'http://t.me/FutureNet_Uz_Bot?start=745969959']],
[['text'=>'Instagram uchun ♥️Like','url'=>'http://t.me/InstaRallyBot?start=rc-858917637'],['text'=>'↩Orqaga qaytish','callback_data'=>'start']],
]
])
]);
}
if($data=="loyiha"){
$text = "👨‍✈️Bu botni yaratishimizdan maqsad";
bot('editMessageText',[
    'message_id'=>$cmid,
    'chat_id'=>$ccid,
    'user_id'=>$cuid,
    'text'=>$text,
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
      [['text'=>"↩Orqaga qaytish",'callback_data'=>"start"]],
       ]
       ])
  ]);
}
if($data=="start"){
$soat = date('H:i', strtotime('2 hour'));
$sana = date('d.m.Y',strtotime('2 hour'));
  $stext = "ℹ Botni guruhingizga admin qilsangiz, foydaluvchilarning guruhda REKLAMA tashlasa uni o'chiradi. Bu bot @KeeperGrKBot va @KeeperGrSBot ning yordamchisi hisoblanadi. @KeeperGrBot , @KeeperGrSBot va @KeeperGrBot ni guruhingizga admin qilsangiz Guruhingizni mukammal NAZORAT qiladi👨‍✈️";
   bot('editMessageText',[
    'message_id'=>$cmid,
    'chat_id'=>$ccid,
    'user_id'=>$cuid,
    'text'=>$stext,
    'parse_mode'=>'html',
     'disable_web_page_preview'=>true,
       'reply_markup'=>json_encode([
       'inline_keyboard'=>[
       [['text'=>"➕Guruhga qo‘shish",'url'=>'t.me/KeeperGrBot?startgroup=new']],
             [['text'=>'📊Statistika','callback_data'=>"WER"],['text'=>"♨️Buyruqlar",'callback_data'=>"help"]],
       [['text'=>"💢Foydali buyruqlar",'callback_data'=>"foydali"],['text'=>'🤑Pul ishlash','callback_data'=>"pul"]],
        [['text'=>'1️⃣Yordamchi','url'=>'t.me/keepergrkbot'],['text'=>"2️⃣Yordamchi",'url'=>'t.me/keepergrsbot']],
       ]
       ])
   ]);
}
if($type=="supergroup"){
if(mb_stripos($text,"/start") !== false){
$soat = date('H:i', strtotime('2 hour'));
$sana = date('d.m.Y',strtotime('2 hour'));
  $text = "ℹ Botni guruhingizga admin qilsangiz, foydaluvchilarning guruhda REKLAMA tashlasa uni o'chiradi. Bu bot @KeeperGrKBot va @KeeperGrSBot ning yordamchisi hisoblanadi. @KeeperGrBot , @KeeperGrSBot va @KeeperGrBot ni guruhingizga admin qilsangiz Guruhingizni mukammal NAZORAT qiladi👨‍✈️";
   bot('sendmessage',[
       'reply_to_message_id'=>$mid,
       'chat_id'=>$cid,
       'user_id'=>$uid,
       'text'=>$text,
       'parse_mode'=>'html',
       'disable_web_page_preview'=>true,
       'reply_markup'=>json_encode([
       'inline_keyboard'=>[
                 [['text'=>"➕Guruhga qo‘shish",'url'=>'t.me/KeeperGrBot?startgroup=new']],
             [['text'=>'📊Statistika','callback_data'=>"WER"],['text'=>"♨️Buyruqlar",'callback_data'=>"help"]],
       [['text'=>"💢Foydali buyruqlar",'callback_data'=>"foydali"],['text'=>'🤑Pul ishlash','callback_data'=>"pul"]],
        [['text'=>'1️⃣Yordamchi','url'=>'t.me/keepergrkbot'],['text'=>"2️⃣Yordamchi",'url'=>'t.me/keepergrsbot']],
       ]
       ])
   ]);
}


  $odam = file_get_contents("soni/$cid/$uid.txt");
 


 
   


if((mb_stripos($text,"lic")!== false) or (mb_stripos($text,"lich")!== false) or (mb_stripos($text,"лич")!== false)){
if($get == "member"){
  bot('deletemessage',[
    'chat_id'=>$cid,
    'message_id'=>$mid
  ]);
    bot('sendmessage',[    
    'chat_id'=>$cid,    
    'parse_mode'=>'html',   
    'text'=>"❗ <a href='tg://user?id=$uid'>$name</a> guruhda <b>taqiqlangan so'zni ishlatish</b> mumkin emas ",   
  ]);    
}
}
}

if($text=="/send" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Yuboriladigan xabar matnini kiriting!",'parse_mode'=>"html",'reply_markup'=>$rpl
]);
}
if($reply=="Yuboriladigan xabar matnini kiriting!"){
	file_put_contents("xabarlar.txt","$text");
	$xabar = file_get_contents("xabarlar.txt");
  $lich = file_get_contents("lichka.db");
  $lichka = explode("\n",$lich);
foreach($lichka as $uid){
  bot("sendmessage",[
    'chat_id'=>$uid,
    'text'=>$xabar,
]);
   unlink("xabarlar.txt");
}
}
if($text=="/sendgroup" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Guruhlarga yuboriladigan xabar matnini kiriting!",'parse_mode'=>"html",'reply_markup'=>$rpl
  ]);
}
if($reply=="Guruhlarga yuboriladigan xabar matnini kiriting!"){
	file_put_contents("gxabarlar.txt","$text");
	$gxabar = file_get_contents("gxabarlar.txt");
  $gr = file_get_contents("gruppa.db");
  $grup = explode("\n",$gr);
foreach($grup as $cid){
  bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=>$gxabar,
]);
   unlink("gxabarlar.txt");
}
}
 if($data=="WER"){

  $soat = date('H:i:s', strtotime('2 hour'));
  $sana = date('d.m.Y',strtotime('2 hour'));
  $lich = substr_count($lichka,"\n");
  $gr = substr_count($gruppa,"\n");
  $jami = $lich + $gr;
   $text = "<b>📊Bot foydalanuvchilari soni:</b>

🌎 Hammasi: <b>$jami</b>
├👤: <b>$lich</b>
└👥: <b>$gr</b>

👤 - Foydalanuvchilar
👥 - Guruhlar

♻️Yangilangan vaqt <b>$soat</b>";
bot('editMessageText',[
    'message_id'=>$cmid,
    'chat_id'=>$ccid,
    'user_id'=>$cuid,
    'text'=>$text,
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
    'inline_keyboard'=>[
      [['text'=>"↩Orqaga qaytish",'callback_data'=>"start"]],
       ]
       ])
  ]);
}
?>