icoterie_smart_account_log （用户账户日志表,该表用来记录用户账目日志）
字段
	log_id主键，自增 ID 号
	user_id用户登录后保存在session中的id号,跟users表中user_id对应
	user_money用户该笔记录的余额
	frozen_money被冻结的资金
	rank_points等级积分,跟消费积分是分开的
	pay_points消费积分,跟等级积分是分开的
	from_type积分变动来源类型
	from_value积分变动来源对象值，订单号
	change_time该笔操作发生的时间
	change_desc该笔操作的备注
	change_type操作类型,0为充值,1,为提现,2为管理员调节,99为其它类型

icoterie_smart_ad （广告表,该表用来记录广告相关信息）
字段
	ad_id主键，自增 ID 号
	position_id0,站外广告;从1开始代表的是该广告所处的广告位,同表ad_postition中的字段position_id的值
	media_type广告类型,0图片;1flash;2代码3文字
	ad_name该条广告记录的广告名称
	ad_link广告链接地址
	ad_code广告链接的表现,文字广告就是文字或图片和flash就是它们的地址
	start_time广告开始时间
	end_time广告结速时间(废弃)
	link_man广告联系人
	link_email广告联系人的邮箱
	link_phone广告联系人的电话
	click_count该广告点击数
	enabled该广告是否关闭;1开启;0关闭;关闭后广告将不再有效
	sort_order排序
	show_client在客户端显示，用数字表示
	
icoterie_smart_admin_log （管理日志表,该表用来记录管理日志）
字段
	log_id自增ID号
	log_time写日志时间
	user_id该日志所记录的操作者id,同admin_user的user_id
	log_info管理操作内容
	ip_address登录者登录IP

icoterie_smart_admin_message （管理留言表,该表用来记录管理员留言信息）
字段
	message_id自增ID号
	receiver_id接收消息管理员id,同admin_user的user_id,如果是给多个管理员发送,则同一个消息给每个管理员id发送一条d
	sent_time留言发送时间
	read_time留言阅读时间
	readed留言是否阅读1已阅读;0未阅读
	deleted留言是否已经被删除1已删除;0未删除
	title留言的主题
	message留言的内容

icoterie_smart_admin_user （管理员表,该表用来记录管理员信息）
字段
	user_id自增id号,管理员代码
	user_name管理员登录名
	email管理员邮箱
	password管理员登录密码
	ec_salt值salt为系统随机生成，生成以后不再改变
	add_time管理员添加时间
	last_login管理员最后一次登录时间
	last_ip管理员最后一次登录IP
	action_list管理员管理权限列表
	nav_list管理员导航栏配置项
	lang_type语言类型
	agency_id该管理员负责的办事处理的id,同agency的agency_id字段.如果管理员没有负责办事处,则此处为0
	suppliers_id供应商id
	todolist记事本记录的数据
	role_id角色编号

icoterie_smart_adsense （广告相关统计表,该表用来记录广告相关统计数据）
字段
	from_ad广告代号,-1是外部广告,如果是站内广告则为ad的ad_id
	referer页面来源
	clicks点击率

icoterie_smart_ad_position （广告位表,该表用来记录广告位数据）
字段
	position_id广告位自增id
	position_name广告位名称
	position_code广告位代码
	ad_width广告位宽度
	ad_height广告高度
	position_desc广告位描述
	max_number最大数量
	city_id城市ID
	city_name城市名
	genre类型
	group_id组ID
	sort_order排序

icoterie_smart_affiliate_log （分成日志表,该表用来记录分成日志数据）
字段
	log_id自增长ID号
	order_id订单ID
	create_time分成时间
	user_id会员ID
	user_name
	money分成金额
	point分成消费积分
	separate_type分成类型

icoterie_smart_area_tegion （配送区域关联id表,该表用来记录配送区域关联id）
字段
	shipping_area_id配送区域的id号,等同shipping_area的shipping_area_id的值
	region_id地区列表,等同于ecs_region的region_id

icoterie_smart_article （文章内容表,该表用来记录文章内容）
字段
	article_id自增ID号
	store_id店铺id
	cat_id该文章的分类,同article_cat的cat_id,如果不在,将自动成为保留类型而不能删除
	title文章题目
	content文章内容
	author文章作者
	author_email文件作者的email
	keywords文章的关键字
	article_type文章类型：普通文章 article; 跳转链接 redirect; 附件点击标题直接下载 download; 附件在文章内容底部相关下载 related; default:article
	is_open是否显示;1显示;0不显示
	add_time文章添加时间
	edit_time编辑时间
	file_url上传文件或者外部文件的url
	open_type正常0,当该字段为1或2时,会在文章最后添加一个链接’相关下载’,连接地址等于file_url的值;但程序在此处有Bug
	link该文章标题所引用的连接,如果该项有值将不能显示文章内容,即该表中content的值
	description文章描述
	suggest_type推荐类型：stickie; 0
	cover_image文章封面图
	article_approved文章审核(1:通过审核的文章 ;0:待审核的文章; trash:回收站的文章 ;spam:垃圾文章) 默认0
	like_count点赞数
	click_count浏览数
	comment_count评论数

icoterie_smart_article_cat （文章分类信息表,该表用来记录文章分类信息）
字段
	cat_id自增ID号
	cat_name分类名称
	cat_type分类类型1,普通分类2,系统分类3,网店信息4,帮助分类5,网店帮助
	cat_image分类图片
	keywords分类关键字
	cat_desc分类说明文字
	sort_order分类显示顺序
	show_in_nav是否在导航栏显示0否; 1是
	parent_id父节点id，取值于该表cat_id字段

icoterie_smart_attribute （商品类型属性表,该表用来记录商品类型属性）
字段
	attr_id自增ID号
	cat_id商品类型,同goods_type的cat_id
	attr_name属性名称
	attr_cat_type属性类别
	attr_input_type当添加商品时,该属性的添加类别;0为手动输入;1为选择输入;2为多行文本输入
	attr_type属性是否多选;0否;1是如果可以多选,则可以自定义属性,并且可以根据值的不同定不同的价
	attr_values即选择输入,则attr_name对应的值的取值就是该这字段值
	color_values颜色值
	attr_index属性是否可以检索;0不需要检索;1关键字检索2范围检索,该属性应该是如果检索的话,可以通过该属性找到有该属性的商品
	sort_order属性显示的顺序,数字越大越靠前,如果数字一样则按id顺序
	is_linked是否关联,0不关联1关联;如果关联,那么用户在购买该商品时,具有有该属性相同的商品将被推荐给用户
	attr_group属性分组,相同的为一个属性组应该取自goods_type的attr_group的值的顺序.

icoterie_smart_auto_manage （处理文章表,该表用来记录处理文章，商品自动上下线的计划任务）
字段
	item_id如果是商品就是goods的goods_id,如果是文章就是article的article_id
	genre商品是Goods,article是文章
	starttime上线时间
	endtime下线时间

icoterie_smart_agent_user （代理商,该表用来记录代理商信息）
字段
	user_id用户ID
	rank_code代理等级
	province管辖地区：省
	city管辖地区：市
	district管辖地区：区/县
	
icoterie_smart_back_goods （退货订单商品,该表用来记录退货订单商品）
字段
	rec_id自动增长 id
	back_id退回订单ID，同dsc_back_order 的back_id
	goods_id货品id
	product_sn货品编号
	goods_name商品名称
	brand_name品牌名称
	goods_sn商品货号
	is_real是否是实物，1，是；0，否；比如虚拟卡就为0，不是实物
	send_number发货编号
	goods_attr商品属性

icoterie_smart_back_order （退货订单表,该表用来记录退货订单）
字段
	back_id自动增长 id
	delivery_sn退货单号
	order_sn订单号
	order_id订单id
	invoice_no运单号
	add_time添加时间
	shipping_id配送方式id
	shipping_name配送方式名称
	user_id用户id
	action_user操作人
	consignee收货人
	address收货地址
	country省
	city市
	district区
	street街道地区码
	sign_building标志性建筑
	email邮箱
	zipcode邮编
	tel电话
	mobile手机
	best_time送货时间
	postscript订单附言（由用户提交订单前填写）
	how_oos保险费
	shipping_fee配送费
	update_time更新时间
	suppliers_id供货商id
	status状态
	return_time退货时间
	agency_id该笔订单被指派给的办事处的id，根据订单内容和办事处负责范围自动决定，也可以有管理员修改，取值于表dsc_agency
	store_id商家id
icoterie_smart_backstage_menu （权限菜单表,该表用来记录后台权限、菜单）
字段
	id自增ID
	pid父级ID
	name菜单名称
	url网页链接，view类型必须
	permission路由权限
	sort排序
	status状态0不显示1显示
	
icoterie_smart_bonus_type （红包类型,该表用来记录红包类型）
字段
	type_id红包类型流水号
	store_id店铺ID
	type_name红包名称
	type_money红包所值的金额
	send_type红包发送类型0按用户如会员等级,会员名称发放;1按商品类别发送;2按订单金额所达到的额度发送;3线下发送
	usebonus_type红包类型0店铺；1全场
	min_amount如果按金额发送红包,该项是最小金额,即只要购买超过该金额的商品都可以领到红包
	max_amount如果按金额发送红包,该项是最大金额,即只要购买超低于该金额的商品都可以领到红包
	send_start_date红包发送的开始时间
	send_end_date红包可以使用的开始时间
	use_end_date红包可以使用的结束时间
	min_goods_amount可以使用该红包的商品的最低价格,即只要达到该价格商品才可以使用红包

icoterie_smart_brand (商品品牌表,该表用来记录商品品牌)
字段
	brand_id自增id号
	brand_name品牌名称
	brand_logo上传的该公司Logo图片
	brand_desc品牌描述
	site_url品牌的网址
	sort_order品牌在前台页面的显示顺序,数字越大越靠后
	is_show该品牌是否显示;0否1显示


icoterie_smart_cart （购物车购物信息,该表用来记录购物车购物信息）
字段
	rec_id自增id号
	user_id会员ID，取自表users的user_id
	session_id如果该用户退出,该Session_id对应的购物车中所有记录都将被删除
	goods_id商品的ID,取自表goods的goods_id
	goods_sn商品的货号,取自表goods的goods_sn
	product_id产品编号
	group_id组id
	goods_name商品名称,取自表goods的goods_name
	market_price商品的本店价,取自表市场价
	goods_price商品的本店价,取自表goods的shop_price
	goods_number商品的购买数量,在购物车时,实际库存不减少
	goods_attr商品的扩展属性,取自goods的extension_code
	is_real取自ecs_goods的is_real
	extension_code商品的扩展属性,取自goods的extension_code
	parent_id该商品的父商品ID,没有该值为0,有的话那该商品就是该id的配件
	rec_type购物车商品类型;0普通;1团够;2拍卖;3夺宝奇兵;11收银台
	is_gift是否赠品,0否;其他,是参加优惠活动的id,取值于favourable_activity的act_id
	is_shipping是否购买
	can_handsel能否处理
	model_attr商品属性模式（0-默认，1-仓库，2-地区）
	goods_attr_id商品属性id，取自goods_attr表的goods_attr_id
	shopping_fee费用
	is_checked选中状态，0未选中，1选中
	add_time添加时间

icoterie_smart_cashier_device （收银台设备,该表用来记录收银台设备）
字段
	id自增ID
	store_id店铺 ID
	device_name设备名称
	device_mac设备MAC
	device_sn设备SN
	device_type机型
	product_sn设备号
	keyboard_sn密码键盘序列号
	status状态 0:关闭 1:开启
	add_time添加时间
	update_time更新时间

icoterie_smart_cashier_record （收银员收银记录,该表用来记录收银员收银记录）
字段
	id自增id
	store_id店铺id
	staff_id员工id
	order_id订单id
	order_type收银台ecjia-cashdesk
	mobile_device_id
	mobile_device表的id
	device_sn收银台ecjia-cashdesk
	device_type收银台ecjia-cashdesk
	action收银台ecjia-cashdesk
	create_at创建时间

