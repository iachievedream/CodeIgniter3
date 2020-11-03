<?php
defined('BASEPATH') or exit('No direct script access allowed');
//echo "<pre>";print_r($r);echo "</pre>";
?>
<div class="container">
	<div class="row">
		<div class="col">
            查詢待做
			<!-- <button type="button" id="checkin">上班打卡</button>
			<button type="button" id="checkout">下班打卡</button> -->
			<input type="button" onclick="checkin()" value="上班打卡">
			<input type="button" onclick="checkout()" value="下班打卡">

		</div>
	</div>
	<div class="row">
		<table class="table">
			<thead>
				<th style="width:150px;">日期</th>
				<th>姓名</th>
				<th>上班</th>
				<!-- <th>上班狀態</th> -->
				<th>下班</th>
				<!-- <th>下班狀況</th> -->
				<th>假別</th>
				<th>事由</th>
				<!-- <th colspan="2">異常狀況</th> -->
				<th>異常說明</th>
			</thead>
			<tbody>
				<?php if (!empty($r)): ?>
				<?php foreach ($r as $k => $v):?>
				<tr>
					<td><?php echo $v['date'];?></td>
					<td><?php echo $v['account'];?></td>
					<td><?php echo $v['in_time'] . ' (' . $v['in_status'] . ')';?></td>
					<td><?php echo $v['out_time'] . '(' . $v['out_status'] . ')';?></td>
				</tr>
				<?php endforeach;?>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
function checkin(){
	$.ajax({
		url: '/Checkin/checkeIn/',
		type: 'post',
		data: {	},
		dataType: 'json',
		success: function(json) {
			if(json['success']){
				// $(obj).parent('div').remove();
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}
function checkout(){
	$.ajax({
		url: '/Checkin/checkeOut/',
		type: 'post',
		data: {	},
		dataType: 'json',
		success: function(json) {
			if(json['success']){
				// $(obj).parent('div').remove();
			}
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
}

// $.ajax({
// 		url: '/Checkin/index/',
// 		type: 'post',
// 		data: {	},
// 		dataType: 'json',
// 		success: function(json) {
// 			if(json['success']){
// 				// $(obj).parent('div').remove();
// 			}
// 		},
// 		error: function(xhr, ajaxOptions, thrownError) {
// 			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
// 		}
// 	});
</script>