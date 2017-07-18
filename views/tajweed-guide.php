<?php require_once('common/header.php'); ?>
<?php require_once('common/navigation.php'); ?>
<?php // ================================================================ // ?>
<link href="/public/css/tajweed.css" rel="stylesheet">
<?php
$json = json_decode(file_get_contents('../vendor/alquran/tools/data/tajweed.json'));
$text = $json->data->text;
$parser = new AlQuranCloud\Tools\Parser\Tajweed();
?>

<div class="container">
    <div class="lead font-uthmani align-center">
        بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ
    </div>
	<div class="page-header">
        <h4>Tajweed Guide - <small> Parsing and Displaying Tajweed Data </small></h4>
    </div>
	<div class="row">
		<div class="col-md-12">
            <strong>NOTE: Webkit Browsers (Chrome, Safari etc.) are currently unable to properly parse arabic characters with inline HTML. Please use Firefox for displaying Tajweed. For more information, see the GitHub repo.</strong>
        <h5>Developer Tools and Documentation</h5>
        <p>
            The library and documentation on how to use it is available on <a href="https://github.com/islamic-apps/alquran-tools">https://github.com/meezaan/alquran-tools</a>.
            This page essentially lists the output of the library. Please see the complete documentation the GitHub URL above.
        </p>
        <h5>Rendered Example - Ayah Noor (24:35) with Tajweed Parsed</h5>
            <div class="font-uthmani style-ayah" style="direction: rtl">
            <?=$parser->parse($text);?>
            </div>
        <h5>What do the Colours mean?</h5>
        <table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>Type</th>
            <th>Identifier</th>
            <th>Colour</th>
            <th>CSS</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parser->getMeta() as $meta) { ?>
            <tr>
                <td><?=$meta['type'];?></td>
                <td><?=$meta['identifier'];?></td>
                <td style="background-color: <?=$meta['html_color'];?>; color: white;"><?=$meta['html_color'];?></td>
                <td><?=$meta['default_css_class'];?></td>
                <td><?=$meta['description'];?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
    <p>
        Essentially, all that's happening here is that [h:9421[ٱ] which is returned by the API for the above Vese becomes:
        <pre>&lt;tajweed class="ham_wasl" data-type="hamza-wasl" data-description="Hamzat ul Wasl" data-tajweed=":9421"&gt;ٱ&lt;/tajweed&gt;</pre>
    </p>
    </div>
        </div>


</div>



<?php // ================================================================ // ?>
<?php require_once('common/footer.php'); ?>
