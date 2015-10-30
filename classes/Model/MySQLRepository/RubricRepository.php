<?php
class RubricRepository extends BaseRepository {
	public function getAll() {
		$query = 'SELECT * FROM rubric';
		return $this->getModelData($this->fetchAll($query));
	}
	
	protected function getModelData($queryResult) {
		$modelData = [];
		foreach ($queryResult as $row) {
			$modelData[$row['id']] = [
				'id' => $row['id'],
				'parentId' => $row['parent_id'],
				'name' => $row['name'],
			];
		}
		return $modelData;
	}
}