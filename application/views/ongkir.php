<?php foreach ($result as $key) :?>
<div title="<?= strtoupper($key['name']);?>" style="padding:10px">
	<table class="table table-striped">
		<tr>
			<th>No.</th>
			<th>Jenis Layanan</th>
			<th>ETD</th>
			<th>Tarif</th>
		</tr>
		<?php $no=1; foreach ($key['costs'] as $cost) : ?>
		<tr>
			<td>
				<?= $no++;?>
			</td>
			<td>
				<div style="font:bold 16px Arial">
					<?= $cost['service'];?>
				</div>
				<div style="font:normal 11px Arial">
					<?= $cost['description'];?>
				</div>
			</td>
			<td align="center">&nbsp;
				<?= $cost['cost'][0]['etd'];?>days</td>
			<td align="right">
				<?= number_format($cost['cost'][0]['value']);?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>
<?php endforeach; ?>
