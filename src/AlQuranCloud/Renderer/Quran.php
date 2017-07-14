<?php
namespace AlQuranCloud\Renderer;

class Quran
{
    public static function renderSurahHeaderRow($surah)
	{
		return '<div class="row" style="padding-top: 50px;">
		<div class="col-md-4 align-left">
			<h4>
				' . $surah->number . ' - ' . $surah->englishName . '
			</h4>
		</div>
		<div class="col-md-4 align-center">
			<h4>
				' . $surah->englishNameTranslation . '
			</h4>
		</div>
		<div class="col-md-4">
			<h4 class="rtl align-right font-uthmani">
		' . Generic::latinToArabicNumerals($surah->number) . '
		<span class="surah-bracket-sign">﴿</span> ' . $surah->name . ' <span class="surah-bracket-sign">﴾</span>
			</h4>
		</div>
	</div>';
	}

	public static function renderAyahs($surah, $ayahs, $quranEdition = null, $ayahEditions = null)
	{
		$html = '';

		foreach ($ayahs as $key => $ayah) {

			$html .= '<p class="font-uthmani rtl style-ayah ayah' . $surah->number . '_' . $ayah->numberInSurah . '">';
				if ($surah->number > 1 && $surah->number != 9 && $ayah->numberInSurah == 1) {
					$html .= mb_substr($ayah->text, 39);
				} else {
					$html .= $ayah->text;
				}
				$html .= Ayah::renderAyahEndingInArabic($ayah->numberInSurah);
				$html .= self::renderZoomIcon($ayah);
				$html .= '<span style="padding: 0 3px 0 3px;" class="pull-left">&nbsp;</span>';
				$html .= self::renderPlayIcon($ayah);
			$html .= '</p>';
			$html .= '<div class="singleEditionAyah' . $surah->number . '_' . $ayah->numberInSurah . '">';
				if ($quranEdition != null) {
				$html .= '<p class="translationText">';
					$html .= $ayah->numberInSurah . '. ' . $ayahEditions[$key]->text . ' <span class="label label-default">' . $quranEdition->data->edition->name . '</span>';
				$html .= '</p>';
				 }
			$html .= '</div>';

		}
		return $html;
	}

	public static function renderZoomIcon($ayah)
	{
		return '<span class="linkify pull-left zoomIntoThisAyah" title="See just this Ayah" data-number="' . $ayah->number . '"><i class="glyphicon glyphicon-zoom-in"></i></span>';
	}

	public static function renderPlayIcon($ayah)
	{
		return '<span class="linkify pull-left playThisAyah" data-number="' . $ayah->number . '"><i class="glyphicon glyphicon-play-circle"></i></span>';
	}

}
