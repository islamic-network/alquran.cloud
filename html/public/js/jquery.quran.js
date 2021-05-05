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
                    url: "https://api.alquran.cloud/ayah/" + surahid + ':' + 1,
                    cache: false,
                    //dataType: 'jsonp',
                    success: function(data) {
                        // Update timings
                        if (data.code == 200) {
							ayahNumber = data.data.numberInSurah;
							w.setPlayerToAyah(surahid, ayahNumber, player);
                        }
                    }
                });
		},
		setPlayerToAyah: function(surah, ayah, player) {
			//var url = 'https://cdn.alquran.cloud/media/audio/ayah/ar.alafasy/' + ayah + '/high'
			var url = surah + '_' + ayah;
			var track = $('.mejs-playlist').find("[title='" + url + "']");
			var trackPrev = track.prev();
			if (surah == 1 || surah == 9) {
				player.setSrc(track.attr('data-url'));
				track.addClass('current').siblings().removeClass('current');
			} else {
				player.setSrc(trackPrev.attr('data-url'));
				trackPrev.addClass('current').siblings().removeClass('current');
			}
			
		},
		playThisAyah: function(player) {
			$('.playThisAyah').on('click', function() {
				// reference = $(this).data('reference');
				number = $(this).data('number');
				player.playTrackURL('https://cdn.islamic.network/quran/audio/128/ar.alafasy/' + number + '.mp3');
		  	});	
		},
		zoomIntoThisAyah: function() {
			$('.zoomIntoThisAyah').on('click', function() {
				number = $(this).data('number');
				window.location.href = 'https://alquran.cloud/ayah/' + number;
			});
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
                    url: "https://api.alquran.cloud/quran/" + edition,
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
