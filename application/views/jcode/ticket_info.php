<?php 
	function getTypeString($type){
		if ($type == 1) return '吃货之屋88折';
		if ($type == 2) return '女巫惊魂夜88折';
		if ($type == 3) return '天机秘境88折';
		if ($type == 4) return '吃货之屋免费券';
		if ($type == 5) return '女巫惊魂夜免费券';
		if ($type == 6) return '天机秘境免费券';
		return '数据库错误，未知';
	}

if (!$valid){ ?>
	<div class = "row-fluid">
		<p class = "span2">  <strong> 该优惠券不存在。</strong> </p>
		<a class="btn" href="<?php echo site_url("jcode/admin"); ?>">返回</a>
	</div>
<?php } 
else {
	$ticketid = $data->ticket_id;
	?>
<div id="content">
	<div class = "row-fluid">
		<p class = "span2">  <strong> 免费券号码：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo $data->ticket_id; ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 类型：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo getTypeString($data->type); ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 发出时间：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo $data->activated_time; ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 使用时间：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php echo $data->used_time; ?> </strong>
		</p>
	</div>

	<div class = "row-fluid">
		<p class = "span2">  <strong> 使用人：</strong> </p>
		<p class = "span10" style = "font-size: 17px; color: #ff0000;">
			<strong> <?php if (strlen($data->username) > 3) echo $data->username; else echo '未使用'; ?> </strong>
		</p>
	</div>

	<a class="btn btn-primary" href="<?php echo site_url("jcode/getTicketInfo?ticket_id=$ticketid&use=1"); ?>">使用这张券</a>
	<a class="btn" href="<?php echo site_url("jcode/admin"); ?>">返回</a>
</div>

<?php } ?>