icoterie_smart_category （商品分类表,该表用来记录商品分类信息）
字段
	cat_id自增id号
	cat_name分类名称
	category_img分类图片
	keywords分类的关键字,可能是为了搜索
	cat_desc分类描述
	parent_id该分类的父类ID,取值于该表的cat_id字段
	sort_order该分类在页面显示的顺序,数字越大顺序越靠后,同数字,id在前的先显示
	template_file不确定字段,按名和表设计猜,应该是该分类的单独模板文件的名字
	measure_unit该分类的计量单位
	show_in_nav是否显示在导航栏,0不;1显示
	style该分类的单独的样式表的包括文件部分的文件路径
	is_show是否在前台页面显示1显示;0不显示
	grade该分类的最高和最低价之间的价格分级,当大于1时,会根据最大最小价格区间分成区间,会在页面显示价格范围,如0-300,300-600,600-900这种;
	filter_attr如果该字段有值,则该分类将还会按照该值对应在表goods_attr的goods_attr_id所对应的属性筛选，如，封面颜色下有红，黑分类筛选

icoterie_smart_cat_recommend （推荐商品分类表，该表用来记录推荐商品分类）
字段
	cat_id取自category表中的cat_id
	Recommend_type推荐的商品分类

icoterie_smart_collect_goods （会员收藏商品记录表,该表用来记录会员收藏商品的记录列表，一条记录一个收藏商品）
字段
	rec_id收藏记录的自增id
	user_id该条收藏记录的会员id，取值于users的user_id
	goods_id收藏的商品id，取值于goods的goods_id
	add_time收藏时间
	is_attention是否关注该收藏商品;1是;0否

icoterie_smart_collect_store （收藏店铺表,该表用来记录收藏店铺）
字段
	rec_id收藏记录的自增id
	store_id店铺ID
	user_id会员ID
	add_time收藏时间
	is_attention是否关注该收藏商品;1是;0否

icoterie_smart_comment （用户对文章和产品的评论列表,该表用来记录用户对文章和产品的评论）
字段
	comment_id用户评论的自增id
	comment_type用户评论的类型;0评论的是商品,1评论的是文章
	id_value文章或者商品的id,文章对应的是article的article_id;商品对应的是goods的goods_id
	email评论是提交的Email地址,默认取的user的email
	user_name评论该文章或商品的人的名称,取值users的user_name
	is_anonymous是否匿名评论
	content评论的内容
	comment_rank该文章或者商品的重星级;只有1到5星;由数字代替;其中5代表5星
	add_time评论的时间
	order_time时间
	ip_address评论时的用户IP
	status是否被管理员批准显示;待审核0 已批准 1 回收站 3
	parent_id评论的父节点,取值该表的comment_id字段,如果该字段为0,则是一个普通评论,否则该条评论就是该字段的值所对应的评论的回复
	user_id发表该评论的用户的用户id,取值user的user_id
	rec_id订单商品中rec_id
	store_id店铺街主键
	order_id订单id号
	goods_attr
	has_image无0，1有

icoterie_smart_comment_appeal （评论申诉表,该表用来记录评论申诉编辑）
字段
	id自增id
	store_id商店ID
	appeal_sn申诉编号
	comment_id评论id
	appeal_content申诉内容
	check_status申诉审核状态 1待审核, 2通过，3驳回
	appeal_time申诉时间
	process_time处理时间
	check_remark管理员审核回复内容

icoterie_smart_comment_reply （评论回复表,该表用来记录评论回复）
字段
	id自增 ID
	comment_id评论id
	parent_id楼主id
	user_type回复人类型：user,admin,merchant等
	user_id用户id
	is_anonymous是否匿名
	content评论内容
	status状态
	add_time添加时间

icoterie_smart_connect （第三方登录账号链接表,该表为第三方登录账号链接表）
字段
	connect_id自增id号
	connect_code第三方登录code
	connect_name名称
	connect_desc描述
	connect_order排序
	connect_config配置信息
	enabled是否禁用，0为禁用，1为启用
	support_type

icoterie_smart_crons （计划任务插件安装配置信息表,该表用来记录计划任务插件安装配置信息）
字段
	cron_id自增id号
	cron_code该插件文件在相应路径下的不包括.php部分的文件名，运行该插件将通过该字段的值寻找将运行的文件
	cron_name计划任务的名称
	cron_desc计划任务的描述
	cron_order应该是用了设置计划任务执行的顺序的，即当同时触发2个任务时先执行哪一个，如果一样应该是id在前的先执行暂不确定
	cron_config对每次处理的数据的数量的值，类型，名称序列化；比如删几天的日志，每次执行几个商品或文章的处理
	cron_expression表达式
	expression_alias别名
	runtime第三方个人信息
	thistime该计划任务上次被执行的时间
	nextime该计划任务下次被执行的时间
	day如果该字段有值，则计划任务将在每月的这一天执行该计划人物
	week如果该字段有值，则计划任务将在每周的这一天执行该计划人物
	hour如果该字段有值，则该计划任务将在每天的这个小时段执行该计划任务
	minute如果该字段有值，则该计划任务将在每小时的这个分钟段执行该计划任务，该字段的值可以多个，用空格间隔
	enable该计划任务是否开启；0，关闭；1，开启
	run_once执行后是否关闭，这个关闭的意思还得再研究下
	allow_ip允许运行该计划任务的服务器ip
	alow_files运行触发该计划任务的文件列表可多个值，为空代表所有许可的

icoterie_smart_cron_job （计划任务脚本表,该表用来记录计划任务脚本）
字段
	id自增ID
	name计划任务脚本名
	back_fruit返回值
	runtime执行时间
	cron_manager_id计划任务管理id

icoterie_smart_cron_manager （计划任务管理,该表用来记录计划任务管理）
字段
	id自增ID
	rundate运行日期
	runtime运行时间

icoterie_smart_delivery_goods （发货商品表,该表用来记录发货商品信息）
字段
	rec_id自增id
	delivery_id发货清单id
	goods_id商品id
	product_id产品id
	product_sn产品编码
	goods_name商品名称
	brand_name品牌名称
	goods_sn商品编码
	is_real是否出售
	extension_code商品的扩展属性
	parent_id父级id
	send_number数量
	goods_attr商品属性

icoterie_smart_delivery_order （发货单,该表用来记录发货单）
字段
	delivery_id自动增长id
	delivery_sn交货编码
	order_sn订单编码
	order_id订单id
	invoice_no发货单号
	add_time添加时间
	shipping_id配送id
	shipping_name配送中心名称
	user_id用户id
	action_user操作人
	consignee收货人
	address收货地址
	longitude经度
	latitude纬度
	country国家
	province省
	city市
	district区
	street街道地区码
	sign_building标志性建筑
	email邮箱
	zipcode邮编
	tel电话
	mobile手机
	best_time最佳送货时间
	postscript订单附言
	how_oos缺货处理
	insure_fee保险费
	shipping_fee运输费
	update_time更新时间
	suppliers_id供货商id
	status状态
	agency_id办事处id
	store_id店铺ID

icoterie_smart_discuss_comments （文章评论表,该表用来记录文章评论信息）
字段
	id自增id
	comment_type评论对象（article等等）
	id_value评论的文章ID
	user_id用户ID
	user_name用户名
	email用户邮箱
	user_type用户类型
	content评论内容
	add_time添加时间
	ip_addressIP地址
	parent_id父级ID
	store_id店铺ID
	comment_approved:通过审核的评论 0:待审核的评论 trash: 回收站的评论 spam : 垃圾评论

icoterie_smart_discuss_likes （评论点赞,该表用来记录评论点赞信息）
字段
	id自增id号
	like_type点赞类型
	id_value点赞对象的id
	user_id用户id号
	user_type用户类型
	like_value点赞值
	add_time添加时间
	store_id店铺id

icoterie_smart_email_list （电子杂志订阅表,该表用来增加电子杂志订阅）
字段
	id邮件订阅的自增id
	email邮件订阅所填的邮箱地址
	stat是否确认，可以用户确认也可以管理员确认；0，未确认；1，已确认
	hash邮箱确认的验证码，系统生成后发送到用户邮箱，用户验证激活时通过该值判断是否合法；主要用来防止非法验证邮箱

icoterie_smart_email_sendlist （邮件发送队列表,该表用来记录增加发送队）
字段
	id id
	email Email
	template_id模板ID
	email_content邮件内容
	error错误消息
	like_value点赞值
	pri优先级
	last_send最后发送时间

icoterie_smart_express_checkin （配送员签到表,该表用来记录配送员签到）
字段
	log_id日志id
	user_id用户id
	checkin_date签到时间
	start_time开始时间
	end_time结束时间
	duration持续时间（既配送员在线时间）

icoterie_smart_express_order （订单配送表,该表用来记录订单配送）
字段
	express_id自增id号
	express_sn流水号
	order_sn订单id号
	order_id发货单id号
	delivery_sn发货单id号
	like_value点赞值
	add_time发货单流水
	store_id店铺id号
	user_id用户id号
	consignee收货人
	address收货地址
	country国家
	province省
	city城市
	district地区
	treet街道地区码
	email电子邮箱
	mobile手机
	best_time最佳配送时间
	remark备注
	shipping_fee运费
	commision佣金
	add_time添加时间
	receive_time接单时间
	express_time取货配送时间
	signed_time签收时间
	update_time更新时间
	longitude经度
	latitude纬度
	distance距离
	source来源：assign(派单)，grab(抢单)
	status未分配0派单,1已接派单待取货,2已取货派送中,3退货中,4拒收,5已签收,6已退回，7撤销配送
	staff_id员工id号
	express_user配送员名字
	express_mobile配送员联系电话
	comment_rank评分
	comment_content自营配送订单信息表

icoterie_smart_express_track_record （配送运单号表,该表用来记录配送运单号）
字段
	id自增ID
	express_code对应配送方式表中shipping_code
	track_number运单号
	time时间
	context描述

icoterie_smart_exoress_user （配送人员,该表用来记录配送人员信息）
字段
	user_id用户ID
	store_id店铺ID
	longitude经度
	latitude纬度
	delivery_count配送总数
	delivery_distance配送总距离
	comment_rank评分

icoterie_smart_favourable_activity （优惠活动配置表,该表用来记录优惠活动的配置信息）
字段
	act_id优惠活动的自增id
	store_id店铺ID
	act_name优惠活动的活动名称
	start_time活动的开始时间
	end_time活动的结束时间
	user_rank可以参加活动的用户信息，取值于user_rank的rank_id；其中0是非会员，其他是相应的会员等级；多个值用逗号分隔',
	act_range优惠范围；0，全部商品；1，按分类；2，按品牌；3，按商品`act_range`tinyint(3)unsigned NOT NULL COMMENT'
	act_range_ext优惠范围；0，全部商品；1，按分类；2，按品牌；3，按商品
	min_amount根据优惠活动范围的不同，该处意义不同；但是都是优惠范围的约束；如，如果是商品，该处是商品的id，如果是品牌，该处是品牌的id
	max_amount订单达到金额下限，才参加活动
	act_type参加活动的订单金额下限，0，表示没有上限
	act_type_ext参加活动的优惠方式；0，送赠品或优惠购买；1，现金减免；价格打折优惠
	gift如果是送赠品，该处是允许的最大数量，0，无数量限制；现今减免，则是减免金额，单位元；打折，是折扣值，100算，8折就是80
	sort_order如果有特惠商品，这里是序列化后的特惠商品的id,name,price信息;取值于goods的goods_id，goods_name，价格是添加活动时填写的

