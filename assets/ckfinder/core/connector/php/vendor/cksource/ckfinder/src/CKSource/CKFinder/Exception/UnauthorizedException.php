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

namespace CKSource\CKFinder\Exception;

use CKSource\CKFinder\Error;
use Symfony\Component\HttpFoundation\Response;

/**
 * The "unauthorized exception" class.
 *
 * Thrown when ACL configuration does not allow for an operation,
 * e.g. uploading a file to a folder without the `FILE_CREATE` permission.
 */
class UnauthorizedException extends CKFinderException
{
    protected $httpStatusCode = Response::HTTP_UNAUTHORIZED;

    /**
     * Constructor.
     *
     * @param string     $message    the exception message
     * @param array      $parameters the parameters passed for translation
     * @param \Exception $previous   the previous exception
     */
    public function __construct($message = 'Unauthorized', $parameters = [], \Exception $previous = null)
    {
        parent::__construct($message, Error::UNAUTHORIZED, $parameters, $previous);
    }
}
