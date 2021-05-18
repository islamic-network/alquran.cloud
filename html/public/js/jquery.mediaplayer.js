jQuery( document ).ready( function( $ ) {
    $.alQuranMediaPlayer = {
        currentSurah: '',
        mode: 'surah',
        surahChangers: '',
        quran: '',
        firstAyah: '',
        lastAyah: '',
        player: '',
        surahChanged: false,
        realNumber: 1,
        container: '',
        init: function(player, mode, firstAyah, lastAyah, surah, quran, surahChangers) {
            this.mode = mode;
            this.player = player;
            this.firstAyah = Number(firstAyah);
            this.lastAyah = Number(lastAyah);
            this.surah = Number(surah);
            this.quran = quran;
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
            w.player.addEventListener('ended', function audioListener() {
                //console.log(number, w.realNumber);
                var ayah = $('.ayahAudio' + number);
                ayah.removeClass('ayah-playing');
                if (w.mode == 'quran') {
                    $.each(w.surahChangers, function(i, v) {
                        var matcher = v;
                        if (number === matcher) {
                            w.realNumber = matcher;
                            if (i < 114) {
                                w.surah = Number(i) + 1;
                            } else {
                                w.surah = 1;
                            }
                            w.surahChanged = true;
                        }
                    });
                    if (w.surahChanged === true && w.surah !=9 && w.surah != 1) {
                        number = 1;
                        // Update UI
                        $('.displayedSurah' + w.surah).removeClass('hide').siblings().addClass('hide');
                    } else {
                        number = w.realNumber;
                        if (number < w.lastAyah) {
                            number = Number(number) + 1;
                            w.realNumber = number;
                        } else if (number == w.lastAyah) {
                            number = 1;
                            w.realNumber = number;
                        }
                    }
                } else {
                    if (number == 1 && w.surah > 1) {
                        number = w.firstAyah;
                    } else if (number < w.lastAyah) {
                        number = number+1;
                    } else if (number == w.lastAyah) {
                        number = 1;
                    }
                }
                //console.log(number);
                var ayah = $('.ayahAudio' + number);
                ayah.addClass('ayah-playing');
                w.container.animate({
                    scrollTop: (ayah.offset().top - 100), scrollLeft: 0
                },
                    777);
                $('#activeAyah').attr('src', 'https://cdn.islamic.network/quran/audio/128/ar.alafasy/' + number + '.mp3');
                if (w.player.paused) {
                    w.player.load();
                    w.player.oncanplaythrough = w.player.play();
                }
                $('.playThisAyah').on('click', function() {
                    $('.ayahAudio' + number).removeClass('ayah-playing');
                    number = Number($(this).data('number'));
                    w.realNumber = number;
                    $('.ayahAudio' + number).addClass('ayah-playing');
                    $('#activeAyah').attr('src', 'https://cdn.islamic.network/quran/audio/128/ar.alafasy/' + number + '.mp3');
                    w.player.pause();
                    if (w.player.paused) {
                        w.player.load();
                        w.player.oncanplaythrough = w.player.play();
                    }
                    w.player.removeEventListener('ended', audioListener, true);
                });

                if (w.surahChanged === true) {
                    w.surahChanged = false;
                }
            });
        },
        zoomIntoThisAyah: function() {
            $('.zoomIntoThisAyah').on('click', function() {
                number = $(this).data('number');
                window.location.href = '/ayah/' + number;
            });
        }

    };
});
