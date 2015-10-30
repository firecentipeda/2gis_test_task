<?php

class OrganizationRepository extends BaseRepository {
	public function getById($id) {
		$query = $this->getSelectQueryPart()
			. "LEFT JOIN firm_phones phones on firm.id=phones.firm_id "
			. "INNER JOIN building ON building.id=firm.building "
			. "INNER JOIN firm_rubrics ON firm.id = firm_rubrics.firm_id "
			. "WHERE firm.id = $id";
		return $this->getModelData($this->fetchAll($query));
	}
	
	private function getSelectQueryPart() {
		return "SELECT *, firm.id id, building.id building_id, X(`location`) longitude , Y(`location`) latitude FROM firm ";
	}
	
	public function getByBuildingId($id) {
		$query = $this->getSelectQueryPart()
			. "LEFT JOIN firm_phones phones on firm.id=phones.firm_id "
			. "INNER JOIN building ON building.id=firm.building "
			. "INNER JOIN firm_rubrics ON firm.id = firm_rubrics.firm_id "
			. "WHERE firm.building = $id";
		return $this->getModelData($this->fetchAll($query));
	}
	
	public function getByRubricId($id) {
		$firmIds = $this->getIdsByRubricId($id);
		if (empty($firmIds)) {
			return [];
		}
		$query = $this->getSelectQueryPart()
			. "LEFT JOIN firm_phones phones on firm.id=phones.firm_id "
			. "INNER JOIN building ON building.id=firm.building "
			. "INNER JOIN firm_rubrics ON firm.id = firm_rubrics.firm_id "
			. "WHERE firm.id IN(" . implode(',', $firmIds) . ")";
		return $this->getModelData($this->fetchAll($query));
	}
	
	private function getIdsByRubricId($rubricId) {
		$query = "select firm.id from firm "
			. "INNER JOIN firm_rubrics fr ON firm.id=fr.firm_id "
			. "WHERE fr.rubric_id=$rubricId "
			. "LIMIT $this->offset, $this->limit";
		$ids = [];
		foreach ($this->fetchAll($query) as $row) {
			$ids[] = $row['id'];
		}
		return $ids;
	}
	
	public function getInSquare($coordinates, $distance) {
		$distance /= 100000;
		$query = "SELECT id, 
			glength(LineStringFromWKB(LineString(GeomFromText(astext(location)), GeomFromText(astext(PointFromText('POINT($coordinates[longitude] $coordinates[latitude])')))))) as sdistance 
			FROM building having sdistance < $distance 
			ORDER BY sdistance";
		$buildingsIds = [];
		foreach ($this->fetchAll($query) as $row) {
			$buildingsIds[] = $row['id'];
		}
		if (empty($buildingsIds)) {
			return [];
		}
		$firmIds = $this->getIdsByBuildingsIds($id);
		if (empty($firmIds)) {
			return [];
		}
		$query = $this->getSelectQueryPart()
			. "LEFT JOIN firm_phones phones on firm.id=phones.firm_id "
			. "INNER JOIN building ON building.id=firm.building "
			. "INNER JOIN firm_rubrics ON firm.id = firm_rubrics.firm_id "
			. "WHERE firm.id IN(" . implode(',', $firmIds) . ")";
		return $this->getModelData($this->fetchAll($query));
	}
		
	private function getIdsByBuildingsIds($buildingsIds) {
		$query = "select firm.id from firm "
			. "WHERE building IN (" . implode(',', $buildingsIds) . ')'
			. "LIMIT $this->offset, $this->limit";
		$ids = [];
		foreach ($this->fetchAll($query) as $row) {
			$ids[] = $row['id'];
		}
		return $ids;
	}
	
	protected function getModelData($queryResult) {
		$modelData = [];
		foreach ($queryResult as $row) {
			if (empty($modelData[$row['id']])) {
				$modelData[$row['id']] = [
					'id' => $row['id'],
					'name' => $row['name'],
					'address' => [
						'city' => $row['city'],
						'street' => $row['street'],
						'building' => $row['building'],
					],
					'coordinates' => [
						'longitude' => $row['longitude'],
						'latitude' => $row['latitude'],
					],
					'buildingId' => $row['building_id'],
					'phones' => [$row['phone']],
					'rubricsIds' => [$row['rubric_id']],
				];
			} else {
				$modelData[$row['id']]['phones'][] = $row['phone'];
				$modelData[$row['id']]['rubricsIds'][] = $row['rubric_id'];
			}
		}
		foreach ($modelData as $index => $entity) {
			$modelData[$index]['phones'] = array_unique($entity['phones']);
			$modelData[$index]['rubricsIds'] = array_unique($entity['rubricsIds']);

		}
		return $modelData;
	}
}
