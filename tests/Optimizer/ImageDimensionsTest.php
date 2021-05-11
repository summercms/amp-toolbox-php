<?php

namespace AmpProject\Optimizer;

use AmpProject\Attribute;
use AmpProject\Dom\Document;
use AmpProject\Dom\Element;
use AmpProject\Layout;
use AmpProject\Tag;
use AmpProject\Tests\TestCase;
use stdClass;

/**
 * Tests for AmpProject\Optimizer\ImageDimensions.
 *
 * @covers  \AmpProject\Optimizer\ImageDimensions
 * @package ampproject/amp-toolbox
 */
class ImageDimensionsTest extends TestCase
{
    /**
     * Test instantiating the ImageDimensions object.
     *
     * @covers \AmpProject\Optimizer\ImageDimensions::__construct()
     */
    public function testItCanBeInstantiated()
    {
        $image           = new Element(Tag::IMG);
        $imageDimensions = new ImageDimensions($image);

        $this->assertInstanceOf(ImageDimensions::class, $imageDimensions);
    }

    /**
     * Provide an associative array of test data for checking and getting image dimensions.
     *
     * @return array[] Associative array of test data.
     */
    public function dataItCanGetDimensions()
    {
        return [
            'no dimensions'           => [null, null, false, false, null, null],
            'width only'              => [500, null, true, false, 500, null],
            'height only'             => [null, 500, false, true, null, 500],
            'width & height'          => [640, 480, true, true, 640, 480],
            'no dimensions (string)'  => ['', '', false, false, null, null],
            'width only (string)'     => ['500', '', true, false, 500, null],
            'height only (string)'    => ['', '500', false, true, null, 500],
            'width & height (string)' => ['640', '480', true, true, 640, 480],
            'width only (float)'      => [500.3, null, true, false, 500.3, null],
            'height only (float)'     => [null, 500.7, false, true, null, 500.7],
            'width & height (float)'  => [640.0, 480.0, true, true, 640.0, 480.0],
            'auto width'              => ['auto', null, true, false, 'auto', null],
            'auto height'             => [null, 'auto', false, true, null, 'auto'],
            'auto width & height'     => ['auto', 'auto', true, true, 'auto', 'auto'],
            'fluid width'             => ['fluid', null, true, false, 'fluid', null],
            'fluid height'            => [null, 'fluid', false, true, null, 'fluid'],
            'fluid width & height'    => ['fluid', 'fluid', true, true, 'fluid', 'fluid'],
            'with units'              => ['50vw', '50vh', true, true, '50vw', '50vh'],
        ];
    }

    /**
     * Test checking and getting the dimensions.
     *
     * @param int|string|null $width             Width of the image.
     * @param int|string|null $height            Height of the image.
     * @param bool            $expectedHasWidth  Expected presence check for width.
     * @param bool            $expectedHasHeight Expected presence check for height.
     * @param int|null        $expectedWidth     Expected value of width.
     * @param int|null        $expectedHeight    Expected value of height.
     *
     * @dataProvider dataItCanGetDimensions()
     *
     * @covers       \AmpProject\Optimizer\ImageDimensions::hasWidth()
     * @covers       \AmpProject\Optimizer\ImageDimensions::hasHeight()
     * @covers       \AmpProject\Optimizer\ImageDimensions::getWidth()
     * @covers       \AmpProject\Optimizer\ImageDimensions::getHeight()
     */
    public function testItCanGetDimensions(
        $width,
        $height,
        $expectedHasWidth,
        $expectedHasHeight,
        $expectedWidth,
        $expectedHeight
    ) {
        $dom   = new Document();
        $image = $dom->createElement(Tag::IMG);

        if ($width !== null) {
            $image->setAttribute(Attribute::WIDTH, $width);
        }

        if ($height !== null) {
            $image->setAttribute(Attribute::HEIGHT, $height);
        }

        $imageDimensions = new ImageDimensions($image);

        $this->assertEquals($expectedHasWidth, $imageDimensions->hasWidth());
        $this->assertEquals($expectedHasHeight, $imageDimensions->hasHeight());
        $this->assertEquals($expectedWidth, $imageDimensions->getWidth());
        $this->assertEquals($expectedHeight, $imageDimensions->getHeight());
    }

