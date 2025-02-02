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
use CKSource\CKFinder\Filesystem\Folder\WorkingFolder;

/**
 * The RenameFolderEvent event class.
 */
class RenameFolderEvent extends CKFinderEvent
{
    /**
     * Working folder where the new folder is going to be renamed.
     *
     * @var WorkingFolder
     */
    protected $workingFolder;

    /**
     * The new folder name.
     *
     * @var string
     */
    protected $newFolderName;

    /**
     * Constructor.
     *
     * @param string $newFolderName
     */
    public function __construct(CKFinder $app, WorkingFolder $workingFolder, $newFolderName)
    {
        $this->workingFolder = $workingFolder;
        $this->newFolderName = $newFolderName;

        parent::__construct($app);
    }

    /**
     * Returns the working folder where the new folder is going to be renamed.
     *
     * @return WorkingFolder
     */
    public function getWorkingFolder()
    {
        return $this->workingFolder;
    }

    /**
     * Returns the new name of the folder.
     *
     * @return string
     */
    public function getNewFolderName()
    {
        return $this->newFolderName;
    }

    /**
     * Sets the new name for the folder.
     *
     * @param string $newFolderName
     */
    public function setNewFolderName($newFolderName)
    {
        $this->newFolderName = $newFolderName;
    }
}
