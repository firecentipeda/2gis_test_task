<?php

class BuildingRepository extends BaseRepository {
	public function getAll($offset, $limit) {
		$query = "SELECT *, X(`location`) longitude , Y(`location`) latitude FROM building limit $offset, $limit";
		return $this->getModelData($this->query($query));
	}
	
	protected function getModelData($queryResult) {
		$modelData = [];
		foreach ($queryResult as $row) {
			$modelData[$row['id']] = [
				'id' => $row['id'],
				'address' => [
					'city' => $row['city'],
					'street' => $row['street'],
					'building' => $row['building'],
				],
				'coordinates' => [
					'longitude' => $row['longitude'],
					'latitude' => $row['latitude'],
				],
			];
		}
		return $modelData;
	}
}