    /**
     * Provide an associative array of test data for checking and getting image dimension units.
     *
     * @return array[] Associative array of test data.
     */
    public function dataItCanGetDimensionUnits()
    {
        return [
            'no dimensions'           => [null, null, '', ''],
            'width only'              => [500, null, '', ''],
            'height only'             => [null, 500, '', ''],
            'width & height'          => [640, 480, '', ''],
            'no dimensions (string)'  => ['', '', '', ''],
            'width only (string)'     => ['500', '', '', ''],
            'height only (string)'    => ['', '500', '', ''],
            'width & height (string)' => ['640', '480', '', ''],
            'width only (float)'      => [500.3, null, '', ''],
            'height only (float)'     => [null, 500.7, '', ''],
            'width & height (float)'  => [640.0, 480.0, '', ''],
            'auto width'              => ['auto', null, '', ''],
            'auto height'             => [null, 'auto', '', ''],
            'auto width & height'     => ['auto', 'auto', '', ''],
            'fluid width'             => ['fluid', null, '', ''],
            'fluid height'            => [null, 'fluid', '', ''],
            'fluid width & height'    => ['fluid', 'fluid', '', ''],
            'width unit only'         => ['2em', '500', 'em', ''],
            'height unit only'        => ['500', '5rem', '', 'rem'],
            'with absolute units'     => ['500px', '500px', 'px', 'px'],
            'with relative units'     => ['50vw', '50vh', 'vw', 'vh'],
            'with percentages'        => ['50%', '50%', '%', '%'],
        ];
    }

    /**
     * Test checking and getting the dimension units.
     *
     * @param int|string|null $width                 Width of the image.
     * @param int|string|null $height                Height of the image.
     * @param int|null        $expectedWidthUnit     Expected value of width unit.
     * @param int|null        $expectedHeightUnit    Expected value of height unit.
     *
     * @dataProvider dataItCanGetDimensionUnits()
     *
     * @covers       \AmpProject\Optimizer\ImageDimensions::getWidthUnit()
     * @covers       \AmpProject\Optimizer\ImageDimensions::getHeightUnit()
     */
    public function testItCanGetDimensionUnits(
        $width,
        $height,
        $expectedWidthUnit,
        $expectedHeightUnit
    ) {
        $dom   = new Document();
        $image = $dom->createElement(Tag::IMG);

        if ($width !== null) {
            $image->setAttribute(Attribute::WIDTH, $width);
        }

        if ($height !== null) {
            $image->setAttribute(Attribute::HEIGHT, $height);
        }

        $imageDimensions = new ImageDimensions($image);

        $this->assertEquals($expectedWidthUnit, $imageDimensions->getWidthUnit());
        $this->assertEquals($expectedHeightUnit, $imageDimensions->getHeightUnit());
    }

    /**
     * Provide an associative array of test data for getting converted numeric dimensions.
     *
     * @return array[] Associative array of test data.
     */
    public function dataItCanGetNumericDimensions()
    {
        return [
            'no dimensions'          => [null, null, false, false],
            'width only'             => [500, null, 500, false],
            'height only'            => [null, 500, false, 500],
            'width & height ints'    => [640, 480, 640, 480],
            'width & height floats'  => [123.4, 567.8, 123.4, 567.8],
            'no dimensions (string)' => ['', '', false, false],
            'string ints'            => ['640', '480', 640, 480],
            'string floats'          => [123.4, 567.8, 123.4, 567.8],
            'auto width & height'    => ['auto', 'auto', false, false],
            'fluid width & height'   => ['fluid', 'fluid', false, false],
            'centimeters'            => ['5cm', '3cm', 188.9763779527559, 113.38582677165354],
            'millimeters'            => ['5mm', '3mm', 18.89763779527559, 11.338582677165354],
            'quarter-millimeters'    => ['5q', '3q', 4.724409448818898, 2.8346456692913384],
            'inches'                 => ['5in', '3in', 480, 288],
            'picas'                  => ['5pc', '3pc', 80, 48],
            'points'                 => ['5pt', '3pt', 6.666666666666667, 4],
            'pixels'                 => ['5px', '3px', 5, 3],
            'ems'                    => ['5em', '3em', false, false],
            'exs'                    => ['5ex', '3ex', false, false],
            'chs'                    => ['5ch', '3ch', false, false],
            'rems'                   => ['5rem', '3rem', false, false],
            'line-heights'           => ['5lh', '3lh', false, false],
            'vws & vhs'              => ['5vw', '3vh', false, false],
            'vmin & vmax'            => ['5vmin', '3vmax', false, false],
            'arbitrary strings'      => ['some', 'stuff', false, false],
        ];
    }