icoterie_smart_feedback （用户反馈表,该表用来记录用户反馈信息）
字段
	msg_id反馈信息自增id
	parent_id父节点，取自该表msg_id；反馈该值为0；回复反馈为节点id
	user_id用户ID
	user_name用户名
	user_email Email
	msg_title标题
	msg_type类型
	msg_status反馈状态
	msg_content内容
	msg_time时间
	message_img图片
	order_id是否回复
	msg_area反馈的区域

icoterie_smart_finance invoice （财务发票表,该表用来记录财务发票信息）
字段
	id商品id
	user_id用户id
	title_name发票抬头名称
	title_type抬头类型: PERSONAL（个人） CORPORATION（单位）
	user_mobile用户手机号码
	tax_register_no纳税人识别号
	user_address用户地址
	open_bank_name开户银行名称
	open_bank_account开户银行账号
	add_time添加时间
	update_time更新时间
	is_default非默认0，1默认
	status待审核0，1 审核通过

icoterie_smart_friend_link （友情链接表,该表用来记录友情链接）
字段
	link_id链接名称ID
	link_name链接名称
	link_url链接地址
	link_logo管理操作内容
	link_target登录者登录IP
	show_order排序
	status状态
	contact联系人
	mobile联系人手机
	description描述
	update_time添加/更新时间
	apply_time申请时间
	confirm_time确认时间

icoterie_smart_goods （商品表,该表用来记录商品信息）
字段
	goods_id商品id
	store_id店铺id
	cat_level1_id一级分类id
	cat_level2_id二级分类id
	cat_id商品所属平台商品分类id,取值category的cat_id
	merchat_cat_level1_id商家一级分类id
	merchat_cat_level2_id商家二级分类id
	merchant_cat_id商品所属商家商品分类id，取值merchants_category的cat_id
	goods_sn商品的唯一货号
	goods_name商品的名称
	goods_name_style商品名称显示的样式；包括颜色和字体样式；格式如#ff00ff+strong
	click_count商品点击数
	brand_id品牌id，取值于brand的brand_id
	provider_name供货人的名称，程序还没实现该功能
	goods_number商品库存数量
	goods_weight商品的重量，以千克为单位
	default_shipping默认配送
	market_price市场售价
	shop_price本店售价
	promote_price促销价格
	promote_start_date促销价格开始日期
	promote_end_date促销价格结束日期
	warn_number商品报警数量
	keywords商品关键字，放在商品页的关键字中，为搜索引擎收录用
	goods_brief商品的简短描述
	goods_desc商品的详细描述
	goods_thumb商品在前台显示的微缩图片，如在分类筛选时显示的小图片
	goods_img商品的实际大小图片，如进入该商品页时介绍商品属性所显示的大图片
	original_img上传的商品的原始图片
	is_real是否是实物，1，是；0，否；比如虚拟卡就为0，不是实物
	extension_code商品的扩展属性，比如像虚拟卡
	is_on_sale该商品是否开放销售，1，是；0，否
	is_alone_sale是否能单独销售，1，是；0，否；如果不能单独销售，则只能作为某商品的配件或者赠品销售
	Is_shipping是否购买
	integral购买该商品可以使用的积分数量，估计应该是用积分代替金额消费；但程序好像还没有实现该功能
	add_time商品的添加时间
	sort_order平台对商品的显示排序
	store_sort_order商家对商品的显示排序
	is_delete商品是否已经删除，0，否；1，已删除
	is_best是否是精品；0，否；1，是
	is_new是否是新品
	is_hot是否热销，0，否；1，是
	is_promote是否特价促销；0，否；1，是
	bonus_type_id购买该商品所能领到的红包类型
	last_update最近一次更新商品配置的时间
	goods_type商品所属类型id，取值表goods_type的cat_id
	seller_note商品的商家备注，仅商家可见
	give_integral购买该商品时每笔成功交易赠送的积分数量
	rank_integral等级积分
	suppliers_id供货商id
	is_check是否检查
	store_hot商家加入推荐（0非热销，1热销）
	store_new商家加入推荐（0非新品，1新品）
	store_best商家加入推荐（0非精品，1精品）
	group_number组合购买限制数量
	is_xiangou是否限购
	xiangou_start_date限购起始时间
	xiangou_end_date限购结束时间
	xiangou_num限购数量
	review_status商品审核状态,1待审核，2不通过，3通过，5无需审核
	review_content商品审核不通过内容
	goods_shipai暂未使用
	comments_number评论数
	sales_volume商品销量
	model_price商品价格模式（0-默认，1-仓库，2-地区）
	model_inventory商品库存模式（0-默认，1-仓库，2-地区）
	model_attr商品属性模式（0-默认，1-仓库，2-地区）
	largest_amount暂未使用
	pinyin_keyword暂未使用
	goods_product_tag商品标签（暂未使用）

icoterie_smart_goods_activity （营销活动表,该表用来记录拍卖活动和夺宝奇兵活动配置信息）
字段
	act_id活动id
	store_id店铺id
	act_name活动名称
	act_desc活动描述'
	act_type活动类型
		值	常量	说明
		0	GAT_SNATCH	夺宝奇兵
		1	GAT_GROUP_BUY	团购
		2	GAT_AUCTION	拍卖
		3	GAT_POINT_BUY	积分兑换
		4	GAT_PACKAGE	超值礼包
		100	GAT_MOBILE_BUY	移动专享
	goods_id参加活动的id，取值于goods的goods_id
	product_id产品编号
	goods_name商品的名称，取值于goods的goods_id
	start_time活动开始时间
	end_time活动开始结束时间
	is_finished活动是否结束，0，结束；1，未结束
	ext_info其他信息

icoterie_smart_goods_attr （商品属性表,该表用来记录具体商品的属性）
字段
	goods_attr_id自增ID号
	goods_id该具体属性属于的商品，取值于goods的goods_id
	attr_id该具体属性属于的属性类型的id，取自attribute的attr_id
	attr_value该具体属性的值
	color_value颜色值
	attr_price该属性对应在商品原价格上要加的价格
	attr_sort属性排序
	attr_img_flie属性图片文件
	attr_gallery_flie相册属性
	attr_img_site图片链接跳转地址
	attr_checked是否选择（0-否，1-是）

icoterie_smart_goods_cat （商品扩展分类表,该表用来记录商品的拓展分类）
字段
	goods_id商品id
	cat_id商品分类id

icoterie_smart_goods_data （商品评价表,该表用来记录商品评价）
字段
	goods_id商品id
	store_id店铺id
	comment_good好评数
	comment_genera中评数
	comment_low差评数
	comment_picture晒图评价数
	goods_rank好评率，10000=100.00%

icoterie_smart_goods_gallery （商品相册表,该表用来记录商品相册）
字段
	img_id商品相册ID
	goods_id图片属性商品的id
	product_id货品ID
	img_url实际图片url
	img_desc图片说明信息
	thumb_url缩略图url
	img_original原图url
	sort_order排序

icoterie_smart_goods_type （商品类型表,该表用来记录商品的类型）
字段
	cat_id自增id
	store_id店铺id
	cat_name商品类型名
	enabled类型状态1，为可用；0为不可用；不可用的类型，在添加商品的时候选择商品属性将不可选
	attr_group商品属性分组，将一个商品类型的属性分成组，在显示的时候也是按组显示。该字段的值显示在属性的前一行，像标题的作用

icoterie_smart_group_goods （商品配件配置表,该表用来记录商品配件配置）
字段
	parent_id父商品id
	goods_id配件商品id
	goods_price配件商品的价格
	admin_id添加该配件的管理员id
	group_id组id

icoterie_smart_invitee_record （邀请记录表,该表用来记录邀请记录）
字段
	id自增id号
	invite_id邀请id号
	invitee_phone受邀者手机号
	invite_type邀请类型
	is_registered是否已注册
	expire_time有效期
	add_time添加时间

icoterie_smart_invite_reward （推荐奖励,该表用来记录推荐奖励）
字段
	id 自增id号
	invite_id邀请id号
	invitee_id被邀请人id
	invitee_name被邀请人名称
	reward_type奖励类型（红包：bouns，积分：integral，余额：balance）
	reward_value获得的奖励
	reward_desc奖励补充描述说明
	add_time添加时间

icoterie_smart_keywords （页面搜索关键字的搜索记录表,该表用来记录页面搜索关键字的搜索记录）
字段
	create_time搜索日期
	searchengine搜索引擎，默认是icoterie_smart_system
	keyword搜索关键字，即用户填写的搜索内容
	visit搜索次数，按天累加

icoterie_smart_link_goods （关联商品表,该表用来记录关联商品信息）
字段
	goods_id商品id
	link_goods_id被关联的商品的id
	is_double是否是双向关联;0否;1是
	admin_id添加此关联商品信息的管理员id

icoterie_smart_mail_templates （邮件模板配置表,该表用来记录邮件的模板配置）
字段
	template_id邮件模板自增id
	template_code模板字符串名称，主要用于插件言语包时匹配语言包文件等用途
	is_html邮件是否是html格式；0，否；1，是
	template_subject该邮件模板的邮件主题
	template_content邮件模板的内容
	last_modify最后一次修改模板的时间
	last_send最近一次发送的时间，好像仅在杂志才记录
	genre邮件模板的邮件类型；共2个类型；magazine，杂志订阅；template，关注订阅

icoterie_smart_market_activity （营销活动表,该表用来记录营销活动）
字段
	activity_id商品id，取自goods的goods_id
	article_id文章id，取自article的article_id
	store_id店铺id
	activity_name活动名称
	activity_group活动组（1、摇一摇）
	activity_desc活动规则描述
	activity_object活动对象（app，pc，touch等）
	limit_num活动限制次数（0为不限制）
	limit_time多少时间内活动限制（0为在活动时间内，否则多少时间内限制，单位：分钟）
	start_time活动开始时间
	end_time活动结束时间
	add_time创建时间
	enabled是否使用，1开启，0禁用

icoterie_smart_market activity log （营销活动记录表,该表为营销活动的记录表）
字段
	id折扣价自增id
	activity_id活动id
	user_id会员id
	username会员名称
	prize_id奖品池id
	prize_name奖品名称
	issue_status发放状态，0未发放，1发放
	issue_time（奖品）发放时间
	issue_extend需线下延期发放的扩展信息（序列化）
	add_time抽奖时间
	source来源（app，touch，pc等）

icoterie_smart_market_activity_prize （营销活动奖品表,该表用来记录营销活动奖品）
字段
	prize_id奖品id
	activity_id活动id
	prize_level奖项等级（从0开始，0为大奖，依此类推）
	prize_name奖品名称
	prize_type奖品类型
	prize_value对应奖品信息（id或数量）
	prize_number奖品数量（goods与nothing设置无效）
	prize_prob奖品数量（概率，总共100%）

icoterie_smart_member_price （商品会员价格表,该表用来记录商品会员价格）
字段
	price_id折扣价自增id
	goods_id商品的id
	user_rank会员登记id
	user_price指定商品对指定会员等级的固定定价价格，单位元

icoterie_smart_merchants_ad （商家广告表,该表用来记录商家广告）
字段
	ad_id广告id
	store_id店铺id
	media_type媒介类型
	ad_name广告名称
	ad_link广告链接
	ad_code广告名称
	start_time开始时间
	end_time结束时间
	link_man广告联系人姓名
	link_email广告联系人邮箱
	link_phone广告联系人电话
	click_count广告点击次数
	enabled是否开启
	sort_order排序
	show_client广告投放平台

icoterie_smart_merchants_ad_position （商家广告位表,该表用来记录商家广告位）
字段
	position_id广告位id
	store_id店铺id
	position_name广告位名称
	position_code广告位代号
	ad_width广告位宽度
	ad_height广告位高度
	position_descr广告位描述
	max_number广告位可展示数量最大值
	genre类型
	group_id组id
	sort_order排序

icoterie_smart_merchants_category （商家商品分类表,该表用来记录商家商品分类）
字段
	cat_id商家商品分类id
	store_id店铺id
	cat_name分类名称
	cat_image分类图片
	cat_desc分类描述
	parent_id父级id
	sort_order排序
	is_show是否显示，0为不显示，1为显示.

