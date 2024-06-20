<?php require(QCUBED_CONFIG_DIR . '/header.inc.php'); ?>
<style >
    body {font-size: 14px;}
    p, footer {font-size: medium;}
    h1 {font-size: 24px;}
    #tagline a {color: #fff !important;}
</style>

<?php $this->RenderBegin(); ?>
<section>
    <div class="instructions">
        <h1 class="instruction_title">QCubed v4 Plugin Created for Croppie and popupCroppie</h1>
        <p>Croppie is a fast and easy-to-use image cropping plugin with many configuration options! The goal is to create
            a simple core library that can be customized and extended. The homepage of the library is
            <a href="https://foliotek.github.io/Croppie/">here</a>,
            and a demo can be found here where you can see usage examples.</p>
        <p>Here are some examples. On the left side is the standard solution - Croppie,
            which you can further extend yourself. On the right side is a customized solution - popupCroppie,
            where we try to dynamically and conveniently use real-time image resizing with dimension overwriting, switch
            between circle and square, rotate the image left or right, and save.</p>
        <p>Note: There are some temporary folders here where you can save for testing, and a simple PHP upload function
            has been created. Controls have not been fully developed here. It is up to you to further develop them.</p>
    </div>
    <div>
        <div style="width: 50%; display: block; float: left;"><?= _r($this->objCroppie); ?></div>
        <div style="width: 50%; display: block; float: right;"><?= _r($this->btnPopup); ?></div>
    </div>
    <div style="display: block; clear: both;"></div>
</section>
<?php $this->RenderEnd(); ?>

<?php require(QCUBED_CONFIG_DIR . '/footer.inc.php'); ?>