    /**
     * Test checking and getting the dimension units.
     *
     * @param int|string|null $width                 Width of the image.
     * @param int|string|null $height                Height of the image.
     * @param int|null        $expectedNumericWidth  Expected numeric width after conversion.
     * @param int|null        $expectedNumericHeight Expected numeric height after conversion.
     *
     * @dataProvider dataItCanGetNumericDimensions()
     *
     * @covers       \AmpProject\Optimizer\ImageDimensions::getNumericWidth()
     * @covers       \AmpProject\Optimizer\ImageDimensions::getNumericHeight()
     */
    public function testItCanGetNumericDimensions(
        $width,
        $height,
        $expectedNumericWidth,
        $expectedNumericHeight
    ) {
        $dom   = new Document();
        $image = $dom->createElement(Tag::IMG);

        if ($width !== null) {
            $image->setAttribute(Attribute::WIDTH, $width);
        }

        if ($height !== null) {
            $image->setAttribute(Attribute::HEIGHT, $height);
        }

        $imageDimensions = new ImageDimensions($image);

        $this->assertEquals($expectedNumericWidth, $imageDimensions->getNumericWidth());
        $this->assertEquals($expectedNumericHeight, $imageDimensions->getNumericHeight());
    }

    /**
     * Provide an associative array of test data for checking and getting the image layout.
     *
     * @return array[] Associative array of test data.
     */
    public function dataItCanGetTheLayout()
    {
        return [
            'no layout'          => [null, false, ''],
            'fixed layout'       => [Layout::FIXED, true, Layout::FIXED],
            'no layout (string)' => ['', false, ''],
        ];
    }

    /**
     * Test checking and getting the layout.
     *
     * @param string|null $layout            Layout of the image.
     * @param bool        $expectedHasLayout Expected presence check for layout.
     * @param int|null    $expectedLayout    Expected value of layout.
     *
     * @dataProvider dataItCanGetTheLayout()
     *
     * @covers       \AmpProject\Optimizer\ImageDimensions::hasLayout()
     * @covers       \AmpProject\Optimizer\ImageDimensions::getLayout()
     */
    public function testItCanGetTheLayout($layout, $expectedHasLayout, $expectedLayout)
    {
        $dom   = new Document();
        $image = $dom->createElement(Tag::IMG);

        if ($layout !== null) {
            $image->setAttribute(Attribute::LAYOUT, $layout);
        }

        $imageDimensions = new ImageDimensions($image);

        $this->assertEquals($expectedHasLayout, $imageDimensions->hasLayout());
        $this->assertEquals($expectedLayout, $imageDimensions->getLayout());
    }

    /**
     * Test whether the dimensions from a parent can be returned.
     *
     * @covers \AmpProject\Optimizer\ImageDimensions::getDimensionsFromParent()
     */
    public function testItCanGetDimensionsFromParent()
    {
        $dom   = new Document();
        $image = $dom->createElement(Tag::IMG);

        $parent = $dom->createElement(Tag::FIGURE);
        $parent->setAttribute(Attribute::WIDTH, 400);
        $parent->setAttribute(Attribute::HEIGHT, 200);

        $parent->appendChild($image);

        $imageDimensions = new ImageDimensions($image);

        $this->assertEquals([400, 200], $imageDimensions->getDimensionsFromParent());
    }

    /**
     * Test whether the dimensions from a parent's parent can be returned.
     *
     * @covers \AmpProject\Optimizer\ImageDimensions::getDimensionsFromParent()
     */
    public function testItCanGetDimensionsFromParentsParent()
    {
        $dom   = new Document();
        $image = $dom->createElement(Tag::IMG);

        $parentA = $dom->createElement(Tag::DIV);

        $parentB = $dom->createElement(Tag::DIV);
        $parentB->setAttribute(Attribute::WIDTH, 400);
        $parentB->setAttribute(Attribute::HEIGHT, 200);

        $parentB->appendChild($parentA)
            ->appendChild($image);

        $imageDimensions = new ImageDimensions($image);

        $this->assertEquals([400, 200], $imageDimensions->getDimensionsFromParent());
    }

    /**
     * Test whether iterating over parents for dimensions stop at a certain depth.
     *
     * @covers \AmpProject\Optimizer\ImageDimensions::getDimensionsFromParent()
     */
    public function testItStopsReturningParentDimensionsAtDepth3()
    {
        $dom   = new Document();
        $image = $dom->createElement(Tag::IMG);

        $parentA = $dom->createElement(Tag::DIV);

        $parentB = $dom->createElement(Tag::DIV);

        $parentC = $dom->createElement(Tag::DIV);
        $parentC->setAttribute(Attribute::WIDTH, 400);
        $parentC->setAttribute(Attribute::HEIGHT, 200);

        $parentC->appendChild($parentB)
            ->appendChild($parentA)
            ->appendChild($image);

        $imageDimensions = new ImageDimensions($image);

        $this->assertEquals([-1, -1], $imageDimensions->getDimensionsFromParent());
    }

