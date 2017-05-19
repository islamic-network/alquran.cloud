<?php require_once('../vendor/alquran/alquran-cloud-template/template/header.php'); ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Ayah; ?>
<?php use AlQuranCloud\Renderer\Generic; ?>
<?php use AlQuranCloud\Renderer\Juz; ?>

<div class="container">
	<div class="lead font-uthmani align-center style-ayah" style="padding-top: 70px;">
		بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ
	</div>
	<hr />
	<?php 
	$ayahs = (array) $juz->data->ayahs;
	if (isset($juzEdition)) {
		$ayahEditions = (array) $juzEdition->data->ayahs;
	} ?>
	<div class="row">
		<div class="col-md-12" style="padding: 0 30px 0 30px">
			<?php
	  		if (!isset($juzEdition)) {
				echo Juz::renderAyahs($juz, $ayahs);
			} else {
				echo Juz::renderAyahs($juz, $ayahs, $juzEdition, $ayahEditions);
			}
			?>
		</div>
	</div>
	<hr />
</div>

<div class="row" id="surahConfigurator" style="padding: 10px 7% 0 7%;">
	<div class="col-md-3">
		<form>
			<div class="form-group">
				<select id="juzSelector" name="juzSelector" title="Select Juz" class="form-control" >
					<?php for ($i=0; $i<=30; $i++) { ?>
					<option value="<?= $i; ?>" <?= $juz->data->number == $i ? 'selected="selected"' : ''; ?>> Juz <?= $i; ?></option>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-5 align-center">
		<form>
			<div class="form-group">
				<label for="v">Show translation </label>
				<select id="editionSelector" name="editionSelector" multiple="multiple" title="Select Language" class="form-control" >
					<?php foreach (Generic::getEditionsByLanguage($editions['editions']->data) as  $language => $edition) { ?>
					<optgroup label="<?= $language; ?>">
						<?php foreach ($edition as $e) { ?>
							<option value="<?= $e->identifier; ?>" <?= isset($juzEdition) && $juzEdition->data->edition->identifier == $e->identifier ? 'selected="selected"' : ''; ?>><?= $e->name; ?></option>
						<?php } ?>
					</optgroup>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-4 align-right rtl">
	<audio id="juzPlayer" controls="controls" class="align-right rtl">
		<?php if ($juz->data->number != 1) { ?>
			<source src="//cdn.alquran.cloud/media/audio/ayah/ar.alafasy/1/high" title="Bismillah" type="audio/mp3"/>
		<?php } 
		$currentSurah = $juz->data->ayahs[0]->surah->number;
		foreach ($juz->data->ayahs as $ayah) {
			if ($ayah->surah->number > $currentSurah) {
				$currentSurah = $ayah->surah->number; ?>
				<source src="//cdn.alquran.cloud/media/audio/ayah/ar.alafasy/1/high" title="Bismillah" type="audio/mp3"/>
			<?php } ?>
			<source src="//cdn.alquran.cloud/media/audio/ayah/ar.alafasy/<?= $ayah->number; ?>/high" title="<?= $juz->data->number; ?>_<?= $ayah->number; ?>" type="audio/mp3"/>
		<?php } ?>
	</audio>
	</div>
</div>

<script src="//cdn.alquran.cloud/public/libraries/mediaelementjs-2.21.2/build/mediaelement-and-player.js"></script>
<script src="//cdn.alquran.cloud/public/libraries/mep-feature-playlist/mep-feature-playlist.js"></script>
<script src="//cdn.alquran.cloud/public/js/jquery.mediaplayer.js"></script>
<script src="//cdn.alquran.cloud/public/js/jquery.juz.js"></script>
<script>
$(function() {
	var player = $.alQuranMediaPlayer.getJuzPlayer('#juzPlayer');
	$('#editionSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true  });
	$.alQuranJuz.editions('#editionSelector', '<?= $juz->data->number; ?>');
	$.alQuranJuz.juzs('#juzSelector');
	$.alQuranJuz.playThisAyah(player);
	$.alQuranJuz.zoomIntoThisAyah();
	
});
</script>


<?php // ================================================================ // ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/footer.php'); ?>
