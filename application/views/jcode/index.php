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

?>

<div id="messageBox" ></div>

<div class="TKcontent">
	<h2 class="TKH">显示活动细则</h2>
	<div class="TKmain">
		由 <span style="font-weight: bold">BookEx</span> 和 <span style="font-weight: bold">Jcode</span> 联合推出 <br/>
		持续时间：2013/11/28 - 2013/12/28 <br/>
		每天早上8点准时放出当日三张免费票和30张88折券 <br/>
		免费票限一人使用，88折券可供一组玩家（3-6人）使用 <br/><br/>
		<span style="font-weight: bold; color: red">地点：拖鞋门对面好第坊小区内35栋101室</span><br/>
		<span style="font-weight: bold; color: red">联系方式：13701701734</span>
	</div>
</div>

<?php
	if ($show_ticket) {
		?>
		<div class="fixed"></div>
		<div class="TKcontent">
			<h2 class="TKH"> 显示等待被使用的优惠券们~~</h2>
			<div class="TKmain">
		<?php
		for ($i = 1;$i <= 6;++$i) {
		?>
			<div class="jCodeTKname"><?php echo getTypeString($i); ?></div>
			<div class="jCodeTKcontent">
				<?php
					foreach ($ticket["$i"] as $eachTicket) {
						echo $eachTicket->ticket_id." ";
					}
				?>
			</div>
			<?php
		} 
		?>
		<div class="fixed"></div>
			</div>
		</div>
		<?php
	}
?>

<div id="jCodecontent">
<?php 
	for ($i = 1;$i <= 6;++$i) { 
?>
	<div class="jCodebox">
		<div class="pic">
			<img src="<?php echo base_url() ?>public/img/jcode/jcode<?php echo $i ?>.jpg" />
		</div>
		<div class="info">
			<span class="name"><?php echo getTypeString($i)." 剩余".$num["$i"]; ?></span>
			<span class="getTicket" ticket_type = "<?php echo "$i" ?>">领取</span>
		</div>
	</div>
<?php
	}
?>
</div>

<script type="text/javascript">
	var getTicket = function(event){
		event.preventDefault();
		$.get(
            "<?php echo site_url();?>/jcode/getTicket",
            {"ticket_type":$(this).attr("ticket_type")},
            function(data)
            {
            	$("#messageBox").text(data).slideDown();
            });
	}
	$(".getTicket").css("cursor", "pointer").bind("click", getTicket);
	$(document).ready(function(){
	$(".TKH").css("cursor", "pointer").click(function(){
	    $(this).siblings(".TKmain").slideToggle();
	  });
	});
</script>