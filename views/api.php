<?php require_once('../vendor/alquran/alquran-cloud-template/template/header.php'); ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/navigation.php'); ?>
<?php // ================================================================ // ?>
<div class="container">
    <div class="lead font-uthmani align-center">
        بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ
    </div>
    <div class="page-header">
    <h4>
        Quran API Documentation  
    </h4>
    </div>
    <p>
        The following endpoints are supported by the Quran API. They all support the HTTP GET method and return JSON.    </p>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
          <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Edition - Available text and audio editions
        </a>
      </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <p>
                        All these endpoints give you a JSON object describing an edition. From this object, you need to use the identifer to get data from other endpoints in this API. For any of the endpoints that require an edition identifier, if you do not specify one, 'quran-simple' is used and returns the Arabic text of the Holy Quran.
                    </p>
                    <div class="row">
                        <div class="col-md-4 bold">
                            Endpoint
                        </div>
                        <div class="col-md-4 bold">
                            Description
                        </div>
                        <div class="col-md-4 bold">
                            Example
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            1. http://api.alquran.cloud/edition
                        </div>
                        <div class="col-md-4">
                            Lists all available editions. You can filter the results using the parameters below.
                            <h4>
                                Parameters
                            </h4>
                            <ul>
                                <li>format -  Specify a format. 'text' or 'audio</li>
                                <li>language - A 2 digit language code. Example: 'en', 'fr', etc.</li>
                                <li>type - A valid type. Example - 'versebyverse', 'translation' etc.</li>
                                
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li>
                                    <a href="http://api.alquran.cloud/edition" target="_blank">http://api.alquran.cloud/edition</a> - Lists all editions
                                </li>
                                <li>
                                <a href="http://api.alquran.cloud/edition?format=audio&language=fr&type=versebyverse" target="_blank">http://api.alquran.cloud/edition?format=audio&language=fr&type=versebyverse</a> - Lists all audio editions in french of the versebyverse type
                                </li>
                            </ol>
                            
                            
                            
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-4">
                            2. http://api.alquran.cloud/edition/language
                        </div>
                        <div class="col-md-4">
                            Lists all languages in which editions are available
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/edition/language" target="_blank">http://api.alquran.cloud/language</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            3. http://api.alquran.cloud/edition/language/{{language}}
                        </div>
                        <div class="col-md-4">
                            Lists all editions for a given language<br />
                            {{language}} is a 2 digit language code. Example: en for English, fr for French, ar for Arabic
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/edition/language/en" target="_blank">http://api.alquran.cloud/language/en</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            4. http://api.alquran.cloud/edition/type
                        </div>
                        <div class="col-md-4">
                            Lists all types of editions
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/edition/type" target="_blank">http://api.alquran.cloud/type</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            5. http://api.alquran.cloud/edition/type/{{type}}
                        </div>
                        <div class="col-md-4">
                            Lists all editions for a given type<br />
                            {{type}} can be 'translation', 'tafsir' or another result returned in 4 above
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/edition/type/translation" target="_blank">http://api.alquran.cloud/type/translation</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            6. http://api.alquran.cloud/edition/format
                        </div>
                        <div class="col-md-4">
                            Lists all formats
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/edition/format" target="_blank">http://api.alquran.cloud/format</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            7. http://api.alquran.cloud/edition/format/{{format}}
                        </div>
                        <div class="col-md-4">
                            Lists all editions for a given format<br />
                            {{format}} can be 'audio' or 'text'
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/edition/format/text" target="_blank">http://api.alquran.cloud/format/text</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Quran - Get a complete Quran edition
        </a>
      </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <p>
                        NOTE that audio and text edition responses differ. See examples for the response.
                    </p>
                    <div class="row">
                        <div class="col-md-4 bold">
                            Endpoint
                        </div>
                        <div class="col-md-4 bold">
                            Description
                        </div>
                        <div class="col-md-4 bold">
                            Example
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            1. http://api.alquran.cloud/quran/{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns a complete Quran edition in the audio or text format<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/quran/en.asad" target="_blank">http://api.alquran.cloud/quran/en.asad</a> - (Text) Returns Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/quran/quran-simple" target="_blank">http://api.alquran.cloud/quran/quran-simple</a> - (Text) Returns the text of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/quran/ar.alafasy" target="_blank">http://api.alquran.cloud/quran/ar.alafasy</a> - (Audio) Returns Mishary Alafasy's recitation of the Quran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Juz - Get a Juz of the Quran
        </a>
      </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <p>
                        The Quran has 30 Juz. You can get the text for each Juz using the endpoint below.

                    </p>
                    <div class="row">
                        <div class="col-md-4 bold">
                            Endpoint
                        </div>
                        <div class="col-md-4 bold">
                            Description
                        </div>
                        <div class="col-md-4 bold">
                            Example
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            1. http://api.alquran.cloud/juz/{{juz}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            <p>
                            Returns the requested juz from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                            </p>
                            <b>Optional Parameters:</b>
                            <ul>
                               <li>offset - Offset ayahs in a juz by the given number</li> 
                                <li>limit - This is the number of ayahs that the response will be limited to.</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/juz/30/en.asad" target="_blank">http://api.alquran.cloud/juz/30/en.asad</a> - Returns Juz 30 from Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/juz/30/quran-simple" target="_blank">http://api.alquran.cloud/juz/30/quran-simple</a> - Returns the text of Juz 30 the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/juz/1/quran-simple?offset=3&limit=10" target="_blank">http://api.alquran.cloud/juz/1/quran-simple?offset=3&limit=10</a> - Returns the the ayahs 4-13 from Juz 1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingFour">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Surah - Get a Surah of the Quran
        </a>
      </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                <div class="panel-body">
                    <p>
                        The Quran has 114 Surahs. You can get a list of all of them or all the ayahs for a particular surah using the endpoints below.
                    </p>
                    <div class="row">
                        <div class="col-md-4 bold">
                            Endpoint
                        </div>
                        <div class="col-md-4 bold">
                            Description
                        </div>
                        <div class="col-md-4 bold">
                            Example
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            1. http://api.alquran.cloud/surah
                        </div>
                        <div class="col-md-4">
                            Returns the list of Surahs in the Quran<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                            <b>Optional Parameters:</b>
                            <ul>
                               <li>offset - Offset ayahs in a juz by the given number</li> 
                                <li>limit - This is the number of ayahs that the response will be limited to.</li>
                            </ul>
                        </div>
                        <div class="col-md-4"><a href="http://api.alquran.cloud/surah" target="_blank">http://api.alquran.cloud/surah</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            2. http://api.alquran.cloud/surah/{{surah}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns the requested surah from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li>
                                    <a href="http://api.alquran.cloud/surah/114/en.asad" target="_blank">http://api.alquran.cloud/surah/114/en.asad</a> - Returns Surat An-Naas from Muhammad Asad's translation of the Holy Quran
                                </li>
                                <li>
                                    <a href="http://api.alquran.cloud/surah/114/ar.alafasy" target="_blank">http://api.alquran.cloud/surah/114/ar.alafasy</a> - Returns Mishary Alafasy's recitation of Surat An-Naas
                                </li>
                                <li>
                                    <a href="http://api.alquran.cloud/surah/114" target="_blank">http://api.alquran.cloud/surah/114</a> - Returns Arabic text of Surat An-Naas
                                </li>
                                <li>
                                    <a href="http://api.alquran.cloud/surah/1?offset=1&limit=3" target="_blank">http://api.alquran.cloud/surah/1?offset=1&limit=3</a> - Returns verses 2-4 of Surah Al-Fatiha
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            3. http://api.alquran.cloud/surah/{{surah}}/editions/{{edition}},{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns the requested surah from multiple  editions<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation. You can specify multiple identifiers separated by a comma.
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li>
                                    <a href="http://api.alquran.cloud/surah/114/editions/quran-simple,en.asad,en.pickthall" target="_blank">http://api.alquran.cloud/surah/114/editions/quran-simple,en.asad,en.pickthall</a> - Returns Surat An-Naas from 3 editions: Simple Quran, Muhammad Asad and Marmaduke Pickthall
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingFive">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive">Ayah - Get an Ayah of the Quran
        </a>
      </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                <div class="panel-body">
                    <p>
                        The Quran contains 6236 verses. With this endpoint, you can retrieve any of those verses.
                    </p>
                    <div class="row">
                        <div class="col-md-4 bold">
                            Endpoint
                        </div>
                        <div class="col-md-4 bold">
                            Description
                        </div>
                        <div class="col-md-4 bold">
                            Example
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            1. http://api.alquran.cloud/ayah/{{reference}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns an ayah for a given edition.<br />
                            {{reference}} here can be the ayah number or the surah:ayah. For instance, 262 or 2:255 will both get you Ayat Al Kursi<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/ayah/262/en.asad" target="_blank">http://api.alquran.cloud/ayah/262</a> - (Text) Returns Muhammad Asad's translation Ayat Al Kursi</li>
                                <li><a href="http://api.alquran.cloud/ayah/2:255/en.asad" target="_blank">http://api.alquran.cloud/ayah/2:255</a> - (Text) Returns Muhammad Asad's translation Ayat Al Kursi</li>
                                <li><a href="http://api.alquran.cloud/ayah/262/ar.alafasy" target="_blank">http://api.alquran.cloud/ayah/262/ar.alafasy</a> - (Audio) Returns Mishary Alafasy's recitation of the Ayat Al Kursi</li>
                                <li><a href="http://api.alquran.cloud/ayah/262" target="_blank">http://api.alquran.cloud/ayah/262</a> - (Text) Returns the Arabic text of Ayat Al Kursi</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            2. http://api.alquran.cloud/ayah/{{reference}}/editions/{{edition}},{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns an ayah for multiple edtitions.<br />
                            {{reference}} here can be the ayah number or the surah:ayah. For instance, 262 or 2:255 will both get you Ayat Al Kursi<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation. You can specify multiple editions separated by a comma
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/ayah/262/editions/quran-simple,en.asad,en.pickthall" target="_blank">http://api.alquran.cloud/ayah/262/editions/quran-simple,en.asad,en.pickthall</a> - (Text) Returns Ayat Al Kursi from 3 editions: Simple Quran, Muhammad Asad and Maramduke Pickthall</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingSix">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix">Search - Search the text of the Quran
        </a>
      </h4>
            </div>
            <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                <div class="panel-body">
                    <p>
                        Please note that only text editions of the Quran are searchable.
                    </p>
                    <div class="row">
                        <div class="col-md-4 bold">
                            Endpoint
                        </div>
                        <div class="col-md-4 bold">
                            Description
                        </div>
                        <div class="col-md-4 bold">
                            Example
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-4">
                            1. http://api.alquran.cloud/search/{{keyword}}/{{surah}}/{{edition or language}}
                        </div>
                        <div class="col-md-4">
                            Returns ayahs that match a keyword in a given edition or language. If you do not specify an edition or language, all english language texts are searched.<br />
                            {{surah}} Enter a surah number (between 1 and 114) to search a specific surah or 'all' to search all the text
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation<br />
                            {language} is 2 digit alpha language code. Example: en for English, fr for french
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/search/Abraham/all/en" target="_blank">http://api.alquran.cloud/search/Abraham/all/en</a> - (Text) Returns all ayahs that contain the word 'Abraham' in all the english  editions</li>
                                <li><a href="http://api.alquran.cloud/search/Abraham/all/en.pickthall" target="_blank">http://api.alquran.cloud/search/Abraham/all/en.pickthall</a> - (Text) Returns all ayahs that contain the word 'Abraham' in Maramduke Pickthall's English translation</li>
                                <li><a href="http://api.alquran.cloud/search/Abraham/37/en.pickthall" target="_blank">http://api.alquran.cloud/search/Abraham/37/en.pickthall</a> - (Text) Returns all ayahs that contain the word 'Abraham' Surat As-Saafaat in Maramduke Pickthall's English translation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php // ================================================================ // ?>
<?php require_once('../vendor/alquran/alquran-cloud-template/template/footer.php'); ?>

