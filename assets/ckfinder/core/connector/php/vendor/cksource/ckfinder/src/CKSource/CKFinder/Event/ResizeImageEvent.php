<?php

/*
 * CKFinder
 * ========
 * https://ckeditor.com/ckfinder/
 * Copyright (c) 2007-2022, CKSource Holding sp. z o.o. All rights reserved.
 *
 * The software, this file and its contents are subject to the CKFinder
 * License. Please read the license.txt file before using, installing, copying,
 * modifying or distribute this file or part of its contents. The contents of
 * this file is part of the Source Code of CKFinder.
 */

namespace CKSource\CKFinder\Event;

use CKSource\CKFinder\CKFinder;
use CKSource\CKFinder\ResizedImage\ResizedImageAbstract;

/**
 * The ResizeImageEvent class.
 */
class ResizeImageEvent extends CKFinderEvent
{
    /**
     * @var ResizedImageAbstract
     */
    protected $resizedImage;

    public function __construct(CKFinder $app, ResizedImageAbstract $resizedImage)
    {
        parent::__construct($app);

        $this->resizedImage = $resizedImage;
    }

    /**
     * Returns the resized image object.
     *
     * @return ResizedImageAbstract
     */
    public function getResizedImage()
    {
        return $this->resizedImage;
    }

    /**
     * Sets the resized image object.
     */
    public function setResizedImage(ResizedImageAbstract $resizedImage)
    {
        $this->resizedImage = $resizedImage;
    }
}
