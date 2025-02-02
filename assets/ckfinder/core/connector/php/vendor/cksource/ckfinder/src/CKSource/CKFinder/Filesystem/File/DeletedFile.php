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

namespace CKSource\CKFinder\Filesystem\File;

use CKSource\CKFinder\Error;
use CKSource\CKFinder\Exception\InvalidExtensionException;
use CKSource\CKFinder\Exception\InvalidRequestException;
use CKSource\CKFinder\Filesystem\Path;
use League\Flysystem\FilesystemException;

/**
 * The DeletedFile class.
 *
 * Represents the deleted file.
 */
class DeletedFile extends ExistingFile
{
    /**
     * Deletes the current file.
     *
     * @return bool `true` if the file was deleted successfully
     *
     * @throws \Exception
     */
    public function doDelete()
    {
        try {
            $this->resourceType->getBackend()->delete($this->getFilePath());
            $result = true;
        } catch (FilesystemException $e) {
            $result = false;
        }

        if ($result) {
            $this->deleteThumbnails();
            $this->deleteResizedImages();
            $this->getCache()->delete(Path::combine($this->resourceType->getName(), $this->folder, $this->getFilename()));

            return true;
        }
        $this->addError(Error::ACCESS_DENIED);

        return false;
    }

    public function isValid()
    {
        if (!$this->hasValidFilename() || !$this->hasValidPath()) {
            throw new InvalidRequestException('Invalid filename or path');
        }

        if (!$this->hasAllowedExtension()) {
            throw new InvalidExtensionException();
        }

        if ($this->isHidden() || $this->hasHiddenPath()) {
            throw new InvalidRequestException('Deleted file is hidden');
        }

        if (!$this->exists()) {
            $this->addError(Error::FILE_NOT_FOUND);

            return false;
        }

        return true;
    }
}
