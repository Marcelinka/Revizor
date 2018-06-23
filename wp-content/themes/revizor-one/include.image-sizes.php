<?php
	/*  
		Размеры изображений для разной ширины
		_4K - 4000px
		_Retina - 2560px
		_1080p - 1920px
		_720p - 1440px
		_Phones - 800px

		slide - слайдер на главной
		service - картинка в услуге
		about - фото ревизора
		document - фото документов
	*/
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'slide_4K', 1440, 9999);
		add_image_size( 'slide_Retina', 920, 9999);
		add_image_size( 'slide_1080p', 690, 9999 );
		add_image_size( 'slide_720p', 500, 9999 );
    	add_image_size( 'slide_Phones', 655, 9999 );

    	add_image_size('service_4K', 960, 9999);
    	add_image_size('service_Retina', 615, 9999);
    	add_image_size('service_1080p', 460, 9999);
    	add_image_size('service_720p', 345, 9999);
    	add_image_size('service_Phones', 220, 9999);

    	add_image_size('about_4K', 850, 9999);
    	add_image_size('about_1080p', 400, 9999);
    	add_image_size('about_Phones', 200, 9999);

    	add_image_size('document_4K', 450, 9999);
    	add_image_size('document_1080p', 300, 9999);
	}
?>