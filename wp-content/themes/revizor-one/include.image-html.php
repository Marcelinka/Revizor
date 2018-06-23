<?php
/*
	Функция для генерирования html для изображения с srcset и sizes
	Аргументы:
		$data - массив изображений оригинальный
		$images_tpl - шаблон для генерирования, массив вида <width_screen> => <name_of_size> от меньшего к большему
		[$class] - класс для изображения
		[$standart] - ширина экрана для стандартного изображения (запись в src)
*/

function makeImgHtml($data, $images_tpl, $class = '', $standart='1920') {
  $images = array();
  foreach($images_tpl as $key => $value) {
    $images[$key] = array (
      'url' => $data['sizes'][$value],
      'width' => $data['sizes'][$value."-width"]
    );
  }

	$imgElem = "<img class='". $class ."' src='". $images[$standart]['url'] ."' srcset='";
	$sizes = '100vw';
	foreach($images as $key => $value) {
		$srcset .= $value['url'] . " " . $key . "w, ";
	}
	$srcset = substr($srcset, 0, -2);
	$imgElem .= $srcset . "' sizes='" . $sizes . "'>";

	return $imgElem;
}