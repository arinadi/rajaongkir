Dari
<select name='asal' id='asal'>
	<option>Pilih Kota Asal</option>
	<?php foreach($kabupatenAsal as $key):?>
	<option value='<?=$key['city_id']?>'>
		<?=$key['city_name']?>
	</option>
	<?php endforeach;?>
</select>
<br> - Ke
<select name='provinsi' id='provinsi'>
	<option>Pilih Provinsi Tujuan</option>
	<?php foreach($provinsiAsal as $key):?>
	<option value='<?=$key['province_id']?>'>
		<?=$key['province']?>
	</option>
	<?php endforeach;?>
</select>
<br>
<select id="kabupaten" name="kabupaten"></select>
<br> - Kurir
<select class="form-control" id="kurir" name="kurir">
	<option value="jne">JNE</option>
	<option value="tiki">TIKI</option>
	<option value="pos">POS INDONESIA</option>
</select>
<br> - Berat
<input id="berat" type="number" name="berat" value="500" />
<br>
<button id="cek" type="submit" name="button">Cek Ongkir</button>
<h3>Hasil</h3>
<div id="ongkir"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#provinsi').change(function() {

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#provinsi').val();

			$.ajax({
				type: 'GET',
				url: '<?=site_url('welcome/get_kabupaten/')?>' + prov,
				success: function(data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
			});
		});

		$("#cek").click(function() {
			//Mengambil value dari option select provinsi asal, kabupaten, kurir, berat kemudian parameternya dikirim menggunakan ajax
			var asal = $('#asal').val();
			var kab = $('#kabupaten').val();
			var kurir = $('#kurir').val();
			var berat = $('#berat').val();

			$.ajax({
				type: 'POST',
				url: '<?=site_url('welcome/get_ongkir/')?>',
				data: {
					'kab_id': kab,
					'kurir': kurir,
					'asal': asal,
					'berat': berat
				},
				success: function(data) {

					//jika data berhasil didapatkan, tampilkan ke dalam element div ongkir
					$("#ongkir").html(data);
				}
			});
		});
	});
</script>