icoterie_smart_merchants_config （商家店铺基本信息设置表,该表用来记录商家店铺基本信息设置类似shop_config表）
字段
	id自增id
	store_id店铺id
	series组
	code跟变量名的作用差不多，其实就是语言包中的字符串索引，如$_LANG[cfg_range][cart_confirm]
	genre该项配置的类型，text为文本
	store_range当语言包中的code字段对应的是一个数组时，那该处就是该数组的索引，如$_LANG[cfg_range][cart_confirm][1]；只有genre字段为select,options时才有值'
	store_dir当genre为file时才有值，文件上传后的保存目录
	fruit该项配置的值
	sort_order排序

icoterie_smart_migrations （数据库结构更新表,该表为数据库结构更新表）
字段
	migration数据库迁移表
	batch批次

icoterie_smart_mobile_checkin （用户签到表,该表用来记录用户签到）
字段
	id自增id号
	user_id用户id
	checkin_time签到时间
	integral签到获取积分
	source签到来源

icoterie_smart_mobile_device （移动设备表,该表用来记录移动设备）
字段
	id自增id号
	device_udid设备识别码
	device_client设备客户机
	device_code设备码
	device_name设备名
	device_alias设备别名
	device_token设备标记
	device_os设备系统
	device_type设备类型
	user_id用户ID
	user_type用户类型
	location_province位于的省
	location_city位于的城市
	visit_times访问时间
	in_status状态，0为正常，1为在回收站
	add_time添加时间
	update_time更新时间

icoterie_smart_mobile_manage （客户端管理表,该表用来记录客户端管理信息）
字段
	app_id自增id号
	appname应用名称
	bundle_idapp包名
	app_key appkey
	app_secret AppSecret
	device_code设备码
	device_client设备客户机
	platform服务平台名称
	add_time添加时间
	status状态
	sort排序

icoterie_smart_mobile_news （今日热点管理表,该表用来记录今日热点管理）
字段
	id自增id号
	group_id组id
	title标题
	description描述
	image图片地址
	content_url详情跳转链接
	genre article或goods
	status发布状态，0为未发布，1为发布
	create_time创建时间

icoterie_smart_mobile_options （新增客户端配置表,该表用来记录新增客户端配置选项）
字段
	option_id自增id
	platform平台
	app_id默认0，取平台配置
	option_name选项名称
	option_type值类型，用于解析数据
	option_value选项值

icoterie_smart_mobile_screenshots （移动应用截图表,该表用来记录移动应用截图）
字段
	id自增id
	app_code app应用code
	img_desc截图描述
	img_url图片url
	sort排序

icoterie_smart_nav （导航栏显示配置表,该表用来记录上中下3个导航栏的显示配置）
字段
	id导航配置自增id
	ctype分类类型
	cid分类id
	name导航显示标题
	ifshow是否显示
	vieworder排序，页面显示顺序，数字越大越靠后
	opennew导航链接页面是否在新窗口打开，1，是；其他，否
	url链接的页面地址
	genre处于导航栏的位置，top为顶部；middle为中间；bottom,为底部

icoterie_smart_notifications （通知表,该表同来记录通知消息）
字段
	id自增id
	genre类型
	notifiable_id通知id
	notifiable_type通知类型
	content数据
	read_at标记已读时间
	created_at通知创建时间
	updated_at更新时间

icoterie_smart_notification channels （短信渠道表,该表用来记录短信渠道）
字段
	channel_id短信渠道id
	channel_type短信渠道类型
	channel_code短信渠道code
	channel_name短信渠道名称
	channel_desc短信渠道描述
	channel_config短信渠道配置
	enabled是否开启
	sort_order排序

icoterie_smart_notification_events （短信事件表,该表用来记录短信事件）
字段
	id自增id
	event_code短信事件code
	status打开open ，close 关闭
	channel_type渠道类型

icoterie_smart_notification_templates （短信模板表,该表用来记录短信模板）
字段
	id自增id
	template_id短信模板id，某些厂商用到
	template_code短信模板code
	template_subject短信主题
	template_content短信内容
	content_type内容类型，text 文本，html 网页
	last_modify最后修改时间
	last_send最后发送时间
	channel_type短信渠道类型
	channel_code短信渠道code
	sign_name短信签名

icoterie_smart_order_action （订单操作记录表,该表用来记录订单操作记录）
字段
	action_id流水号
	order_id被操作的交易号
	action_user操作该次的人员
	order_status作何操作0,未确认,1已确认;2已取消;3无效;4退货;5已分单;6部分分单
	shipping_status发货状态;0未发货;1已发货 2已取消 3备货中
	pay_status支付状态0未付款; 1已付款中; 2已付款
	action_place取消订单记录（值为1）
	action_note操作备注
	log_time操作时间

icoterie_smart_order_goods （订单的商品信息表,该表用来记录订单的商品信息）
字段
	rec_id订单商品信息自增id
	order_id订单商品信息对应的详细信息id，取值order_info的order_id
	goods_id商品的的id，取值表goods的goods_id
	goods_name商品的名称，取值表goods
	goods_sn商品的唯一货号，取值goods
	product_id产品编号
	goods_number商品的购买数量
	market_price商品的市场售价，取值goods
	goods_price商品的本店售价，取值goods
	goods_attr购买该商品时所选择的属性
	send_number当不是实物时，是否已发货，0，否；1，是
	is_real是否是物，0，否；1，是；取值goods
	extension_code
	商品的扩展属性，比如像虚拟卡。取值goods
	parent_id父商品id，取值于cart的parent_id；如果有该值则是值多代表的物品的配件
	is_gift是否参加优惠活动，0，否；其他，取值于cart的is_gift，跟其一样，是参加的优惠活动的id
	model_attr商品属性模式
	goods_attr_id该商品商品属性编号,
	shopping_fee商品运费

icoterie_smart_order_info （订单信息表,该表用来记录订单信息）
字段
	order_id自增ID
	store_id店铺ID
	order_sn订单号,唯一
	user_id用户id,同users的user_id
	order_status订单状态，作何操作0,未确认,1已确认;2已取消;3无效;4退货;5已分单;6部分分单
	batch作何操作0,未确认,1已确认;2已取消;3无效;4退货;5已分单;6部分分单
	shipping_status商品配送情况;0未发货,1已发货,2已收货,3备货中,4已发货(部分商品),5发货中(处理分单),6已发货(部分商品)
	pay_status支付状态;0未付款;1付款中;2已付款
	consignee收货人的姓名,用户页面填写,默认取值表user_address
	country收货人的国家,用户页面填写,默认取值于表user_address,其id对应的值在region
	province收货人的省份,用户页面填写,默认取值于表user_address,其id对应的值在region
	city收货人的城市,用户页面填写,默认取值于表user_address,其id对应的值在region
	district收货人的地区,用户页面填写,默认取值于表user_address,其id对应的值在region
	street街道地区码
	address收货人的详细地址,用户页面填写,默认取值于表user_address
	longitude经度
	latitude纬度
	zipcode收货人的邮编,用户页面填写,默认取值于表user_address
	tel收货人的电话,用户页面填写,默认取值于表user_address
	mobile收货人的手机,用户页面填写,默认取值于表user_address
	email收货人的Email,用户页面填写,默认取值于表user_address
	best_time收货人的最佳送货时间,用户页面填写,默认取值于表user_addr
	sign_building送货人的地址的标志性建筑,用户页面填写,默认取值于表user_address
	postscript订单附言,由用户提交订单前填写
	shipping_id用户选择的配送方式id,取值表shipping
	shipping_name用户选择的配送方式的名称,取值表shipping
	expect_shipping_time预期送货时间
	pay_id用户选择的支付方式的id,取值表payment
	pay_name用户选择的支付方式名称,取值表payment
	how_oos缺货处理方式,等待所有商品备齐后再发,取消订单;与店主协商
	how_surplus根据字段猜测应该是余额处理方式,程序未作这部分实现
	pack_name包装名称,取值表pack
	card_name贺卡的名称,取值card
	card_message贺卡内容,由用户提交
	inv_payee发票抬头,用户页面填写
	inv_content发票内容,用户页面选择,取值shop_config的code字段的值为invoice_content的value
	goods_amount商品的总金额
	shipping_fee配送费用
	insure_fee保价费用
	pay_fee支付费用,跟支付方式的配置相关,取值表payment
	pack_fee包装费用,取值表pack
	card_fee贺卡费用,取值card
	money_paid已付款金额
	surplus该订单使用金额的数量,取用户设定余额,用户可用余额,订单金额中最小者
	integral使用的积分的数量,取用户使用积分,商品可用积分,用户拥有积分中最小者
	integral_money使用积分金额
	bonus使用红包金额
	order_amount应付款金额
	from_ad订单由某广告带来的广告id,应该取值于ad
	referer订单的来源页面
	add_time订单生成时间
	confirm_time订单确认时间
	pay_time订单支付时间
	shipping_time订单配送时间
	auto_delivery_time订单自动确认收货时间（天数）
	pack_id包装id,取值表pck
	card_id贺卡id,用户在页面选择,取值
	bonus_id红包id,user_bonus的bonus_id
	invoice_no发货时填写,可在订单查询查看
	extension_code通过活动购买的商品的代号,group_buy是团购;auction是拍卖;snatch夺宝奇兵;正常普通产品该处理为空
	extension_id通过活动购买的物品id,取值ecs_good_activity;如果是正常普通商品,该处为0
	to_buyer商家给客户的留言,当该字段值时可以在订单查询看到
	pay_note付款备注,在订单管理编辑修改
	agency_id该笔订单被指派给的办事处的id,根据订单内容和办事处负责范围自动决定,也可以有管理员修改,取值于表agency
	inv_type发票类型,用户页面选择,取值shop_config的code字段的值invoice_type的value
	tax发票税额
	is_separate0未分成或等待分成;1已分成;2取消分成
	parent_id能获得推荐分成的用户id，id取值于表ecs_users
	discount折扣金额
	is_delete会操作删除订单状态（0为删除，1删除回收站，2会员订单列表不显示该订单信息）
	delete_time删除时间
	is_settlement暂未使用
	sign_time暂未使用
	separate_order_sn多商家统一结算主订单号

icoterie_smart_order_reminder （订单提醒表,该表用来记录订单提醒信息）
字段
	id自增id号
	order_id订单id
	message消息
	status状态
	create_time创建时间
	confirm_time确认时间
	store_id店铺id

icoterie_smart_order_status_log （订单状态操作日志表,该表用来记录订单状态操作日志）
字段
	log_id自增id号
	order_status订单状态
	order_id订单id号
	message消息
	add_time添加时间

icoterie_smart_separate_order_info （分单订单信息表,该表用来记录分单订单信息）
字段
	order_id订单ID
	order_sn订单SN,11开头
	user_id用户ID
	order_status订单状态
	pay_status支付状态
	pay_id支付ID
	pay_name支付方式名称
	shippings配送信息序列化
	how_oos无库存怎么做
	how_surplus存货过多怎么做
	inv_type发票类型
	inv_payee抬头
	inv_no税号
	inv_content发票内容
	goods_amount产品总额
	shipping_fee运费
	insure_fee保价费
	pay_fee支付费率
	money_paid实付金额
	surplus使用余额支付金额
	integral积分
	integral_money使用积分支付的金额
	bonus红包
	order_amount订单总额
	bonus_id红包 ID
	tax税
	discount折扣
	add_time添加时间
	confirm_time确认时间
	pay_time支付时间
	postscript备注
	consignee收货人
	country收货地址国家
	province收货地址省份
	city收货地址城市
	district收货地址区
	street收货地街道
	address收货详细地址
	longitude经度
	latitude纬度
	zipcode邮编
	tel电话
	mobile手机
	email邮箱
	from_ad格式化广告
	referer信息referer
	extension_code分机号码
	extension_id延期id
	separate_order_goods mediumtext商品序列化
	is_separate是否分单，0未分，1已分
	pay_note付款备注
	affiliate_user_id推荐人id

