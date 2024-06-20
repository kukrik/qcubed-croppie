# QCubed Croppie Plugin

## Croppie and PopupCroppie for QCubed v4


This QCubed plugin utilizes the Croppie plugin: https://foliotek.github.io/Croppie/. Croppie is a fast, easy to use image 
cropping plugin with tons of configuration options.

Croppie is a fast and easy-to-use image cropping plugin with many configuration options! The goal is to create a simple 
core library that can be customized and extended. The homepage of the library is <a href="https://foliotek.github.io/Croppie/">here</a>, 
and a demo can be found here where you can see usage examples.

Here are some examples. On the left side is the standard solution - Croppie, which you can further extend yourself. 
On the right side is a customized solution - popupCroppie, where we try to dynamically and conveniently use real-time 
image resizing with dimension overwriting, switch between circle and square, rotate the image left or right, and save.

Note: There are some temporary folders here where you can save for testing, and a simple PHP upload function has been created. 
Controls have not been fully developed here. It is up to you to further develop them.

![Image of kukrik](screenshot/croppie_screenhot.png?raw=true)

## This plugin is still being implemented

If you have not previously installed QCubed Bootstrap and twitter bootstrap, run the following actions on the command 
line of your main installation directory by Composer:
```
    composer require twbs/bootstrap v3.3.7
```
and

```
    composer require kukrik/qcubed-croppie
    composer require kukrik/bootstrap
```

