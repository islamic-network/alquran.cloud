<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<div class="container">
    <div class="lead font-uthmani align-center">
        بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ
    </div>
    <h4>
        Al Quran Content Delivery Network (CDN)
    </h4>
    <p>
        Al Quran Cloud provides an open CDN to serve audio files and Quran ayah images to allow you
        integrate media into your app. The documentation below explains how to access the media. 
    </p>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
          <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Audio - Stream Audio Files
        </a>
      </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                Audio files can be accessed via the CDN using the following URL:
                            </p>
                            <code>
                                http://cdn.alquran.cloud/media/audio/ayah/{edition}/{number}/{quality}
                            </code>
                            <ul>
                                <li>
                                {edition} - An audio edition as returned by the API. (Example - ar.alafasy). A list of these editions is available here: <a href="http://api.alquran.cloud/edition/format/audio">http://api.alquran.cloud/edition/format/audio</a>
                                </li>
                                <li>
                                {number} - An ayah number. the Quran contains 6236 ayahs, so this must be a number between 1 and 6236.
                                </li>
                                <li>
                                {quality} - Quality of audio served. Acceptable values are 'high' or 'low'. Do not specify if you want medium quality. Example: http://cdn.alquran.cloud/audio/ayah/ar.alafasy/262 will return a medium quality file for Ayat al Kursi.
                                </li>
                            </ul>
                             <p>
                                Examples:
                            </p>
                            <ul>
                                <li><a href="http://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/262" target="_blank">http://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/262</a></li>
                                <li><a href="http://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/262/low" target="_blank">http://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/262/low</a></li>
                                <li><a href="http://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/262/high" target="_blank">http://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/262/high</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Ayah Images - Get Quran Ayah Images
        </a>
      </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               Image files can be accessed via the CDN using the following URL:
                            </p>
                            <code>
                                http://cdn.alquran.cloud/media/image/{surah}/{ayah}
                            </code>
                            <ul>
                                <li>
                                {surah} - An audio edition as returned by the API. (Example - ar.alafasy). A list of these editions is available here: <a href="http://api.alquran.cloud/edition/format/audio">http://api.alquran.cloud/edition/format/audio</a>
                                </li>
                                <li>
                                {ayah} - An ayah number relative to the surah
                                </li>
                            </ul>
                            <p>
                                Examples:
                            </p>
                            <ul>
                                <li><a href="http://cdn.alquran.cloud/media/image/2/255" target="_blank">http://cdn.alquran.cloud/media/image/2/255</a></li>
                                <li><a href="http://cdn.alquran.cloud/media/image/24/35" target="_blank">http://cdn.alquran.cloud/media/image/24/35</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
