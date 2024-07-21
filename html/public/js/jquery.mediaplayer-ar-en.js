jQuery( document ).ready( function( $ ) {
    $.alQuranMediaPlayer = {
        currentSurah: '',
        mode: 'surah',
        surahChangers: '',
        firstAyah: '',
        lastAyah: '',
        player: '',
        surahChanged: false,
        realNumber: 1,
        container: '',
        init: function(player, mode, firstAyah, lastAyah, surah, surahChangers) {
            this.mode = mode;
            this.player = player;
            this.firstAyah = Number(firstAyah);
            this.lastAyah = Number(lastAyah);
            this.surah = Number(surah);
            this.surahChangers = surahChangers;
            this.container = $("html,body");
        },
        defaultPlayer: function () {
            var w = this;
            var number = $('#activeAyah').attr('title');
            $('.ayahAudio' + number).addClass('ayah-playing');
            w.monitorPlayer(number);
        },
        monitorPlayer: function(number) {
            var w = this;
            number = Number(number);

            $('.playThisAyah').on('click', function () {
                $('.ayahAudio' + number).removeClass('ayah-playing');
                number = Number($(this).data('number'));
                w.realNumber = number;
                $('.ayahAudio' + number).addClass('ayah-playing');
                $('#activeAyah').attr('src', 'https://cdn.islamic.network/quran/audio/128/ar.alafasy-2/' + number + '.mp3');
                w.player.pause();
                if (w.player.paused) {
                    w.player.load();
                    w.player.oncanplaythrough = w.player.play();
                }
                w.player.removeEventListener('ended', audioListener, true);
            });

            $('#surahSelector').attr('disabled', false);

            w.player.addEventListener('ended', function audioListener() {
                var ayah = $('.ayahAudio' + number);
                var existingUrl = $('#activeAyah').attr('src');
                var split = existingUrl.split("/");
                var edition = split[6];
                ayah.removeClass('ayah-playing');
                if (w.mode == 'quran') {
                    $.each(w.surahChangers, function(i, v) {
                        var matcher = v;
                        if (number === matcher && edition == 'en.walk') {
                            // console.log(edition, matcher);
                            w.realNumber = matcher;
                            if (i < 114) {
                                w.surah = Number(i) + 1;
                            } else {
                                w.surah = 1;
                            }
                            w.surahChanged = true;
                        }
                    });
                    if (w.surahChanged === true) {

/*                        if (w.surah !=9 && w.surah != 1) {
                          number = 1;
                        }*/
                        // Update UI
                        //$('.displayedSurah' + w.surah).removeClass('hide').siblings().addClass('hide');
                        $('#surahSelector').val(w.surah).trigger('change');
                    } else {
                        number = w.realNumber;
                        if (number < w.lastAyah) {
                            if (edition == 'en.walk') {
                                number = Number(number) + 1;
                                w.realNumber = number;
                            }
                        } else if (number == w.lastAyah) {
                            if (edition == 'en.walk') {
                                number = 1;
                                w.realNumber = number;
                            }
                        }
                    }
                    w.highlightActive(number);
                } else if (w.mode == 'ayah') {
                    // Don't change the number.
                } else { // w.mode == 'surah'
                    if (number == 1 && w.surah > 1) {
                        number = w.firstAyah;
                    } else if (number < w.lastAyah) {
                        number = number + 1;
                        w.highlightActive(number);
                    } else if (number == w.lastAyah) {
                        number = 1;
                    }
                    if (w.surah > 1 && number > 1) {
                        w.highlightActive(number);
                    }
                }
                // console.log(number, w.surah, w.lastAyah);
                if (edition == 'ar.alafasy-2' && w.mode == 'quran') {
                    $('#activeAyah').attr('src', 'https://cdn.islamic.network/quran/audio/192/en.walk/' + number + '.mp3');
                } else {
                    $('#activeAyah').attr('src', 'https://cdn.islamic.network/quran/audio/128/ar.alafasy-2/' + number + '.mp3');
                }
                if (w.player.paused) {
                    w.player.load();
                    w.player.oncanplaythrough = w.player.play();
                }

                if (w.surahChanged === true) {
                    w.surahChanged = false;
                }

            });
        },
        highlightActive: function(number) {
            var w = this;
            var ayah = $('.ayahAudio' + number);
            ayah.addClass('ayah-playing');
            w.container.animate({
                scrollTop: (ayah.offset().top - 100), scrollLeft: 0
            },
                777);
        },
        zoomIntoThisAyah: function() {
            $('.zoomIntoThisAyah').on('click', function() {
                number = $(this).data('number');
                window.location.href = '/ayah/' + number;
            });
        }

    };
});
