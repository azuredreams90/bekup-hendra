<table class='table' border='1'>
			<thead>
				<th>Task</th>
				<th>date</th>
				<th>Time</th>
				<th>Action</th>
			</thead>

<?php 
foreach($result as $d)
		{
			echo"<tbody>
				<tr id='hapus$d[id]'>
					<td>$d[task]</td>
					<td>$d[date]</td>
					<td>$d[time]</td>
					<td><a onclick='hapus($d[id])' style='cursor:pointer; text-decoration:none' class='glyphicon glyphicon-trash'></a> | 
						<a style='cursor:pointer; text-decoration:none' class='glyphicon fa fa-caret-square-o-left edit e$d[id]' id='$d[id]'  title='$d[task]'></a>
					</td>
			    </tr>
			    </body>";
		}
 ?>
 </table>