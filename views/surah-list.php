<?php require_once('../vendor/alquran/alquran-cloud-template/template/header.php'); ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Generic; ?>

<div class="container">
	<div class="lead font-uthmani align-center style-ayah">
		بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ
	</div>
	<div class="page-header">
		<h4>
			Read the Quran by Juz
		</h4>
	</div>
	<?php $count=0; foreach ($suwar->data as $surah) { $count++; ?>
	<div class="row surahRow">
		<div class="col-md-6 ltr">
			<a href="/surah/<?= $surah->number; ?>">
				<p class="lead">
					<?=$count; ?>. <?= $surah->englishName; ?> (<?= $surah->englishNameTranslation; ?>)
					<br />
					<?= $surah->numberOfAyahs; ?> Ayahs
				</p>
			</a>
		</div>
		<div class="col-md-6 rtl">
			<a href="/surah/<?= $surah->number; ?>">
				<p class="lead"><?= $surah->name; ?></p>
				<?= Generic::latinToArabicNumerals($surah->numberOfAyahs); ?> آيات 
			</a>
		</div>
	</div>
	<?php } ?>
</div>


<?php // ================================================================ // ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/footer.php'); ?>