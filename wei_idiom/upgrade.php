<?php
//升级数据表
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_adv` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '',
  `appid` varchar(50) NOT NULL DEFAULT '',
  `path` varchar(255) NOT NULL DEFAULT '',
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1开启，0隐藏',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_adv','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_adv','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `uniacid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wei_idiom_adv','name')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `name` varchar(100) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_adv','image')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `image` varchar(128) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_adv','appid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `appid` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_adv','path')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `path` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_adv','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_adv','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_adv','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1开启，0隐藏'");}
if(!pdo_fieldexists('wei_idiom_adv','description')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_adv')." ADD   `description` varchar(100) NOT NULL DEFAULT '' COMMENT '描述'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_answer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL COMMENT '小程序id',
  `openid` varchar(40) NOT NULL DEFAULT '',
  `topic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '题目id',
  `insert_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniacid` (`uniacid`,`openid`,`topic_id`),
  KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=64287 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_answer','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_answer')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_answer','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_answer')." ADD   `uniacid` int(10) unsigned NOT NULL COMMENT '小程序id'");}
if(!pdo_fieldexists('wei_idiom_answer','openid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_answer')." ADD   `openid` varchar(40) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_answer','topic_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_answer')." ADD   `topic_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '题目id'");}
if(!pdo_fieldexists('wei_idiom_answer','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_answer')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_answer','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_answer')." ADD   PRIMARY KEY (`id`)");}
if(!pdo_fieldexists('wei_idiom_answer','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_answer')." ADD   UNIQUE KEY `uniacid` (`uniacid`,`openid`,`topic_id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_eggs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `topic_id` int(10) unsigned NOT NULL DEFAULT '0',
  `kkid` varchar(32) NOT NULL DEFAULT '',
  `balance` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '获得的钱，单位：元',
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1:未领取,2:已领取',
  PRIMARY KEY (`id`),
  UNIQUE KEY `kkid` (`kkid`),
  UNIQUE KEY `openid` (`openid`,`topic_id`,`uniacid`)
) ENGINE=InnoDB AUTO_INCREMENT=5262 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_eggs','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_eggs','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `uniacid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_eggs','openid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `openid` varchar(50) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_eggs','topic_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `topic_id` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_eggs','kkid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `kkid` varchar(32) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_eggs','balance')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `balance` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '获得的钱，单位：元'");}
if(!pdo_fieldexists('wei_idiom_eggs','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_eggs','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_eggs','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1:未领取,2:已领取'");}
if(!pdo_fieldexists('wei_idiom_eggs','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   PRIMARY KEY (`id`)");}
if(!pdo_fieldexists('wei_idiom_eggs','kkid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_eggs')." ADD   UNIQUE KEY `kkid` (`kkid`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT '',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `free_count` varchar(255) DEFAULT NULL,
  `type` varchar(32) NOT NULL DEFAULT '' COMMENT '类型',
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1上架,-1下架',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_goods','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_goods','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `uniacid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_goods','name')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `name` varchar(100) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_goods','image')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `image` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_goods','market_price')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价'");}
if(!pdo_fieldexists('wei_idiom_goods','price')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00'");}
if(!pdo_fieldexists('wei_idiom_goods','count')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '库存'");}
if(!pdo_fieldexists('wei_idiom_goods','free_count')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `free_count` varchar(255) DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_goods','type')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `type` varchar(32) NOT NULL DEFAULT '' COMMENT '类型'");}
if(!pdo_fieldexists('wei_idiom_goods','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_goods','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_goods','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_goods')." ADD   `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1上架,-1下架'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_laws` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `stage_start` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阶段起始金额',
  `stage_end` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阶段结束金额',
  `money_min` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '最少获得(元)',
  `money_max` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最多获得(元)',
  `probability` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '概率',
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启，-1禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_laws','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_laws','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `uniacid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_laws','stage_start')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `stage_start` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阶段起始金额'");}
if(!pdo_fieldexists('wei_idiom_laws','stage_end')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `stage_end` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '阶段结束金额'");}
if(!pdo_fieldexists('wei_idiom_laws','money_min')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `money_min` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '最少获得(元)'");}
if(!pdo_fieldexists('wei_idiom_laws','money_max')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `money_max` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最多获得(元)'");}
if(!pdo_fieldexists('wei_idiom_laws','probability')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `probability` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '概率'");}
if(!pdo_fieldexists('wei_idiom_laws','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_laws','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_laws','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_laws')." ADD   `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1开启，-1禁用'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `openid` varchar(40) NOT NULL DEFAULT '',
  `order_sn` varchar(32) NOT NULL DEFAULT '' COMMENT '提现单号',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `form_id` varchar(64) NOT NULL DEFAULT '',
  `goods_name` text NOT NULL,
  `cost_balance` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '消耗余额',
  `remark` varchar(255) NOT NULL DEFAULT '',
  `send_time` datetime DEFAULT NULL COMMENT '发放时间',
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:默认，1:已发货',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_orders','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_orders','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `uniacid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wei_idiom_orders','openid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `openid` varchar(40) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_orders','order_sn')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `order_sn` varchar(32) NOT NULL DEFAULT '' COMMENT '提现单号'");}
if(!pdo_fieldexists('wei_idiom_orders','goods_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id'");}
if(!pdo_fieldexists('wei_idiom_orders','form_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `form_id` varchar(64) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_orders','goods_name')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `goods_name` text NOT NULL");}
if(!pdo_fieldexists('wei_idiom_orders','cost_balance')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `cost_balance` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '消耗余额'");}
if(!pdo_fieldexists('wei_idiom_orders','remark')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `remark` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_orders','send_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `send_time` datetime DEFAULT NULL COMMENT '发放时间'");}
if(!pdo_fieldexists('wei_idiom_orders','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_orders','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_orders','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_orders')." ADD   `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:默认，1:已发货'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '小程序名称',
  `header_img` varchar(255) NOT NULL DEFAULT '' COMMENT '首页图标',
  `unit_id` varchar(255) NOT NULL DEFAULT '' COMMENT '广告位id',
  `pg_video_unit_id` varchar(50) NOT NULL DEFAULT '' COMMENT '视频广告id',
  `per_invite_gold` int(10) unsigned NOT NULL DEFAULT '0',
  `per_guess_gold` int(10) NOT NULL,
  `per_video_gold` int(10) NOT NULL DEFAULT '0',
  `screen_unit_id` varchar(100) NOT NULL DEFAULT '',
  `screen_ad_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0关闭，1开启',
  `video_unit_id` varchar(100) NOT NULL DEFAULT '',
  `video_ad_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0关闭，1开启',
  `day_video_num` int(10) unsigned NOT NULL DEFAULT '10' COMMENT '每天可看视频数量',
  `register_gold` int(10) NOT NULL DEFAULT '5000' COMMENT '注册初始金币数',
  `redbag_interval` tinyint(1) unsigned NOT NULL DEFAULT '5' COMMENT '出红包关数间隔',
  `kf_wxid` varchar(32) NOT NULL DEFAULT '' COMMENT '客服微信号',
  `topic_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未导入，1导入',
  `insert_time` datetime DEFAULT NULL COMMENT '1展示，0隐藏',
  `update_time` datetime DEFAULT NULL,
  `topic_v2_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未导入，1:已导入',
  `invite_text` varchar(255) NOT NULL DEFAULT '',
  `invite_button_text` varchar(255) NOT NULL DEFAULT '',
  `gzh_img` varchar(255) NOT NULL DEFAULT '',
  `gzh_ewm_img` varchar(255) NOT NULL DEFAULT '',
  `gzh_guide_text` varchar(255) NOT NULL DEFAULT '',
  `gzh_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_setting','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_setting','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `uniacid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_setting','name')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `name` varchar(255) NOT NULL DEFAULT '' COMMENT '小程序名称'");}
if(!pdo_fieldexists('wei_idiom_setting','header_img')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `header_img` varchar(255) NOT NULL DEFAULT '' COMMENT '首页图标'");}
if(!pdo_fieldexists('wei_idiom_setting','unit_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `unit_id` varchar(255) NOT NULL DEFAULT '' COMMENT '广告位id'");}
if(!pdo_fieldexists('wei_idiom_setting','pg_video_unit_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `pg_video_unit_id` varchar(50) NOT NULL DEFAULT '' COMMENT '视频广告id'");}
if(!pdo_fieldexists('wei_idiom_setting','per_invite_gold')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `per_invite_gold` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_setting','per_guess_gold')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `per_guess_gold` int(10) NOT NULL");}
if(!pdo_fieldexists('wei_idiom_setting','per_video_gold')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `per_video_gold` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_setting','screen_unit_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `screen_unit_id` varchar(100) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_setting','screen_ad_status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `screen_ad_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0关闭，1开启'");}
if(!pdo_fieldexists('wei_idiom_setting','video_unit_id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `video_unit_id` varchar(100) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_setting','video_ad_status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `video_ad_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0关闭，1开启'");}
if(!pdo_fieldexists('wei_idiom_setting','day_video_num')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `day_video_num` int(10) unsigned NOT NULL DEFAULT '10' COMMENT '每天可看视频数量'");}
if(!pdo_fieldexists('wei_idiom_setting','register_gold')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `register_gold` int(10) NOT NULL DEFAULT '5000' COMMENT '注册初始金币数'");}
if(!pdo_fieldexists('wei_idiom_setting','redbag_interval')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `redbag_interval` tinyint(1) unsigned NOT NULL DEFAULT '5' COMMENT '出红包关数间隔'");}
if(!pdo_fieldexists('wei_idiom_setting','kf_wxid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `kf_wxid` varchar(32) NOT NULL DEFAULT '' COMMENT '客服微信号'");}
if(!pdo_fieldexists('wei_idiom_setting','topic_status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `topic_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0未导入，1导入'");}
if(!pdo_fieldexists('wei_idiom_setting','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `insert_time` datetime DEFAULT NULL COMMENT '1展示，0隐藏'");}
if(!pdo_fieldexists('wei_idiom_setting','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_setting','topic_v2_status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `topic_v2_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未导入，1:已导入'");}
if(!pdo_fieldexists('wei_idiom_setting','invite_text')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `invite_text` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_setting','invite_button_text')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `invite_button_text` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_setting','gzh_img')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `gzh_img` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_setting','gzh_ewm_img')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `gzh_ewm_img` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_setting','gzh_guide_text')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `gzh_guide_text` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_setting','gzh_name')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_setting')." ADD   `gzh_name` varchar(255) NOT NULL DEFAULT ''");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_share` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `scene` varchar(10) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '' COMMENT '分享图',
  `insert_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `uniacid` (`uniacid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_share','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_share','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD   `uniacid` int(10) NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_share','title')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD   `title` varchar(100) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_share','scene')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD   `scene` varchar(10) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_share','image')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD   `image` varchar(128) NOT NULL DEFAULT '' COMMENT '分享图'");}
if(!pdo_fieldexists('wei_idiom_share','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD   `insert_time` datetime NOT NULL");}
if(!pdo_fieldexists('wei_idiom_share','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD   `status` tinyint(1) NOT NULL DEFAULT '1'");}
if(!pdo_fieldexists('wei_idiom_share','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_share')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL,
  `keyword` varchar(32) NOT NULL DEFAULT '' COMMENT '题目',
  `key_index` tinyint(3) unsigned NOT NULL COMMENT '回答第几个字',
  `alternatives` varchar(64) NOT NULL DEFAULT '' COMMENT '备选答案字符串',
  `res_index` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1：正常，-1：删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92055 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_topic','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_topic','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `uniacid` int(10) unsigned NOT NULL");}
if(!pdo_fieldexists('wei_idiom_topic','keyword')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `keyword` varchar(32) NOT NULL DEFAULT '' COMMENT '题目'");}
if(!pdo_fieldexists('wei_idiom_topic','key_index')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `key_index` tinyint(3) unsigned NOT NULL COMMENT '回答第几个字'");}
if(!pdo_fieldexists('wei_idiom_topic','alternatives')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `alternatives` varchar(64) NOT NULL DEFAULT '' COMMENT '备选答案字符串'");}
if(!pdo_fieldexists('wei_idiom_topic','res_index')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `res_index` tinyint(3) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_topic','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_topic','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_topic','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_topic')." ADD   `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1：正常，-1：删除'");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `openid` varchar(40) NOT NULL DEFAULT '',
  `vid` int(10) unsigned NOT NULL DEFAULT '0',
  `invite_num` int(10) NOT NULL DEFAULT '0' COMMENT '邀请数量',
  `nickname` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `headimgurl` varchar(255) NOT NULL DEFAULT '',
  `gender` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:未知 1男 2女',
  `realname` varchar(32) NOT NULL DEFAULT '',
  `mobile` varchar(32) NOT NULL DEFAULT '',
  `wxid` varchar(32) NOT NULL DEFAULT '',
  `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关卡',
  `gold_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '金币',
  `all_get_balance` int(10) NOT NULL DEFAULT '0' COMMENT '单位：分',
  `balance` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '余额，单位：分',
  `insert_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：正常，-1：禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_openid_uniacid` (`openid`,`uniacid`)
) ENGINE=InnoDB AUTO_INCREMENT=2098 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_users','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_users','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `uniacid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_users','openid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `openid` varchar(40) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_users','vid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `vid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_users','invite_num')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `invite_num` int(10) NOT NULL DEFAULT '0' COMMENT '邀请数量'");}
if(!pdo_fieldexists('wei_idiom_users','nickname')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `nickname` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_users','headimgurl')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `headimgurl` varchar(255) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_users','gender')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `gender` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0:未知 1男 2女'");}
if(!pdo_fieldexists('wei_idiom_users','realname')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `realname` varchar(32) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_users','mobile')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `mobile` varchar(32) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_users','wxid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `wxid` varchar(32) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_users','level')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `level` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '关卡'");}
if(!pdo_fieldexists('wei_idiom_users','gold_num')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `gold_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '金币'");}
if(!pdo_fieldexists('wei_idiom_users','all_get_balance')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `all_get_balance` int(10) NOT NULL DEFAULT '0' COMMENT '单位：分'");}
if(!pdo_fieldexists('wei_idiom_users','balance')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `balance` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '余额，单位：分'");}
if(!pdo_fieldexists('wei_idiom_users','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_users','update_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `update_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_users','status')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1：正常，-1：禁用'");}
if(!pdo_fieldexists('wei_idiom_users','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_users')." ADD   PRIMARY KEY (`id`)");}
pdo_query("CREATE TABLE IF NOT EXISTS `ims_wei_idiom_video_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0',
  `openid` varchar(40) NOT NULL DEFAULT '',
  `insert_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `openid` (`openid`)
) ENGINE=InnoDB AUTO_INCREMENT=2884 DEFAULT CHARSET=utf8;

");

if(!pdo_fieldexists('wei_idiom_video_log','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_video_log')." ADD 
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT");}
if(!pdo_fieldexists('wei_idiom_video_log','uniacid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_video_log')." ADD   `uniacid` int(10) unsigned NOT NULL DEFAULT '0'");}
if(!pdo_fieldexists('wei_idiom_video_log','openid')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_video_log')." ADD   `openid` varchar(40) NOT NULL DEFAULT ''");}
if(!pdo_fieldexists('wei_idiom_video_log','insert_time')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_video_log')." ADD   `insert_time` datetime DEFAULT NULL");}
if(!pdo_fieldexists('wei_idiom_video_log','id')) {pdo_query("ALTER TABLE ".tablename('wei_idiom_video_log')." ADD   PRIMARY KEY (`id`)");}
