<?php
namespace AlQuranCloud\Renderer;

class Juz
{


	public static function renderAyahs($juz, $ayahs, $juzEdition = null, $ayahEditions = null)
	{
		$html = '';
		foreach ($ayahs as $key => $ayah) {
			$html .= '<p class="font-uthmani rtl style-ayah ayah' . $juz->data->number . '_' . $ayah->number . '">';
				if ($ayah->surah->number > 1 && $ayah->surah->number != 9 && $ayah->numberInSurah == 1) {
					$html .= mb_substr($ayah->text, 39);
				} else {
					$html .= $ayah->text;
				}
				$html .= Ayah::renderAyahEndingInArabic($ayah->numberInSurah);
				$html .= self::renderZoomIcon($ayah);
				$html .= '<span style="padding: 0 3px 0 3px;" class="pull-left">&nbsp;</span>';
				$html .= self::renderPlayIcon($ayah);
				$html .= '<span style="padding: 0 3px 0 3px;" class="pull-left">&nbsp;</span>';
			$html .= '</p>';
            $html .= '<span class="label label-primary pull-left translationText">' . $ayah->surah->name . '</span>';
            $html .= '<span style="padding: 0 3px 0 3px;" class="pull-left ">&nbsp;</span>';
            $html .= '<span class="label label-primary pull-left translationText">' . $ayah->surah->englishName . '</span>';
			$html .= '<div class="singleEditionAyah' . $ayah->juz . '_' . $ayah->number . '">';
				if ($juzEdition != null) {
				$html .= '<p class="translationText">';
					$html .= $ayah->numberInSurah . '. ' . $ayahEditions[$key]->text . ' <span class="label label-default">' . $juzEdition->data->edition->name . '</span>';
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
