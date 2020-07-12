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
                        <label for="arabicEditionSelector">Edition </label>
                        <select id="arabicEditionSelector" name="arabicEditionSelector" title="Select Edition" class="form-control" >
                            <?php foreach (Generic::getArabicQuranEditions($editions['editions']->data) as  $language => $edition) { ?>
                                <?php foreach ($edition as $e) { ?>
                                    <option value="<?= $e->identifier; ?>" <?= 'quran-uthmani-quran-academy' == $e->identifier ? 'selected="selected"' : ''; ?>><?= $e->name; ?> (<?= $e->identifier; ?>)</option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <form>
                    <div class="form-group">
                        <label for="fontSelector">Font </label>
                        <select id="fontSelector" name="fontSelector" title="Select Font" class="form-control" >
                            <option value="font-mequran">Quran ME</option>
                            <option value="font-kitab" selected>Quran ME 2</option>
                            <option value="font-nh">Noor e Hidayah</option>
                            <option value="font-othmani">Othmani</option>
                            <option value="font-quran">Quran</option>
                            <option value="font-uthmani">Uthmani</option>
                            <option value="font-scheherazade">Scheherazade</option>
                            <option value="font-naskh">Naskh</option>
                            <option value="font-kitab" selected>Kitab</option>
                            <option value="font-kitab-bold">Kitab Bold</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <form method="GET" action="/arabic-script-checker" style="width: 80%;">
                    <div class="input-group">
                        <label for="ayah-reference">Ayah Reference </label>
                        <input type="text" class="form-control" placeholder="Ayah Reference. E.g. 2:255" name="reference" id="ayah-reference" value="<?= isset($reference) ? $reference : ''; ?>">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">Go</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

<div class="container">
	<div class="row">
		<div class="col-md-12 rtl style-ayah">
            <span id="ayahFont" class="font-kitab">
			<?= $ayah->data->text; ?>
            </span>
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
</div>

<script src="/public/js/jquery.arabicScriptChecker.js?v=1"></script>
<script>
$(function() {
	$.alQuranArabicScriptChecker.monitorFont('#fontSelector');
	$.alQuranArabicScriptChecker.monitorEdition('#arabicEditionSelector', '<?= $reference; ?>');

});
</script>

<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
