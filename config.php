<?

//admin ruu handah user iin administration field = $config['domain'].$config['abs_dir'] utgatai tentsuu bna
$config['domain'] = "http://minicms.az.mn/";
$config['abs_dir'] = "/home/azmn/public_html/minicms.az.mn/";
$config['dir'] = "";
$config['include_dir'] = "core/"; //relative to abs_dir
$config['include_domain'] = "http://minicms.az.mn/core/"; //library domain
$config['time_zone'] = 0; //server iin tsagiin tohirgoo. USA-d bairladag 14 tsagaar hotsordog server blaa gej bodohod utga n 14 bna gesen ug.
$config['server_ip']='127.0.0.1';
$config['exclude_domain_stat'] = 'az.mn'; //stat module-d referer deer algasah domain. WWW gui bichne.
$config['db_charset'] = "utf8";
$config['core_db_charset'] = "utf8";
//web baaziin tohirgoo
$config['db_host'] = "localhost";
$config['db_name'] = "azmn_minicmsaz";
$config['db_user'] = "azmn_minicmsaz";//.rand(1,26);
$config['db_pass'] = "miniCMSv2";
$config['db_prefix'] = "mbm_";
$config['db_type'] = "mysql";
//CORE baaziin tohirgoo. olon web 1 hereglegchiin erh ashiglaj bolno gesen ug
$config_user['db_host'] = "localhost";
$config_user['db_name'] = "azmn_minicmsaz";
$config_user['db_user'] = "azmn_minicmsaz";
$config_user['db_pass'] = "miniCMSv2";
$config_user['db_prefix'] = "mbm2_";
$config_user['db_type'] = "mysql";
$config['user_db_prefix'] = $config_user['db_prefix'];
//session baaziin tohirgoo. CORE toi negtgej ashiglaval zugeer.
//CORE baaztai negtgej ashiglah heregtei. tiimees tuhain baaziin table uudiin info toi ijil
$config['session_db_host'] = "localhost";
$config['session_db_name'] = "azmn_minicmsaz";
$config['session_db_user'] = "azmn_minicmsaz";
$config['session_db_pass'] = "miniCMSv2";
$config['session_db_prefix'] = "mbm2_";
$config['session_db_type'] = "mysql";
$config['session_db_table'] = "sessions";
//cache dir. halit turshij bsan yum. ajillahiin huvid ajillanaa. permission n 777 bh heregtei.
$config['cache_dir'] = $config['abs_dir']."cache/";
$config['video_dir'] = "files/videos/"; //video news video storage folder.
$config['photo_dir'] = "files/photos/"; //photo news photo storage folder
$config['gallery_dir'] = "files/galleries/"; //photo gallery photo storage folder
$config['product_dir'] = "files/products/"; //shopping products storage folder
$config['default_lang'] = "mn"; // undsen hel. 2 usegeer ilerhiilne
$config['stream_root_folder'] = "videos/";
$config['levels'] = 9;
$config['hits_by'] = 1; //cheat
$config['currency']='MNT';
//grabber settings start. Urilga ilgeeh module
    $config["grabber_module_dir"] = $config['abs_dir']."modules/grabber";
    // Write the path of curl installation
    // example: '/usr/local/bin/curl' (linux)
    $config["grabber_curl_path"] = "/usr/local/bin/curl";
    // NOTE: make sure that the 'tmp' folder have write permission.
    $config["grabber_error_msg"] =  "<br />Холболт амжилтгүй боллоо";
    $config["grabber_cookie_file"] = $config["grabber_module_dir"]."/cookie.txt";
//grabber settings end
$config['cookie_name'] = 'AZMN';
$config['cookie_domain'] = 'az.mn';
$user_level_types =  array(    
                            0=>'Guest',
                            1=>'Member',
                            2=>'Mod member',
                            3=>'Super member',
                            4=>'Administrator',
                            5=>'Super administrator');
$image_types = array(
                        1=>'gif',
                        2=>'jpg',
                        3=>'png',
                        4=>'swf',
                        5=>'psd',
                        6=>'bmp',
                        7=>'tiff1',
                        8=>'tiff2',
                        9=>'jpc',
                        10=>'jp2',
                        11=>'jpx',
                        12=>'jb2',
                        13=>'swc',
                        14=>'iff',
                        15=>'wbmp',
                        16=>'xbm');
//idevhtei module uudiig onooj ugnu. module idevhjeegui uyed tuhain module ruu handval heregtseet function uud bhgui bn gesen aldaa zaana.
$modules_active = array(
                        //"blog",
                        "football",
                        "forum",
                        "poll",
                        //"zurkhai",
                        "users",
                        "search",
                        //"auto",
                        "menu",
                        "shopping",
                        //"cache",
                        "music",
                        "video",
                        "banner",
                        "stats",
                        "dic",
                        "web",
                        "faqs",
                        "photogallery",
                        "phazeddl",
                        "shoutbox",
                        "ratings",
                        "comments");
//hed leveltei hereglech ali module ruu admin hesgees handahiig tohiruulj ugnu. admin heseg ruu yer n 3 bolon tuunees deesh leveltei hereglegchid handah bolomjtoi. bas administration field n zuv bh yostoi.
$modules_permissions = array(
                            //"blog"=>3,
                            "football"=>3,
                            "forum"=>3,
                            "poll"=>3,
                            "zurkhai"=>3,
                            "users"=>5,
                            "search"=>3,
                            "auto"=>5,
                            "menu"=>4,
                            "shopping"=>4,
                            "cache"=>5,
                            "music"=>3,
                            "video"=>3,
                            "banner"=>4,
                            "stats"=>0,
                            "dic"=>0,
                            "web"=>0,
                            "faqs"=>0,
                            "photogallery"=>0,
                            "phazeddl"=>0,
                            "shoutbox"=>0,
                            "ratings"=>0,
                            "comments"=>3,
                            "settings"=>4);
//$config iin buh utgiig UPPERCASE CONSTANT bolgoj ugch bna. haanaas ch shuud handana gesen ug.
foreach($config as $k=>$v){
    define(strtoupper($k),$v);
}
?>