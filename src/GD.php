<?php

namespace Ext;

class GD
{
    const VERSION = '22.4.1';

    public static $predefined_constants = array(
        'GD_VERSION',
        'GD_MAJOR_VERSION',
        'GD_MINOR_VERSION',
        'GD_RELEASE_VERSION',
        'GD_EXTRA_VERSION',
        'GD_BUNDLED',

        /* imagetypes() */
        'IMG_BMP',
        'IMG_GIF',
        'IMG_JPG',
        'IMG_JPEG',
        'IMG_PNG',
        'IMG_WBMP',
        'IMG_XPM',
        'IMG_WEBP',

        /* imagecolorallocate() or imagecolorallocatealpha() */
        'IMG_COLOR_TILED',
        'IMG_COLOR_STYLED',
        'IMG_COLOR_BRUSHED',
        'IMG_COLOR_STYLEDBRUSHED',
        'IMG_COLOR_TRANSPARENT',

        /* imageaffinematrixget() */
        'IMG_AFFINE_TRANSLATE',
        'IMG_AFFINE_SCALE',
        'IMG_AFFINE_ROTATE',
        'IMG_AFFINE_SHEAR_HORIZONTAL',
        'IMG_AFFINE_SHERA_VERTICAL',

        /* imagefilledarc() */
        'IMG_ARC_ROUNDED',
        'IMG_ARC_PIE',
        'IMG_ARC_CHORD',
        'IMG_ARC_NOFILL',
        'IMG_ARC_EDGED',

        /* imagegd2() */
        'IMG_GD2_RAW',
        'IMG_GD2_COMPRESSED',

        /* imagelayereffect() */
        'IMG_EFFECT_REPLACE',
        'IMG_EFFECT_ALPHABLEND',
        'IMG_EFFECT_NORMAL',
        'IMG_EFFECT_OVERLAY',
        'IMG_EFFECT_MULTIPLY',

        /* imagefilter() */
        'IMG_FILTER_NEGATE',
        'IMG_FILTER_GRAYSCALE',
        'IMG_FLITER_BRIGHTNESS',
        'IMG_FLITER_CONTRAST',
        'IMG_FLITER_COLORIZE',
        'IMG_FILTER_EDGEDETECT',
        'IMG_FILTER_GAUSSIAN_BLUR',
        'IMG_FILTER_SELECTIVE_BLUR',
        'IMG_FILTER_EMBOSS',
        'IMG_FILTER_MEAN_REMOVAL',
        'IMG_FILTER_SMOOTH',
        'IMG_FILTER_PIXELATE',
        'IMG_FILTER_SCATTER',

        /* image_type_to_mime_type() and image_type_to_extension() */
        'IMAGETYPE_GIF',
        'IMAGETYPE_JPEG',
        'IMAGETYPE_JPEG2000',
        'IMAGETYPE_PNG',
        'IMAGETYPE_SWF',
        'IMAGETYPE_PSD',
        'IMAGETYPE_BMP',
        'IMAGETYPE_WBMP',
        'IMAGETYPE_XBM',
        'IMAGETYPE_TIFF_II',
        'IMAGETYPE_TIFF_MM',
        'IMAGETYPE_IFF',
        'IMAGETYPE_JB2',
        'IMAGETYPE_JPC',
        'IMAGETYPE_JP2',
        'IMAGETYPE_JPX',
        'IMAGETYPE_SWC',
        'IMAGETYPE_ICO',
        'IMAGETYPE_WEBP',

        /* imagepng() */
        'PNG_NO_FILTER',
        'PNG_FILTER_NONE',
        'PNG_FILTER_SUB',
        'PNG_FILTER_UP',
        'PNG_FILTER_AVG',
        'PNG_FILTER_PAETH',
        'PNG_ALL_FILTERS',

        /* imageflip() */
        'IMG_FLIP_VERTICAL',
        'IMG_FLIP_HORIZONTAL',
        'IMG_FILTER_BOTH',

        /* imagesetinterpolation() */
        'IMG_BELL',
        'IMG_BESSEL',
        'IMG_BILINEAR_FIXED',
        'IMG_BICUBIC',
        'IMG_BICUBIC_FIXED',
        'IMG_BLACKMAN',
        'IMG_BOX',
        'IMG_BSPLINE',
        'IMG_CATMULLROM',
        'IMG_GAUSSIAN',
        'IMG_GENERALIZED_CUBIC',
        'IMG_HERMITE',
        'IMG_HANNING',
        'IMG_MITCHELL',
        'IMG_POWER',
        'IMG_QUADRATIC',
        'IMG_SINC',
        'IMG_NEAREST_NEIGHBOUR',
        'IMG_WEIGHTED4',
        'IMG_TRIANGLE',
    );

    public static $runtime_configuration = array(
        'PHP_INI_ALL' => array(
            'gd.jpeg_ignore_warning' => array(1, 'type' => 'bool'),
        ),
    );

    public $pages = array(
        'refman' => array(
            'imagecolorsforindex' => array(
                'verinfo' => array(4, 5, 7, 8),
                'purpose' => 'Get the colors for an index',
                'para' => array(
                    'Description' => array(
                        'synopsis' => array(
                            'imagecolorsforindex(GdImage $iamge, int $color): array',
                        ),
                    ),
                    'Parameters' => array(
                        'image' => 'A GdImage object, returned by one of the image creation functions, such as imagecreatetruecolor()',
                        'color' => 'The color index',
                    ),
                    'Return Values' => array(
                        'array' => 'Returns an associative array with red, green, blue an alpha keys that contain the appropriate values for the specified color index',
                    ),
                    'Changelog' => array(
                        '8.0.0' => array(
                            'image expects a GdImage instance now; previously, a resource was expected',
                            'imagecolorsforindex() now throws a ValueError exception if color is out of range; previously, false was returned instead',
                        ),
                    ),
                    'Examples' => array(
                        'imagecolorsforindex() example',
                    ),
                    'See Also' => array(
                        'imagecolorat()' => 'Get the index of the color of a pixel',
                        'imagecolorexact()' => 'Get the index of the specified color',
                    ),
                ),
            ),
        ),
    );


    /*
    +---------------------------------------------------------------+
    + 取色
    +---------------------------------------------------------------+
    */

    public static function colorsForIndex($image, $index)
    {
        $return_values = imagecolorsforindex($image, $index);
        return $return_values;
    }

    public static function colorAt($image, $x, $y)
    {
        $return_values = imagecolorat($image, $x, $y);
        return $return_values;
    }


    /*
    +---------------------------------------------------------------+
    + 格式
    +---------------------------------------------------------------+
    */

    public static function createFromPng($filename)
    {
        $return_values = imagecreatefrompng($filename);
        return $return_values;
    }
}