icoterie_smart_payment （支付方式配置表,该表用来记录安装的支付方式配置信息）
字段
	pay_id已安装的支付方式自增id
	pay_code支付方式的英文缩写,其实是该支付方式处理插件的不带后缀的文件名部分
	pay_name支付方式名称
	pay_fee支付费用
	pay_desc支付方式描述
	pay_order支付方式在页面的显示顺序
	pay_config支付方式的配置信息,包括商户号和密钥什么的
	enabled是否可用;0否;1是
	is_cod是否货到付款,0否;1是
	is_online是否在线支付;0否;1是

icoterie_smart_payment_record （支付记录表）
字段
	id自增ID
	order_sn订单号
	order_trade_no订单交易流水号
	trade_type交易类型
	trade_no支付交易流水号
	pay_code支付状态码
	pay_name支付名称（比如微信、余额）
	total_fee总金额
	pay_status支付状态
	create_time创建时间
	update_time修改时间
	pay_time付款时间
	partner_id商户号
	account收款帐号
	payer_uid付款人ID
	payer_login付款人账号
	subject交易概述
	operater操作员
	channel_payway支付方式
	channel_payway_name支付方式名称
	channel_sub_payway二级支付方式
	channel_trade_no支付服务商订单
	channel_payment_list活动优惠
	last_error_message最后一次错误信息
	last_error_time最后一次错误时间
	refund_time退款时间
	refund_amount退款金额
	refund_operator退款操作员
	refund_request_no退款序列号

icoterie_smart_pay_log （支付日志表,该表用来记录系统支付日志）
字段
	log_id支付记录自增id
	order_id对应的交交易记录的id,取值表order_info
	order_amount支付金额
	order_type支付类型,0订单支付,1会员预付款支付
	is_paid是否已支付,0否;1是

icoterie_smart_platform_account （微信公众号账号表,该表用来记录微信公众号账号信息）
字段
	id自增id号
	uuid唯一标识
	platform平台
	genre公众号类型
	shop_id商店id
	name公众号名称
	logo商标
	token Token
	aeskey aeskey
	appid AppID
	appsecret AppSecret
	sort排序
	status状态

icoterie_smart_platform_command （微信公众平台扩展功能表,该表用来记录微信公众平台扩展功能配置信息）
字段
	cmd_idn自增id号
	cmd_word关键字
	account_id公众号id
	platform平台
	ext_code插件标识符
	sub_code子命令

icoterie_smart_platform_config （微信公众平台扩展功能配置表,该表用来记录微信公众平台扩展功能配置信息）
字段
	account_id账户id
	ext_code扩展关键字
	ext_config扩展配置

icoterie_smart_platform_extend （微信公众平台扩展功能表,该表用来记录微信公众平台扩展功能信息）
字段
	ext_id扩展id
	ext_name扩展名称
	ext_desc扩展描述
	ext_code扩展关键字
	ext_config扩展配置
	enabled是否安装，1开启，0禁用

icoterie_smart_printer_machine （小票打印机表,该表用来记录小票打印机信息）
字段
	id自增id
	store_id店铺id
	machine_name打印机名称
	machine_code终端编号
	machine_key终端密钥
	machine_mobile打印机插卡手机号码
	machine_logo打印机logo
	voice_type蜂鸣器:buzzer,喇叭:horn 
	voice音量设置[1,2,3] 3种
	version打印机型号
	print_width打印机宽度
	hardware硬件版本
	software软件版本
	print_type开启:btnopen,关闭:btnclose; 按键打印
	getorder终端状态，1:在线，2:缺纸，0：离线
	online_update_time在线更新时间
	add_time在线更新时间
	add_time添加日期
	enabled是否启用打印机，默认1开启，1:开启，0：关闭

icoterie_smart_printer_printlist （小票机打印记录表,该表为小票机打印记录表）
字段
	id自增id
	store_id店铺id
	orde_sh订单编号
	order_type订单类型，订单支付buy，闪惠订单quickpay
	print_order_id打印订单id
	machine_code终端编号
	template_code模版代号
	content打印内容
	tinyint打印次数，默认1
	print_time打印时间
	status待打印
	priority延迟发送
	last_error_message最后一次错误消息
	last_send最后一次发送

icoterie_smart_printer_template （小票打印模板表,该表用来记录小票机打印模板信息）
字段
	id自增id
	store_id店铺id
	template_subject模版名称
	template_code模版代号
	template_content模版内容
	print_number打印数量，默认1
	status是否启用此模版，1:是，0：否
	auto_print是否开启自动打印，1:是，0：否
	tail_content上次修改时间
	last_modify上次修改时间
	add_time添加时间

icoterie_smart_products （货品表,该表用来记录货品信息）
字段
	product_id产品id(产品编号)
	goods_id商品id
	goods_attr商品属性
	product_sn产品编码(货号)
	product_name货品名称
	product_number产品数量
	product_shop_price货品名称
	product_bar_code货品号
	product_thumb货品缩略图
	product_img货品图片
	product_original_img货品原始图片
	product_desc货品描述

icoterie_smart_push_event （消息事件表,该表用来记录消息事件）
字段
	event_id消息事件id
	event_name消息事件名称
	event_code消息事件code
	app_id客户端设备id
	template_id模板id
	is_open是否启用
	create_time创建时间

icoterie_smart_push_message （推送消息表,该表用来记录消息推送）
字段
	message_id自增消息id
	app_id appid
	device_code设备代号
	device_token设备标记
	device_client可多个批量发送，逗号分隔
	title标题
	content内容
	content_params内容变量参数
	add_time添加时间
	push_time最后发送时间
	push_count发送次数
	template_id模板id
	in_status推送状态
	extradata扩展数据
	priority延迟发送0 ，1 优先发送
	last_error_message最后一次错误消息
	msgid厂商消息ID
	channel_code推送消息渠道代码

icoterie_smart_quickpay_activity （买单活动表,该表用来记录买单活动）
字段
	id自增ID
	store_id店铺id
	title闪惠标题
	description闪惠描述
	quickpay_type闪惠类型
	activity_typenormal无优惠, discount价格折扣, everyreduced每满多少减多少,最高减多少, reduced满多少减多少
	activity_value活动参数配置 1、空 2、90为9折 3、500,200 4、100,10,50
	activity_value活动参数配置 1、空 2、90为9折 3、500,200 4、100,10,50
	limit_time_type限制时间类型类型说明：nolimit不限制时间, customize自定义时间
	limit_time_weekly每周时间段
	limit_time_daily每天时间段
	limit_time_exclude排除日期 逗号分隔存储，如2017-01-01,2017-02-01
	start_time闪惠规则开始时间
	end_time闪惠规则结束时间
	use_integral使用最大积分多少 类型说明：close 不能使用，nolimit 不限使用，20（数字）最大可用积分
	use_bonus允许使用红包类型，逗号分隔存储，类型说明：close 不能使用， nolimit 不限使用， 红包id，指定使用
	enabled0 关闭，1 开启

icoterie_smart_quickpay_orders （买单订单表,该表用来记录买单订单信息）
字段
	order_id自增id
	order_sn订单编号
	order_type订单类型
	store_id店铺id
	add_time买单时间
	activity_type优惠类型
	activity_id闪惠活动ID
	user_id用户id
	user_type用户类型
	ueser_name购买人姓名
	user_mobile购买人电话
	goods_amount消费金额
	discount闪惠金额
	integral积分数量
	integral_money积分金额
	surplus余额使用
	bonus红包抵扣
	bouns_id红包ID
	order_amount实付金额
	order_status订单状态 0未确认1已确认
	pay_code支付代号
	pay_time支付名称
	pay_time支付时间
	pay_status核销状态 0未核销1已核销
	referer订单来源
	from_ad订单由某广告带来的广告id

icoterie_smart_quickpay_order_action （买单订单核销表,该表用来记录买单订单核销）
字段
	action_id自增id
	order_id所属订单
	action_user_id操作者用户id
	action_user_name操作者用户名称
	action_user_type操作者用户类型
	order_status订单状态 0未确认1已确认
	pay_status支付状态 0未支付1已支付
	verification_status核销状态 0未核销1已核销
	action_noce操作备注
	add_time操作时间

icoterie_smart_qrcode_validate （二维码登录验证表,该表用来记录二维码登录验证）
字段
	user_id用户id号
	is_admin是否为管理员
	uuid(通用唯一识别码UUID)
	status状态
	expires_in有效期
	device_udid单一设备识别码
	device_client设备客户机
	device_code设备码

icoterie_smart_regions （地区数据表,该表用来记录广告相关信息）
字段
	region_id地区码
	parent_id上级区域编码
	region_name区域名称
	region_type区域类型
	index_letter拼音首字母
	country

icoterie_smart_reg_extend_info （会员注册填写扩展表,该表用来记录会员注册填写扩展信息）
字段
	id自动增长ID
	user_id用户id
	Reg_field_id注册查询编号
	Content内容

icoterie_smart_reg_fields （会员注册项设置表,该表用来记录会员注册项设置信息）
字段
	id自增id
	Reg_field_name注册项名称
	dis_order分配订单
	display显示
	genre类型
	Is_need是否需求

icoterie_smart_role （角色表,该表用来记录角色信息）
字段
	role_id角色id,自增
	role_name角色名称
	action_list权限值（字符串拼接）
	role_describe角色描述

icoterie_smart_searchengine （搜索引擎访问记录表,该表用来记录搜索引擎访问记录）
字段
	create_time搜索引擎访问日期
	searchengine搜索引擎名称
	visit访问次数

icoterie_smart_session （数据表,该表用来记录数据信息）
字段
	id自增id
	payload在session中携带的数据
	last_activity最后活跃时间
	user_id用户id
	user_type用户类型

icoterie_smart_shipping （配送方式配置信息表,该表用来记录配送方式配置信息）
字段
	shipping_id自增id号
	shipping_code配送方式的字符串代号
	shipping_name配送方式名称
	shipping_desc配送方式描述
	insure保价费用，单位元，或者是百分数，该值直接输出为报价费用
	support_cod是否支持货到付款，1，支持；0，不支持
	enabled该配送方式是否被禁用，1，可用；0，禁用
	shipping_print打印配送
	print_bg打印bg
	config_lable配置标签
	print_model打印模型
	shipping_order排序

icoterie_smart_shipping_area （配送区域表,该表用来记录配送方式所属的配送区域）
字段
	shipping_area_id自增ID号
	store_id商品id
	shipping_area_name配送方式中的配送区域的名字
	shipping_id该配送区域所属的配送方式，同shipping的shipping_id
	configure序列化的该配送区域的费用配置信息

icoterie_smart_shop_config （全站配置表,该表用来记录全站配置信息）
字段
	id全站配置信息自增ID
	code跟变量名的作用差不多，其实就是语言包中的字符串索引，如$_LANG[cfg_range][cart_confirm]
	genre该配置的类型，text，文本输入框
	store_rangen当语言包中的code字段对应的是一个数组时，那该处就是该数组的索引，如$_LANG[cfg_range][cart_confirm][1]；只有genre字段为select,options时才有值'
	store_dir当genre为file时才有值，文件上传后的保存目录
	fruit该项配置的值
	sort_order显示顺序，数字越大越靠后

icoterie_smart_sites （站点表,该表用来记录站点域名信息）
字段
	id自增id号
	domain域名
	path路径

icoterie_smart_site_options （站点选项表,该表记录站点选项信息）
字段
	option_id自增id
	site_id站点id
	option_name选项名称
	option_value选项值
	autoload自动载入

