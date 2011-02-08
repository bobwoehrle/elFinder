<?php

/**
 * elFinder storages interface
 *
 * @package elFinder
 * @author Dmitry (dio) Levashov
 **/
interface elFinderStorageDriver {
	
	/**
	 * Init storage.
	 * Return true if storage available
	 *
	 * @param  array  object configuration
	 * @param  string  unique key to use as prefix in files hashes
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function load(array $opts, $key);
	
	/**
	 * Return true if file is readable
	 *
	 * @param  string  file hash (use "/" to test root dir)
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function isReadable($hash);
	
	/**
	 * Return true if file is writable
	 *
	 * @param  string  file hash (use "/" to test root dir)
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function isWritable($hash);
	
	/**
	 * Return true if file can be removed
	 *
	 * @param  string  file hash (use "/" to test root dir)
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function isRemovable($hash);
	
	/**
	 * Return directory/file info
	 *
	 * @param  string  directory hash
	 * @return array
	 * @author Dmitry (dio) Levashov
	 **/
	public function info($hash);
	
	/**
	 * Return directory content
	 *
	 * @param  string  directory hash
	 * @param  string  sort rule
	 * @return array
	 * @author Dmitry (dio) Levashov
	 **/
	public function ls($hash, $sort);

	/**
	 * Return directory subdirs.
	 * Return one-level array, each dir contains parent dir hash
	 *
	 * @param  string  directory hash
	 * @return array
	 * @author Dmitry (dio) Levashov
	 **/
	public function tree($hash);

	/**
	 * Create thumbnails in directory
	 * Return info about created thumbnails
	 *
	 * @param  string  directory hash
	 * @return array
	 * @author Dmitry (dio) Levashov
	 **/
	public function tmb($hash);

	/**
	 * Open file and return descriptor
	 * Requered to copy file across storages with different types
	 *
	 * @param  string  file hash
	 * @param  string  open mode
	 * @return resource
	 * @author Dmitry (dio) Levashov
	 **/
	public function open($hash, $mode="rb");

	/**
	 * Close file opened by open() methods
	 *
	 * @param  resource  file descriptor
	 * @return void
	 * @author Dmitry (dio) Levashov
	 **/
	public function close($fp);
	
	/**
	 * Create directory
	 *
	 * @param  string  parent directory hash
	 * @param  string  new directory name
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function mkdir($hash, $name);

	/**
	 * Create empty file
	 *
	 * @param  string  parent directory hash
	 * @param  string  new file name
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function mkfile($hash, $name);

	/**
	 * Remove directory/file
	 *
	 * @param  string  directory/file hash
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function rm($hash);

	/**
	 * Rename directory/file
	 *
	 * @param  string  directory/file hash
	 * @param  string  new name
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function rename($hash, $name);

	/**
	 * Create directory/file copy
	 *
	 * @param  string  directory/file hash
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function duplicate($hash);

	/**
	 * Copy file into required directory
	 *
	 * @param  resource  file to copy descriptor
	 * @param  string    target directory hash
	 * @param  string    file to copy in name
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function copy($fp, $hash, $name);
	
	/**
	 * Return file content
	 *
	 * @param  string  file hash
	 * @return string
	 * @author Dmitry (dio) Levashov
	 **/
	public function getContent($hash);

	/**
	 * Write content into file
	 *
	 * @param  string  file hash
	 * @param  string  new content
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function setContent($hash, $content);

	/**
	 * Create archive from required directories/files
	 *
	 * @param  array   files hashes
	 * @param  string  archive name
	 * @param  string  archive mimetype
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function archive($files, $name, $type);

	/**
	 * Extract files from archive
	 *
	 * @param  string  archive hash
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function extract($hash);
	
	/**
	 * Resize image
	 *
	 * @param  string  image hash
	 * @param  int     new width
	 * @param  int     new height
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function resize($hash, $w, $h);

	/**
	 * Find directories/files by name mask
	 * Not implemented on client side yet
	 * For future version
	 *
	 * @param  string  name mask
	 * @return array
	 * @author Dmitry (dio) Levashov
	 **/
	public function find($mask);
	
	/**
	 * Return error message from last failed action
	 *
	 * @return string
	 * @author Dmitry (dio) Levashov
	 **/
	public function error();
	
	/**
	 * Return debug info
	 *
	 * @return array
	 * @author Dmitry (dio) Levashov
	 **/
	public function debug();
	
}// END interface 

?>