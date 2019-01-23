<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Ayah; ?>
<?php use AlQuranCloud\Renderer\Generic; ?>
<?php use AlQuranCloud\Renderer\Surah; ?>

<div class="container">
	<div class="lead font-uthmani align-center">
		بِسْمِ ٱللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
	</div>
	 <div class="page-header">
		<h4>Search the Quran</h4>
	</div>
	
	<form role="form" id="searchconfig" method="GET" action="/search">
		<div class="row">
			<div class="col-md-4 surahSelectorDiv">
				<div class="form-group">
					<label for="surahSelector">Surahs</label>
					<select id="surahSelector" name="surah[]" title="Select Surah" class="form-control" multiple="multiple" >
						<?php foreach ($suwar->data as $ss) { ?>
						<option value="<?= $ss->number; ?>" <?= in_array($ss->number, (array) $surah) ? 'selected="selected"' : ''; ?>><?= $ss->name; ?> (<?= $ss->englishName; ?>)</option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-4 languageSelectorDiv">
				<div class="form-group">
					<label for="languageSelector">Lanuages</label>
					<select id="languageSelector" name="language[]" multiple="multiple" title="Select Language" class="form-control" >
						<?php foreach (Generic::getLanguages() as  $l => $lang) { ?>
						<option value="<?= $l; ?>" <?= in_array($l, (array) $language) ? 'selected="selected"' : ''; ?> ><?= $lang ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="col-md-4 editionSelectorDiv">
				<div class="form-group">
					<label for="editionSelector">Editions</label>
					<select id="editionSelector" name="edition[]" multiple="multiple" title="Select Edition" class="form-control" >
						<?php foreach (Generic::getEditionsByLanguage($editions['editions']->data) as  $language => $editionz) { ?>
						<optgroup label="<?= $language; ?>">
							<?php foreach ($editionz as $e) { ?>
								<option value="<?= $e->identifier; ?>" <?= in_array($e->identifier, (array) $edition) ? 'selected="selected"' : ''; ?>><?= $e->name; ?></option>
							<?php } ?>
						</optgroup>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-11">
				<div class="form-group">
				<label for="sKeyword">Search for</label>
				<input type="text" name="keyword" id="sKeyword" value="<?= isset($keyword) ? (string) $keyword : ''; ?>" class="form-control" />
				</div>
			</div>
			<div class="col-md-1">
				<div class="form-group">
				<button type="submit" class="btn btn-primary">
					Search
				</button>
				</div>
			</div>
		</div>
		
	</form>
	<hr />

	<?php if (isset($results->data->count) && $results->data->count > 0) { ?>
	<div class="row">
		<div class="col-md-12">
			<p>
			<?= $results->data->count; ?> ayahs were found matching your search.
			</p>
		</div>
	</div>
	
	
	<?php $i =0; foreach($results->data->matches as $ayah) { $i++; ?>
	<div class="row">
		<div class="col-md-12">
			<?= $i . '. ' . str_replace([$keyword, strtolower($keyword), ucwords($keyword)], ['<span class="bg-warning">' . $keyword . '</span>', '<span class="bg-warning">' . strtolower($keyword) .'</span>', '<span class="bg-warning">' . ucwords($keyword) . '</span>'], $ayah->text); ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 lead">
			<span class="label label-default" style="margin-right: 10px;">
				<?= Ayah::renderAyahReferenceInLatin($ayah->surah->number, $ayah->numberInSurah); ?>  <?= $ayah->surah->englishName; ?>
			</span>
			<span class="linkify zoomIntoThisAyah" title="See just this Ayah" data-number="<?= $ayah->number; ?>/<?= $ayah->edition->identifier; ?>"><i class="glyphicon glyphicon-zoom-in"></i></span>
		</div>
		<div class="col-md-6 rtl lead">
			<span class="label label-default">
				<?= Ayah::renderAyahReferenceInArabic($ayah->surah->number, $ayah->numberInSurah); ?> <?= $ayah->surah->name; ?>	
		  </span>
		</div>
	</div>
	<div class="row">
			<div class="col-md-6 lead">
				<span class="label label-default">
				<?= $ayah->edition->englishName; ?>
			</span>
			</div>
			<div class="col-md-6 lead pull-right align-right">
				<span class="label label-default margin-left-15 ayahEditionName">
				<?= ucwords($ayah->edition->type); ?>
			</span>
			</div>
		</div>
	<hr />
	<?php } ?>
	<?php } else { ?>
		<div class="row">
		<div class="col-md-12">
			<p>
				Either we didn't find a result or you didn't specify a keyword.
			</p>
		</div>
	</div>
	<?php } ?>
</div>
<script>
$(function() {
	$('#editionSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true });
	$('#surahSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true });
	$('#languageSelector').multiselect({ enableFiltering: true, enableCaseInsensitiveFiltering: true });

	$('.zoomIntoThisAyah').on('click', function() {
				number = $(this).data('number');
				window.location.href = 'http://alquran.cloud/ayah/' + number;
			});
});
</script>
<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>