icoterie_smart_sms_sendlist （短信发送记录表,该表用来记录短信发送记录）
字段
	id自增id
	mobile接收短信手机号码
	template_id对应厂商的模板ID
	sign_name短信签名
	sms_content适合发短信内容的厂商
	sms_params模板内的变量参数，序列化存储
	error没有错误0 ，1 错误
	priority延迟发送0 ，1 优先发
	last_error_message最后一次错误消息
	last_send最后发送时间
	msgid短信厂商的消息ID
	channel_code短信渠道代码

icoterie_smart_staff_group （员工组表,该表用来记录员工组信息）
字段
	group_ip组id
	store_id店铺id
	group_name组名称
	action_list活动清单
	groupdescribe组描述

icoterie_smart_staff_log （员工日志表,该表用来记录员工日志）
字段
	lod_id自增日志id号
	store_id店铺id号
	log_time记录时间
	user_id用户id
	log_info日志信息
	ip_addressip地址
	ip_locationip定位

icoterie_smart_staff_user （员工表,该表用来记录员工信息）
字段
	user_id用户id
	mobile手机号
	store_id店铺ID号
	name姓名
	nick_name昵称
	user_ident用户标识符
	email电子邮件
	password密码
	salt值salt为系统随机生成，生成以后不再改变
	add_time添加时间
	last_login上一次登入
	last_ip上一次登入ip
	action_list活动清单
	todolist待办事项
	group_id组id
	parent_id上一级id
	avatar头像
	introduction介绍
	online_status上线状态

icoterie_smart_stats （记录访问表,该表用来记录访问信息）
字段
	access_time访问时间
	ip_address访问者ip
	visit_times访问次数，如果之前有过访问次数，在以前的基础上＋1
	browser流浪器及版本
	system操作系统
	languages语言
	areaip所在地区
	referer_domain页面访问来源域名
	referer_path页面访问来源除域名的路径部分
	access_url访问页面文件名

icoterie_smart_store_bill （店铺账单表,该表用来记录店铺账单信息）
字段
	bill_id自增id号
	bill_sn账单系列号
	store_id店铺id号
	bill_month账单月份
	order_count退款订单数
	order_amount退款金额
	refund_count退款金额数
	refund_amount退款金额
	available_amount有效分成金额（订单总金额-退款金额）
	percent_value佣金比例
	bill_amount本月账单佣金金额
	pay_status是否打款,1未打款，2部分打款，3已打款
	pay_time付款时间
	add_time添加时间

store bill day （店铺账单日统计表,该表用来记录店铺账单日统计）
字段
	day_id自增id号
	store_id店铺id号
	the_day日期
	order_count订单数
	order_amount订单金额
	refund_count退款订单数
	refund_amount退款金额
	percent_amount佣金金额
	add_time添加时间

icoterie_smart_store_bill_detail （店铺账单明细表,该表用来记录店铺账单明细）
字段
	detail_id自增id号
	store_id店铺id号
	order_type1订单，2退货单
	order_id订单id号
	order_sn
	goods_amount
	shipping_fee
	insure_fee保险费
	pay_fee支付手续费
	pack_fee包装费用
	card_fee贺卡费用
	surplus余额支付
	integral积分
	integral_money积分金额
	bonus红包金额
	discount折扣金额
	inv_tax发票费用
	order_amount订单金额
	money_paid实付费用
	pay_code
	pay_name
	percent_value佣金比例
	brokerage_amount
	佣金金额
	platform_profit平台佣金
	bill status是否结算,0未结算，1已结算
	bill_time结算时间
	add_time添加时间

icoterie_smart_store_bill_paylog （店铺账单付款流水表,该表用来记录店铺账单付款流水）
字段
	paylog_id自增id
	bill_id店铺账单id
	bill_amount账单金额
	payee收款人
	bank_account_number银行账户
	bank_name收款银行
	bank_branch_name开户银行支行名称
	mobile手机
	admin_id管理id
	add_time操作时间

icoterie_smart_store_category （店铺分类表,该表用来记录店铺分类信息）
字段
	cat_id自增店铺分类id
	cat_name店铺分类名称
	keywordds分类关键字
	cat_desc分类描述
	parent_id父级分类id
	sort_order排序
	is_show是否显示
	cat_image分类图片

icoterie_smart_store_franchisee （商家审核通过表,该表用来记录商家审核通过信息）
字段
	store_id店铺id
	cat_id店铺分类id
	validate_type入驻类型 1 个人 2 企业
	manage_mode经营模式，self自营，join入驻商家
	merchants_name店铺名称
	shop_keyword店铺关键字
	status店铺锁定 1正常，2锁定
	shop_close暂时关闭商店 0否，1是
	responsible_person责任人（法人代表或真实姓名）
	company_name公司名称
	email电子邮箱
	contact_mobile联系方式
	apply_time申请时间
	confirm_time审核通过时间
	expired_time过期时间
	address详细地址
	identity_type证件类型1个人2企业
	identity_number证件号码
	personhand_identity_pic手持证件拍照
	identity_pic_front证件正面
	identity_pic_back证件反面
	identity_status入驻身份信息认证状态，0、待审核，1、审核中，2、审核通过，3、拒绝通过
	business_licence营业执照注册号
	business_licence_pic营业执照
	bank_account_name账号名称
	bank_name收款银行
	bank_branch_name开户银行支行名称
	bank_account_number银行账号
	bank_address开户银行支行地址
	percent_id结算比例id
	remark网站管理员备注信息
	longitude经度
	latitude纬度
	geohash店铺
	geohash值
	sort_order排序
	province省
	city市
	district区
	expired_time过期时间
	street街道地区码

icoterie_smart_store_keywords （店铺搜索关键字表,该表用来记录店铺搜索关键字）
字段
	create_time搜索日期
	store_id店铺id
	keyword关键字
	visit搜索次数

icoterie_smart_store_percent （佣金比例表,该表用来记录佣金比例）
字段
	percent_id自增佣金比例id
	percent_value佣金比例百分比
	sort_order排序
	add_time添加时间

icoterie_smart_store_preaudit （ 商家待审核表,该表用来记录商家待审核信息）
字段
	id自增id
	store_id店铺id
	cat_id店铺分类id
	valiate_type入驻类型
	merchants_name店铺名称
	shop_keyword店铺关键字
	check_status店铺审核状态 1待审核,2通过，3不通过
	identity_status证件认证状态，0待审核，1审核中，2审核通过，3拒绝通过
	responsible_person责任人（法人代表或真实姓名）
	company_name公司名称
	email电子邮箱
	contact_mobile联系方式
	apply_time申请时间
	province省份
	city城市
	district区域
	address详细地址
	identity_type证件类型1个人2企业
	identity_number证件号码
	personhand_identity_pic手持证件拍照
	identity_pic_front证件正面
	identity_pic_back证件反面
	business_licence营业执照注册号
	business_licence_pic营业执照
	bank_account_name帐户名称
	bank_name收款银行
	bank_branch_name开户银行支行名称
	bank_account_number银行账号
	bank_address开户银行支行地址
	remark网站管理员备注信息
	longitude经度
	latitude纬度
	geohash店铺geohash值

icoterie_smart_template_widget （模板布局表,该表用来记录店铺分类信息）
字段
	id
	filename文件名
	region区域
	library该条模板配置在它所属的模板文件中的位置处应该引入的lib的相对目录地址
	sort_order模板文件中这个位置的引入lib项的值的显示顺序
	genre属于哪个动态项，0，固定项；1，分类下的商品；2，品牌下的商品；3，文章列表；4，广告位
	title
	theme该模板配置项属于哪套模板的模板名
	widget_config该模板配置项属于哪套模板的模板名
	remarks备注，可能是预留字段，没有值所以没确定用途

icoterie_smart_term_attachment （附件综合表,该表用来记录附件综合信息）
字段
	attach_id附件id
	attach_label附件标签
	attach_description附件描述
	object_app对象app
	object_group对象组
	objectid对象id
	filename文件名称
	file_path文件路径
	file_size文件大小
	file_ext文件扩展
	file_mime文件mime类型
	is_image是否是图片
	user_id用户id
	user_type用户类型
	add_time添加时间
	add_ip添加ip
	in_status状态
	sort_by排序
	downloads下载

icoterie_smart_term_meta （关联数据扩展表,该表为数据扩展表，用来存储扩展字段的数据。）
字段
	meta_id自增id
	object_type定义类型：ecjia.goods、ecjia.article
	object_group定义分组：category、article
	objectid对应的ID
	meta_key扩展单元的key
	meta_value扩展单元的value

icoterie_smart_term_relationship (关联数据扩展表,该表为关联数据扩展表，用来存储扩展关联字段的数据。)
字段
	relation_id自增ID
	object_type定义类型：ecjia.goods、ecjia.article
	object_group定义分组：category、articl
	objectid对应的ID
	item_key1扩展单元的key1
	item_value1r扩展单元的value1
	item_key2扩展单元的key2
	item_value2扩展单元的value2
	item_key3扩展单元的key3
	item_value3扩展单元的value3
	item_key4扩展单元的key4
	item_value4扩展单元的value4

icoterie_smart_topic （专题活动配置表,该表用来记录专题活动配置）
字段
	topic_id专题自增id
	title专题名称
	intro专题介绍
	start_time专题开始时间
	end_time结束时间
	content专题数据内容，包括分类，商品等
	template专题模板文件
	css专题样式代码
	topic_img专题图片
	title_pic商品分类标题图片
	base_style基本风格样式
	htmls htmls
	keywords关键字
	description专题描述

icoterie_smart_users （用户表,该表用来记录用户信息）
字段
	user_id会员资料自增id
	email会员Email
	user_name用户名
	password用户密码
	avatar_img用户头像
	question密码提问
	answer密码回答
	sex性别; 0保密; 1男;2女
	birthday出生日期
	user_money用户现有资金
	frozen_money用户冻结资金
	pay_points消费积分
	rank_points会员等级积分
	address_id收货信息id,表值表user_address
	reg_time注册时间
	last_login最后一次登录时间
	last_time 2017-01-01 00:00:00
	last_ip最后一次登录IP
	visit_count浏览次数
	user_rank会员等级id，取值user_rank
	is_special是否特殊
	ec_salt会登陆密码扩展信息
	salt
	parent_id推荐人会员id
	flag标识
	alias昵称
	msn msn账号
	qq Qq账号
	office_phone办公电话
	home_phone家用电话
	mobile_phone移动电话
	is_validated是否生效
	credit_line最大消费
	passwd_question密保问题
	passwd_answer密保答案
	pay_password支付密码
	account_status账户状态（normal正常，wait_delete已申请了账号注销待删除账号）
	delete_time账号申请注销时间
	activate_time账号申请激活时间

icoterie_smart_user_account （用户账户表,该表用来记录用户的账户信息）
字段
	id自增ID
	user_id用户id
	order_sn订单号
	admin_user使用者
	amount数量
	pay_fee手续费
	real_amount实付金额
	review_time审核时间
	add_time绑定时间
	paid_time支付时间
	admin_note管理员留言
	user_note用户留言
	real_amount实付金额
	from_type发件人类型（user普通会员，express配送员）
	payment提现方式代号
	payment_name付款人
	is_paid是否支付
	bank_name银行卡名称(工商、建设)
	bank_branch_name银行分行名称
	bank_card银行卡号
	cardholder持卡人
	bank_en_short银行英文简称（ICBC中国工商银行等）

icoterie_smart_user_address （收货人的信息列表,该表用来记录收货人的信息）
字段
	address_id自增收货地址id
	address_name名称
	user_id用户表中的流水号
	consignee收货人的名字
	email收货人的email
	country收货人的国家
	province收货人的省份
	city收货人城市
	district收货人的地区
	street街道地区码
	address收货人的详细地址
	address_info收货人具体门牌号
	zipcode收货人的邮编
	tel收货人的电话
	mobile收货人的手机号
	sign_building收货地址的标志性建筑名
	best_time收货人的最佳收货时间
	status状态
	longitude经度
	latitude维度

