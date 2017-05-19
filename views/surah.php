<?php require_once('../vendor/alquran/alquran-cloud-template/template/header.php'); ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Ayah; ?>
<?php use AlQuranCloud\Renderer\Generic; ?>
<?php use AlQuranCloud\Renderer\Surah; ?>

<div class="container">
	<?= Surah::renderSurahHeaderRow($surah); ?>
	<?php if ($surah->data->number != 9) { ?>
	<div class="lead font-uthmani align-center style-ayah">
		بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ
	</div>
	<?php } ?>
	<hr />
	<?php 
	$ayahs = (array) $surah->data->ayahs;
	if (isset($surahEdition)) {
		$ayahEditions = (array) $surahEdition->data->ayahs;
	} ?>
	<div class="row">
		<div class="col-md-12" style="padding: 0 30px 0 30px">
			<?php
	  		if (!isset($surahEdition)) {
				echo Surah::renderAyahs($surah, $ayahs);
			} else {
				echo Surah::renderAyahs($surah, $ayahs, $surahEdition, $ayahEditions);
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
				<select id="surahSelector" name="surahSelector" title="Select Surah" class="form-control" >
					<?php foreach ($suwar->data as $ss) { ?>
					<option value="<?= $ss->number; ?>" <?= $surah->data->number == $ss->number ? 'selected="selected"' : ''; ?>><?= $ss->name; ?> (<?= $ss->englishName; ?>)</option>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-5 align-center">
		<form class="form-inline">
			<div class="form-group">
				<label for="editionSelector">Show translation </label>
				<select id="editionSelector" name="editionSelector" multiple="multiple" title="Select Language" class="form-control" >
					<?php foreach (Generic::getEditionsByLanguage($editions['editions']->data) as  $language => $edition) { ?>
					<optgroup label="<?= $language; ?>">
						<?php foreach ($edition as $e) { ?>
							<option value="<?= $e->identifier; ?>" <?= isset($surahEdition) && $surahEdition->data->edition->identifier == $e->identifier ? 'selected="selected"' : ''; ?>><?= $e->name; ?></option>
						<?php } ?>
					</optgroup>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-md-4 align-right rtl">
	<audio id="surahPlayer" controls="controls" class="align-right rtl">
		<?php if ($surah->data->number > 1 && $surah->data->number != 9) { ?>
		<source src="//cdn.alquran.cloud/media/audio/ayah/ar.alafasy/1/high" title="Bismillah" type="audio/mp3"/>
		<?php } ?>
		<?php foreach ($surah->data->ayahs as $ayah) { ?>
			<source src="//cdn.alquran.cloud/media/audio/ayah/ar.alafasy/<?= $ayah->number; ?>/high" title="<?= $surah->data->number; ?>_<?= $ayah->numberInSurah; ?>" type="audio/mp3"/>
		<?php } ?>
	</audio>
	</div>
</div>

<script src="//cdn.alquran.cloud/public/libraries/mediaelementjs-2.21.2/build/mediaelement-and-player.js"></script>
<script src="//cdn.alquran.cloud/public/libraries/mep-feature-playlist/mep-feature-playlist.js"></script>
<script src="//cdn.alquran.cloud/public/js/jquery.mediaplayer.js"></script>
<script src="//cdn.alquran.cloud/public/js/jquery.surah.js"></script>

<script>
$(function() {
	var player = $.alQuranMediaPlayer.getSurahPlayer('#surahPlayer');
	$('#editionSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true });
	$.alQuranSurah.editions('#editionSelector', '<?= $surah->data->number; ?>');
	$.alQuranSurah.surahs('#surahSelector');
	$.alQuranSurah.playThisAyah(player);
	$.alQuranSurah.zoomIntoThisAyah();
	
});
</script>


<?php // ================================================================ // ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/footer.php'); ?>
