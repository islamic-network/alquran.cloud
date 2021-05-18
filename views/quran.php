<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Ayah; ?>
<?php use AlQuranCloud\Renderer\Generic; ?>
<?php use AlQuranCloud\Renderer\Quran; ?>

<div class="container">

	<?php foreach ($quran->data->surahs as $key => $surah) {
		$hideThisSurah = $surah->number != 1 ? 'hide' : ''; ?>
		<div class="<?=$hideThisSurah; ?> displayedSurah<?= $surah->number; ?>">
			<?= Quran::renderSurahHeaderRow($surah); ?>
			<hr />
			<?php if ($surah->number != 9) { ?>
			<div class="lead font-kitab align-center style-ayah">
				بِسْمِ ٱللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
			</div>
			<?php } ?>
			<?php $ayahs = (array) $surah->ayahs;
			if (isset($quranEdition)) {
				$ayahEditions = (array) $quranEdition->data->surahs[$key]->ayahs;
			} ?>
			<div class="row">
				<div class="col-md-12" style="padding: 0 30px 0 30px">
					<?php
					if (!isset($quranEdition)) {
						echo Quran::renderAyahs($surah, $ayahs);
					} else {
						echo Quran::renderAyahs($surah, $ayahs, $quranEdition, $ayahEditions);
					}
					?>
				</div>
			</div>
			<hr />
		</div>
	<?php } ?>

</div>

<div class="playerBar" style="bottom: 0; margin-bottom: 60px; position: fixed; width: 100%; z-index: 1000;">
<div class="container">
<div class="row" id="surahConfigurator" style="padding: 10px 7% 0 7%;">
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<form>
			<div class="form-group">
				<select id="surahSelector" name="surahSelector" title="Select Surah" class="form-control" >
                    <?php $surahChangers = []; $count=0; ?>
					<?php foreach ($suwar->data as $ss) {
					    $count = $count + $ss->numberOfAyahs;
                        $surahChangers[$ss->number] = $count;
					    ?>
					<option value="<?= $ss->number; ?>" <?= $ss->number == 1 ? 'selected="selected"' : ''; ?>><?= $ss->name; ?> (<?= $ss->englishName; ?>)</option>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
		<form class="align-center">
			<div class="form-group">
				<label for="editionSelector">Show translation </label>
				<select id="editionSelector" name="editionSelector" multiple="multiple" title="Select Language" class="form-control" >
					<?php foreach (Generic::getEditionsByLanguage($editions['editions']->data) as  $language => $edition) { ?>
					<optgroup label="<?= $language; ?>">
						<?php foreach ($edition as $e) { ?>
							<option value="<?= $e->identifier; ?>" <?= isset($quranEdition) && $quranEdition->data->edition->identifier == $e->identifier ? 'selected="selected"' : ''; ?>><?= $e->name; ?></option>
						<?php } ?>
					</optgroup>
					<?php } ?>
				</select>
			</div>
		</form>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
	<audio id="quranPlayer" controls="controls" class="align-right rt">
        <source id="activeAyah" src="https://cdn.islamic.network/quran/audio/128/ar.alafasy/1.mp3" title="1" type="audio/mp3"/>
	</audio>
	</div>
</div>
</div>
</div>
<script src="/public/js/jquery.mediaplayer.js?v=7"></script>
<script src="/public/js/jquery.quran.js?v=1"></script>
<script>
    var quran = <?php echo json_encode($quran->data); ?>;
    var surahChangers = <?php echo json_encode($surahChangers); ?>;
$(function() {
	var player = $('#quranPlayer')[0];
	$('#editionSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true, dropUp: true, maxHeight: 400 });
	$.alQuranQuran.editions('#editionSelector');
	$.alQuranQuran.surahs('#surahSelector', player, quran);
    $.alQuranMediaPlayer.init(player, 'quran', 1, 6236, 1, quran, surahChangers);
    $.alQuranMediaPlayer.defaultPlayer();
    $.alQuranMediaPlayer.zoomIntoThisAyah();

});
</script>



<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
