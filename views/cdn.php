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
        Al Quran Cloud provides an open CDN to serve ayah and surah audio files and Quran ayah images to allow you
        integrate media into your app. The documentation below explains how to access the media.
        Please note that the CDN is available over both http and https.
    </p>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <!-- AUDIO BY AYAH -->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <span class="label label-danger">GET</span>
                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Audio by Ayah
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Audio files by Ayah</h4>
                            <p>
                                Audio files by ayah are also referenced in the API responses for audio editions via
                                <a href="https://api.alquran.cloud/v1/edition/format/audio" target="_blank">https://api.alquran.cloud/v1/edition/format/audio</a>.
                                To use a particular edition for a surah to stream by ayah:
                                <a href="https://api.alquran.cloud/v1/surah/1/ar.alafasy" target="_blank">https://api.alquran.cloud/v1/surah/1/ar.alafasy</a>.
                            </p>
                            <p>
                                Ayah audio files can be accessed on the CDN directly via the following URL:
                            </p>
                            <code>
                                https://cdn.islamic.network/quran/audio/{bitrate}/{edition}/{number}.mp3
                            </code>
                            <ul>
                                <li>
                                    {edition} - An audio edition as returned by the API. (Example - ar.alafasy). A list
                                    of these editions is available here: <a
                                            href="http://api.alquran.cloud/edition/format/audio">http://api.alquran.cloud/edition/format/audio</a>
                                </li>
                                <li>
                                    {number} - An ayah number. The Quran contains 6236 ayahs, so this must be a number
                                    between 1 and 6236.
                                </li>
                                <li>
                                    {bitrate} - Quality of audio served. Acceptable values are 192, 128, 64, 48, 40 and
                                    32. You can see which edition is available in what sizes at <a
                                            href="https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn.txt"
                                            target="_blank">https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn.txt</a>.
                                </li>
                            </ul>
                            <p>
                                Examples:
                            </p>
                            <ul>
                                <li><a href="https://cdn.islamic.network/quran/audio/128/ar.alafasy/262.mp3"
                                       target="_blank">https://cdn.islamic.network/quran/audio/128/ar.alafasy/262.mp3</a>
                                </li>
                                <li><a href="https://cdn.islamic.network/quran/audio/64/ar.alafasy/262.mp3"
                                       target="_blank">https://cdn.islamic.network/quran/audio/64/ar.alafasy/262.mp3</a>
                                </li>

                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AUDIO BY SURAH -->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <span class="label label-danger">GET</span>
                    <a role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        Audio by Surah
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headinThree">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Audio files by Surah</h4>
                            <p>
                                Surah audio files are available to stream via the CDN.
                                Please note that surah audio files are not integrated with the API as the API deals with with ayah level detail.
                                For programmatic integration, you can use the JSON list of audio editions by surah at <a href="https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn_surah_audio.json">
                                        https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn_surah_audio.json
                                    </a>
                                Surah audio files can be accessed on the CDN directly via the following URL:
                            </p>
                            <code>
                                https://cdn.islamic.network/quran/audio-surah/{bitrate}/{edition}/{number}.mp3
                            </code>

                            <ul>
                                <li>
                                    {edition} - An audio edition available on
                                    <a href="https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn_surah_audio.json">
                                        https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn_surah_audio.json
                                    </a>. (Example - ar.alafasy).
                                </li>
                                <li>
                                    {number} - A surah number. The Quran contains 114 ayahs, so this must be a number
                                    between 1 and 114.
                                </li>
                                <li>
                                    {bitrate} - Quality of audio served. Different editions are available at different bitrates. 
                                    You can see which edition is available at what bitrate on <a href="https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn_surah_audio.json">
                                        https://raw.githubusercontent.com/islamic-network/cdn/master/info/cdn_surah_audio.json
                                    </a>
                                </li>

                            </ul>
                            <p>
                                Examples:
                            </p>
                            <ul>
                                <li><a href="https://cdn.islamic.network/quran/audio-surah/128/ar.alafasy/1.mp3"
                                       target="_blank">https://cdn.islamic.network/quran/audio-surah/128/ar.alafasy/1.mp3</a>
                                </li>
                                <li><a href="https://cdn.islamic.network/quran/audio-surah/128/ar.alafasy/114.mp3"
                                       target="_blank">https://cdn.islamic.network/quran/audio-surah/128/ar.alafasy/114.mp3</a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- IMAGES -->
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse"
                                                                   data-parent="#accordion" href="#collapseTwo"
                                                                   aria-expanded="true" aria-controls="collapseTwo">Ayah
                        Images - Get Quran Ayah Images
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                Image files can be accessed via the CDN in normal and high resolution using the
                                following URLs:
                            </p>
                            <code>
                                https://cdn.islamic.network/quran/images/{surah}_{ayah}.png
                            </code>
                            or
                            <code>
                                https://cdn.islamic.network/quran/images/high-resolution/{surah}_{ayah}.png
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
                                <li><a href="http://cdn.islamic.network/quran/images/2_255.png" target="_blank">http://cdn.islamic.network/quran/images/2_255.png</a>
                                </li>
                                <li><a href="http://cdn.islamic.network/quran/images/24_35.png" target="_blank">http://cdn.islamic.network/quran/images/24_35.png</a>
                                </li>
                                <li><a href="http://cdn.islamic.network/quran/images/high-resolution/100_1.png"
                                       target="_blank">http://cdn.islamic.network/quran/images/high-resolution/100_1.png</a>
                                </li>
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
