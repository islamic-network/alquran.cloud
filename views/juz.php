<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Ayah; ?>
<?php use AlQuranCloud\Renderer\Generic; ?>
<?php use AlQuranCloud\Renderer\Juz; ?>

<div class="container">
	<div class="lead font-kitab align-center style-ayah" style="padding-top: 70px;">
		بِسْمِ ٱللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
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

<div class="playerBar" style="bottom: 0; margin-bottom: 60px; position: fixed; width: 100%; z-index: 1000;">
<div class="container">
<div class="row" id="surahConfigurator">
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
		<form class="form-inline align-center">
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
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	<audio id="juzPlayer" controls="controls" class="align-right rtl">
		<?php if ($juz->data->number != 1) { ?>
			<source src="//cdn.islamic.network/quran/audio/128/ar.alafasy/1.mp3" title="Bismillah" type="audio/mp3"/>
		<?php }
		$currentSurah = $juz->data->ayahs[0]->surah->number;
		foreach ($juz->data->ayahs as $ayah) {
			if ($ayah->surah->number > $currentSurah) {
				$currentSurah = $ayah->surah->number; ?>
				<source src="//cdn.islamic.network/quran/audio/128/ar.alafasy/1.mp3" title="Bismillah" type="audio/mp3"/>
			<?php } ?>
			<source src="//cdn.islamic.network/quran/audio/128/ar.alafasy/<?= $ayah->number; ?>.mp3" title="<?= $juz->data->number; ?>_<?= $ayah->number; ?>" type="audio/mp3"/>
		<?php } ?>
	</audio>
	</div>
</div>
</div>
</div>


<script src="//cdn.alquran.cloud/public/libraries/mediaelementjs-2.21.2/build/mediaelement-and-player.js"></script>
<script src="//cdn.alquran.cloud/public/libraries/mep-feature-playlist/mep-feature-playlist.js"></script>
<script src="//cdn.alquran.cloud/public/js/jquery.mediaplayer.js"></script>
<script src="//cdn.alquran.cloud/public/js/jquery.juz.js"></script>
<script>
$(function() {
	var player = $.alQuranMediaPlayer.getJuzPlayer('#juzPlayer');
	$('#editionSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true, dropUp: true, maxHeight: 400  });
	$.alQuranJuz.editions('#editionSelector', '<?= $juz->data->number; ?>');
	$.alQuranJuz.juzs('#juzSelector');
	$.alQuranJuz.playThisAyah(player);
	$.alQuranJuz.zoomIntoThisAyah();

});
</script>


<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
