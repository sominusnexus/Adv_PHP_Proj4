<?php
   interface ITaskManager {

	public function create($description, $created_by_user);
	public function read($id);
	public function readAll($username);
	public function update($id, $description);
	public function delete($id);

   }
?>