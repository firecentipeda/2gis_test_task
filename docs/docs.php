<?php

/*
 * АПИ выполнено в виде набора веб сервисов
 * Формат ответа сервера
 * array(
 *		string status - ok, error
 *		array result - ответ ВС
 * )
 * 
 * OrganizationWS данные по организациям
 * 
 * Методы:
 * getById возвращает информацию об организации по ее идентификатору
 * Параметры:
 * int id - идентификатор организации
 * 
 * Результат - массив данных об организации. См. organizationFormat
 * 
 * 
 * getByBuilding возвращает список организаций, находящихся в здании
 * Параметры:
 * int id - идентификатор здания
 * 
 * Результат - 
 * array(
 *		organizationFormat organization1,
 *		organizationFormat organization2,
 * )
 * 
 * getInSquare возвращает список организаций в прямоугольной области относительно точки
 * Параметры:
 * double lon долгота
 * double lat широта
 * int distance - расстояние в метрах от точки поиска
 * int limit - необязательный, по умолчанию 1000
 * int offset - необязательный, по умолчанию 0
 * 
 * Результат - список организаций
 * array(
 *		organizationFormat org1,
 *		organizationFormat org2,
 * )
 * 
 * getByRubric возвращает список организаций по рубрике
 * Параметры:
 * int id
 * int limit - необязательный, по умолчанию 1000
 * int offset - необязательный, по умолчанию 0
 * 
 * Результат
 * array(
 *		organizationFormat org1,
 *		organizationFormat org2,
 * )
 * 
 * organizationFormat формат данных об отдельной организации
 * array(
 *		int id
 *		string name
 *		array address
 *			string city
 *			string street
 *			string building
 *		array coordinates
 *			float latitude
 *			float longitude
 *		array phones
 *		array rubrics
 *			rubricTreeFormat
 *		int buildingId
 * )
 * 
 * rubricTreeFormat формат дерева рубрики. Полный путь от рубрики, в которой находится фирма, до корневой
 * array(
 *		array(
 *			int id
 *			string name
 *			int parentId
 *		)
 * )
 * 
 * BuildingWS позволяет получить данные о зданиях
 * 
 * Методы:
 * getList возвращает список зданий. Размер списка ограничен 1000 элементов
 * Параметры
 * int limit - необязательный, по умолчанию 1000
 * int offset - необязательный, по умолчанию 0
 * 
 * Результат:
 * array(
 *		int id
 *		array address
			string city
 *			string street
 *			string building
 *		array coordinates
 *			float latitude
 *			float longitude
 * )
 * 
 * Примеры запросов
 * http://firecentipeda.koding.io/index.php?service=organization&method=getbyid&id=198
 * http://firecentipeda.koding.io/index.php?service=organization&method=getbybuilding&id=154
 * http://firecentipeda.koding.io/index.php?service=organization&method=getbyrubric&id=5
 * http://firecentipeda.koding.io/index.php?service=organization&method=getbyrubric&id=5&limit=1000&offset=500
 * http://firecentipeda.koding.io/index.php?service=organization&method=getinsquare&lat=56&long=37&distance=100000
 * http://firecentipeda.koding.io/index.php?service=building&method=getList

 */
