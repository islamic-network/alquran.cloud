<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<div class="container">
    <div class="lead font-uthmani align-center">
        بِسْمِ ٱللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
    </div>
    <h4>
        Quran API Documentation
    </h4>
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
                        All these endpoints give you a JSON object describing an edition. From this object, you need to use the identifier to get data from other endpoints in this API. For any of the endpoints that require an edition identifier, if you do not specify one, 'quran-uthmani' is used and returns the Arabic text of the Holy Quran.
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
                            1. http://api.alquran.cloud/v1/edition
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
                                    <a href="http://api.alquran.cloud/v1/edition" target="_blank">http://api.alquran.cloud/v1/edition</a> - Lists all editions
                                </li>
                                <li>
                                <a href="http://api.alquran.cloud/v1/edition?format=audio&language=fr&type=versebyverse" target="_blank">http://api.alquran.cloud/v1/edition?format=audio&language=fr&type=versebyverse</a> - Lists all audio editions in french of the versebyverse type
                                </li>
                            </ol>



                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-4">
                            2. http://api.alquran.cloud/v1/edition/language
                        </div>
                        <div class="col-md-4">
                            Lists all languages in which editions are available
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/v1/edition/language" target="_blank">http://api.alquran.cloud/v1/language</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            3. http://api.alquran.cloud/v1/edition/language/{{language}}
                        </div>
                        <div class="col-md-4">
                            Lists all editions for a given language<br />
                            {{language}} is a 2 digit language code. Example: en for English, fr for French, ar for Arabic
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/v1/edition/language/en" target="_blank">http://api.alquran.cloud/v1/language/en</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            4. http://api.alquran.cloud/v1/edition/type
                        </div>
                        <div class="col-md-4">
                            Lists all types of editions
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/v1/edition/type" target="_blank">http://api.alquran.cloud/v1/type</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            5. http://api.alquran.cloud/v1/edition/type/{{type}}
                        </div>
                        <div class="col-md-4">
                            Lists all editions for a given type<br />
                            {{type}} can be 'translation', 'tafsir' or another result returned in 4 above
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/v1/edition/type/translation" target="_blank">http://api.alquran.cloud/v1/type/translation</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            6. http://api.alquran.cloud/v1/edition/format
                        </div>
                        <div class="col-md-4">
                            Lists all formats
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/v1/edition/format" target="_blank">http://api.alquran.cloud/v1/format</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            7. http://api.alquran.cloud/v1/edition/format/{{format}}
                        </div>
                        <div class="col-md-4">
                            Lists all editions for a given format<br />
                            {{format}} can be 'audio' or 'text'
                        </div>
                        <div class="col-md-4">
                            <a href="http://api.alquran.cloud/v1/edition/format/text" target="_blank">http://api.alquran.cloud/v1/format/text</a>
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
                            1. http://api.alquran.cloud/v1/quran/{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns a complete Quran edition in the audio or text format<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/quran/en.asad" target="_blank">http://api.alquran.cloud/v1/quran/en.asad</a> - (Text) Returns Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/quran/quran-uthmani" target="_blank">http://api.alquran.cloud/v1/quran/quran-uthmani</a> - (Text) Returns the text of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/quran/ar.alafasy" target="_blank">http://api.alquran.cloud/v1/quran/ar.alafasy</a> - (Audio) Returns Mishary Alafasy's recitation of the Quran</li>
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
                            1. http://api.alquran.cloud/v1/juz/{{juz}}/{{edition}}
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
                                <li><a href="http://api.alquran.cloud/v1/juz/30/en.asad" target="_blank">http://api.alquran.cloud/v1/juz/30/en.asad</a> - Returns Juz 30 from Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/juz/30/quran-uthmani" target="_blank">http://api.alquran.cloud/v1/juz/30/quran-uthmani</a> - Returns the text of Juz 30 of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/juz/1/quran-uthmani?offset=3&limit=10" target="_blank">http://api.alquran.cloud/v1/juz/1/quran-uthmani?offset=3&limit=10</a> - Returns the the ayahs 4-13 from Juz 1</li>
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
                            1. http://api.alquran.cloud/v1/surah
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
                        <div class="col-md-4"><a href="http://api.alquran.cloud/v1/surah" target="_blank">http://api.alquran.cloud/v1/surah</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            2. http://api.alquran.cloud/v1/surah/{{surah}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns the requested surah from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li>
                                    <a href="http://api.alquran.cloud/v1/surah/114/en.asad" target="_blank">http://api.alquran.cloud/v1/surah/114/en.asad</a> - Returns Surat An-Naas from Muhammad Asad's translation of the Holy Quran
                                </li>
                                <li>
                                    <a href="http://api.alquran.cloud/v1/surah/114/ar.alafasy" target="_blank">http://api.alquran.cloud/v1/surah/114/ar.alafasy</a> - Returns Mishary Alafasy's recitation of Surat An-Naas
                                </li>
                                <li>
                                    <a href="http://api.alquran.cloud/v1/surah/114" target="_blank">http://api.alquran.cloud/v1/surah/114</a> - Returns Arabic text of Surat An-Naas
                                </li>
                                <li>
                                    <a href="http://api.alquran.cloud/v1/surah/1?offset=1&limit=3" target="_blank">http://api.alquran.cloud/v1/surah/1?offset=1&limit=3</a> - Returns verses 2-4 of Surah Al-Fatiha
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            3. http://api.alquran.cloud/v1/surah/{{surah}}/editions/{{edition}},{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns the requested surah from multiple  editions<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation. You can specify multiple identifiers separated by a comma.
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li>
                                    <a href="http://api.alquran.cloud/v1/surah/114/editions/quran-uthmani,en.asad,en.pickthall" target="_blank">http://api.alquran.cloud/v1/surah/114/editions/quran-uthmani,en.asad,en.pickthall</a> - Returns Surat An-Naas from 3 editions: Simple Quran, Muhammad Asad and Marmaduke Pickthall
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
                            1. http://api.alquran.cloud/v1/ayah/{{reference}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns an ayah for a given edition.<br />
                            {{reference}} here can be the ayah number or the surah:ayah. For instance, 262 or 2:255 will both get you Ayat Al Kursi<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/ayah/262/en.asad" target="_blank">http://api.alquran.cloud/v1/ayah/262</a> - (Text) Returns Muhammad Asad's translation Ayat Al Kursi</li>
                                <li><a href="http://api.alquran.cloud/v1/ayah/2:255/en.asad" target="_blank">http://api.alquran.cloud/v1/ayah/2:255</a> - (Text) Returns Muhammad Asad's translation Ayat Al Kursi</li>
                                <li><a href="http://api.alquran.cloud/v1/ayah/262/ar.alafasy" target="_blank">http://api.alquran.cloud/v1/ayah/262/ar.alafasy</a> - (Audio) Returns Mishary Alafasy's recitation of the Ayat Al Kursi</li>
                                <li><a href="http://api.alquran.cloud/v1/ayah/262" target="_blank">http://api.alquran.cloud/v1/ayah/262</a> - (Text) Returns the Arabic text of Ayat Al Kursi</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            2. http://api.alquran.cloud/v1/ayah/{{reference}}/editions/{{edition}},{{edition}}
                        </div>
                        <div class="col-md-4">
                            Returns an ayah for multiple edtitions.<br />
                            {{reference}} here can be the ayah number or the surah:ayah. For instance, 262 or 2:255 will both get you Ayat Al Kursi<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation. You can specify multiple editions separated by a comma
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/ayah/262/editions/quran-uthmani,en.asad,en.pickthall" target="_blank">http://api.alquran.cloud/v1/ayah/262/editions/quran-uthmani,en.asad,en.pickthall</a> - (Text) Returns Ayat Al Kursi from 3 editions: Simple Quran, Muhammad Asad and Maramduke Pickthall</li>
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
                            1. http://api.alquran.cloud/v1/search/{{keyword}}/{{surah}}/{{edition or language}}
                        </div>
                        <div class="col-md-4">
                            Returns ayahs that match a keyword in a given edition or language. If you do not specify an edition or language, all english language texts are searched.<br />
                            {{surah}} Enter a surah number (between 1 and 114) to search a specific surah or 'all' to search all the text
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation<br />
                            {language} is 2 digit alpha language code. Example: en for English, fr for french
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/search/Abraham/all/en" target="_blank">http://api.alquran.cloud/v1/search/Abraham/all/en</a> - (Text) Returns all ayahs that contain the word 'Abraham' in all the english  editions</li>
                                <li><a href="http://api.alquran.cloud/v1/search/Abraham/all/en.pickthall" target="_blank">http://api.alquran.cloud/v1/search/Abraham/all/en.pickthall</a> - (Text) Returns all ayahs that contain the word 'Abraham' in Maramduke Pickthall's English translation</li>
                                <li><a href="http://api.alquran.cloud/v1/search/Abraham/37/en.pickthall" target="_blank">http://api.alquran.cloud/v1/search/Abraham/37/en.pickthall</a> - (Text) Returns all ayahs that contain the word 'Abraham' Surat As-Saafaat in Maramduke Pickthall's English translation</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingSeven">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">Manzil - Get a Manzil of the Quran
        </a>
      </h4>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                <div class="panel-body">
                    <p>
                        The Quran has 7 Manzils (for those who want to read / recite it over one week). You can get the text for each Manzil using the endpoint below.
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
                            1. http://api.alquran.cloud/v1/manzil/{{manzil}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            <p>
                            Returns the requested manzil from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                            </p>
                            <b>Optional Parameters:</b>
                            <ul>
                               <li>offset - Offset ayahs in a manzil by the given number</li>
                                <li>limit - This is the number of ayahs that the response will be limited to.</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/manzil/7/en.asad" target="_blank">http://api.alquran.cloud/v1/manzil/7/en.asad</a> - Returns manzil 7 from Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/manzil/7/quran-uthmani" target="_blank">http://api.alquran.cloud/v1/manzil/7/quran-uthmani</a> - Returns the text of Manzil 7 of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/manzil/7/quran-uthmani?offset=3&limit=10" target="_blank">http://api.alquran.cloud/v1/manzil/7/quran-uthmani?offset=3&limit=10</a> - Returns the the ayahs 4-13 from Manzil 7</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingEight">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="true" aria-controls="collapseEight">Ruku - Get a Ruku of the Quran
        </a>
        </h4>
            </div>
            <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                <div class="panel-body">
                    <p>
                        The Quran has 556 Rukus. You can get the text for each Ruku using the endpoint below.
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
                            1. http://api.alquran.cloud/v1/ruku/{{ruku}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            <p>
                            Returns the requested ruku from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                            </p>
                            <b>Optional Parameters:</b>
                            <ul>
                               <li>offset - Offset ayahs in a ruku by the given number</li>
                                <li>limit - This is the number of ayahs that the response will be limited to.</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/ruku/7/en.asad" target="_blank">http://api.alquran.cloud/v1/ruku/7/en.asad</a> - Returns ruku 7 from Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/ruku/7/quran-uthmani" target="_blank">http://api.alquran.cloud/v1/ruku/7/quran-uthmani</a> - Returns the text of ruku 7 of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/ruku/7/quran-uthmani?offset=3&limit=3" target="_blank">http://api.alquran.cloud/v1/ruku/7/quran-uthmani?offset=3&limit=3</a> - Returns the the ayahs 4-6 from ruku 7</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingNine">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="true" aria-controls="collapseNine">Page - Get a Page of the Quran
        </a>
        </h4>
            </div>
            <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                <div class="panel-body">
                    <p>
                        The Quran is traditionally printed / written on 604 pages. You can get the text for each page using the endpoint below.
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
                            1. http://api.alquran.cloud/v1/page/{{page}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            <p>
                            Returns the requested page from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                            </p>
                            <b>Optional Parameters:</b>
                            <ul>
                               <li>offset - Offset ayahs in a page by the given number</li>
                                <li>limit - This is the number of ayahs that the response will be limited to.</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/page/1/en.asad" target="_blank">http://api.alquran.cloud/v1/page/1/en.asad</a> - Returns page 1 from Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/page/1/quran-uthmani" target="_blank">http://api.alquran.cloud/v1/page/1/quran-uthmani</a> - Returns the text of page 1 of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/page/1/quran-uthmani?offset=2&limit=2" target="_blank">http://api.alquran.cloud/v1/page/1/quran-uthmani?offset=2&limit=2</a> - Returns the the ayahs 3-4 from page 1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingTen">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="true" aria-controls="collapseTen">Hizb Quarter - Get a Hizb Quarter of the Quran
        </a>
        </h4>
            </div>
            <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
                <div class="panel-body">
                    <p>
                        The Quran comprises 240 Hizb Quarters. One Hizb is half a Juz.
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
                            1. http://api.alquran.cloud/v1/hizbQuarter/{{hizb}}/{{edition}}
                        </div>
                        <div class="col-md-4">
                            <p>
                            Returns the requested Hizb Quarter from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                            </p>
                            <b>Optional Parameters:</b>
                            <ul>
                               <li>offset - Offset ayahs in a hizb quarter by the given number</li>
                                <li>limit - This is the number of ayahs that the response will be limited to.</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/hizbQuarter/1/en.asad" target="_blank">http://api.alquran.cloud/v1/hizbQuarter/1/en.asad</a> - Returns hizb quarter 1 from Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/hizbQuarter/1/quran-uthmani" target="_blank">http://api.alquran.cloud/v1/hizbQuarter/1/quran-uthmani</a> - Returns the text of hizb quarater 1 of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/hizbQuarter/1/quran-uthmani?offset=2&limit=2" target="_blank">http://api.alquran.cloud/v1/hizbQuarter/1/quran-uthmani?offset=2&limit=2</a> - Returns the the ayahs 3-4 from hizb Quarter 1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingEleven">
                <h4 class="panel-title">
        <span class="label label-danger">GET</span> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">Sajda - Get all verses requiring Sajda / Prostration in the Quran
        </a>
        </h4>
            </div>
            <div id="collapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEleven">
                <div class="panel-body">
                    <p>
                        Depending on the madhab, there can be 14, 15 or 16 sajdas. This API has 15.
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
                            1. http://api.alquran.cloud/v1/sajda/{{edition}}
                        </div>
                        <div class="col-md-4">
                            <p>
                            Returns all the sajda ayahs from a particular edition<br />
                            {{edition}} is an edition identifier. Example: en.asad for Muhammad Asad's english translation
                            </p>
                        </div>
                        <div class="col-md-4">
                            <ol>
                                <li><a href="http://api.alquran.cloud/v1/sajda/en.asad" target="_blank">http://api.alquran.cloud/v1/sajda/en.asad</a> - Returns sajda ayahs from Muhammad Asad's translation of the Holy Quran</li>
                                <li><a href="http://api.alquran.cloud/v1/sajda/quran-uthmani" target="_blank">http://api.alquran.cloud/v1/sajda/quran-uthmani</a> - Returns the text of sajda ayahs of the Holy Quran</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h4>
            Base URLs
        </h4>
        <p>
            The API is available via 2 Base URLs - 1 in Europe and 1 in China.
        </p>
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingEurope">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEurope" aria-expanded="true" aria-controls="collapseEurope">Europe
                </a>
      </h4>
            </div>
            <div id="collapseEurope" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEurope">
                <div class="panel-body">
                   <b> http://api.alquran.cloud</b> - Available over http and https - based in Europe. Powered by multiple load balanced instances - please use this if you are outside China or expect heavy usage.
                </div>
            </div>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="headingChina">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseChina" aria-expanded="true" aria-controls="collapseSix">China
                </a>
      </h4>
            </div>
            <div id="collapseChina" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingChina">
                <div class="panel-body">
                    <b>http://api.quran.2muslim.org</b> - Available over http and https - licensed and based in China. This is a single instance endpoint - if you expect heavy usage, use the European endpoint or contact us, please. This instance has been kindly provided by ZhongMuWang（中穆网).
                </div>
            </div>
        </div>
    </div>

    <h4>Developer Resources</h4>
    For API clients and other tools, see our open source repositories on <a href="https://github.com/islamic-network" target="_blank">GitHub</a>.
</div>

<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