icoterie_smart_user_bonus （已经发送的红包信息列表,该表用来记录已经发送的红包信息）
字段
	bonus_id红包的流水号
	bonus_type_id红包发送类型.0,按用户如会员等级,会员名称发放;1,按商品类别发送;2,按订单金额所达到的额度发送;3,线下发送
	bonus_sn红包号,如果为0就是没有红包号.如果大于0,就需要输入该红包号才能使用红包
	bonus_password红包密码（未使用到）
	user_id该红包属于某会员的id.如果为0,就是该红包不属于某会员
	used_time红包使用的时间
	order_id使用了该红包的交易号
	order_sn订单号SN
	emailed否已经将红包发送到用户的邮箱；1，是；0，否
	bind_time绑定时间

icoterie_smart_user_rank （会员等级配置信息表,该表用来记录会员等级配置信息）
字段
	rank_id会员等级编号，其中0是非会员
	rank_name会员等级名称
	min_points该等级的最低积分
	max_points该等级的最高积分
	discount该会员等级的商品折扣
	show_price是否在不是该等级会员购买页面显示该会员等级的折扣价格.1,显示;0,不显示
	special_rank是否事特殊会员等级组.0,不是;1,是

icoterie_smart_volume_price （商品阶梯数量优惠价格表,该表用来记录商品阶梯数量优惠价格）
字段
	price_type价格类型
	goods_id商品id
	volume_numbe最终购买数量
	volume_price最终优惠价格

icoterie_smart_wechat_customer （微信客服表,该表用来记录微信客服信息）
字段
	id自增 ID 号
	wechat_id微信id
	kf_id客服工号
	kf_account完整客服账号
	kf_nick客服昵称
	kf_headimgurl客服头像
	status客服状态
	online_status客服在线状态
	accepted_case客服当前正在接待的会话数
	kf_wx绑定微信号
	invite_wx=接收绑定邀请的客服微信号
	invite_expire_time邀请截止时间
	invite_status邀请绑定客服微信号的状态
	file_url暂未使用

icoterie_smart_wechat_customer_session （客服回话记录表,该表用来记录客服会话记录）
字段
	id自增 ID 号
	wechat_id微信id
	kf_account客服账号
	openid用户openid
	opercode会话状态
	text发送内容
	time发送时间

icoterie_smart_wechat_custom_message （用户账户日志表,该表用来记录用户询问和公众号回复信息）
	字段
	id自增 ID 号
	uid用户id
	msg信息内容
	iswechat0用户信息，1公众号信息
	send_time发送时间

icoterie_smart_wechat_mass_history （群发发送记录表,该表用来记录群发发送记录信息）
字段
	id自增 ID 号
	wechat_id微信id
	media_id素材id
	genre发送内容类型
	status发送状态，对应微信通通知状态
	send_time发送时间
	msg_id微信端返回的消息id
	totalcount group_id下粉丝数；或者openid_list中的粉丝数
	filtercount过滤数
	sentcount发送成功的粉丝数
	errorcount发送失败的粉丝数

icoterie_smart_wechat_media （微信素材表,该表用来记录微信素材信息）
字段
	id自增 ID 号
	wechat_id微信id
	title图文消息标题
	command关键词
	author昵称
	is_show是否显示封面，1为显示，0为不显示
	digest图文消息的描述
	content图文消息页面的内容，支持HTML标签
	link点击图文消息跳转链接
	document_url图片链接
	document_extent媒体文件上传后，获取时的唯一标识
	document_name文件名
	thumb封面素材的id
	add_time添加时间
	edit_time修改时间
	genre素材类型（news图文消息，image图片，voice语音，video视频）
	article_id文章id
	sort排序
	media_id图文消息的ID
	is_material
	media_url封面素材地址链接
	parent_id

icoterie_smart_wechat_menu （微信菜单表,该表用来记录微信菜单信息）
字段
	id自增 ID 号
	wechat_id微信id
	pid父级id
	name菜单标题
	genre菜单的响应动作类型
	menu_key菜单KEY值，click类型必须
	url网页链接，view类型必须
	sort排序
	status状态

icoterie_smart_wechat_oauth （用户账户日志表,该表用来记录授权信息）
字段
	wechat_id微信id
	oauth_redirecturi微信OAuth回调地址
	oauth_count微信OAuth推送量
	oauth_status是否开启授权
	last_time最后更新时间

icoterie_smart_wechat_point （用户账户日志表,该表用来记录积分获取记录）
字段
	log_id积分增加记录id
	openid微信openid
	keywords关键词（通过参与活动如：砸金蛋获取的，或者签到赠送的）
	createtime获得积分的时间

icoterie_smart_wechat_prize （抽奖记录表,该表用来记录抽奖记录信息）
字段
	id自增ID
	wechat_id微信id
	openid openid
	prize_name奖品
	issue_status发放状态，0未发放，1发放
	winner中奖用户信息
	dateline中奖时间
	prize_type是否中奖，0未中奖，1中奖
	activity_type活动类型

icoterie_smart_wechat_qrcode （微信二维码表,该表用来记录微信二维码）
字段
	id自增ID
	genre二维码类型，0临时，1永久
	expire_seconds二维码有效时间
	scene_id场景值ID，临时二维码时为32位非0整型，永久二维码时最大值为100000（目前参数只支持1--100000）
	username推荐人
	function功能
	ticket二维码ticket
	qrcode_url二维码路径
	endtime结束时间
	scan_num扫描量
	wechat_id微信id
	status状态
	sort排序

icoterie_smart_wechat_reply （关键词自动回复表,该表用来记录关键词自动回复信息）
字段
	id自增ID
	wechat_id微信id
	genre自动回复类型
	content回复内容
	media_id素材id
	rule_name规则名称
	add_time添加时间
	reply_type关键词回复内容的类型

icoterie_smart_wechat_request_times （api请求统计表,该表用来记录api请求统计信息）
字段
	id用户id
	wechat_id标签id
	the_day日期
	api_name api名称
	times限制次数
	last_time最后请求时间

icoterie_smart_wechat_rule_keywords （关键词回复表,该表用来记录关键词回复）
字段
	id自增ID
	rid	规则ID
	rule_keywords关键词

icoterie_smart_wechat_tag （标签表,该表用来记录标签信息）
字段
	id自增ID
	wechat_id用户id
	tag_id标签id
	name标签名字
	people标签内用户数量
	sort排序

icoterie_smart_wechat_user （微信用户表,表用来记录微信用户信息）
字段
	uid自增id
	wechat_id微信
	subscribe用户是否订阅该公众号
	openid用户的标识
	nickname用户的昵称
	sex用户的性别
	city用户所在城市
	country用户所在国家
	province用户所在省份
	languages用户的语言
	headimgurl用户的头像
	subscribe_time用户关注是时间
	remark用户备注名
	prvilege
	unionid微信unionid
	group_id用户组id
	ect_uid会员id
	bein_kefu是否处在多客服流程

icoterie_smart_wechat_user_tag （用户标签表,该表用来记录用户标签信息）
字段
	userid用户id
	tagid标签id

icoterie_smart_refund_order （退货退款订单表,该表用来记录退货退款订单相关信息）
字段
	refund_id主键，自增 ID 号
	store_id店铺ID
	user_id用户ID
	user_name用户名
	refund_type退款类型：仅退款refund, 退款退货
	refund_sn退货单编号
	order_type订单类型
	order_id订单id
	order_sn订单编号
	shipping_code配送方式代号
	shipping_name配送方式名称
	shipping_whether是否配送0未配送 1已配送
	shipping_fee配送费
	insyue_fee保险费
	pay_code支付方式代号
	pay_name支付方式名称
	goods_amount商品总金额
	pay_fee支付手续费
	pack_id贺卡ID
	pack_fee包装费用
	card_id贺卡ID
	card_fee贺卡费用
	bonus_id红包ID
	bonus红包金额
	surplus金额支付
	integral积分
	integral_money积分金额
	discount折扣金额
	inv_tax发票费用
	order_amount订单金额
	money_paid实付费用
	status退款状态：退款申请(待审核)0, 退款确认(同意)1, 取消申请（已取消）10, 拒绝退款（不同意）11
	refund_status打款状态：无打款请求（无）0, 待处理打款（待处理）1, 已打款（已打款）2
	refund_content退款说明
	refund_reason退款原因
	refund_time退款时间
	return_status退货状态：无需退货0, 买家未发货1, 买家发货2, 确认收货3, 未收到货11
	return_content退款说明
	refund_reason退款原因
	refund_time退款时间
	treturn_shipping_range退货返还方式范围：home（上门取货） shipping（自选快递） shop（到店退货）
	return_shipping_type用户选择返还配送方式
	return_shipping_value返还配送信息
	add_time申请时间
	last_submit_time用户重新申请
	referer订单来源

icoterie_smart_refund_order_action （退货退款订单操作记录表,该表用来记录退货退款订单操作记录信息）
字段
	action_id操作id
	refund_id退货单ID
	action_user_type操作用户类型
	action_user_id操作者用户ID
	action_user_name操作者用户名称
	status退款状态：退款申请(待审核)0, 退款确认(同意)1, 取消申请（已取消）10, 拒绝退款（不同意）11
	refund_status打款状态：无打款请求（无）0, 待处理打款（待处理）1, 已打款（已打款）2
	return_status退货状态：无需退货0, 买家未发货1, 买家发货2, 确认收货3, 未收到货11
	action_note操作备注
	log_time操作时间

icoterie_smart_refund_payrecord （退款退款打款记录表,该表用来记录用户账目日志）
字段
	id
	store_id店铺id
	order_id订单id
	order_sn订单编号
	refund_id退货单id
	refund_sn退货单编号
	refund_type退款类型：仅退款refund, 退款退货return
	goods_amount商品总金额
	order_money_paid实际支付费用
	payment_record_id支付流水记录id
	back_pay_code退款方式代号
	back_pay_name退款方式名称
	back_pay_fee支付手续费
	back_shipping_fee配送费用
	back_insure_fee保价费用
	back_pack_id包装id
	back_pack_fee包装费用
	back_card_id贺卡id
	back_card_fee贺卡费用
	back_bonus_id红包id
	back_bonus红包金额
	back_surplus余额支付
	back_integral积分
	back_integral_money积分金额
	back_inv_tax发票费用
	back_money_total退款总金额
	add_time申请时间
	action_back_content打款说明
	action_back_type退款方式：原路退回original, 退回余额surplus
	action_back_time退款时间
	action_user_id操作者用户id

icoterie_smart_refund_status_log （退货退款状态日志表,该表用来记录退货退款状态日志信息）
字段
	log_id主键，自增 ID 号
	status状态
	refund_id退货退款id
	message备注
	add_time添加时间

icoterie_smart_refund_goods （退货退款商品信息表,该表用来记录退货退款商品信息日志）
字段
	rec_id订单商品信息自增id
	goods_id退货订单号
	product_id产品编号
	product_sn产品编码(货号)
	goods_name商品名称
	brand_name品牌名称
	goods_sn商品的唯一货号
	is_real是否是实物，1，是；0，否；比如虚拟卡就为0，不是实物
	send_number数量
	goods_attr商品属性

icoterie_smart_store_account （店铺账户表,用来记录店铺账户信息）
字段
	store_id店铺ID
	money_before之前的余额
	money余额
	frozen_money冻结资金
	deposit保证金
	points店铺积分
	platform_profit平台佣金

icoterie_smart_store_account_log （店铺账户日志表,用来记录店铺账户日志信息）
字段
	log_id日志id
	store_id店铺id
	store_money商家余额
	money变动金额
	frozen_money冻结资金
	points店铺积分
	change_time变动时间
	change_desc变动描述
	change_type充值charge，withdraw提现，bill结算

