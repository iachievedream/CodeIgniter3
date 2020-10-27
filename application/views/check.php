<?php
defined('BASEPATH') or exit('No direct script access allowed');
//echo "<pre>";print_r($r);echo "</pre>";
?>
<div class="container">
	<div class="row">
		<div class="col">
            查詢待做
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
