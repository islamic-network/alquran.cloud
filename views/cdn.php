<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<div class="container">
    <div class="lead font-kitab align-center">
        بِسْمِ ٱللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
    </div>
    <h4>
        Al Quran Content Delivery Network (CDN)
    </h4>
    <p>
        Al Quran Cloud provides an open CDN to serve audio files and Quran ayah images to allow you
        integrate media into your app. The documentation below explains how to access the media. Please note that the CDN is available over both http and https. 
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
                            <h4>CDN</h4>
                            <p>
                                This CDN is also referenced in the API responses for audioeditions.
                            </p>
                            <p>
                                Audio files can be accessed via the following URL:
                            </p>
                            <code>
                                https://cdn.islamic.network/quran/audio/{bitrate}/{edition}/{number}.mp3
                            </code>
                            <ul>
                                <li>
                                {edition} - An audio edition as returned by the API. (Example - ar.alafasy). A list of these editions is available here: <a href="http://api.alquran.cloud/edition/format/audio">http://api.alquran.cloud/edition/format/audio</a>
                                </li>
                                <li>
                                {number} - An ayah number. the Quran contains 6236 ayahs, so this must be a number between 1 and 6236.
                                </li>
                                <li>
                                {bitrate} - Quality of audio served. Acceptable values are 192, 128, 64, 48, 40 and 32. You can see which edition is available in what sizes at <a href="https://raw.githubusercontent.com/islamic-network/api.alquran.cloud/master/cdn.txt" target="_blank">https://raw.githubusercontent.com/islamic-network/api.alquran.cloud/master/cdn.txt</a>.
                                </li>
                            </ul>
                             <p>
                                Examples:
                            </p>
                            <ul>
                                <li><a href="https://cdn.islamic.network/quran/audio/128/ar.alafasy/262.mp3" target="_blank">https://cdn.islamic.network/quran/audio/128/ar.alafasy/262.mp3</a></li>
                                <li><a href="https://cdn.islamic.network/quran/audio/64/ar.alafasy/262.mp3" target="_blank">https://cdn.islamic.network/quran/audio/64/ar.alafasy/262.mp3</a></li>
                                
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
                               Image files can be accessed via the 2 CDNs using the following URLs:
                            </p>
                            <code>
                                https://cdn.alquran.cloud/media/image/{surah}/{ayah}
                            </code>
                                or
                            <code>
                                https://cdn.islamic.network/quran/images/{surah}_{ayah}.png
                            </code>
                            <ul>
                                <li>
                                {surah} - A surah number (from 1 to 114) 
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
                                <li><a href="http://cdn.islamic.network/quran/images/2_255.png" target="_blank">http://cdn.islamic.network/quran/images/2_255.png</a></li>
                                <li><a href="http://cdn.islamic.network/quran/images/24_35.png" target="_blank">http://cdn.islamic.network/quran/images/24_35.png</a></li>
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