    /**
     * Provide test data for checking if an image is tiny.
     *
     * @return array[] Associative array of test data.
     */
    public function dataItCanCheckIfAnImageIsTiny()
    {
        return [
            'large with no layout'                      => [500, 500, null, null, false],
            'small width with no layout'                => [50, 500, null, null, true],
            'small height with no layout'               => [500, 50, null, null, true],
            'small with no layout'                      => [50, 50, null, null, true],
            'zero width with no layout'                 => [0, 500, null, null, true],
            'zero height with no layout'                => [500, 0, null, null, true],
            'zero width & height with no layout'        => [0, 0, null, null, true],
            'large intrinsic'                           => [500, 500, Layout::INTRINSIC, null, false],
            'small intrinsic'                           => [50, 50, Layout::INTRINSIC, null, true],
            'large responsive'                          => [500, 500, Layout::RESPONSIVE, null, false],
            'small responsive'                          => [50, 50, Layout::RESPONSIVE, null, false],
            'large fixed height'                        => ['auto', 500, Layout::FIXED_HEIGHT, null, false],
            'small fixed height'                        => ['auto', 50, Layout::FIXED_HEIGHT, null, true],
            'no dimensions no layout'                   => [null, null, null, null, true],
            'no dimensions fill (checks parent size)'   => [null, null, Layout::FILL, null, false],
            'width with relative unit and large height' => ['50vw', 500, null, null, false],
            'height with relative unit and large width' => [500, '50vh', null, null, false],
            'width with relative unit and small height' => ['50vw', 50, null, null, true],
            'height with relative unit and small width' => [50, '50vh', null, null, true],
            'width & height with relative unit'         => ['50vw', '50vh', null, null, false],
            'width with large absolute unit'            => ['500in', 500, null, null, false],
            'height with large absolute unit'           => [500, '500in', null, null, false],
            'width with small absolute unit'            => ['1in', 500, null, null, true],
            'height with small absolute unit'           => [500, '1in', null, null, true],
        ];
    }

    /**
     * Test if an image is tiny.
     *
     * @param int|null    $width     Width of the image. Null if not defined.
     * @param int|null    $height    Height of the image. Null if not defined.
     * @param string|null $layout    Layout of the image. Null if not defined.
     * @param int|null    $threshold Threshold in pixels. Null to fall back to default.
     * @param bool        $expected  Expected check result.
     *
     * @dataProvider dataItCanCheckIfAnImageIsTiny()
     *
     * @covers       \AmpProject\Optimizer\ImageDimensions::IsTiny()
     */
    public function testItCanCheckIfAnImageIsTiny($width, $height, $layout, $threshold, $expected)
    {
        $dom   = new Document();
        $attrs = [];

        if ($width !== null) {
            $attrs[Attribute::WIDTH] = $width;
        }

        if ($height !== null) {
            $attrs[Attribute::HEIGHT] = $height;
        }

        if ($layout !== null) {
            $attrs[Attribute::LAYOUT] = $layout;
        }

        // Check in fixed layout parent.
        $parent = $dom->createElementWithAttributes(
            'amp-layout',
            [
                Attribute::LAYOUT => Layout::FIXED,
                Attribute::WIDTH  => 400,
                Attribute::HEIGHT => 200,
            ]
        );
        $image = $dom->createElementWithAttributes(Tag::IMG, $attrs);
        $parent->appendChild($image);
        $imageDimensions = new ImageDimensions($image);
        $this->assertEquals($expected, $imageDimensions->isTiny($threshold));

        // Check in responsive layout parent.
        $parent = $dom->createElementWithAttributes(
            'amp-layout',
            [
                Attribute::LAYOUT => Layout::RESPONSIVE,
                Attribute::WIDTH  => 3,
                Attribute::HEIGHT => 4,
            ]
        );
        $image = $dom->createElementWithAttributes(Tag::IMG, $attrs);
        $parent->appendChild($image);
        $imageDimensions = new ImageDimensions($image);
        $this->assertEquals($expected, $imageDimensions->isTiny($threshold));
    }
}
