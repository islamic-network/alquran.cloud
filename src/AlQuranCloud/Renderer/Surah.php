<?php
namespace AlQuranCloud\Renderer;

class Surah
{
    public static function renderSurahHeaderRow($surah)
	{
		return '<div class="row" style="">
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-left">
			<h4>
				' . $surah->data->number . ' - ' . $surah->data->englishName . '
			</h4>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-center">
			<h4>
				' . $surah->data->englishNameTranslation . '
			</h4>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			<h4 class="rtl align-right font-uthmani">
		' . Generic::latinToArabicNumerals($surah->data->number) . '
		<span class="surah-bracket-sign">﴿</span> ' . $surah->data->name . ' <span class="surah-bracket-sign">﴾</span>
			</h4>
		</div>
	</div>';
	}

	public static function renderAyahs($surah, $ayahs, $surahEdition = null, $ayahEditions = null)
	{
		$html = '';
		foreach ($ayahs as $key => $ayah) {
			$html .= '<p class="font-uthmani rtl style-ayah ayah' . $surah->data->number . '_' . $ayah->numberInSurah . '">';
				if ($surah->data->number > 1 && $surah->data->number != 9 && $ayah->numberInSurah == 1) {
					$html .= str_replace('بِسْمِ ٱللَّهِ ٱلرَّحْمَٰنِ ٱلرَّحِيمِ ', '', $ayah->text);
				} else {
					$html .= $ayah->text;
				}
				$html .= Ayah::renderAyahEndingInArabic($ayah->numberInSurah);
				$html .= self::renderZoomIcon($ayah);
				$html .= '<span style="padding: 0 3px 0 3px;" class="pull-left">&nbsp;</span>';
				$html .= self::renderPlayIcon($ayah);
			$html .= '</p>';
			$html .= '<div class="singleEditionAyah' . $surah->data->number . '_' . $ayah->numberInSurah . '">';
				if ($surahEdition != null) {
				$html .= '<p class="translationText">';
					$html .= $ayah->numberInSurah . '. ' . $ayahEditions[$key]->text . ' <span class="label label-default">' . $surahEdition->data->edition->name . '</span>';
				$html .= '</p>';
				 }
			$html .= '</div>';
			//$html .= '<hr />';
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
