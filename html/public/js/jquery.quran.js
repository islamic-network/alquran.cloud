jQuery( document ).ready( function( $ ) {
    $.alQuranQuran = {
		_surah: 1,
		_editions: [],
        editions: function(element, reference) {
            this.monitorEditions(element, reference);
        },
		surahs: function(element, player) {
			var w = this;
			$(element).on('change', function() {
				w._surah = ($(this).val());
				$('.displayedSurah' + w._surah).removeClass('hide').siblings().addClass('hide');
				// Set audio player to play the first file in this surah.
				w.getFirstAyahOfSurah(w._surah, player);
				
			});
		},
		getFirstAyahOfSurah: function(surahid, player) {
		   var w = this;
			var ayahNumber;
			$.ajax({
				type: "GET",
				url: "https://api.alquran.cloud/v1/ayah/" + (surahid) + ':' + 1,
				cache: false,
				success: function(data) {
					// Update timings
					if (data.code == 200) {
						ayahNumber = data.data.number;
						w.setPlayerToAyah(surahid, ayahNumber, player);
					}
				}
			});
		   //var ayahNumber = quran.surahs[Number(surahid - 1)].ayahs[0].number;
		   //w.setPlayerToAyah(surahid, ayahNumber, player);
		},
		setPlayerToAyah: function(surah, ayah, player) {
			const sleep = (milliseconds) => {
				return new Promise(resolve => setTimeout(resolve, milliseconds))
			}
/*			if (surah !=1 && surah !=9) {
				player.pause();
				// First play bismillah
				var bUrl = 'https://cdn.islamic.network/quran/audio/128/ar.alafasy-2/1.mp3';
				$('#activeAyah').attr('src', bUrl)
				if (player.paused) {
					player.load();
					player.oncanplaythrough = player.play();
					// Sleep because the bismillah is 6 seconds
					sleep(6000).then(() => {
						// Now set surah to play normally
						player.pause();
						if (player.paused) {
							$("#playThisAyah" + ayah).trigger('click');
						}
					});
				}
			} else {*/
				player.pause();
				if (player.paused) {
					//var url = 'https://cdn.islamic.network/quran/audio/128/ar.alafasy-2/' + ayah + '.mp3';
					$("#playThisAyah" + ayah).trigger('click');
				}

		},
        monitorEditions: function(element, reference) {
            var w = this;
            $(element).on('change', function() {
                editions = $(this).val();
                if (editions != 'undefined') {
                    $("div[class^=singleEditionAyah]").empty();
                    $.each(editions, function(i, v) {
						var cached = w.isEditionCached(v);
						if (cached) {
							w.renderSurah(cached);
						} else {
					  		w.quran(v);
						}
                    });
                }
            });
        },
		isEditionCached: function(edition) {
			var editions = this._editions;
			var res = false;
			$.each(editions, function(i, e) {
				if (e.edition.identifier == edition) {
					res = e;
				}
			});
			
			return res;
		},
        quran: function(edition) {
           var w = this;
           $.ajax({
                    type: "GET",
                    url: "https://api.alquran.cloud/v1/quran/" + edition,
                    cache: false,
                    //dataType: 'jsonp',
                    success: function(data) {
                        // Update timings
                        if (data.code == 200) {
							w._editions.push(data.data);
                            w.renderSurah(data.data);
                        }
                    }
                });
        },
        renderSurah: function(quran) {
			$.each(quran.surahs, function(i, surah) {
				$.each(surah.ayahs, function(i, v) {
					var ayah = '<p class-"translationText">' + v.numberInSurah + '. ' + v.text +  ' <span class="label label-default">' + quran.edition.name + '</span>' + '</p>';
					var identifier = '.singleEditionAyah' + surah.number + '_' + v.numberInSurah;
					$(identifier).append(ayah);
			   });
			});
        }
        
    };
});
