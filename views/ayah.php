<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Ayah; ?>
<?php use AlQuranCloud\Renderer\Generic; ?>

<div class="container">
	<div class="lead font-kitab align-center">
		بِسْمِ ٱللّٰهِِ الرَّحْمٰنِ الرَّحِيْمِ
	</div>
	<div class="page-header">
		<h4>
			<?= str_replace('Quran - ', '', $pageTitle); ?>
		</h4>
	</div>
</div>
    <div class="playerBar" style="bottom: 0; margin-bottom: 60px; position: fixed; width: 100%; z-index: 1000;">
    <div class="container">
        <div class="row" id="surahConfigurator">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <form>
                    <div class="form-group">
                        <label for="editionSelector">Show translation </label>
                        <select id="editionSelector" name="editionSelector" multiple="multiple" title="Select Language" class="form-control" >
                            <?php foreach (Generic::getEditionsByLanguage($editions['editions']->data) as  $language => $edition) { ?>
                            <optgroup label="<?= $language; ?>">
                                <?php foreach ($edition as $e) { ?>
                                    <option value="<?= $e->identifier; ?>" <?= isset($ayahEdition) && $ayahEdition->data->edition->identifier == $e->identifier ? 'selected="selected"' : ''; ?>><?= $e->name; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <form method="GET" action="/ayah" style="width: 80%;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ayah Reference. E.g. 2:255" name="reference" id="ayah-reference" value="<?= isset($reference) ? $reference : ''; ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <audio id="ayahPlayer" controls="controls" class="align-right">
                    <source
                    id="activeAyah"src="https://cdn.islamic.network/quran/audio/128/ar.alafasy-2/<?=
                    $ayah->data->number; ?>.mp3" title="<?= $ayah->data->number; ?>" type="audio/mp3" />
                </audio>
            </div>
        </div>
    </div>
    </div>

<div class="container">
	<div class="row">
		<div class="col-md-12 font-kitab rtl style-ayah ayahAudio<?= $ayah->data->number; ?> ayah-playing">
			<?= $ayah->data->text; ?>
				<?= Ayah::renderAyahEndingInArabic($ayah->data->numberInSurah); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 lead">
			<span class="label label-default">
		<?= Ayah::renderAyahReferenceInLatin($ayah->data->surah->number, $ayah->data->numberInSurah); ?>  <?= $ayah->data->surah->englishName; ?>
		</span>
		</div>
		<div class="col-md-6 rtl lead">
			<span class="label label-default">
				<?= Ayah::renderAyahReferenceInArabic($ayah->data->surah->number, $ayah->data->numberInSurah); ?> <?= $ayah->data->surah->name; ?>
		  </span>
		</div>
	</div>
	<hr />
	<div id="editions">
	<?php if(isset($ayahEdition)) { ?>
		<div class="row">
			<div class="col-md-12 ayahEditionText">
				<p class="translationText">
					<?= $ayahEdition->data->text; ?>
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 lead">
				<span class="label label-default">
				<?= $ayahEdition->data->edition->englishName; ?>
			</span>
			</div>
			<div class="col-md-6 lead pull-right align-right">
				<span class="label label-default margin-left-15 ayahEditionName">
				<?= ucwords($ayahEdition->data->edition->type); ?>
			</span>
			</div>
		</div>
		<?php } ?>
	</div>
</div>

<script src="/public/js/jquery.ayah.js?v=1"></script>
<script src="/public/js/jquery.mediaplayer.js?v=11"></script>
<script>
$(function() {
	$('#editionSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true, dropUp: true, maxHeight: 400  });
	$.alQuranAyah.init('#editionSelector', '<?= $ayah->data->number; ?>');
	$.alQuranMediaPlayer.init($("#ayahPlayer")[0], 'ayah', <?= $ayah->data->number; ?>, <?= $ayah->data->number; ?>, <?= $ayah->data->surah->number; ?>, 0);
        $.alQuranMediaPlayer.defaultPlayer();

});
</script>

<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
