<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<?php use AlQuranCloud\Renderer\Generic; ?>

<div class="container">
	<div class="lead font-uthmani align-center">
		بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ
	</div>
	<div class="page-header">
		<h4><?= $pageTitle; ?></h4>		
	</div>

	<div class="row">
        <div class="col-md-12">
            <h5>Ahmad Al Nafees</h5>
			<audio id="adhanPlayer" controls="controls" class="align-right">	
				<source src="http://aladhan.com/media/a1.mp3" title="Ahmad Al Nafees" type="audio/mp3" />
			</audio>
		</div>
    </div>
    <hr />
	<div class="row">
        <div class="col-md-12">
            <h5>Hafiz Mustafa Özcan</h5>
			<audio id="adhanPlayer1" controls="controls" class="align-right">	
				<source src="http://aladhan.com/media/a2.mp3" title="Hafiz Mustafa Ozcan" type="audio/mp3" />
			</audio>
		</div>
	</div>
    <hr />
	<div class="row">
        <div class="col-md-12">
            <h5>Mishary Al Afasy 1</h5>
			<audio id="adhanPlayer2" controls="controls" class="align-right">	
				<source src="http://aladhan.com/media/a7.mp3" title="Mishary Al Afasy 1" type="audio/mp3" />
			</audio>
		</div>
	</div>
    <hr />
	<div class="row">
        <div class="col-md-12">
            <h5>Mishary Al Afasy 2</h5>
			<audio id="adhanPlayer3" controls="controls" class="align-right">	
				<source src="http://aladhan.com/media/a9.mp3" title="Mishary Al Afasy 2" type="audio/mp3" />
			</audio>
		</div>
	</div>
    <hr />
	<div class="row">
        <div class="col-md-12">
            <h5>All</h5>
			<audio id="adhanPlayerAll" controls="controls" class="align-right">	
				<source src="http://aladhan.com/media/a1.mp3" title="Ahmad Al Nafees" type="audio/mp3" />
				<source src="http://aladhan.com/media/a2.mp3" title="Hafiz Mustafa Ozcan" type="audio/mp3" />
				<source src="http://aladhan.com/media/a7.mp3" title="Mishary Al Afasy 1" type="audio/mp3" />
				<source src="http://aladhan.com/media/a9.mp3" title="Mishary Al Afasy 2" type="audio/mp3" />
			</audio>
		</div>
	</div>
</div>

<script src="http://islamcdn.com/quran/public/libraries/mediaelementjs-2.21.2/build/mediaelement-and-player.js"></script>
<script src="http://islamcdn.com/quran/public/libraries/mep-feature-playlist/mep-feature-playlist.js"></script>
<script src="http://islamcdn.com/quran/public/js/jquery.mediaplayer.js"></script>
<script src="http://islamcdn.com/quran/public/js/jquery.surah.js"></script>

<script>
$(function() {
	$.alQuranMediaPlayer.getAyahPlayer('#adhanPlayer');		
	$.alQuranMediaPlayer.getAyahPlayer('#adhanPlayer1');		
	$.alQuranMediaPlayer.getAyahPlayer('#adhanPlayer2');		
	$.alQuranMediaPlayer.getAyahPlayer('#adhanPlayer3');		
	$.alQuranMediaPlayer.getSurahPlayer('#adhanPlayerAll');		
});
</script>

<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
