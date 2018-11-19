<?php
   interface ITaskManager {

	public function create($description);
	public function read($id);
	public function readAll();
	public function update($id, $newDesc);
	public function delete($id);

   }
?>