icoterie_smart_store_account_order （店铺账户订单表,该表用来记录店铺账户订单信息）
字段
	id自增id
	store_id店铺id
	order_sn订单编号
	amount总数
	admin_id管理员id
	admin_name管理员名称
	admin_note管理员备注
	staff_note员工备注
	process_type充值charge，withdraw提现，bill结算
	pay_code支付代码
	pay_name支付名称
	pay_time支付时间
	pay_status支付状态
	status待审核1，2通过，3拒绝
	bill_order_type订单buy,quickpay买单,refund退款
	bill_order_id订单id
	bill_order_sn订单编号
	account_type账户类型，bank银行，alipay支付宝
	account_name收款人
	account_number银行账号
	bank_name收款银行
	bank_branch_name开户银行支行名称
	add_time添加时间
	audit_time审核时间

icoterie_smart_store_bill_queue （店铺账单队列表,用来记录店铺账单队列信息）
字段
	id自增id
	order_type订单buy,quickpay买单,refund退款
	order_id订单id
	priority优先级
	add_time添加时间

icoterie_smart_express_order_reminder （派单提醒表,该表用来记录派单提醒相关数据）
字段
	id自增id
	express_id配送单id
	message提醒派单提示语
	status处理状态，0未处理1已处理
	create_time创建时间
	confirm_time确认时间

icoterie_smart_store_business_city （经营城市表,该表用来记录经营城市相关数据）
字段
	business_city自增id
	business_city_name城市名
	business_city_alias城市别名
	index_letter索引首字母
	business_district经营地区

icoterie_smart_market activity lottery （营销活动抽奖记录表,用来记录营销活动抽奖记录相关信息）
字段
	activity_id营销活动id
	user_id根据user_type存放wechat_user表openid或users表user_id
	user_type用户类型，user普通会员，wechat微信用户
	lottery_num限定时间段总抽奖次数
	add_time限定时间段首次抽奖时间
	update_time最新抽奖时间

icoterie_smart_wechat customer record （微信客户记录,用于记录微信客户记录信息）
字段
	id自增id
	wechat_id微信id
	kf_account客服账号
	openid用户openid
	opercode会话状态
	text发送内容
	time发送时间

icoterie_smart_goodslib （商品库商品表,用来记录商品库商品相关信息）
字段
	goods_id主键，自增 ID 号
	cat_id分类id
	goods_sn商品的唯一货号
	goods_name商品的名称
	goods_name_style商品名称显示的样式；包括颜色和字体样式；格式如#ff00ff+strong
	brand_id品牌id，取值于brand的brand_id
	goods_weight商品的重量，以千克为单位
	market_price市场售价
	shop_price本店售价
	keywords关键字
	pinyin_keyword暂未使用
	goods_brief商品的简短描述
	goods_desc商品描述
	goods_thumb商品在前台显示的微缩图片，如在分类筛选时显示的小图片
	goods_img商品的实际大小图片，如进入该商品页时介绍商品属性所显示的大图片
	original_img上传的商品的原始图片
	is_real是否是实物，1，是；0，否；比如虚拟卡就为0，不是实物
	extension_code商品的扩展属性，比如像虚拟卡
	add_time添加时间
	sort_order排序
	is_delete商品是否已经删除，0，否；1，已删除
	last_update最近一次更新商品配置的时间
	goods_type商品所属类型id，取值表goods_type的cat_id
	review_status商品审核状态,1待审核，2不通过，3通过，5无需审核
	review_content商品审核不通过内容
	goods_rank好评率，10000=100.00%
	is_display是否显示在商家商品库，0不显示，1显示
	used_count同步次数

icoterie_smart_goodslib_products （商品库商品货品管理表,用来记录商品库商品货品管理信息）
字段
	product_id货品id
	goods_id商品id
	goods_attr商品规格属性
	product_sn货号
	product_name货品名称
	product_shop_price货品价格
	product_bar_code货品号
	product_thumb货品缩略图
	product_img货品图片
	product_original_img货品原始图片
	product_desc货品描述

icoterie_smart_goodslib_gallery （商品库商品相册表,用来记录商品库商品相册信息）
字段
	img_id图片id
	goods_id商品id
	product_id货品ID
	img_url图片路径
	img_desc图片描述
	thumb_url缩略图路径
	img_original原始图片
	sort_order排序

icoterie_smart_goodslib_attr （商品库商品规格属性表,用于记录商品库商品规格属性信息）
字段
	goods_attr_id商品规格id
	goods_id商品id
	attr_id规格id
	attr_value规格属性值
	color_value颜色值
	attr_price规格属性价格
	attr_sort规格属性排序
	attr_img_flie规格属性图片文件
	attr_gallery_flie规格属性商品相册文件
	attr_img_site规格属性图片站点
	attr_checked规格属性核对

icoterie_smart_cashier_pendorder （收银员挂单表,用来记录收银员挂单信息）
字段
	pendorder_id挂单ID
	store_id店铺ID
	pendorder_sn挂单编号
	pendorder_time挂单时间
	cashier_user_id收银员id同adviser表id
	cashier_user_type挂单收银员类型（admin平台收银员，merchant商家收银员）

icoterie_smart_store_users （商家会员表,该表用来记录商家会员信息）
字段
	id自增ID
	store_id会员来源商家id
	store_name会员来源商家名称
	user_id会员id同users表user_id
	jion_scene成为店铺会员的场景（cashier_suggest收银员推荐加入，buy店铺消费）
	jion_scene_str成为店铺会员时，存储推荐者信息
	add_time添加时间
	last_buy_time最后一次在店铺消费时间

icoterie_smart_cashier_pendorder （收银员电子秤表,用来记录收银员电子秤信息）
字段
	id自增ID
	store_id店铺id
	scale_sn电子秤编码既电子秤条码标识位（通常有21，22，24，29等）
	barcode_mode电子秤条码模式（1：金额模式，2：重量模式，3： 重量模式+金额模式）
	date_format日期格式（1：yyyy-mm-dd格式，2：yyyy.mm.dd格式）
	weight_unit净重单位（1：克，2：千克）
	price_unit单价单位（1：克/元，2：千克/元）
	wipezero是否抹零既取整（0：否，1：是）
	reserve_quantile是否保留分位（0：否，1：是）

icoterie_smart_merchant_menu (商家自定义菜单表,用来记录商家后台头条中的自定义菜单信息)
字段
	id自增ID
	store_id店铺ID
	pid父级ID
	name菜单名称
	url网页链接，view类型必须
	sort排序
	status状态

icoterie_smart_merchant_news (商家今日热点表,用来记录商家后台头条中的今日热点相关信息)
字段
	id自增ID
	store_id店铺ID
	group_id组ID
	title标题
	description描述
	image图片地址
	content_url详情跳转链接
	genre类型
	status未发送0 1已发送
	content图文消息页面的内容，支持HTML标签
	sort排序
	click_count浏览数

icoterie_smart_track_logistic (快递运单逻辑表,用来记录快递运单逻辑信息)
字段
	track_id快递运单ID
	order_id订单id，同order_info表order_id
	order_type订单类型（default默认）
	company_code快递公司code（zhongtong，yuantong，yunda，shunfeng，shentong）
	company_name快递公司名（中通速递，圆通速递，韵达快运，顺丰，申通）
	status在途0,1揽件，2疑难，3签收，4退签，5派件，6退回
	track_number快递运单编号
	add_time添加时间
	update_time更新时间
	sign_time签收时间
	create_time创建时间
	send_time发送时间
	
icoterie_smart_track_log (快递运单日志表,用来记录快递运单日志信息)
字段
	log_id日志ID
	track_company快递公司
	track_number快递运单编号
	create_time时间
	context内容

icoterie_smart_template_options （主题模板选项,该表用来记录主题模板选项）
字段
	option_id选项ID
	option_name选项名字
	option_value选项值
	site站点
	template模板

icoterie_smart_separate_order_info （分单订单信息表,该表用来记录分单订单信息）
字段
	order_id订单ID
	order_sn订单SN,11开头
	user_id用户ID
	order_status订单状态
	pay_status支付状态
	pay_id支付ID
	pay_name支付方式名称
	shippings配送信息序列化
	how_oos无库存怎么做
	how_surplus存货过多怎么做
	inv_type发票类型
	inv_payee抬头
	inv_no税号
	inv_content发票内容
	goods_amount产品总额
	shipping_fee运费
	insure_fee保价费
	pay_fee支付费率
	money_paid实付金额
	surplus使用余额支付金额
	integral积分
	integral_money使用积分支付的金额
	bonus红包
	order_amount订单总额
	bonus_id红包 ID
	tax税
	discount折扣
	add_time添加时间
	confirm_time确认时间
	pay_time支付时间
	postscript备注
	consignee收货人
	country收货地址国家
	province收货地址省份
	city收货地址城市
	district收货地址区
	street收货地街道
	address收货详细地址
	longitude经度
	latitude纬度
	zipcode邮编
	tel电话
	mobile手机
	email邮箱
	from_ad格式化广告
	referer信息referer
	extension_code分机号码
	extension_id延期id
	separate_order_goods	mediumtext商品序列化
	is_separate是否分单，0未分，1已分
	pay_note付款备注
	affiliate_user_id推荐人id

icoterie_smart_payment_refund （支付方式退款表,该表用来记录支付方式退款信息）
字段
	id自增ID
	refund_out_no订单退款流水号
	refund_trade_no支付公司退款流水号
	refund_fee退款金额
	refund_status退款状态
	refund_create_time退款创建时间
	refund_confirm_time退款确认时间
	refund_info退款信息（序列化存储）
	order_sn订单编号
	order_type订单类型
	order_trade_no订单支付流水号
	order_total_fee订单金额
	pay_trade_no支付公司流水号
	pay_code支付方式
	pay_name支付方式名称
	last_error_message最后一条错误信息
	last_error_time最后一条错误时间

icoterie_smart_withdraw_user_bank （用户提现绑定银行卡表,该表用来记录用户提现绑定的银行卡信息）
字段
	id自增ID
	bank_name银行名称
	bank_card银行卡号
	bank_branch_name开户行既开户银行支行名称
	cardholder持卡人
	bank_en_short银行英文简称（ICBC中国工商银行，CCB中国建设银行，ABC中国农业银行等）
	user_id用户id，同users表user_id；配送员id同staff_user表user_id
	user_type用户类型（user普通会员，express配送员）
	bank_type绑定卡类型（bank银行卡，wechat微信钱包）
	add_time绑定时间
	update_time更新时间

icoterie_smart_ucenter_applications （ucenter 应用信息表,该表用来记录 ucenter 应用信息）
字段
	appid应用ID
	genre应用类型
	name应用名称
	url应用的主URL
	authkey通信密钥
	ip应用IP
	apifilename应用接口文件的名称
	charset应用的字符集
	synlogin是否开启同步登陆
	recvnote是否接受通知
	extra其他
	allowips是否允许ip

icoterie_smart_ucenter_failedlogins （ucenter 登录失败表,该表用来记录 ucenter 登录失败信息）
字段
	ip地址ip 
	visit登录次数
	lastupdate最后更新时间

icoterie_smart_ucenter_openids （ucenter openid表,该表用来记录ucenter openid信息）
字段
	openid openID
	appid 应用ID
	user_id 用户ID
	user_name 用户名称
	create_time 创建时间
	login_times 登录时间
	last_time 最后登录时间

icoterie_smart_ucenter_protectedmembers （ucenter 受保护用户表,该表用来记录 ucenter 受保护用户信息）
字段
	user_id用户ID
	user_name用户名称
	appid应用ID
	dateline创建时间
	admin管理员

icoterie_smart_wechat_options （微信选项表,该表用来记录微信选项信息）
字段
	option_id选项ID
	wechat_id默认0，公众号id
	option_name选项名称
	option_type值类型，用于解析数据
	option_value选项值

icoterie_smart_meta （meta表,该表用来记录 meta 值信息）
字段
	id自增ID
	metable_type meta表类型
	metable_id meta表 ID
	genre类型
	key主键
	value值